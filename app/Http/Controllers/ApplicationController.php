<?php

namespace App\Http\Controllers;

use App\PaymentPlan;
use App\UserPaymentPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Requests;

use App\Helpers\Helper;

use App\SubCategory;

use App\Genre;

use App\AdminVideo;

use App\User;

use App\Settings;

use Log;

use DB;

use Validator;

use App\Page;

class ApplicationController extends Controller {

    public $expiry_date = "";


    public function test(Request $request) {

        dd($request->all());

        Log::info("MAIN VIDEO MOBILE");

        // $subject = tr('welcome_email_title');
        // $email_data = User::find(3);
        // $page = "emails.welcome";
        // $email = "test@mail.com";

        // return view($page)->with('email_data' , $email_data);
        // $result = Helper::send_email($page,$subject,$email,$email_data);

    }

    public function select_genre(Request $request) {
        
        $id = $request->option;

        $genres = Genre::where('sub_category_id', '=', $id)
                        ->where('is_approved' , 1)
                          ->orderBy('name', 'asc')
                          ->get();

        return response()->json($genres);
    
    }

    public function select_sub_category(Request $request) {
        
        $id = $request->option;

        $subcategories = SubCategory::where('category_id', '=', $id)
                            ->leftJoin('sub_category_images' , 'sub_categories.id' , '=' , 'sub_category_images.sub_category_id')
                            ->select('sub_category_images.picture' , 'sub_categories.*')
                            ->where('sub_category_images.position' , 1)
                            ->where('is_approved' , 1)
                            ->orderBy('name', 'asc')
                            ->get();

        return response()->json($subcategories);
    
    }

    public function about(Request $request) {

        $about = Page::where('type', 'about')->first();

        return view('r.static.about-us')->with('about' , $about)
                        ->with('page' , 'about')
                        ->with('subPage' , '');

    }

    public function helpCenter($id=false){
        if($id !== false){
            return view('r.static.help')->with('back_url',route('user.help-center'));
        }
        return view('r.static.help-center');
    }

    public function advertising(){
        return view('r.static.advertising');
    }

    public function jobs($id=false) {
        if($id !== false){
            return view('r.static.job',['back_url'=>route('user.jobs')]);
        }
        return view('r.static.jobs');

    }

    public function privacy(Request $request) {

        $page = Page::where('type', 'privacy')->first();;

        // dd($page);
        return view('r.static.privacy')->with('data' , $page)
                        ->with('page' , 'conact_page')
                        ->with('subPage' , '');

    }

    public function terms(Request $request) {

        $page = Page::where('type', 'terms')->first();;

        // dd($page);
        return view('r.static.terms')->with('data' , $page)
                        ->with('page' , 'terms_and_condition')
                        ->with('subPage' , '');

    }


    public function cron_publish_video(Request $request) {
        
        Log::info('cron_publish_video');

        $videos = AdminVideo::where('publish_time' ,'<=' ,date('Y-m-d H:i:s'))
                        ->where('status' , 0)->get();
        foreach ($videos as $key => $video) {
            Log::info('Change the status');
            $video->status = 1;
            $video->save();
        }
    
    }

    public function send_notification_user_payment(Request $request) {

        Log::info("Notification to User for Payment");

        $time = date("Y-m-d");
        // Get provious provider availability data
        $query = "SELECT *, TIMESTAMPDIFF(SECOND, '$time',expiry_date) AS date_difference
                  FROM user_payments";

        $payments = DB::select(DB::raw($query));

        Log::info(print_r($payments,true));

        if($payments) {
            foreach($payments as $payment){
                if($payment->date_difference <= 864000)
                {
                    // Delete provider availablity
                    Log::info('Send mail to user');

                    if($user = User::find($payment->user_id)) {

                        Log::info($user->email);


                        $email_data = array();
                        // Send welcome email to the new user:
                        $subject = tr('payment_notification');
                        $email_data['id'] = $user->id;
                        $email_data['name'] = $user->name;
                        $email_data['expiry_date'] = $payment->expiry_date;
                        $email_data['status'] = 0;
                        $page = "emails.payment-expiry";
                        $email = $user->email;
                        $result = Helper::send_email($page,$subject,$email,$email_data);

                        \Log::info("Email".$result);
                    }
                }
            }
            Log::info("Notification to the User successfully....:-)");
        } else {
            Log::info(" records not found ....:-(");
        }
    
    }

