<?php

namespace App\Http\Controllers;

use App\PaymentPlan;
use App\UserPaymentPlan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function createUserCard(Request $request)
    {
        // Validate request
        $this->validate( $request, [ 'stripeToken' => 'required', 'selectedPlan' => 'required'] );



//        // Current logged in user
        $me = Auth::user();
        $selectedPlanId = PaymentPlan::find($request->selectedPlan);
        if(!$selectedPlanId) {
            return redirect()->back()->with('error', 'Something went wrong, try again later');
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
            return redirect()->back()->withErrors(['status' => $e->getMessage()]);
        }
        $userPlan = UserPaymentPlan::where('user_id', Auth::id())->first();
        $userPlan->payment_plan_id = $request->selectedPlan;
        $userPlan->save();

        return redirect()->route('user.package')->with('status', 'The Payment information was successfully updated');
    }



    public function getCustomer()
    {
        $res = Auth::user()->asStripeCustomer();
        dd($res->sources);
    }
}
