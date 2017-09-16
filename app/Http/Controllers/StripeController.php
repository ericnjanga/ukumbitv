<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\PaymentPlan;
use App\UserPaymentPlan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class StripeController extends Controller
{

    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $plan_id;

    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->plan_id = env('PAYPAL_LIVE_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->plan_id = env('PAYPAL_SANDBOX_PLAN_ID', '');
        }

        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function createUserCard(Request $request)
    {
        // Validate request
        $this->validate( $request, [ 'stripeToken' => 'required', 'selectedPlan' => 'required'] );



//        // Current logged in user
        $me = Auth::user();
        $selectedPlanId = PaymentPlan::find($request->selectedPlan);
        if(!$selectedPlanId) {
            return redirect()->back()->with('flash_error', 'Something went wrong, try again later');
        }


        try {

            // check already subscribed and if already subscribed with picked plan
            if( $me->subscribed('main') && ! $me->subscribedToPlan($selectedPlanId->flag, 'main') ) {

                // swap if different plan attempt
                $me->subscription('main')->swap($selectedPlanId->flag);

            } else {
                // Its new subscription



                    // Create subscription
                    $me->newSubscription( 'main', $selectedPlanId->flag)->create($request->get('stripeToken'), [
                        'email' => $me->email,
                        'description' => $me->name
                    ]);


            }

        } catch (\Exception $e) {
            // Catch any error from Stripe API request and show
//            return redirect()->back()->withErrors(['status' => $e->getMessage()]);
            return redirect()->back()->with('flash_error', 'try later');
        }
        $userPlan = UserPaymentPlan::where('user_id', Auth::id())->first();
        $userPlan->payment_plan_id = $request->selectedPlan;
        $userPlan->save();

        $suspendPayPal = '';
        if(Auth::user()->paypal == 1) {
            $suspendPayPal = $this->cancelPayPalPaymentPlan();
        }

        $user = Auth::user();
        $user->paypal = 0;
        $user->save();


        return redirect()->route('user.package')
            ->with('flash_success', 'The Payment information was successfully updated')
            ->with('suspendPayPal', $suspendPayPal);
    }

    public function cancelSubscription()
    {
        Auth::user()->subscription('main')->cancel();
        return redirect()->route('user.package')
            ->with('flash_success', 'The Payment Plan was successfully suspended');

    }



    public function getCustomer()
    {
        $res = Auth::user()->asStripeCustomer();
        dd($res->sources);
    }

    public function cancelPayPalPaymentPlan()
    {
        //Create an Agreement State Descriptor, explaining the reason to suspend.
        $agreementStateDescriptor = new AgreementStateDescriptor();
        $agreementStateDescriptor->setNote("Suspending the agreement");
        try {
            $agree = Agreement::get(Auth::user()->paypal_agreement_id, $this->apiContext);

            $agree->suspend($agreementStateDescriptor, $this->apiContext);
            // Lets get the updated Agreement Object
            $agreement = Agreement::get($agree->getId(), $this->apiContext);
            $user = Auth::user();
            $user->role = $agreement->getState();
            $user->paypal_agreement_id = $agreement->getId();
            $user->paypal = 0;
            $user->save();

        } catch (\Exception $ex) {

            return false;
        }

        return true;
    }
}