    public function user_payment_expiry(Request $request) {

        Log::info("user_payment_expiry");

        $time = date("Y-m-d");
        // Get provious provider availability data
        $query = "SELECT *, TIMESTAMPDIFF(SECOND, '$time',expiry_date) AS date_difference
                  FROM user_payments";

        $payments = DB::select(DB::raw($query));

        Log::info(print_r($payments));

        if($payments) {
            foreach($payments as $payment){
                if($payment->date_difference < 0)
                {
                    // Delete provider availablity
                    Log::info('Send mail to user');

                    $email_data = array();
                    
                    if($user = User::find($payment->user_id)) {
                        $user->user_type = 0;
                        $user->save();
                        // Send welcome email to the new user:
                        $subject = tr('payment_notification');
                        $email_data['id'] = $user->id;
                        $email_data['username'] = $user->name;
                        $email_data['expiry_date'] = $payment->expiry_date;
                        $email_data['status'] = 1;
                        $page = "emails.payment-expiry";
                        $email = $user->email;
                        $result = Helper::send_email($page,$subject,$email,$email_data);

                        \Log::info("Email".$result);
                    }
                }
            }
            Log::info("Notification to the User successfully....:-)");
        } else {
            Log::info(" records not found ....:-(");
        }
    
    }

    public function search_video(Request $request) {

        $validator = Validator::make(
            $request->all(),
            array(
                'term' => 'required',
            ),
            array(
                'exists' => 'The :attribute doesn\'t exists',
            )
        );
    
        if ($validator->fails()) {

            $error_messages = implode(',', $validator->messages()->all());
            $response_array = array('success' => false, 'error' => Helper::get_error_message(101), 'error_code' => 101, 'error_messages'=>$error_messages);

            return false;
        
        } else {

            $q = $request->term;

            \Session::set('user_search_key' , $q);

            $items = array();
            
            $results = Helper::search_video($q);

            if($results) {

                foreach ($results as $i => $key) {

                    $check = $i+1;

                    if($check <=10) {
     
                        array_push($items,$key->title);

                    } if($check == 10 ) {
                        array_push($items,"View All" );
                    }
                
                }

            }

            return response()->json($items);
        }     
    
    }

    public function search_all(Request $request) {

        $validator = Validator::make(
            $request->all(),
            array(
                'key' => '',
            ),
            array(
                'exists' => 'The :attribute doesn\'t exists',
            )
        );
    
        if ($validator->fails()) {

            $error_messages = implode(',', $validator->messages()->all());
            $response_array = array('success' => false, 'error' => Helper::get_error_message(101), 'error_code' => 101, 'error_messages'=>$error_messages);
        
        } else {

            if($request->has('key')) {
                $q = $request->key;    
            } else {
                $q = \Session::get('user_search_key');
            }

            if($q == "all") {
                $q = \Session::get('user_search_key');
            }

            $videos = Helper::search_video($q,1);

            return view('r.user.search-result')->with('key' , $q)->with('videos' , $videos)->with('page' , "")->with('subPage' , "");
        }     
    
    }

    /**
     * To verify the email from user
     *
     */

    public function email_verify(Request $request) {
        // Check the request have user ID
        if($request->id) {         
            // Check the user record exists
            if($user = User::find($request->id)) {
                // Check the user already verified

                if(!$user->isVerified()) {
                    // Check the verification code and expiry of the code
                    $response = Helper::check_email_verification($request->verification_code , $user, $error);

                    if($response) {

                        $user->is_verified = true;
                        $user->save();

                        $payPlan = PaymentPlan::where('flag', 1)->first();
                        $userPayPlan = new UserPaymentPlan();
                        $userPayPlan->user_id = $user->id;
                        $userPayPlan->payment_plan_id = $payPlan->id;
                        $userPayPlan->expiry_date = Carbon::now()->addMonth(1);
                        $userPayPlan->save();

                        \Auth::loginUsingId($request->id);

                        return redirect('/')->with('flash_success' , "Email verified successfully!!!");
                    } else {
                        return redirect(route('user.login.form'))->with('flash_error' , $error);
                    }

                } else {
                    \Log::info('User Already verified');
                    \Auth::loginUsingId($request->id);
                    return redirect(route('user.dashboard'));
                }
            } else {
                return redirect(route('user.login.form'))->with('flash_error' , "User Record Not Found");
            }
        } else {
            return redirect(route('user.login.form'))->with('flash_error' , "Something Missing From Email verification");
        }
    }

    public function admin_control() {
        return view('admin.settings.control')->with('page', tr('admin_control'));
    }

    public function save_admin_control(Request $request) {

        $model = Settings::get();

        foreach ($model as $key => $value) {

            if($value->key == 'admin_theme_control') {
                $value->value = $request->admin_theme_control;
            } else if ($value->key == 'admin_delete_control') {
                $value->value = $request->admin_delete_control;
            } else if ($value->key == 'is_spam') {
                $value->value = $request->is_spam;
            } else if ($value->key == 'is_subscription') {
                $value->value = $request->is_subscription;
            }
            
            $value->save();
        }
        return back()->with('flash_success' , tr('settings_success'));
    }

    public function set_session_language($lang) {

        $locale = \Session::put('locale', $lang);

        return back()->with('flash_success' , tr('session_success'));
    }
}