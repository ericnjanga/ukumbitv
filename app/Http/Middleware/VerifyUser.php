<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Setting;

/**
 * Verifications logged in user have to pass to access application
 * 
 */
class VerifyUser
{

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    //List of paths allowed to access while user not logged in
    private $allowed_paths = ['login', 'register', 'social', 'advertising', 'callback/facebook', 'password/reset',
        'admin', 'email', 'setlocale', 'setlocale/fr', 'setlocale/en', 'about-us',
        'terms-of-use', 'privacy-statement', 'jobs', 'help-center', 'contact', 'video', 'test', '/', 'confirm-email', 'welcome-email', 'get-all-movies', 'api/v1/login'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::guard('api')->check()){
            return $next($request);
        }
        $user = $request->user();
        //Check if user is set and is not guest
        if($user && !$user->is_guest) {
            //Check if email is verified, if not redirect and logout
            if (!$user->isVerified() && Setting::get('email_verify_control') === "1") {
                \Auth::logout();
//                return redirect(route('user.login.form'))->with('flash_error', trans('messages.email_verify_alert'));
                return redirect(route('user.confirm-email'))->with('user', $user);
            }
            //Get if user made subscription payment
//            if (!$user->userPaymentExpieryDateValid($user) && ($request->is('video/*') || $request->is('newvideo/*'))) {
            if (!$user->userPaymentExpieryDateValid($user) && $request->is('newvideo/*')) {
                //!$request->is('payment') && !$request->is('logout') && !$request->is('paypal/*')
                return redirect(route('user.userpayment'))->with('flash_warning', tr('make_paypal_subscription'));
            }
        } else {
            //Allowed paths while not logged in
            if (!$request->is('email/*') && !$request->is('welcome-email/*') && !$request->is('video/*') && !$request->is('admin/*') && !$request->is('social/*') && !$request->is('jobs/*') && !$request->is('resend-email/*') && !$request->is('help-center/*') && !$request->is('stripe/*') && !in_array($request->path(), $this->allowed_paths)) {
                return redirect(route('user.login.form'));
            }
        }

        return $next($request);
    }
}

