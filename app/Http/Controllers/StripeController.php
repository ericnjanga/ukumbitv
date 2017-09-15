<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function createUserCard(Request $request)
    {
        // Validate request
        $this->validate( $request, [ 'stripeToken' => 'required', 'plan' => 'required'] );



//        // Current logged in user
        $me = Auth::user();

        try {

            $me->updateCard($request->stripeToken);
            // check already subscribed and if already subscribed with picked plan
            if( $me->subscribed('main') && ! $me->subscribedToPlan(Auth::user()->paymentPlans[0]->flag, 'main') ) {

                // swap if different plan attempt
                $me->subscription('main')->swap(Auth::user()->paymentPlans[0]->flag);

            } else {
                // Its new subscription



                    // Create subscription
                    $me->newSubscription( 'main', Auth::user()->paymentPlans[0]->flag)->create($request->get('stripeToken'), [
                        'email' => $me->email,
                        'description' => $me->name
                    ]);


            }

        } catch (\Exception $e) {
            // Catch any error from Stripe API request and show
            return redirect()->back()->withErrors(['status' => $e->getMessage()]);
        }

        return redirect()->route('user.package')->with('status', 'The Payment information was successfully updated');
    }



    public function getCustomer()
    {
        $res = Auth::user()->asStripeCustomer();
        dd($res->sources);
    }
}
