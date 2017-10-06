<?php

namespace App\Http\Controllers;

use App\Actor;
use App\AdminVideoVideoActor;
use App\AdminVideoVideoDirector;
use App\AdminVideoVideoTag;
use App\Director;
use App\Lang;
use App\MovieProducer;
use App\PaymentPlan;
use App\ProducerAgent;
use App\Season;
use App\Tag;
use App\VideoActor;
use App\VideoDirector;
use App\Videoimage;
use App\VideoTag;
use Illuminate\Http\Request;

use App\Requests;

use App\Moderator;

use App\User;

use App\UserPayment;

use App\PayPerView;

use App\Admin;

use App\Category;

use App\SubCategory;

use App\SubCategoryImage;

use App\Genre;

use App\AdminVideo;

use App\AdminVideoImage;

use App\UserHistory;

use App\Wishlist;

use App\UserRating;

use App\Language;

use App\Settings;

use App\Page;

use App\Helpers\Helper;

use App\Helpers\EnvEditorHelper;

use App\Flag;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\MagicConst\Dir;
use Validator;

use Hash;

use Mail;

use DB;

use Auth;

use Exception;

use Redirect;

use Setting;

use Log;

use App\Jobs\CompressVideo;


use App\Jobs\NormalPushNotification;
use Vimeo\Vimeo;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');  
    }

    public function login() {
        return view('admin.login')->withPage('admin-login')->with('sub_page','');
    }

    public function dashboard() {

        $admin = Admin::first();

        $admin->token = Helper::generate_token();
        $admin->token_expiry = Helper::generate_token_expiry();

        $admin->save();
        
        $user_count = User::count();
        $provider_count = Moderator::count();
        $video_count = AdminVideo::count();
        // $trending = trending();
        $recent_videos = Helper::recently_added();

        $get_registers = get_register_count();
        $recent_users = get_recent_users();
        $total_revenue = total_revenue();

        $view = last_days(10);

        $user = Auth::guard('admin')->user();
        if ($user->type == 'producer'){

            $producer = MovieProducer::where('email', $user->email)->first();
            $agent = ProducerAgent::find($producer->agent);
            $videos = AdminVideo::with('userHistory')->where('movie_producer_id', $producer->id)->get();
            $views = 0;
            foreach ($videos as $video){
                $views += count($video->userHistory);
            }
            //dd($views);

            return view('admin.dashboard.dashboard-producer')->withPage('dashboard-producer')
                ->with('sub_page','')
                ->with('user_count' , $user_count)
                ->with('video_count' , $video_count)
                ->with('provider_count' , $provider_count)
                ->with('get_registers' , $get_registers)
                ->with('view' , $view)
                ->with('total_revenue' , $total_revenue)
                ->with('recent_users' , $recent_users)
                ->with('recent_videos' , $recent_videos)
                ->with('producer', $producer)
                ->with('agent', $agent)
                ->with('videos', $videos)
                ->with('views', $views);
        } elseif ($user->type == 'agent') {
           // dd($user);
            $agent = ProducerAgent::where('email', $user->email)->first();
            $providers = explode(',', $agent->providers);

            return view('admin.dashboard.dashboard-agent')->withPage('dashboard-agent')
                ->with('sub_page','')
                ->with('user_count' , $user_count)
                ->with('video_count' , $video_count)
                ->with('provider_count' , $provider_count)
                ->with('get_registers' , $get_registers)
                ->with('view' , $view)
                ->with('total_revenue' , $total_revenue)
                ->with('recent_users' , $recent_users)
                ->with('recent_videos' , $recent_videos)
                ->with('agent', $agent)
                ->with('providers', $providers);

        } else {

        return view('admin.dashboard.dashboard')->withPage('dashboard')
            ->with('sub_page','')
            ->with('user_count' , $user_count)
            ->with('video_count' , $video_count)
            ->with('provider_count' , $provider_count)
            ->with('get_registers' , $get_registers)
            ->with('view' , $view)
            ->with('total_revenue' , $total_revenue)
            ->with('recent_users' , $recent_users)
            ->with('recent_videos' , $recent_videos);
        }
    }

    public function profile() {

        $admin = Admin::first();
        return view('admin.account.profile')->with('admin' , $admin)->withPage('profile')->with('sub_page','');
    }

    public function profile_process(Request $request) {

        $validator = Validator::make( $request->all(),array(
                'name' => 'max:255',
                'email' => 'email|max:255',
                'mobile' => 'digits_between:6,13',
                'address' => 'max:300',
                'id' => 'required|exists:admins,id',
                'picture' => 'mimes:jpeg,jpg,png'
            )
        );
        
        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);
        } else {
            
            $admin = Admin::find($request->id);
            
            $admin->name = $request->has('name') ? $request->name : $admin->name;

            $admin->email = $request->has('email') ? $request->email : $admin->email;

            $admin->mobile = $request->has('mobile') ? $request->mobile : $admin->mobile;

            $admin->gender = $request->has('gender') ? $request->gender : $admin->gender;

            $admin->address = $request->has('address') ? $request->address : $admin->address;

            if($request->hasFile('picture')) {
                Helper::delete_picture($admin->picture, "/uploads/");
                $admin->picture = Helper::normal_upload_picture($request->picture);
            }
                
            $admin->remember_token = Helper::generate_token();
            $admin->is_activated = 1;
            $admin->save();

            return back()->with('flash_success', tr('admin_not_profile'));
            
        }
    
    }

    public function change_password(Request $request) {

        $old_password = $request->old_password;
        $new_password = $request->password;
        $confirm_password = $request->confirm_password;
        
        $validator = Validator::make($request->all(), [              
                'password' => 'required|min:6',
                'old_password' => 'required',
                'confirm_password' => 'required|min:6',
                'id' => 'required|exists:admins,id'
            ]);

        if($validator->fails()) {

            $error_messages = implode(',',$validator->messages()->all());

            return back()->with('flash_errors', $error_messages);

        } else {

            $admin = Admin::find($request->id);

            if(Hash::check($old_password,$admin->password))
            {
                $admin->password = Hash::make($new_password);
                $admin->save();

                return back()->with('flash_success', tr('password_change_success'));
                
            } else {
                return back()->with('flash_error', tr('password_mismatch'));
            }
        }

        $response = response()->json($response_array,$response_code);

        return $response;
    }

    public function users() {

        $users = User::orderBy('created_at','desc')->get();

        return view('admin.users.users')->withPage('users')
                        ->with('users' , $users)
                        ->with('sub_page','view-user');
    }

    public function add_user() {
        return view('admin.users.add-user')->with('page' , 'users')->with('sub_page','add-user');
    }

    public function edit_user(Request $request) {

        $user = User::find($request->id);
        return view('admin.users.edit-user')->withUser($user)->with('sub_page','view-user')->with('page' , 'users');
    }

    public function add_user_process(Request $request) {

        if($request->id != '') {

            $validator = Validator::make( $request->all(), array(
                        'name' => 'required|max:255',
                        'email' => 'required|email|max:255',
                        'mobile' => 'required|digits_between:6,13',
                    )
                );
        
        } else {
            $validator = Validator::make( $request->all(), array(
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users,email',
                    'mobile' => 'required|digits_between:6,13',
                )
            );
        
        }
       
        if($validator->fails())
        {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);
        } else {

            if($request->id != '') {
                $user = User::find($request->id);
                $message = tr('admin_not_user');
            } else {
                //Add New User
                $user = new User;
                $new_password = time();
                $new_password .= rand();
                $new_password = sha1($new_password);
                $new_password = substr($new_password, 0, 8);
                $user->password = Hash::make($new_password);
                $message = tr('admin_add_user');
                $user->login_by = 'manual';
                $user->device_type = 'web';
            }

            $user->timezone = $request->has('timezone') ? $request->timezone : '';

            $user->name = $request->has('name') ? $request->name : '';
            $user->email = $request->has('email') ? $request->email: '';
            $user->mobile = $request->has('mobile') ? $request->mobile : '';
            
            $user->token = Helper::generate_token();
            $user->token_expiry = Helper::generate_token_expiry();
            $user->is_activated = 1; 
            $user->is_verified = 1; 
            $user->is_guest = $request->has('is_guest') ? $request->is_guest : '0';
            

            if($request->id == ''){
                $email_data['name'] = $user->name;
                $email_data['password'] = $new_password;
                $email_data['email'] = $user->email;

                $subject = tr('welcome_email_title');
                $page = "emails.admin_user_welcome";
                $email = $user->email;
                Helper::send_email($page,$subject,$email,$email_data);
            }

            $user->save();

            // Check the default subscription and save the user type 

            user_type_check($user->id);

            if($user) {
                register_mobile('web');
                return redirect('/admin/view/user/'.$user->id)->with('flash_success', $message);
            } else {
                return back()->with('flash_error', tr('admin_not_error'));
            }

        }
    
    }

    public function delete_user(Request $request) {
        
        if($user = User::where('id',$request->id)->first()) {
            // Check User Exists or not
            if ($user) {
                if ($user->device_type) {
                    // Load Mobile Registers
                    subtract_count($user->device_type);
                }
                // After reduce the count from mobile register model delete the user
                if ($user->delete()) {
                    return back()->with('flash_success',tr('admin_not_user_del'));   
                }
            }
        }
        return back()->with('flash_error',tr('admin_not_error'));
    }

    public function view_user($id) {

        if($user = User::find($id)) {

            return view('admin.users.user-details')
                        ->with('user' , $user)
                        ->withPage('users')
                        ->with('sub_page','users');

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function user_upgrade($id) {

        if($user = User::find($id)) {

            // Check the user is exists in moderators table

            if(!$moderator = Moderator::where('email' , $user->email)->first()) {

                $moderator_user = new Moderator;
                $moderator_user->name = $user->name;
                $moderator_user->email = $user->email;
                if($user->login_by == "manual") {
                    $moderator_user->password = $user->password;  
                    $new_password = "Please use you user login Pasword.";
                } else {
                    $new_password = time();
                    $new_password .= rand();
                    $new_password = sha1($new_password);
                    $new_password = substr($new_password, 0, 8);
                    $moderator_user->password = Hash::make($new_password);
                }

                $moderator_user->picture = $user->picture;
                $moderator_user->mobile = $user->mobile;
                $moderator_user->address = $user->address;
                $moderator_user->save();

                $email_data = array();

                $subject = tr('welcome_email_title');
                $page = "emails.moderator_welcome";
                $email = $user->email;
                $email_data['name'] = $moderator_user->name;
                $email_data['email'] = $moderator_user->email;
                $email_data['password'] = $new_password;

                Helper::send_email($page,$subject,$email,$email_data);

                $moderator = $moderator_user;

            }

            if($moderator) {
                $user->is_moderator = 1;
                $user->moderator_id = $moderator->id;
                $user->save();

                $moderator->is_activated = 1;
                $moderator->is_user = 1;
                $moderator->save();

                return back()->with('flash_warning',tr('admin_user_upgrade'));
            } else  {
                return back()->with('flash_error',tr('admin_not_error'));    
            }

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }

    }

    public function user_upgrade_disable(Request $request) {

        if($moderator = Moderator::find($request->moderator_id)) {

            if($user = User::find($request->id)) {
                $user->is_moderator = 0;
                $user->save();
            }

            $moderator->is_activated = 0;

            $moderator->save();

            return back()->with('flash_success',tr('admin_user_upgrade_disable'));

        } else {

            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function view_history($id) {

        if($user = User::find($id)) {

            $user_history = UserHistory::where('user_id' , $id)
                            ->leftJoin('users' , 'user_histories.user_id' , '=' , 'users.id')
                            ->leftJoin('admin_videos' , 'user_histories.admin_video_id' , '=' , 'admin_videos.id')
                            ->select(
                                'users.name as username' , 
                                'users.id as user_id' , 
                                'user_histories.admin_video_id',
                                'user_histories.id as user_history_id',
                                'admin_videos.title',
                                'user_histories.created_at as date'
                                )
                            ->get();

            return view('admin.users.user-history')
                        ->with('data' , $user_history)
                        ->withPage('users')
                        ->with('sub_page','users');

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function delete_history($id) {

        if($user_history = UserHistory::find($id)) {

            $user_history->delete();

            return back()->with('flash_success',tr('admin_not_history_del'));

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function view_wishlist($id) {

        if($user = User::find($id)) {

            $user_wishlist = Wishlist::where('user_id' , $id)
                            ->leftJoin('users' , 'wishlists.user_id' , '=' , 'users.id')
                            ->leftJoin('admin_videos' , 'wishlists.admin_video_id' , '=' , 'admin_videos.id')
                            ->select(
                                'users.name as username' , 
                                'users.id as user_id' , 
                                'wishlists.admin_video_id',
                                'wishlists.id as wishlist_id',
                                'admin_videos.title',
                                'wishlists.created_at as date'
                                )
                            ->get();

            return view('admin.users.user-wishlist')
                        ->with('data' , $user_wishlist)
                        ->withPage('users')
                        ->with('sub_page','users');

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function delete_wishlist($id) {

        if($user_wishlist = Wishlist::find($id)) {

            $user_wishlist->delete();

            return back()->with('flash_success',tr('admin_not_wishlist_del'));

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function moderators() {

        $moderators = Moderator::orderBy('created_at','desc')->get();

        return view('admin.moderators.moderators')->with('moderators' , $moderators)->withPage('moderators')->with('sub_page','view-moderator');
    }

    public function add_moderator() {
        return view('admin.moderators.add-moderator')->with('page' ,'moderators')->with('sub_page' ,'add-moderator');
    }

    public function edit_moderator($id) {

        $moderator = Moderator::find($id);

        return view('admin.moderators.edit-moderator')->with('moderator' , $moderator)->with('page' ,'moderators')->with('sub_page' ,'edit-moderator');
    }

    public function add_moderator_process(Request $request) {

        if($request->id != '') {
            $validator = Validator::make( $request->all(), array(
                        'name' => 'required|max:255',
                        'email' => 'required|email|max:255',
                        'mobile' => 'required|digits_between:6,13',
                    )
                );
        } else {
            $validator = Validator::make( $request->all(), array(
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:moderators,email',
                    'mobile' => 'required|digits_between:6,13',
                )
            );
        
        }
       
        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);

        } else {

            if($request->id != '') {
                $user = Moderator::find($request->id);
                $message = tr('admin_not_moderator');
            } else {
                $message = tr('admin_add_moderator');
                //Add New User
                $user = new Moderator;
                $new_password = time();
                $new_password .= rand();
                $new_password = sha1($new_password);
                $new_password = substr($new_password, 0, 8);
                $user->password = Hash::make($new_password);
                $user->is_activated = 1;

            }

            $user->timezone = $request->has('timezone') ? $request->timezone : '';
            $user->name = $request->has('name') ? $request->name : '';
            $user->email = $request->has('email') ? $request->email: '';
            $user->mobile = $request->has('mobile') ? $request->mobile : '';
            
            $user->token = Helper::generate_token();
            $user->token_expiry = Helper::generate_token_expiry();
                               

            if($request->id == ''){
                $email_data['name'] = $user->name;
                $email_data['password'] = $new_password;
                $email_data['email'] = $user->email;

                $subject = tr('welcome_email_title');
                $page = "emails.moderator_welcome";
                $email = $user->email;
                Helper::send_email($page,$subject,$email,$email_data);
            }

            $user->save();

            if($user) {
                return redirect('/admin/view/moderator/'.$user->id)->with('flash_success', $message);
            } else {
                return back()->with('flash_error', tr('admin_not_error'));
            }

        }
    
    }

    public function delete_moderator(Request $request) {

        if($moderator = Moderator::find($request->id)) {

            $moderator->delete();

            return back()->with('flash_success',tr('admin_not_moderator_del'));

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function moderator_approve(Request $request) {

        $moderator = Moderator::find($request->id);

        $moderator->is_activated = 1;

        $moderator->save();

        if($moderator->is_activated ==1) {
            $message = tr('admin_not_moderator_approve');
        } else {
            $message = tr('admin_not_moderator_decline');
        }

        return back()->with('flash_success', $message);
    }

    public function moderator_decline(Request $request) {
        
        if($moderator = Moderator::find($request->id)) {
            
            $moderator->is_activated = 0;

            $moderator->save(); 

            $message = tr('admin_not_moderator_decline');
        
            return back()->with('flash_success', $message);  
        } else {
            return back()->with('flash_error' , tr('admin_not_error'));
        }

    
    
            
    }

    public function moderator_view_details($id) {

        if($moderator = Moderator::find($id)) {
            return view('admin.moderators.moderator-details')->with('moderator' , $moderator)
                        ->withPage('moderator')
                        ->with('sub_page','view-moderators');
        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function categories() {

        $categories = Category::select('categories.id',
                            'categories.name' , 
                            'categories.picture',
                            'categories.is_series',
                            'categories.status',
                            'categories.is_approved',
                            'categories.created_by'
                        )
                        ->orderBy('categories.created_at', 'desc')
                        ->distinct('categories.id')
                        ->get();

        return view('admin.categories.categories')->with('categories' , $categories)->withPage('categories')->with('sub_page','view-categories');
    }

    public function add_category() {
        return view('admin.categories.add-category')->with('page' ,'categories')->with('sub_page' ,'add-category');
    }

    public function edit_category($id) {

        $category = Category::find($id);

        return view('admin.categories.edit-category')->with('category' , $category)->with('page' ,'categories')->with('sub_page' ,'edit-category');
    }

    public function add_category_process(Request $request) {

        if($request->id != '') {
            $validator = Validator::make( $request->all(), array(
                        'name' => 'required|max:255',
                        'picture' => 'mimes:jpeg,jpg,bmp,png',
                    )
                );
        } else {
            $validator = Validator::make( $request->all(), array(
                    'name' => 'required|max:255',
                    'picture' => 'required|mimes:jpeg,jpg,bmp,png',
                )
            );
        
        }
       
        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);

        } else {

            if($request->id != '') {
                $category = Category::find($request->id);
                $message = tr('admin_not_category');
                if($request->hasFile('picture')) {
                    Helper::delete_picture($category->picture, "/uploads/");
                }
            } else {
                $message = tr('admin_add_category');
                //Add New User
                $category = new Category;
                $category->is_approved = DEFAULT_TRUE;
                $category->created_by = ADMIN;
            }

            $category->name = $request->has('name') ? $request->name : '';
            $category->is_series = $request->has('is_series') ? $request->is_series : 0;
            $category->status = 1;
            
            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $category->picture = Helper::normal_upload_picture($request->file('picture'));
            }

            $category->save();

            if($category) {
                return back()->with('flash_success', $message);
            } else {
                return back()->with('flash_error', tr('admin_not_error'));
            }

        }
    
    }

    public function approve_category(Request $request) {

        $category = Category::find($request->id);

        $category->is_approved = $request->status;

        $category->save();

        // ($category->subCategory) ? $category->subCategory()->update(['is_approved' => $request->status]) : '';

        if ($request->status == 0) {
            foreach($category->subCategory as $sub_category)
            {                
                $sub_category->is_approved = $request->status;
                $sub_category->save();
            } 

            foreach($category->adminVideo as $video)
            {                
                $video->is_approved = $request->status;
                $video->save();
            } 

            foreach($category->genre as $genre)
            {                
                $genre->is_approved = $request->status;
                $genre->save();
            } 
        }

        $message = tr('admin_not_category_decline');

        if($category->is_approved == DEFAULT_TRUE){

            $message = tr('admin_not_category_approve');
        }

        return back()->with('flash_success', $message);
    
    }

    public function delete_category(Request $request) {
        
        $category = Category::where('id' , $request->category_id)->first();

        if($category) {          
            $category->delete();
            return back()->with('flash_success',tr('admin_not_category_del'));
        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }


    public function sub_categories($category_id) {

        $category = Category::find($category_id);

        $sub_categories = SubCategory::where('category_id' , $category_id)
                        ->select(
                                'sub_categories.id as id',
                                'sub_categories.name as sub_category_name',
                                'sub_categories.description',
                                'sub_categories.is_approved',
                                'sub_categories.created_by'
                                )
                        ->orderBy('sub_categories.created_at', 'desc')
                        ->get();

        return view('admin.categories.subcategories.sub-categories')->with('category' , $category)->with('data' , $sub_categories)->withPage('categories')->with('sub_page','view-categories');
    }

    public function add_sub_category($category_id) {

        $category = Category::find($category_id);
    
        return view('admin.categories.subcategories.add-sub-category')->with('category' , $category)->with('page' ,'categories')->with('sub_page' ,'add-category');
    }

    public function edit_sub_category(Request $request) {

        $category = Category::find($request->category_id);

        $sub_category = SubCategory::find($request->sub_category_id);

        $sub_category_images = SubCategoryImage::where('sub_category_id' , $request->sub_category_id)
                                    ->orderBy('position' , 'ASC')->get();

        $genres = Genre::where('sub_category_id' , $request->sub_category_id)
                        ->orderBy('position' , 'asc')
                        ->get();

        return view('admin.categories.subcategories.edit-sub-category')
                ->with('category' , $category)
                ->with('sub_category' , $sub_category)
                ->with('sub_category_images' , $sub_category_images)
                ->with('genres' , $genres)
                ->with('page' ,'categories')
                ->with('sub_page' ,'');
    }

    public function add_sub_category_process(Request $request) {

        if($request->id != '') {
            $validator = Validator::make( $request->all(), array(
                        'category_id' => 'required|integer|exists:categories,id',
                        'id' => 'required|integer|exists:sub_categories,id',
                        'name' => 'required|max:255',
                        'picture1' => 'mimes:jpeg,jpg,bmp,png',
                        'picture2' => 'mimes:jpeg,jpg,bmp,png',
                        'picture3' => 'mimes:jpeg,jpg,bmp,png',
                    )
                );
        } else {
            $validator = Validator::make( $request->all(), array(
                    'name' => 'required|max:255',
                    'description' => 'required|max:255',
                    'picture1' => 'required|mimes:jpeg,jpg,bmp,png',
                    'picture2' => 'required|mimes:jpeg,jpg,bmp,png',
                    'picture3' => 'required|mimes:jpeg,jpg,bmp,png',
                )
            );
        
        }
       
        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);

        } else {

            if($request->id != '') {

                $sub_category = SubCategory::find($request->id);

                $message = tr('admin_not_sub_category');

                if($request->hasFile('picture1')) {
                    Helper::delete_picture($request->file('picture1'), "/uploads/");
                }

                if($request->hasFile('picture2')) {
                    Helper::delete_picture($request->file('picture2'), "/uploads/");
                }

                if($request->hasFile('picture3')) {
                    Helper::delete_picture($request->file('picture3'), "/uploads/");
                }
            } else {
                $message = tr('admin_add_sub_category');
                //Add New User
                $sub_category = new SubCategory;

                $sub_category->is_approved = DEFAULT_TRUE;
                $sub_category->created_by = ADMIN;
            }

            $sub_category->category_id = $request->has('category_id') ? $request->category_id : '';
            
            if($request->has('name')) {
                $sub_category->name = $request->name;
            }

            if($request->has('description')) {
                $sub_category->description =  $request->description;   
            }

            $sub_category->save(); // Otherwise it will save empty values

            if($request->has('genre')) {

                foreach ($request->genre as $key => $genres) {
                    $genre = new Genre;
                    $genre->category_id = $request->category_id;
                    $genre->sub_category_id = $sub_category->id;
                    $genre->name = $genres;
                    $genre->status = DEFAULT_TRUE;
                    $genre->is_approved = DEFAULT_TRUE;
                    $genre->created_by = ADMIN;
                    $genre->position = $key+1;
                    $genre->save();
                }
            }
            
            if($request->hasFile('picture1')) {
                sub_category_image($request->file('picture1') , $sub_category->id,1);
            }

            if($request->hasFile('picture2')) {
                sub_category_image($request->file('picture2'), $sub_category->id , 2);
            }

            if($request->hasFile('picture3')) {
                sub_category_image($request->file('picture3'), $sub_category->id , 3);
            }

            if($sub_category) {
                return back()->with('flash_success', $message);
            } else {
                return back()->with('flash_error', tr('admin_not_error'));
            }

        }
    
    }

    public function approve_sub_category(Request $request) {

        $sub_category = SubCategory::find($request->id);

        $sub_category->is_approved = $request->status;

        $sub_category->save();

        if ($request->status == 0) {

            foreach($sub_category->adminVideo as $video)
            {                
                $video->is_approved = $request->status;
                $video->save();
            } 

            foreach($sub_category->genres as $genre)
            {                
                $genre->is_approved = $request->status;
                $genre->save();
            } 

        }

        $message = tr('admin_not_sub_category_decline');

        if($sub_category->is_approved == DEFAULT_TRUE){

            $message = tr('admin_not_sub_category_approve');
        }

        return back()->with('flash_success', $message);
    
    }

    public function delete_sub_category(Request $request) {

        $sub_category = SubCategory::where('id' , $request->id)->first();

        if($sub_category) {

            $sub_category->delete();

            return back()->with('flash_success',tr('admin_not_sub_category_del'));
        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function save_genre(Request $request) {

        $validator = Validator::make( $request->all(), array(
                    'category_id' => 'required|integer|exists:categories,id',
                    'id' => 'required|integer|exists:sub_categories,id',
                    'genre' => 'required|max:255',
                )
            );

        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);

        } else {
            // To order the position of the genres
            $position = 1;

            if($check_position = Genre::where('sub_category_id' , $request->id)->orderBy('position' , 'desc')->first()) {
                $position = $check_position->position +1;
            } 

            $genre = new Genre;
            $genre->category_id = $request->category_id;
            $genre->sub_category_id = $request->id;
            $genre->name = $request->genre;
            $genre->position = $position;
            $genre->status = DEFAULT_TRUE;
            $genre->is_approved = DEFAULT_TRUE;
            $genre->created_by = ADMIN;
            $genre->save();

            $message = tr('admin_add_genre');

            if($genre) {
                return back()->with('flash_success', $message);
            } else {
                return back()->with('flash_error', tr('admin_not_error'));
            }
        }
    
    }

    public function edit_genre(Request $request) {

    }

    public function approve_genre(Request $request) {

        $genre = Genre::find($request->id);

        $genre->is_approved = $request->status;

        $genre->save();

        if ($request->status == 0) {
            foreach($genre->adminVideo as $video)
            {                
                $video->is_approved = $request->status;
                $video->save();
            }
        }

        $message = tr('admin_not_genre_decline');

        if($genre->is_approved == DEFAULT_TRUE){

            $message = tr('admin_not_genre_approve');
        }

        return back()->with('flash_success', $message);
    
    }

    public function view_genre(Request $request) {

        $validator = Validator::make($request->all() , [
                'id' => 'required|exists:genres,id'
            ]);

        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);
        } else {
            $genres = Genre::where('genres.id' , $request->id)
                    ->leftJoin('categories' , 'genres.category_id' , '=' , 'categories.id')
                    ->leftJoin('sub_categories' , 'genres.sub_category_id' , '=' , 'sub_categories.id')
                    ->select('genres.id as genre_id' ,'genres.name as genre_name' , 
                             'genres.position' , 'genres.status' , 
                             'genres.is_approved' , 'genres.created_at as genre_date' ,
                             'genres.created_by',

                             'genres.category_id as category_id',
                             'genres.sub_category_id',
                             'categories.name as category_name',
                             'sub_categories.name as sub_category_name')
                    ->orderBy('genres.position' , 'asc')
                    ->get();

        return view('admin.categories.subcategories.genres.view-genre')->with('genres' , $genres)
                    ->withPage('videos')
                    ->with('sub_page','view-videos');
        }
    }

    public function delete_genre(Request $request) {
        if($genre = Genre::where('id',$request->id)->first()) {

            $genre->delete();

            return back()->with('flash_success',tr('admin_not_genre_del'));

        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function videos(Request $request) {

        $videos = AdminVideo::leftJoin('categories' , 'admin_videos.category_id' , '=' , 'categories.id')
                    ->leftJoin('sub_categories' , 'admin_videos.sub_category_id' , '=' , 'sub_categories.id')
                    ->leftJoin('genres' , 'admin_videos.genre_id' , '=' , 'genres.id')
                    ->leftJoin('movie_producers' , 'admin_videos.movie_producer_id' , '=' , 'movie_producers.id')
                    ->leftJoin('producer_agents' , 'movie_producers.producer_agent_id' , '=' , 'producer_agents.id')
                    ->select('admin_videos.id as video_id' ,'admin_videos.title' ,
                             'admin_videos.description' , 'admin_videos.ratings' , 
                             'admin_videos.reviews' , 'admin_videos.created_at as video_date' ,
                             'admin_videos.default_image',
                             'admin_videos.banner_image',
                             'admin_videos.amount',
                             'admin_videos.type_of_user',
                             'admin_videos.type_of_subscription',
                             'admin_videos.category_id as category_id',
                             'admin_videos.sub_category_id',
                             'admin_videos.genre_id',
                             'admin_videos.is_home_slider',
                             'admin_videos.compress_status',
                             'admin_videos.trailer_compress_status',
                             'admin_videos.status','admin_videos.uploaded_by',
                             'admin_videos.edited_by','admin_videos.is_approved',
                            'admin_videos.watchid',
                        'movie_producers.name as producer_name',
                        'producer_agents.name as agent_name',
                             'categories.name as category_name' , 'sub_categories.name as sub_category_name' ,
                             'genres.name as genre_name')
                    ->orderBy('admin_videos.created_at' , 'desc')
                    ->get();
        //dd($videos);
        return view('admin.videos.videos')->with('videos' , $videos)
                    ->withPage('videos')
                    ->with('sub_page','view-videos');
   
    }

    public function add_video(Request $request) {

        $categories = Category::where('categories.is_approved' , 1)
                        ->select('categories.id as id' , 'categories.name' , 'categories.picture' ,
                            'categories.is_series' ,'categories.status' , 'categories.is_approved')
                        ->leftJoin('sub_categories' , 'categories.id' , '=' , 'sub_categories.category_id')
                        ->groupBy('sub_categories.category_id')
                        ->havingRaw("COUNT(sub_categories.id) > 0")
                        ->orderBy('categories.name' , 'asc')
                        ->get();

         return view('admin.videos.video_upload')
                ->with('categories' , $categories)
                ->with('page' ,'videos')
                ->with('sub_page' ,'add-video');

    }

    public function add_movie()
    {


        $categories = Category::all();

        $actors = VideoActor::all();
        $directors = VideoDirector::all();
        $langs = Lang::all();
        $producers = MovieProducer::all();

        $tags = [];
        foreach (VideoTag::all() as $tag){
            array_push($tags, $tag->name);
        }
        $tags = implode(',', $tags);

        return view('admin.videos.movie_upload')
            ->with('categories', $categories)
            ->with('actors', $actors)
            ->with('directors', $directors)
            ->with('langs', $langs)
            ->with('producers', $producers)
            ->with('page', 'videos')
            ->with('tags', $tags);
    }

    public function add_movie_process(Request $request)
    {

    }

    public function deleteMovie(Request $request)
    {
        $movie = AdminVideo::find($request->id);
        $movie->videoTags()->detach();
        $movie->videoActors()->detach();
        $movie->videoDirectors()->detach();

        Storage::disk('public')->deleteDirectory('images/'.$movie->watchid);
        Storage::disk('public')->deleteDirectory('movies/'.$movie->watchid);
        $movie->delete();

        $images = Videoimage::where('admin_video_id', $request->id)->first();
        $images->delete();

        return response()->json(['success'=>'movie deleted']);
    }

    public function editMovie($id)
    {
        $categories = Category::all();

        $movie = AdminVideo::find($id);
        $movieTags = [];
            foreach ($movie->videoTags as $tag) {
                array_push($movieTags, $tag->name);
            }
        $movieTags = implode(',', $movieTags);


        $actors = VideoActor::all();
        $directors = VideoDirector::all();
        $langs = Lang::all();
        $images = Videoimage::where('admin_video_id', $id)->first();
        $producers = MovieProducer::all();



        $videoId = substr($movie->video, 8);

        $tags = [];
        foreach (VideoTag::all() as $tag){
            array_push($tags, $tag->name);
        }
        $tags = implode(',', $tags);

        return view('admin.videos.movie_edit')
            ->with('categories', $categories)
            ->with('video', $movie)
            ->with('actors', $actors)
            ->with('directors', $directors)
            ->with('images', $images)
            ->with('producers', $producers)
            ->with('page', 'videos')
            ->with('langs', $langs)
            ->with('videoId', $videoId)
            ->with('movieTags', $movieTags)
            ->with('tags', $tags);

    }

    public function updateMovie(Request $request)
    {



        $video = AdminVideo::find($request->id);
        $video->videoTags()->detach();
        $video->videoActors()->detach();
        $video->videoDirectors()->detach();

        $specialId = $video->watchid;
        $imgUrl = url('/images/'.$specialId.'/');
        $videoUrl = url('/movies/'.$specialId.'/');

        if($request->grand_display == 1) {
            $videosa = AdminVideo::where('is_banner', 1)->get();
            foreach ($videosa as $videoa) {
                $videoa->is_banner = 0;
                $videoa->save();
            }
        }


        $video->title = $request->title;
        $video->duration = $request->duration;
        $video->description = $request->description;
        $video->category_id = $request->category;
        $video->year = $request->year;
        $video->movie_producer_id = $request->producer;
        $video->lang_id = $request->lang;
        $video->country = $request->video_country;
        $video->video_type = $request->video_type;
        $video->length = $request->video_length;
        $video->is_banner = $request->grand_display;



        if(!empty($request->file('video'))){
            $client_id = Config::get('app.vimeo.client_id');
            $client_secret = Config::get('app.vimeo.client_secret');
            $token = Config::get('app.vimeo.access_token');

            $lib = new Vimeo($client_id, $client_secret, $token);
            $videoFile = $request->file('video');
            $uri = $lib->upload($videoFile);
            $video->video = $uri;
        } else {
            $uri = '/videos/'.$request->vimeoid;
            $video->video = $uri;
        }

        $video->save();

        $images = Videoimage::where('admin_video_id', $video->id)->first();
        if(!empty($request->file('billboard_image'))){
            $billboard_image = $request->file('billboard_image');
            $billboard_image_name = '/billboard'.time().$billboard_image->getClientOriginalName();
            $billboard_image->move(public_path('images/'.$specialId),$billboard_image_name);
            $images->imgBillboard = $imgUrl.$billboard_image_name;
        }
        if(!empty($request->file('small_image1'))){
            $small_image1 = $request->file('small_image1');
            $small_image1_name = '/small_image1'.time().$small_image1->getClientOriginalName();
            $small_image1->move(public_path('images/'.$specialId),$small_image1_name);
            $images->imgHero = $imgUrl.$small_image1_name;
        }
        if(!empty($request->file('small_image2'))){
            $small_image2 = $request->file('small_image2');
            $small_image2_name = '/small_image2'.time().$small_image2->getClientOriginalName();
            $small_image2->move(public_path('images/'.$specialId),$small_image2_name);
            $images->imgPreview1 = $imgUrl.$small_image2_name;
        }
        if(!empty($request->file('small_image3'))){
            $small_image3 = $request->file('small_image3');
            $small_image3_name = '/small_image3'.time().$small_image3->getClientOriginalName();
            $small_image3->move(public_path('images/'.$specialId),$small_image3_name);
            $images->imgPreview2 = $imgUrl.$small_image3_name;
        }
        if(!empty($request->file('preview_image'))){
            $preview_image = $request->file('preview_image');
            $preview_image_name = '/preview_image'.time().$preview_image->getClientOriginalName();
            $preview_image->move(public_path('images/'.$specialId),$preview_image_name);
            $images->imgPreview3 = $imgUrl.$preview_image_name;
        }

        $images->save();

        $this->createVideoTags($request->tags, $video->id);
        $this->createVideoActors($request->actor, $video->id);
        $this->createVideoDirectors($request->director, $video->id);


        return response()->json(['success'=>'movie updated']);


    }

    public function createVideoDirectors($directors, $videoId)
    {
        $videoDirectors = explode(',', $directors);
        foreach ($videoDirectors as $videoDirector){
            AdminVideoVideoDirector::create([
                'video_director_id' => $videoDirector,
                'admin_video_id' => $videoId
            ]);
        }
    }

    public function createVideoActors($actors, $videoId)
    {
        $videoActors = explode(',', $actors);
        foreach ($videoActors as $videoActor){
            AdminVideoVideoActor::create([
                'video_actor_id' => $videoActor,
                'admin_video_id' => $videoId
            ]);
        }
    }

    public function postUpload(Request $request)
    {

        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        return response()->json(['success'=>$imageName]);

    }

    public function deleteUpload(Request $request)
    {

        $filename = public_path('images').'/'.$request->id;

        if(!$filename)
        {
            return 0;
        }

        File::delete($filename);



        return response()->json(['success' => $request->id, 'path' => $filename]);
    }

    public function createMovie(Request $request)
    {
        if($request->hasFile('video')){
        $client_id = Config::get('app.vimeo.client_id');
        $client_secret = Config::get('app.vimeo.client_secret');
        $token = Config::get('app.vimeo.access_token');

        $lib = new Vimeo($client_id, $client_secret, $token);
        $video = $request->file('video');
        $uri = $lib->upload($video);
        } else {
            $uri = '/videos/'.$request->vimeoid;
        }

//        return response()->json($uri);
        //$video = $request->file('video');

        if($request->grand_display == 1) {
            $videos = AdminVideo::where('is_banner', 1)->get();
            foreach ($videos as $video) {
                $video->is_banner = 0;
                $video->save();
            }
        }



        $specialId = date('YmdHis');
        $imgUrl = url('/images/'.$specialId.'/');
        $videoUrl = url('/movies/'.$specialId.'/');

        if($request->hasFile('billboard_image')) {
            $billboard_image = $request->file('billboard_image');
            $billboard_image_name = '/billboard'.time().$billboard_image->getClientOriginalName();
            $billboard_image->move(public_path('images/'.$specialId),$billboard_image_name);
            $billboard = $imgUrl.$billboard_image_name;
        } else { $billboard = null; }

        if($request->hasFile('small_image1')) {
            $small_image1 = $request->file('small_image1');
            $small_image1_name = '/small_image1' . time() . $small_image1->getClientOriginalName();
            $small_image1->move(public_path('images/' . $specialId), $small_image1_name);
            $small1 = $imgUrl.$small_image1_name;
        } else { $small1 = null; }

        if($request->hasFile('small_image2')){
            $small_image2 = $request->file('small_image2');
            $small_image2_name = '/small_image2'.time().$small_image2->getClientOriginalName();
            $small_image2->move(public_path('images/'.$specialId),$small_image2_name);
            $small2 = $imgUrl.$small_image2_name;
        } else { $small2 = null; }

        if($request->hasFile('small_image3')) {
            $small_image3 = $request->file('small_image3');
            $small_image3_name = '/small_image3' . time() . $small_image3->getClientOriginalName();
            $small_image3->move(public_path('images/' . $specialId), $small_image3_name);
            $small3 = $imgUrl.$small_image3_name;
        } else { $small3 = null; }

        if($request->hasFile('preview_image')) {
            $preview_image = $request->file('preview_image');
            $preview_image_name = '/preview_image'.time().$preview_image->getClientOriginalName();
            $preview_image->move(public_path('images/'.$specialId),$preview_image_name);
            $preview = $imgUrl.$preview_image_name;
        } else { $preview = null; }


        $adminVideo = new AdminVideo();
        $adminVideo->title = $request->title;
        $adminVideo->description = $request->description;
        $adminVideo->category_id = $request->category;
        $adminVideo->sub_category_id = 1;
        $adminVideo->genre_id = 0;
        $adminVideo->video = $uri;
        $adminVideo->trailer_video = 'trailer url';
        $adminVideo->default_image = $small2;
        $adminVideo->banner_image = '';
        $adminVideo->ratings = 5;
        $adminVideo->reviews = 'review';
        $adminVideo->status = 1;
        $adminVideo->is_approved = 1;
        $adminVideo->is_home_slider = 0;
        $adminVideo->is_banner = $request->grand_display;
        $adminVideo->uploaded_by = 'admin';
        $adminVideo->publish_time = '2017-06-05 10:45:00';
        $adminVideo->duration = $request->duration;
        $adminVideo->trailer_duration = '00:00:00';
        $adminVideo->edited_by = 'admin';
        $adminVideo->watch_count = 1;
        $adminVideo->video_type = $request->video_type;
        $adminVideo->video_upload_type = 2;
        $adminVideo->watchid = $specialId;
        $adminVideo->lang_id = $request->lang;
        $adminVideo->year = $request->year;
        $adminVideo->movie_producer_id = $request->producer;
        $adminVideo->country = $request->video_country;
        $adminVideo->length = $request->video_length;

        $adminVideo->save();

        $images = new Videoimage();
        $images->admin_video_id = $adminVideo->id;
        $images->imgBillboard = $billboard;
        $images->imgHero = $small1;
        $images->imgPreview1 = $small2;
        $images->imgPreview2 = $small3;
        $images->imgPreview3 = $preview;
        $images->save();

        $this->createVideoTags($request->tags, $adminVideo->id);
        $this->createVideoActors($request->actor, $adminVideo->id);
        $this->createVideoDirectors($request->director, $adminVideo->id);


        return response()->json($adminVideo);
    }



    public function createVideoTags($tags, $videoId)
    {
        $tagsNew = mb_strtolower($tags);
        $tagsArr = explode(',', $tagsNew);


        foreach ($tagsArr as $tagvar) {
            $tag = VideoTag::where('name', $tagvar)->first();
            $videoTag = new AdminVideoVideoTag();
            $videoTag->admin_video_id = $videoId;

            if($tag == null) {
                $newTag = new VideoTag();
                $newTag->name = $tagvar;
                $newTag->save();

                $videoTag->video_tag_id = $newTag->id;
            } else {

                $videoTag->video_tag_id = $tag->id;
            }
            $videoTag->save();
        }
    }

    //episodes
    public function episodes(Request $request) {

        $videos = AdminVideo::with('seasons')->where('video_type', 'webseries')->get();
//        $videos = Season::with('adminVideos')->get();
        //dd($videos);
        return view('admin.episodes.episodes')->with('videos' , $videos)
            ->withPage('episodes')
            ->with('sub_page','view-episodes');

    }

    public function addEpisode()
    {

        $videos = AdminVideo::where('video_type', 'webseries')->get();
        return view('admin.episodes.episode_upload')
            ->with('page', 'videos')
            ->with('videos', $videos);
    }

    public function editEpisode($id)
    {
        $season = Season::with('adminVideo')->where('admin_video_id', $id)->get();
        $video = AdminVideo::find($id);
        return view('admin.episodes.episode_edit')
            ->with('video', $video)
            ->with('seasons', $season)
            ->with('page', 'seasons');
    }

    public function addEpisodeProcess(Request $request)
    {
        $season = new Season();
        $season->admin_video_id = $request->videoid;
        $season->season_id = $request->season;
        $season->title = $request->title;
        $season->vimeo_id = $request->vimeoid;
        $season->save();

        return response()->json($season);
    }

    public function editEpisodes($id, $sid)
    {
        $season = Season::with('adminVideo')->where('admin_video_id', $id)->where('season_id', $sid)->get();
        $video = AdminVideo::find($id);
        return view('admin.episodes.episodes_edit')
            ->with('video', $video)
            ->with('seasons', $season)
            ->with('selectedSeason', $sid)
            ->with('page', 'seasons');
    }

    public function deleteEpisode($id)
    {
        $episode = Season::find($id);
        $episode->delete();
        return redirect()->back();
    }

    public function editOneEpisode($id)
    {
        $episode = Season::find($id);
        return view('admin.episodes.episode_one_edit')->with('episode', $episode)->with('page', 'seasons');
    }

    public function updateEpisode(Request $request)
    {
        $episode = Season::find($request->id);
        $episode->season_id = $request->season;
        $episode->title = $request->title;
        $episode->vimeo_id = $request->vimeoid;
        $episode->save();

        return response()->json($episode);
    }


    //langs
    public function langs(Request $request) {

        $langs = Lang::all();

        return view('admin.langs.langs')->with('langs' , $langs)
            ->withPage('langs')
            ->with('sub_page','view-langs');

    }

    public function add_lang(Request $request) {

        return view('admin.langs.lang_upload')
            ->withPage('langs');

    }

    public function createLang(Request $request)
    {
        $lang = new Lang();
        $lang->title = $request->title;
        $lang->save();

        return response()->json($lang);
    }

    public function deleteLang(Request $request)
    {
        $lang = Lang::find($request->id);
        $lang->delete();


        return response()->json(['success'=>'Language deleted']);
    }

    public function editLang($id)
    {
        $lang = Lang::find($id);


        return view('admin.langs.edit-lang')
            ->with('lang', $lang)
            ->with('page', 'lang');
    }

    public function updateLang(Request $request)
    {
        $lang = Lang::find($request->id);
        $lang->title = $request->name;


        $lang->save();


        return response()->json($lang);

    }

    //payment plans
    public function payPlans(Request $request) {

        $pay_plans = PaymentPlan::all();

        return view('admin.payment_plans.payment_plans')->with('pay_plans' , $pay_plans)
            ->withPage('payment_plans');
            //->with('sub_page','view-payment_plans');

    }

    public function addPayPlan(Request $request) {

        return view('admin.payment_plans.payment_plan_upload')
            ->withPage('payment_plan');

    }

    public function createPayPlan(Request $request)
    {
        $payPlan = new PaymentPlan();
        $payPlan->name = $request->name;
        $payPlan->price = money_format('%i', $request->price);
        $payPlan->description = $request->description;
        $payPlan->product1 = $request->product1;
        $payPlan->product2 = $request->product2;
        $payPlan->product3 = $request->product3;
        $payPlan->product4 = $request->product4;
        $payPlan->save();

        return response()->json($payPlan);
    }

    public function deletePayPlan(Request $request)
    {
        $payPlan = PaymentPlan::find($request->id);
        $payPlan->delete();


        return response()->json(['success'=>'Payment plan deleted']);
    }

    public function editPayPlan($id)
    {
        $payPlan = PaymentPlan::find($id);


        return view('admin.payment_plans.edit_payment_plan')
            ->with('payPlan', $payPlan)
            ->with('page', 'payPlan');
    }

    public function updatePayPlan(Request $request)
    {
        $payPlan = PaymentPlan::find($request->id);
        $payPlan->name = $request->name;
        $payPlan->price = money_format('%i', $request->price);
        $payPlan->description = $request->description;
        $payPlan->product1 = $request->product1;
        $payPlan->product2 = $request->product2;
        $payPlan->product3 = $request->product3;
        $payPlan->product4 = $request->product4;


        $payPlan->save();


        return response()->json($payPlan);

    }

    //Producer agents
    public function producerAgents(Request $request) {

        $agents = ProducerAgent::all();

        return view('admin.producer_agents.producer_agents')->with('agents' , $agents)
            ->withPage('producer_agents')
            ->with('sub_page','view-producer_agents');

    }

    public function addProducerAgent(Request $request) {

        $providers = MovieProducer::all();

        return view('admin.producer_agents.producer-agent_upload')
            ->with('providers', $providers)
            ->withPage('producer_agents');

    }

    public function createProducerAgent(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6',
        ]);

        $agent = new ProducerAgent();
        $agent->name = $request->name;
        $agent->royalties = $request->royalties;
        $agent->contract_expiration = $request->contract_expiration;
        $agent->providers = $request->providers;
        $agent->email = $request->email;
        $agent->password = bcrypt($request->password);
        $agent->description = $request->description;
        $agent->save();

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->type = 'agent';
        $admin->save();

        return response()->json(['agent' => $agent, 'admin' => $admin]);
    }

    public function deleteProducerAgent(Request $request)
    {
        $agent = ProducerAgent::find($request->id);
        $agent->delete();


        return response()->json(['success'=>'Agent deleted']);
    }

    public function editProducerAgent($id)
    {
        $agent = ProducerAgent::find($id);
        $dirarr = explode(',', $agent->providers);
        $providers = MovieProducer::all();


        return view('admin.producer_agents.edit-producer-agent')
            ->with('agent', $agent)
            ->with('dirarr', $dirarr)
            ->with('providers', $providers)
            ->with('page', 'agent');
    }

    public function updateProducerAgent(Request $request)
    {
        $agent = ProducerAgent::find($request->id);
        $agent->name = $request->name;
        $agent->royalties = $request->royalties;
        $agent->contract_expiration = $request->contract_expiration;
        $agent->providers = $request->providers;
        $agent->email = $request->email;
        $agent->password = $request->password;
        $agent->description = $request->description;


        $agent->save();


        return response()->json($agent);

    }

    //Movie producer
    public function movieProducers(Request $request) {

        $producers = MovieProducer::all();

        return view('admin.movie_producers.movie_producers')->with('producers' , $producers)
            ->withPage('movie_producers')
            ->with('sub_page','view-movie_producers');

    }

    public function addMovieProducers(Request $request) {

        $agents = ProducerAgent::all();

        return view('admin.movie_producers.movie-producer_upload')
            ->with('agents', $agents)
            ->withPage('movie_producers');

    }

    public function createMovieProducer(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6'
        ]);

        $producer = new MovieProducer();
        $producer->name = $request->name;
        $producer->royalties = $request->royalties;
        $producer->contract_expiration = $request->contract_expiration;
        $producer->producer_agent_id = $request->agent;
        $producer->email = $request->email;
        $producer->password = bcrypt($request->password);
        $producer->description = $request->description;
        $producer->save();

//        $admin = Admin::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => bcrypt($request->password),
//            'type' => 'producer' //producer
//        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->type = 'producer';
        $admin->save();

        return response()->json(['producer' => $producer, 'admin' => $admin]);
    }

    public function deleteMovieProducer(Request $request)
    {
        $producer = MovieProducer::find($request->id);
        $producer->delete();


        return response()->json(['success'=>'Movie producer deleted']);
    }

    public function editMovieProducer($id)
    {
        $producer = MovieProducer::find($id);
        $agents = ProducerAgent::all();


        return view('admin.movie_producers.edit-movie-producer')
            ->with('producer', $producer)
            ->with('agents', $agents)
            ->with('page', 'producer');
    }

    public function updateMovieProducer(Request $request)
    {
        $producer = MovieProducer::find($request->id);
        $producer->name = $request->name;
        $producer->royalties = $request->royalties;
        $producer->contract_expiration = $request->contract_expiration;
        $producer->producer_agent_id = $request->agent;
        $producer->email = $request->email;
        $producer->password = $request->password;
        $producer->description = $request->description;


        $producer->save();


        return response()->json($producer);

    }

    //Actors
    public function actors(Request $request) {

        $actors = VideoActor::all();

        return view('admin.actors.actors')->with('actors' , $actors)
            ->withPage('actors')
            ->with('sub_page','view-actors');

    }

    public function add_actor(Request $request) {

        return view('admin.actors.actor_upload')
            ->withPage('actors');

    }

    public function createActor(Request $request)
    {
        $actor = new VideoActor();
        $actor->name = $request->title;
        $actor->bio = $request->description;
        $actor->save();

        return response()->json($actor);
    }

    public function deleteActor(Request $request)
    {
        $actor = VideoActor::find($request->id);
        $actor->adminVideos()->detach();
        $actor->delete();


        return response()->json(['success'=>'actor deleted']);
    }

    public function editActor($id)
    {
        $actor = VideoActor::find($id);


        return view('admin.actors.edit-actor')
            ->with('actor', $actor)
            ->with('page', 'actor');
    }

    public function updateActor(Request $request)
    {
        $actor = VideoActor::find($request->id);
        $actor->name = $request->name;
        $actor->bio = $request->bio;

        $actor->save();


        return response()->json($actor);

    }


    //Directors
    public function directors(Request $request) {

        $directors = VideoDirector::all();

        return view('admin.directors.directors')->with('directors' , $directors)
            ->withPage('directors')
            ->with('sub_page','view-directors');

    }

    public function add_director(Request $request) {

        return view('admin.directors.director_upload')
            ->withPage('directors');

    }

    public function createDirector(Request $request)
    {
        $director = new VideoDirector();
        $director->name = $request->title;
        $director->bio = $request->description;
        $director->save();

        return response()->json($director);
    }

    public function deleteDirector(Request $request)
    {
        $director = VideoDirector::find($request->id);
        $director->adminVideos()->detach();
        $director->delete();


        return response()->json(['success'=>'director deleted']);
    }

    public function editDirector($id)
    {
        $director = VideoDirector::find($id);


        return view('admin.directors.edit-director')
            ->with('director', $director)
            ->with('page', 'director');
    }

    public function updateDirector(Request $request)
    {
        $director = VideoDirector::find($request->id);
        $director->name = $request->name;
        $director->bio = $request->bio;

        $director->save();


        return response()->json($director);

    }

    //category

    public function createCategory(Request $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->picture = 'sss';
        $category->is_series = 0;
        $category->status = 1;
        $category->is_approved = 1;
        $category->created_by = 0;

        $category->save();

        return response()->json($category);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);


        return view('admin.categories.edit-category')
            ->with('category', $category)
            ->with('page', 'category');
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();


        return response()->json(['success'=>'category deleted']);
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->picture = 'sss';

        $category->save();


        return response()->json($category);

    }



    public function edit_video(Request $request) {

        Log::info("Queue Driver ".env('QUEUE_DRIVER'));

        $categories =  $categories = Category::where('categories.is_approved' , 1)
                        ->select('categories.id as id' , 'categories.name' , 'categories.picture' ,
                            'categories.is_series' ,'categories.status' , 'categories.is_approved')
                        ->leftJoin('sub_categories' , 'categories.id' , '=' , 'sub_categories.category_id')
                        ->groupBy('sub_categories.category_id')
                        ->havingRaw("COUNT(sub_categories.id) > 0")
                        ->orderBy('categories.name' , 'asc')
                        ->get();

        $video = AdminVideo::where('admin_videos.id' , $request->id)
                    ->leftJoin('categories' , 'admin_videos.category_id' , '=' , 'categories.id')
                    ->leftJoin('sub_categories' , 'admin_videos.sub_category_id' , '=' , 'sub_categories.id')
                    ->leftJoin('genres' , 'admin_videos.genre_id' , '=' , 'genres.id')
                    ->select('admin_videos.id as video_id' ,'admin_videos.title' , 
                             'admin_videos.description' , 'admin_videos.ratings' , 
                             'admin_videos.reviews' , 'admin_videos.created_at as video_date' ,'admin_videos.is_banner','admin_videos.banner_image',
                             'admin_videos.video','admin_videos.trailer_video',
                             'admin_videos.video_type','admin_videos.video_upload_type',
                             'admin_videos.publish_time','admin_videos.duration',

                             'admin_videos.category_id as category_id',
                             'admin_videos.sub_category_id',
                             'admin_videos.genre_id',
                             'admin_videos.default_image',
                             'categories.name as category_name' , 'categories.is_series',
                             'sub_categories.name as sub_category_name' ,
                             'genres.name as genre_name')
                    ->orderBy('admin_videos.created_at' , 'desc')
                    ->first();

        $page = 'videos';
        $sub_page = 'add-video';

        $subcategories = [];

        if($video->category_id) {
            $subcategories = get_sub_categories($video->category_id);
        }

        if($video->is_banner == 1) {
            $page = 'banner-videos';
            $sub_page = 'banner-videos';
        }

         return view('admin.videos.edit-video')
                ->with('categories' , $categories)
                ->with('video' ,$video)
                ->with('page' ,$page)
                ->with('sub_page' ,$sub_page)->with('subCategories',$subcategories);
    }

    public function add_video_process(Request $request) {

        Log::info("Initiaization Add Process : ".print_r($request->all(),true));

        Log::info("Max Upload Size : ".print_r(ini_get('upload_max_filesize'),true));

        Log::info("Post Max Size : ".print_r(ini_get('post_max_size'),true));

        if($request->has('video_type') && $request->video_type == VIDEO_TYPE_UPLOAD) {

            $video_validator = Validator::make( $request->all(), array(
                        'video'     => 'required|mimes:mkv,mp4,qt',
                        'trailer_video'  => 'required|mimes:mkv,mp4,qt',
                        )
                    );

            $video_link = $request->file('video');
            $trailer_video = $request->file('trailer_video');

            Log::info("Inside Main Video".$video_link);
            Log::info("Inside Trailer Video".$trailer_video);

        } else {

            $video_validator = Validator::make( $request->all(), array(
                        'other_video'     => 'required',
                        'other_trailer_video'  => 'required',
                        )
                    );

            $video_link = $request->other_video;
            $trailer_video = $request->other_trailer_video;

        }

        if($video_validator) {

             Log::info("Inside Video Validator");

             if($video_validator->fails()) {

                Log::info("Fails Validator 2");

                $error_messages = implode(',', $video_validator->messages()->all());

                Log::info("Errors :".print_r($error_messages, true));

                if ($request->has('ajax_key')) {
                    return $error_messages;
                } else {
                    return back()->with('flash_errors', $error_messages);
                }
            }
        }
        $validator = Validator::make( $request->all(), array(
                    'title'         => 'required|max:255',
                    'description'   => 'required',
                    'category_id'   => 'required|integer|exists:categories,id',
                    'sub_category_id' => 'required|integer|exists:sub_categories,id,category_id,'.$request->category_id,
                    'genre'     => 'exists:genres,id,sub_category_id,'.$request->sub_category_id,
                    'default_image' => 'required|mimes:jpeg,jpg,bmp,png',
                    'banner_image' => 'mimes:jpeg,jpg,bmp,png',
                    'other_image1' => 'required|mimes:jpeg,jpg,bmp,png',
                    'other_image2' => 'required|mimes:jpeg,jpg,bmp,png',
                    'ratings' => 'required',
                    'reviews' => 'required',
                    'duration'=>'required',
                    )
                );
        if($validator->fails()) {

            Log::info("Fails Validator 1");

            $error_messages = implode(',', $validator->messages()->all());

            if ($request->has('ajax_key')) {
                return $error_messages;
            } else  {
                return back()->with('flash_errors', $error_messages);
            }

        } else {

            Log::info("Success validation and navigated to create new object");

            $video = new AdminVideo;
            $video->title = $request->title;
            $video->description = $request->description;
            $video->category_id = $request->category_id;
            $video->sub_category_id = $request->sub_category_id;
            $video->genre_id = $request->has('genre_id') ? $request->genre_id : 0;

            if($request->has('duration')) {
                $video->duration = $request->duration;
            }

            $main_video_duration = null;
            $trailer_video_duration = null;

            if($request->video_type == VIDEO_TYPE_UPLOAD) {

                $video->video_upload_type = $request->video_upload_type;

                if($request->video_upload_type == VIDEO_UPLOAD_TYPE_s3) {

                    $video->video = Helper::upload_picture($video_link);
                    $video->trailer_video = Helper::upload_picture($trailer_video);

                } else {
                    // if(ini_get('upload_max_size') > )
                    $main_video_duration = Helper::video_upload($video_link, $request->compress_video);
                    $video->video = $main_video_duration['db_url'];
                    $trailer_video_duration = Helper::video_upload($trailer_video, $request->compress_video);
                    $video->trailer_video = $trailer_video_duration['db_url'];  
                    
                    $video->video_resolutions = ($request->video_resolutions) ? implode(',', $request->video_resolutions) : '';
                    $video->trailer_video_resolutions = ($request->video_resolutions) ? implode(',', $request->video_resolutions) : '';
                    /* $getDuration = readFileName($main_video_duration['baseUrl']);
                    if ($getDuration) {
                        $video->duration = $getDuration['hours'].':'.$getDuration['mins'].':'.$getDuration['secs'];
                    }     
                    $getTrailerDuration = readFileName($trailer_video_duration['baseUrl']);
                    if ($getTrailerDuration) {
                        $video->trailer_duration = $getTrailerDuration['hours'].':'.$getTrailerDuration['mins'].':'.$getTrailerDuration['secs'];
                    }  */  
                }     

            } elseif($request->video_type == VIDEO_TYPE_YOUTUBE) {

                $video->video = get_youtube_embed_link($video_link);
                // $video->duration = getYoutubeDuration($video->video);
                $video->trailer_video = get_youtube_embed_link($trailer_video);

                // $video->trailer_duration = getYoutubeDuration($video->trailer_video);
            } else {
                $video->video = $video_link;
                $video->trailer_video = $trailer_video;
            }

            $video->video_type = $request->video_type;


            $video->publish_time = date('Y-m-d H:i:s', strtotime($request->publish_time));
            
            $video->default_image = Helper::normal_upload_picture($request->file('default_image'));

            if($request->is_banner) {
                $video->is_banner = 1;
                $video->banner_image = Helper::normal_upload_picture($request->file('banner_image'));
            }

            $video->ratings = $request->ratings;
            $video->reviews = $request->reviews;             

            if(strtotime($request->publish_time) < strtotime(date('Y-m-d H:i:s'))) {
                $video->status = DEFAULT_TRUE;
            } else {
                $video->status = DEFAULT_FALSE;
            }

            if (empty($video->video_resolutions)) {
                $video->compress_status = DEFAULT_TRUE;
                $video->trailer_compress_status = DEFAULT_TRUE;
                $video->is_approved = DEFAULT_TRUE;
            }
            
            $video->uploaded_by = ADMIN;

            // dd($video);
            Log::info("Approved : ".$video->is_approved);

            $video->save();

            Log::info("saved Video Object : ".'Success');


            if($video) {

                if($video->video_resolutions) {
                    if ($main_video_duration) {
                        $inputFile = $main_video_duration['baseUrl'];
                        $local_url = $main_video_duration['local_url'];
                        $file_name = $main_video_duration['file_name'];
                        if (file_exists($inputFile)) {
                            Log::info("Main queue Videos : ".'Success');
                            dispatch(new CompressVideo($inputFile, $local_url, MAIN_VIDEO, $video->id, $file_name));
                            Log::info("Main Compress Status : ".$video->compress_status);
                            Log::info("Main queue completed : ".'Success');
                        }
                    }
                    if ($trailer_video_duration) {
                        $inputFile = $trailer_video_duration['baseUrl'];
                        $local_url = $trailer_video_duration['local_url'];
                        $file_name = $trailer_video_duration['file_name'];
                        if (file_exists($inputFile)) {
                            Log::info("Trailer queue Videos : ".'Success');
                            dispatch(new CompressVideo($inputFile, $local_url, TRAILER_VIDEO, $video->id,$file_name));
                            Log::info("Trailer Compress Status : ".$video->compress_status);
                            Log::info("Trailer queue completed : ".'Success');
                        }
                    }
                }
                
                Helper::upload_video_image($request->file('other_image1'),$video->id,2);

                Helper::upload_video_image($request->file('other_image2'),$video->id,3);

                if (env('QUEUE_DRIVER') != 'redis') {

                    \Log::info("Queue Driver : ".env('QUEUE_DRIVER'));

                    $video->compress_status = DEFAULT_TRUE;

                    $video->trailer_compress_status = DEFAULT_TRUE;

                    $video->save();
                }
                /*if($video->is_banner)
                    return redirect(route('admin.banner.videos'));
                else*/
                if ($request->has('ajax_key')) {
                    Log::info('Video Id Ajax : '.$video->id);
                    return ['id'=>route('admin.view.video', array('id'=>$video->id))];
                } else  {
                    Log::info('Video Id : '.$video->id);
                    return redirect(route('admin.view.video', array('id'=>$video->id)));
                }
            } else {
                if($request->has('ajax_key')) {
                    
                    return tr('admin_not_error');
                } else { 
                    return back()->with('flash_error', tr('admin_not_error'));
                }
            }
        }
    
    }

    public function edit_video_process(Request $request) {

        Log::info("Initiaization Edit Process : ".print_r($request->all(),true));


        $video = AdminVideo::find($request->id);

        $video_validator = array();

        $video_link = $video->video;

        $trailer_video = $video->trailer_video;

        // dd($request->all());

        if($request->has('video_type') && $request->video_type == VIDEO_TYPE_UPLOAD) {

            Log::info("Video Type : ".$request->has('video_type'));

            if (isset($request->video)) {
                if ($request->video != '') {

                    $video_validator = Validator::make( $request->all(), array(
                            'video'     => 'required|mimes:mkv,mp4,qt',
                            // 'trailer_video'  => 'required|mimes:mkv,mp4,qt',
                            )
                        );

                    $video_link = $request->hasFile('video') ? $request->file('video') : array();   

                }
            }

            if (isset($request->trailer_video)) {
                if ($request->trailer_video != '') {
                    $video_validator = Validator::make( $request->all(), array(
                            // 'video'     => 'required|mimes:mkv,mp4,qt',
                            'trailer_video'  => 'required|mimes:mkv,mp4,qt',
                            )
                        );

                    $trailer_video = $request->hasFile('trailer_video') ? $request->file('trailer_video') : array();
                }
            }
        

        } elseif($request->has('video_type') && in_array($request->video_type , array(VIDEO_TYPE_YOUTUBE,VIDEO_TYPE_OTHER))) {

            $video_validator = Validator::make( $request->all(), array(
                        'other_video'     => 'required',
                        'other_trailer_video'  => 'required',
                        )
                    );

            $video_link = $request->has('other_video') ? $request->other_video : array();

            $trailer_video = $request->has('other_trailer_video') ? $request->other_trailer_video : array();
        }

        if($video_validator) {

             if($video_validator->fails()) {
                $error_messages = implode(',', $video_validator->messages()->all());
                if ($request->has('ajax_key')) {
                    return $error_messages;
                } else {
                    return back()->with('flash_errors', $error_messages);
                }
            }
        }

        $validator = Validator::make( $request->all(), array(
                    'id' => 'required|integer|exists:admin_videos,id',
                    'title'         => 'max:255',
                    'description'   => '',
                    'category_id'   => 'required|integer|exists:categories,id',
                    'sub_category_id' => 'required|integer|exists:sub_categories,id,category_id,'.$request->category_id,
                    'genre'     => 'exists:genres,id,sub_category_id,'.$request->sub_category_id,
                    // 'video'     => 'mimes:mkv,mp4,qt',
                    // 'trailer_video'  => 'mimes:mkv,mp4,qt',
                    'default_image' => 'mimes:jpeg,jpg,bmp,png',
                    'other_image1' => 'mimes:jpeg,jpg,bmp,png',
                    'other_image2' => 'mimes:jpeg,jpg,bmp,png',
                    'ratings' => 'required',
                    'reviews' => 'required',
                    )
                );

        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            if ($request->has('ajax_key')) {
                return $error_messages;
            } else {
                return back()->with('flash_errors', $error_messages);
            }

        } else {

            Log::info("Success validation checking : Success");

            $video->title = $request->has('title') ? $request->title : $video->title;

            $video->description = $request->has('description') ? $request->description : $video->description;

            $video->category_id = $request->has('category_id') ? $request->category_id : $video->category_id;

            $video->sub_category_id = $request->has('sub_category_id') ? $request->sub_category_id : $video->sub_category_id;

            $video->genre_id = $request->has('genre_id') ? $request->genre_id : $video->genre_id;

            if($request->has('duration')) {
                $video->duration = $request->duration;
            }

            if(strtotime($request->publish_time) < strtotime(date('Y-m-d H:i:s'))) {
                $video->status = DEFAULT_TRUE;
            } else {
                $video->status = DEFAULT_FALSE;
            }

            $main_video_url = null;
            $trailer_video_url = null;

            if($request->video_type == VIDEO_TYPE_UPLOAD && $video_link && $trailer_video) {

                 Log::info("To Be upload videos : ".'Success');

                // Check Previous Video Upload Type, to delete the videos

                if($video->video_upload_type == VIDEO_UPLOAD_TYPE_s3) {
                    Helper::s3_delete_picture($video->video);   
                    Helper::s3_delete_picture($video->trailer_video);  
                } else {
                    $videopath = '/uploads/videos/original/';

                    // dd($request->all());

                    if ($request->hasFile('video')) {
                        Helper::delete_picture($video->video, $videopath); 
                        // @TODO
                        $splitVideos = ($video->video_resolutions) 
                                    ? explode(',', $video->video_resolutions)
                                    : [];
                        foreach ($splitVideos as $key => $value) {
                           Helper::delete_picture($video->video, $videopath.$value.'/');
                        }
                        Log::info("Deleted Main Video : ".'Success');   
                    }
                    if ($request->hasFile('trailer_video')) {
                        Helper::delete_picture($video->trailer_video, $videopath);
                        // @TODO
                        $splitTrailer = ($video->trailer_video_resolutions) 
                                    ? explode(',', $video->trailer_video_resolutions)
                                    : [];
                        foreach ($splitTrailer as $key => $value) {
                           Helper::delete_picture($video->trailer_video, $videopath.$value.'/');
                        }
                        Log::info("Deleted Trailer Video : ".'Success');
                    }
                }

                if($request->video_upload_type == VIDEO_UPLOAD_TYPE_s3) {
                    $video->video = Helper::upload_picture($video_link);
                    $video->trailer_video = Helper::upload_picture($trailer_video); 

                } else {
                    if ($request->hasFile('video')) {
                        $video->compress_status = DEFAULT_FALSE;
                        $video->is_approved = DEFAULT_FALSE;
                        $main_video_url = Helper::video_upload($video_link, $request->compress_video);
                        Log::info("New Video Uploaded ( Main Video ) : ".'Success');
                        $video->video = $main_video_url['db_url'];
                        $video->video_resolutions = ($request->video_resolutions) ? implode(',', $request->video_resolutions) : null;
                    } else {
                        $video->video = $video_link;
                    }
                    // dd($request->hasFile('trailer_video'));
                    if ($request->hasFile('trailer_video')) {
                        $video->trailer_compress_status = DEFAULT_FALSE;
                        $video->is_approved = DEFAULT_FALSE;
                        $trailer_video_url = Helper::video_upload($trailer_video, $request->compress_video);
                        Log::info("New Video Uploaded ( Trailer Video ) : ".'Success');
                        $video->trailer_video = $trailer_video_url['db_url']; 
                        $video->trailer_video_resolutions = ($request->video_resolutions) ? implode(',', $request->video_resolutions) : null; 
                    } else {
                        $video->trailer_video = $trailer_video;
                    }
                
                    Log::info("Video Resoltuions : ".print_r($video->video_resolutions, true));
                    Log::info("Trailer Video Resoltuions : ".print_r($video->trailer_video_resolutions, true));
                }                

            } elseif($request->video_type == VIDEO_TYPE_YOUTUBE && $video_link && $trailer_video) {

                $video->video = get_youtube_embed_link($video_link);
                $video->trailer_video = get_youtube_embed_link($trailer_video);
            } else {
                $video->video = $video_link ? $video_link : $video->video;
                $video->trailer_video = $trailer_video ? $trailer_video : $video->trailer_video;
            }

            if($request->hasFile('default_image')) {
                Helper::delete_picture($video->default_image, "/uploads/images/");
                $video->default_image = Helper::normal_upload_picture($request->file('default_image'));
            }

            if($video->is_banner == 1) {
                if($request->hasFile('banner_image')) {
                    Helper::delete_picture($video->banner_image, "/uploads/images/");
                    $video->banner_image = Helper::normal_upload_picture($request->file('banner_image'));
                }
            }

            $video->video_type = $request->video_type ? $request->video_type : $video->video_type;

            $video->video_upload_type = $request->video_upload_type ? $request->video_upload_type : $video->video_upload_type;

            $video->ratings = $request->has('ratings') ? $request->ratings : $video->ratings;

            $video->reviews = $request->has('reviews') ? $request->reviews : $video->reviews;

            $video->edited_by = ADMIN;

            if($video->video_type != VIDEO_TYPE_UPLOAD) {
                $video->trailer_resize_path = null;
                $video->video_resize_path = null;
                $video->trailer_video_resolutions = null;
                $video->video_resolutions = null;
            }

            if (empty($video->video_resolutions)) {
                $video->compress_status = DEFAULT_TRUE;
                $video->trailer_compress_status = DEFAULT_TRUE;
                $video->is_approved = DEFAULT_TRUE;
                Log::info("Empty Resoltuions");
            }

            Log::info("Approved : ".$video->is_approved);


            $video->save();

            Log::info("saved Video Object : ".'Success');

            if($video) {
                if ($request->hasFile('video') && $video->video_resolutions) {
                    if ($main_video_url) {
                        $inputFile = $main_video_url['baseUrl'];
                        $local_url = $main_video_url['local_url'];
                        $file_name = $main_video_url['file_name'];
                        if (file_exists($inputFile)) {
                            Log::info("Main queue Videos : ".'Success');
                            dispatch(new CompressVideo($inputFile, $local_url, MAIN_VIDEO, $video->id,$file_name));
                            Log::info("Main Compress Status : ".$video->compress_status);
                            Log::info("Main queue completed : ".'Success');
                        }
                    }
                }

                if($request->hasFile('trailer_video') && $video->trailer_video_resolutions) {
                    if ($trailer_video_url) {
                        $inputFile = $trailer_video_url['baseUrl'];
                        $local_url = $trailer_video_url['local_url'];
                        $file_name = $trailer_video_url['file_name'];
                        if (file_exists($inputFile)) {
                            Log::info("Trailer queue Videos : ".'Success');
                            dispatch(new CompressVideo($inputFile, $local_url, TRAILER_VIDEO, $video->id, $file_name));
                            Log::info("Trailer Compress Status : ".$video->compress_status);
                            Log::info("Trailer queue completed : ".'Success');
                        }
                    }
                }

                if($request->hasFile('other_image1')) {
                    Helper::upload_video_image($request->file('other_image1'),$video->id,2);  
                }

                if($request->hasFile('other_image2')) {
                   Helper::upload_video_image($request->file('other_image2'),$video->id,3); 
                }


                if (env('QUEUE_DRIVER') != 'redis') {

                    \Log::info("Queue Driver : ".env('QUEUE_DRIVER'));

                    $video->compress_status = DEFAULT_TRUE;

                    $video->trailer_compress_status = DEFAULT_TRUE;

                    $video->save();
                }

                if ($request->has('ajax_key')) {
                    return ['id'=>route('admin.view.video', array('id'=>$video->id))];
                } else {
                    return redirect(route('admin.view.video', array('id'=>$video->id)));
                }

            } else {
                if ($request->has('ajax_key')) {
                    return tr('admin_not_error');
                } else {
                    return back()->with('flash_error', tr('admin_not_error'));
                }
            }
        }
    
    }

    public function view_video(Request $request) {

        $validator = Validator::make($request->all() , [
                'id' => 'required|exists:admin_videos,id'
            ]);

        if($validator->fails()) {
            $error_messages = implode(',', $validator->messages()->all());
            return back()->with('flash_errors', $error_messages);
        } else {
            $videos = AdminVideo::where('admin_videos.id' , $request->id)
                    ->leftJoin('categories' , 'admin_videos.category_id' , '=' , 'categories.id')
                    ->leftJoin('sub_categories' , 'admin_videos.sub_category_id' , '=' , 'sub_categories.id')
                    ->leftJoin('genres' , 'admin_videos.genre_id' , '=' , 'genres.id')
                    ->select('admin_videos.id as video_id' ,'admin_videos.title' , 
                             'admin_videos.description' , 'admin_videos.ratings' , 
                             'admin_videos.reviews' , 'admin_videos.created_at as video_date' ,
                             'admin_videos.video','admin_videos.trailer_video',
                             'admin_videos.default_image','admin_videos.banner_image','admin_videos.is_banner','admin_videos.video_type',
                             'admin_videos.video_upload_type',
                             'admin_videos.amount',
                             'admin_videos.type_of_user',
                             'admin_videos.type_of_subscription',
                             'admin_videos.category_id as category_id',
                             'admin_videos.sub_category_id',
                             'admin_videos.genre_id',
                             'admin_videos.video_type',
                             'admin_videos.video_upload_type',
                             'admin_videos.duration',
                             'admin_videos.compress_status',
                             'admin_videos.trailer_compress_status',
                             'admin_videos.video_resolutions',
                             'admin_videos.video_resize_path',
                             'admin_videos.trailer_resize_path',
                             'admin_videos.is_approved',
                             'admin_videos.trailer_video_resolutions',
                             'categories.name as category_name' , 'sub_categories.name as sub_category_name' ,
                             'genres.name as genre_name')
                    ->orderBy('admin_videos.created_at' , 'desc')
                    ->first();

        $videoPath = $video_pixels = $trailer_video_path = $trailer_pixels = $trailerstreamUrl = $videoStreamUrl = '';
        if ($videos->video_type == 1) {
            if (\Setting::get('streaming_url')) {
                $trailerstreamUrl = \Setting::get('streaming_url').get_video_end($videos->trailer_video);
                $videoStreamUrl = \Setting::get('streaming_url').get_video_end($videos->video);
                if ($videos->is_approved == 1) {
                    if($videos->trailer_video_resolutions) {
                        $trailerstreamUrl = Helper::web_url().'/uploads/smil/'.get_video_end_smil($videos->trailer_video).'.smil';
                    } 
                    if ($videos->video_resolutions) {
                        $videoStreamUrl = Helper::web_url().'/uploads/smil/'.get_video_end_smil($videos->video).'.smil';
                    }
                }
            } else {

                $videoPath = $videos->video_resize_path ? $videos->video.','.$videos->video_resize_path : $videos->video;
                $video_pixels = $videos->video_resolutions ? 'original,'.$videos->video_resolutions : 'original';
                $trailer_video_path = $videos->trailer_video_path ? $videos->trailer_video.','.$videos->trailer_video_path : $videos->trailer_video;
                $trailer_pixels = $videos->trailer_video_resolutions ? 'original'.$videos->trailer_video_resolutions : 'original';

                /*$trailerResolution = getResolutionsPath($videos->trailer_video, $videos->trailer_video_resolutions,);

                $trailer_re_path = $trailerResolution['video_resolutions'];
                $trailer_pixels = $trailerResolution['pixels'];
                
                $videoResolution = getResolutionsPath($videos->video, $videos->video_resolutions,\Setting::get('streaming_url'));

                $video_re_path = $videoResolution['video_resolutions'];
                $video_pixels = $videoResolution['pixels'];*/

            }
        } else {
            $trailerstreamUrl = $videos->trailer_video;
            $videoStreamUrl = $videos->video;
        }
        
        $admin_video_images = AdminVideoImage::where('admin_video_id' , $request->id)
                                ->orderBy('is_default' , 'desc')
                                ->get();

        $page = 'videos';
        $sub_page = 'add-video';

        if($videos->is_banner == 1) {
            $page = 'banner-videos';
            $sub_page = 'banner-videos';
        }

        return view('admin.videos.view-video')->with('video' , $videos)
                    ->with('video_images' , $admin_video_images)
                    ->withPage($page)
                    ->with('sub_page',$sub_page)
                    ->with('videoPath', $videoPath)
                    ->with('video_pixels', $video_pixels)
                    ->with('trailer_video_path', $trailer_video_path)
                    ->with('trailer_pixels', $trailer_pixels)
                    ->with('videoStreamUrl', $videoStreamUrl)
                    ->with('trailerstreamUrl', $trailerstreamUrl);
        }
    }

    public function approve_video($id) {

        $video = AdminVideo::find($id);

        $video->is_approved = DEFAULT_TRUE;

        $video->save();

        if($video->is_approved == DEFAULT_TRUE)
        {
            $message = tr('admin_not_video_approve');
        }
        else
        {
            $message = tr('admin_not_video_decline');
        }
        return back()->with('flash_success', $message);
    }


    /**
     * Function Name : publish_video()
     * To Publish the video for user
     *
     * @param int $id : Video id
     *
     * @return Flash Message
     */
    public function publish_video($id) {
        // Load video based on Auto increment id
        $video = AdminVideo::find($id);
        // Check the video present or not
        if ($video) {
            $video->status = DEFAULT_TRUE;
            $video->publish_time = date('Y-m-d H:i:s');
            // Save the values in DB
            if ($video->save()) {
                return back()->with('flash_success', tr('admin_published_video_success'));
            }
        }
        return back()->with('flash_error', tr('admin_published_video_failure'));
    }


    public function decline_video($id) {
        
        $video = AdminVideo::find($id);

        $video->is_approved = DEFAULT_FALSE;

        $video->save();

        if($video->is_approved == DEFAULT_TRUE){
            $message = tr('admin_not_video_approve');
        } else {
            $message = tr('admin_not_video_decline');
        }

        return back()->with('flash_success', $message);
    }

    public function delete_video($id) {

        if($video = AdminVideo::where('id' , $id)->first())  {
            $video->delete();
        }

        return back()->with('flash_success', 'Video deleted successfully');
    }

    public function slider_video($id) {

        $video = AdminVideo::where('is_home_slider' , 1 )->update(['is_home_slider' => 0]); 

        $video = AdminVideo::where('id' , $id)->update(['is_home_slider' => 1] );

        return back()->with('flash_success', tr('slider_success'));
    
    }

    public function banner_videos(Request $request) {

        $videos = AdminVideo::leftJoin('categories' , 'admin_videos.category_id' , '=' , 'categories.id')
                    ->leftJoin('sub_categories' , 'admin_videos.sub_category_id' , '=' , 'sub_categories.id')
                    ->leftJoin('genres' , 'admin_videos.genre_id' , '=' , 'genres.id')
                    ->where('admin_videos.is_banner' , 1 )
                    ->select('admin_videos.id as video_id' ,'admin_videos.title' , 
                             'admin_videos.description' , 'admin_videos.ratings' , 
                             'admin_videos.reviews' , 'admin_videos.created_at as video_date' ,
                             'admin_videos.default_image',
                             'admin_videos.banner_image',

                             'admin_videos.category_id as category_id',
                             'admin_videos.sub_category_id',
                             'admin_videos.genre_id',
                             'admin_videos.is_home_slider',

                             'admin_videos.status','admin_videos.uploaded_by',
                             'admin_videos.edited_by','admin_videos.is_approved',

                             'categories.name as category_name' , 'sub_categories.name as sub_category_name' ,
                             'genres.name as genre_name')
                    ->orderBy('admin_videos.created_at' , 'desc')
                    ->get();

        return view('admin.banner_videos.banner-videos')->with('videos' , $videos)
                    ->withPage('banner-videos')
                    ->with('sub_page','view-banner-videos');
   
    }

    public function add_banner_video(Request $request) {

        $categories = Category::where('categories.is_approved' , 1)
                        ->select('categories.id as id' , 'categories.name' , 'categories.picture' ,
                            'categories.is_series' ,'categories.status' , 'categories.is_approved')
                        ->leftJoin('sub_categories' , 'categories.id' , '=' , 'sub_categories.category_id')
                        ->groupBy('sub_categories.category_id')
                        ->havingRaw("COUNT(sub_categories.id) > 0")
                        ->orderBy('categories.name' , 'asc')
                        ->get();

        return view('admin.banner_videos.banner-video-upload')
                ->with('categories' , $categories)
                ->with('page' ,'banner-videos')
                ->with('sub_page' ,'add-banner-video');

    }

    public function change_banner_video($id) {

        $video = AdminVideo::find($id);

        $video->is_banner = 0 ;

        $video->save();

        $message = tr('change_banner_video_success');
       
        return back()->with('flash_success', $message);
    }

    public function user_ratings() {
            
            $user_reviews = UserRating::leftJoin('users', 'user_ratings.user_id', '=', 'users.id')
                ->select('user_ratings.id as rating_id', 'user_ratings.rating', 
                         'user_ratings.comment', 
                         'users.first_name as user_first_name', 
                         'users.last_name as user_last_name', 
                         'users.id as user_id', 'user_ratings.created_at')
                ->orderBy('user_ratings.id', 'ASC')
                ->get();
            return view('admin.reviews')->with('name', 'User')->with('reviews', $user_reviews);
    }

    public function delete_user_ratings(Request $request) {

        if($user = UserRating::find($request->id)) {
            $user->delete();
        }

        return back()->with('flash_success', tr('admin_not_ur_del'));
    }

    public function user_payments() {
        $payments = UserPayment::orderBy('created_at' , 'desc')->get();

        return view('admin.payments.user-payments')->with('data' , $payments)->with('page','payments')->with('sub_page','user-payments'); 
    }

    public function email_settings() {

        $admin_id = \Auth::guard('admin')->user()->id;

        $result = EnvEditorHelper::getEnvValues();

        \Auth::guard('admin')->loginUsingId($admin_id);

        return view('admin.email-settings')->with('result',$result)->withPage('email-settings')->with('sub_page',''); 
    }


    public function email_settings_process(Request $request) {

        $email_settings = ['MAIL_DRIVER' , 'MAIL_HOST' , 'MAIL_PORT' , 'MAIL_USERNAME' , 'MAIL_PASSWORD' , 'MAIL_ENCRYPTION'];

        $admin_id = \Auth::guard('admin')->user()->id;

        foreach ($email_settings as $key => $data) {

            if($request->has($data)) {
                \Enveditor::set($data,$request->$data);
            }
        }

        \Artisan::call('config:cache');

        Auth::guard('admin')->loginUsingId($admin_id);

        $result = EnvEditorHelper::getEnvValues();

        return back()->with('result' , $result)->with('flash_success' , tr('email_settings_success'));

    }

    public function settings() {

        $settings = array();

        $result = EnvEditorHelper::getEnvValues();

        $languages = Language::where('status', DEFAULT_TRUE)->get();

        return view('admin.settings.settings')->with('settings' , $settings)->with('result', $result)->withPage('settings')->with('sub_page','')->with('languages' , $languages); 
    }

    public function payment_settings() {

        $settings = array();

        return view('admin.payment-settings')->with('settings' , $settings)->withPage('payment-settings')->with('sub_page',''); 
    }

    public function theme_settings() {

        $settings = array();

        $settings[] =  Setting::get('theme');

        if(Setting::get('theme')!= 'default') {
            $settings[] = 'default';
        }

        if(Setting::get('theme')!= 'streamtube') {
            $settings[] = 'streamtube';
        }

        if(Setting::get('theme')!= 'teen') {
            $settings[] = 'teen';
        }

        return view('admin.theme.theme-settings')->with('settings' , $settings)->withPage('theme-settings')->with('sub_page',''); 
    }

    public function settings_process(Request $request) {

        $settings = Settings::all();

        $check_streaming_url = "";

        if($settings) {

            foreach ($settings as $setting) {

                $key = $setting->key;
               
                if($setting->key == 'site_icon') {

                    if($request->hasFile('site_icon')) {
                        
                        if($setting->value) {
                            Helper::delete_picture($setting->value, "/uploads/");
                        }

                        $setting->value = Helper::normal_upload_picture($request->file('site_icon'));
                    
                    }
                    
                } else if($setting->key == 'site_logo') {

                    if($request->hasFile('site_logo')) {

                        if($setting->value) {

                            Helper::delete_picture($setting->value, "/uploads/");
                        }

                        $setting->value = Helper::normal_upload_picture($request->file('site_logo'));
                    }

                } else if($setting->key == 'streaming_url') {

                    if($request->has('streaming_url') && $request->streaming_url != $setting->value) {

                        if(check_nginx_configure()) {
                            $setting->value = $request->streaming_url;
                        } else {
                            $check_streaming_url = " !! ====> Please Configure the Nginx Streaming Server.";
                        }
                    }  

                } else if($setting->key == "theme") {

                    if($request->has('theme')) {
                        change_theme($setting->value , $request->$key);
                        $setting->value = $request->theme;
                    }

                } else if($request->$key!='') {

                    $setting->value = $request->$key;

                }

                $setting->save();
            
            }

        }
        
        
        $message = "Settings Updated Successfully"." ".$check_streaming_url;
        
        return back()->with('setting', $settings)->with('flash_success', $message);    
    
    }

    public function help() {
        return view('admin.static.help')->withPage('help')->with('sub_page' , "");
    }

    public function viewPages() {

        $all_pages = Page::all();

        return view('admin.pages.viewpages')->with('page','pages_id')->with('sub_page',"view_pages")->with('data',$all_pages);
    }

    public function add_page() {

        $pages = Page::all();
        return view('admin.pages.add-page')->with('page','pages_id')->with('sub_page',"add_page")->with('view_pages',$pages);
    }

    public function editPage($id) {
        $page = Page::find($id);

        if($page) {
            return view('admin.pages.editPage')->withPage('viewpage')->with('sub_page',"view_pages")->with('pages',$page);
        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function pagesProcess(Request $request) {

        $type = $request->type;
        $id = $request->id;
        $heading = $request->heading;
        $description = $request->description;

        $validator = Validator::make($request->all(),
            array('heading' => 'required',
                'description' => 'required'));

        if($validator->fails()) {
            $error = $validator->messages()->all();
            return back()->with('flash_errors',$error);
        } else {

            if($request->has('id')) {

                $pages = Page::find($id);
                $pages->heading = $heading;
                $pages->description = $description;
                $pages->save();

            } else {

                $check_page = Page::where('type',$type)->first();
                
                if(!$check_page) {
                    $pages = new Page;
                    $pages->type = $type;
                    $pages->heading = $heading;
                    $pages->description = $description;
                    $pages->save();
                } else {
                    return back()->with('flash_error',tr('page_already_alert'));
                }
            }
            if($pages) {
                return back()->with('flash_success',tr('page_create_success'));
            } else {
                return back()->with('flash_error',tr('admin_not_error'));
            }
        }
    }

    public function deletePage($id) {

        $page = Page::where('id',$id)->delete();

        if($page) {
            return back()->with('flash_success',tr('page_delete_success'));
        } else {
            return back()->with('flash_error',tr('admin_not_error'));
        }
    }

    public function custom_push() {

        return view('admin.static.push')->with('title' , "Custom Push")->with('page' , "custom-push");

    }

    public function custom_push_process(Request $request) {

        $validator = Validator::make(
            $request->all(),
            array( 'message' => 'required')
        );

        if($validator->fails()) {

            $error = $validator->messages()->all();

            return back()->with('flash_errors',$error);

        } else {

            $message = $request->message;
            $title = Setting::get('site_name');
            $message = $message;
            
            \Log::info($message);

            $id = 'all';

            Helper::send_notification($id,$title,$message);

            return back()->with('flash_success' , tr('push_send_success'));
        }
    }

    /**
     * Function Name : spam_videos()
     * Load all the videos from flag table
     *
     * @return all the spam videos
     */
    public function spam_videos() {
        // Load all the videos from flag table
        $model = Flag::groupBy('video_id')->get();
        // Return array of values
        return view('admin.spam_videos.spam_videos')->with('model' , $model)
                        ->with('page' , 'Spam Videos')
                        ->with('subPage' , '');
    }

    /**
     * Function Name : view_users()
     * Load all the flags based on the video id
     *
     * @param integer $id Video id
     *
     * @return all the spam videos
     */
    public function view_users($id) {
        // Load all the users
        $model = Flag::where('video_id', $id)->get();
        // Return array of values
        return view('admin.spam_videos.user_report')->with('model' , $model)
                        ->with('page' , 'Spam Videos')
                        ->with('subPage' , 'User Reports');   
    }

    /**
     * Function Name : video_payments()
     * To get payments based on the video subscription
     *
     * @return array of payments
     */
    public function video_payments() {
        $payments = PayPerView::orderBy('created_at' , 'desc')->get();

        return view('admin.payments.video-payments')->with('data' , $payments)->withPage('payments')->with('sub_page','video-subscription'); 
    }

    /**
     * Function Name : save_video_payment
     * Brief : To save the payment details
     *
     * @param integer $id Video Id
     * @param object  $request Object (Post Attributes)
     *
     * @return flash message
     */
    public function save_video_payment($id, Request $request){
        // Load Video Model
        $model = AdminVideo::find($id);
        // Get post attribute values and save the values
        if ($model) {
            if ($data = $request->all()) {
                // Update the post
                if (DB::table('admin_videos')->where('id', $id)->update($data)) {
                    // Redirect into particular value
                    return back()->with('flash_success', tr('payment_added'));       
                } 
            }
        }
        return back()->with('flash_error', tr('admin_published_video_failure'));
    }

    /**
     * Function Name : save_common_settings
     * Save the values in env file
     *
     * @param object $request Post Attribute values
     * 
     * @return settings values
     */
    
    public function save_common_settings(Request $request) {

        $admin_id = \Auth::guard('admin')->user()->id;

        foreach ($request->all() as $key => $data) {

            if($request->has($key)) {
                \Enveditor::set($key,$data);
            }
        }

        \Artisan::call('config:clear');

        \Artisan::call('config:cache');

        \Auth::guard('admin')->loginUsingId($admin_id);

        $result = EnvEditorHelper::getEnvValues();

        return back()->with('result' , $result)->with('flash_success' , tr('common_settings_success'));
    }

    /**
     * Function Name : remove_payper_view()
     * To remove pay per view
     * 
     * @return falsh success
     */
    public function remove_payper_view($id) {
        
        // Load video model using auto increment id of the table
        $model = AdminVideo::find($id);
        if ($model) {
            $model->amount = 0;
            $model->type_of_subscription = 0;
            $model->type_of_user = 0;
            $model->save();
            if ($model) {
                return back()->with('flash_success' , tr('removed_pay_per_view'));
            }
        }
        return back()->with('flash_error' , tr('admin_published_video_failure'));
    }
}
