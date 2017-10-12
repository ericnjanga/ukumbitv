<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\UserPaymentPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use Setting;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';


    protected $redirectAfterLogout = '/';




    /**
     * The Login form view that should be used.
     *
     * @var string
     */

    protected $loginView = 'r.user.auth.login';

    /**
     * The Register form view that should be used.
     *
     * @var string
     */

    protected $registerView = 'r.user.auth.register';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'welcomeEmail', 'resendVerifyEmail']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:3'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {        
        $User = User::create([
            //'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            //'timezone' => $data['timezone'],
            'picture' => asset('placeholder.png'),
            'is_activated' => 1,
            'login_by' => 'manual',
            'device_type' => 'web',
        ]);

        // Check the default subscription and save the user type 

        user_type_check($User->id);

        register_mobile('web');

        if(!Setting::get('email_verify_control')) {

            //$User->is_verified = 1;
            $payPlan = new UserPaymentPlan();
            $payPlan->user_id = $User->id;
            $payPlan->payment_plan_id = 2;
            $payPlan->save();
            //$User->save();
        }

        $this->sendVerifyEmail($User);
        
        return $User;
    }

    public function sendVerifyEmail($User)
    {
        // Send welcome email to the new user:
        $subject = trans('messages.welcome_email_title');
        $email_data = $User;
        $page = "emails.welcome";
        $email = $User->email;
        Helper::send_email($page,$subject,$email,$email_data);
    }


    public function resendVerifyEmail($id)
    {
        $User = User::find($id);
        $this->sendVerifyEmail($User);

        return redirect()->route('user.confirm-email')
            ->with('user', $User);
    }


    protected function authenticated(Request $request, User $user) {

        if(\Auth::check()) {

            if($user = User::find(\Auth::user()->id)) {

                // Check Admin Enabled the email verification

                if(Setting::get('email_verify_control')) {

                    if(!$user->is_verified && !$user->is_guest) {

                        \Auth::logout();

                        // Check the verification code expiry

                        Helper::check_email_verification("" , $user, $error);

//                        return redirect(route('user.login.form'))->with('flash_error', trans('messages.email_verify_alert'));
                        return view('r.user.auth.confirm-msg')->with('user', $user);

                    }

                }

                $user->login_by = 'manual';
                $user->timezone = $request->has('timezone') ? $request->timezone : '';
                $user->save();
            }   
        }
       return redirect()->intended($this->redirectPath());
    }

    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }
        if(Session::has('redirectTo')) {
            $this->redirectTo = Session::pull('redirectTo');
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    public function confirmEmailMsg()
    {
        //dd(Session::get('user'));
        return view('r.user.auth.confirm-msg')->with('user', Session::get('user'))->with('flash_success', 'New email was sent successfully');
    }

    public function confirmEmailMsgPage()
    {
        //dd(Session::get('user'));
        return view('r.user.auth.confirm-msg')->with('user', Auth::user())->with('flash_success', 'New email was sent successfully');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));
//        Auth::guard($this->getGuard())->logout();
        $user = User::where('email', $request->email)->first();
//        return view('r.user.auth.confirm-msg')->with('user', $user);
        return redirect()->action('UserController@index');

    }

    public function welcomeEmail($id=null)
    {
        if(Auth::check()) {
            return view('emails.welcome')->with('email_data', Auth::user());
        }
        $user = User::find($id);
        return view('emails.welcome')->with('email_data', $user);
    }

}
