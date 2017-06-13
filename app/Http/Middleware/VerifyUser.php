<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Setting;
use App\Helpers\Helper;

/**
 * Verifications logged in user have to pass to access application
 * 
 */
class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        //Check if user is set
        if($user) {
            //Check if email is verified, if not redirect and logout
            if (!$user->isVerified() && Setting::get('email_verify_control') === "1") {
                \Auth::logout();
                return redirect(route('user.login.form'))->with('flash_error', tr('email_verify_alert'));
            }
            //Get if user made subscription payment
            if (!$user->userPaymentExpieryDateValid($user) && !$request->is('payment') && !$request->is('logout') && !$request->is('paypal/*')) {
                return redirect(route('user.userpayment'))->with('flash_warning', tr('make_paypal_subscription'));
            }
        }
        
        return $next($request);
    }
}

