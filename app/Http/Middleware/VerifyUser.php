<?php

namespace App\Http\Middleware;

use Closure;
use Setting;

/**
 * Verifications logged in user have to pass to access application
 * 
 */
class VerifyUser
{
    //List of paths allowed to access while user not logged in
    private $allowed_paths = ['login', 'register', 'social', 'callback/facebook', 'admin', 'email', 'setlocale', 'setlocale/fr', 'setlocale/en'];
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
        //Check if user is set and is not guest
        if($user && !$user->is_guest) {
            //Check if email is verified, if not redirect and logout
            if (!$user->isVerified() && Setting::get('email_verify_control') === "1") {
                \Auth::logout();
                return redirect(route('user.login.form'))->with('flash_error', trans('messages.email_verify_alert'));
            }
            //Get if user made subscription payment
            if (!$user->userPaymentExpieryDateValid($user) && !$request->is('payment') && !$request->is('logout') && !$request->is('paypal/*')) {
                return redirect(route('user.userpayment'))->with('flash_warning', tr('make_paypal_subscription'));
            }
        } else {
            //Allowed paths while not logged in
            if (!$request->is('email/*') && !$request->is('admin/*') && !$request->is('social/*') && !in_array($request->path(), $this->allowed_paths)) {
                return redirect(route('user.login.form'));
            }
        }
        
        return $next($request);
    }
}

