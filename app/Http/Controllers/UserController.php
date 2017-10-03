<?php

namespace App\Http\Controllers;

use App;
use App\Actor;
use App\AdminVideo;
use App\Director;
use App\Like;
use App\PaymentPlan;
use App\Season;
use App\TrialPeriod;
use App\UserHistory;
use App\UserPayment;
use App\UserPaymentPlan;
use App\UserPlaylist;
use App\VideoActor;
use App\VideoDirector;
use App\Videoimage;
use App\VideoTag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Helpers\Helper;

use App\Settings;

use App\User;

use App\Wishlist;

use App\Category;

use App\Page;

use App\Flag;

use Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Omnipay\Omnipay;
use phpDocumentor\Reflection\Types\Object_;
use Validator;

use Setting;

use Exception;

use App\PayPerView;

use Log;
use Vimeo\Vimeo;


class UserController extends Controller {

    protected $UserAPI;
    protected $Paypal;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserApiController $API)
    {
        $this->UserAPI = $API;
        
//        $this->middleware('auth', ['except' => ['watchVideo', 'index','single_video','all_categories' ,'category_videos' , 'sub_category_videos' , 'contact','trending']]);
        $this->middleware('auth', ['except' => ['index','contact', 'showVideo', 'sendContactForm', 'getAllVideos']]);
    }


    public function account()
    {
        return view('r.user.account');
    }

    public function getUserPaymentPlan()
    {
        $payPlanId = UserPaymentPlan::where('user_id', Auth::id())->first();
        $payPlan = PaymentPlan::find($payPlanId->payment_plan_id);

        return $payPlan;
    }

    public function packages()
    {
        $me = Auth::user();
        //check stripe
        if ($me && ! $me->subscribed('main') || $me->subscription('main')->onGracePeriod()) {
            // This user is not a paying customer...
            $checkStripe = false;
        } else {
            $checkStripe = true;
        }

        if($me->paypal == 1) {
            $checkPayPal = true;
        } else { $checkPayPal = false; }

        return view('r.user.packages')
            ->with('payment_plans', PaymentPlan::orderBy('flag', 'asc')->get())
            ->with('checkStripe', $checkStripe)
            ->with('checkPayPal', $checkPayPal)
            ->with('userPayPlan', $this->getUserPaymentPlan());
    }

    public function checkVideoPlays(Request $request)
    {
        $video = AdminVideo::where('watchid', $request->id)->first();
        if(!$video) {
            return response()->json(['status' => 'error no video'], 500);
        }

        $video->watch_count++;
        $video->save();

        $checkTrialRecord = false;
        $trials = TrialPeriod::where('user_id', Auth::id())->get();
        if(count($trials) < 3) {
            foreach ($trials as $trial) {
                if ($trial->admin_video_id == $video->id) {
                    $checkTrialRecord = true;
                }
            }

            if(!$checkTrialRecord) {
                $trialRecord = new TrialPeriod();
                $trialRecord->user_id = Auth::id();
                $trialRecord->admin_video_id = $video->id;
                $trialRecord->save();
            }
        }

        if (Auth::check()) {
            $hist = new UserHistory();
            $hist->user_id = Auth::id();
            $hist->admin_video_id = $video->id;
            $hist->status = 0;
            $hist->save();

            return response()->json(['status' => 'ok'], 200);
        } else {
            return response()->json(['status' => 'error'], 500);
        }
    }

    public function confirmEmailMsgPage()
    {
        //dd(Session::get('user'));
        return view('r.user.auth.confirm-msg')->with('user', Auth::user())->with('flash_success', 'New email was sent successfully');
    }
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//dd(Auth::user()->isVerified());
        //#testing
        if(!Auth::check()) {
            $recent_videos = Helper::recently_added(WEB);
            return view('r.landing')
                ->with('recent_videos' , $recent_videos)
                ->with('payment_plans', PaymentPlan::orderBy('flag', 'asc')->get());
        }
//        }else{
//            return view('r.user.home-video');
//        }
        //#end

        $histories = UserHistory::distinct()->select('admin_video_id')->where('user_id', '=', Auth::id())->limit(3)->get();
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        if($database && $username && Setting::get('installation_process') == 3) {
            counter('home');
            $watch_lists = $wishlists = array();

            if(\Auth::check()){
                $wishlists  = Helper::wishlist(\Auth::user()->id,WEB);  
//                $watch_lists = Helper::watch_list(\Auth::user()->id,WEB);
                $watch_lists = Helper::watch_list(\Auth::user()->id,WEB);
            }
            
            $recent_videos = Helper::recently_added(WEB);

            $trendings = Helper::trending(WEB);

            $suggestions  = Helper::suggestion_videos(WEB);
            $categories = get_categories();

            $videos = AdminVideo::with('videoimage', 'likes')->with('category')->orderBy('id', 'desc')->limit(15)->get();
            //dd($videos);

            $lastVideos = [];
            $allCategories = Category::all();

            foreach ($allCategories as $k){
                $v = AdminVideo::orderby('id', 'desc')->with('videoimage')->where('category_id', $k->id)->first();
                if ($v != NULL) {
                    array_push($lastVideos, $v);
                    }
            }

            $grandVideo = AdminVideo::with('videoimage', 'category', 'likes')->where('is_banner', 1)->first();

            $my_lists =$this->myPlaylist();

            $dramaVideos = Helper::getDramaMovies();
            $comedyVideos = Helper::getComedyMovies();

            return view('r.user.home-video')
                        ->with('page' , 'home')
                        ->with('subPage' , 'home')
                        ->with('wishlists' , $wishlists)
                        ->with('recent_videos' , $recent_videos)
                        ->with('trendings' , $trendings)
                        ->with('watch_lists' , $watch_lists)
                        ->with('my_lists' , $my_lists)
                        ->with('suggestions' , $suggestions)
                        ->with('categories' , $categories)
                        ->with('videos_by_cat' , $lastVideos)
                        ->with('grandVideo' , $grandVideo)
                        ->with('videos', $videos)
                        ->with('dramaVideos', $dramaVideos)
                        ->with('comedyVideos', $comedyVideos)
                        ->with('payPlan', Auth::user()->paymentPlans[0]->flag)
                        ->with('trialCount', 3-count($histories));
        } else {
            return redirect()->route('installTheme');
        }
    }

    public function getVideosByTag($id)
    {
        $videos = AdminVideo::with('videoimage')
            ->where('tags', 'LIKE', '%'.$id.'%')
            ->orWhere('tags', 'LIKE', '%'.str_replace('-', ' ', $id).'%')
            ->orderBy('id', 'desc')->get();

        $lastVideos = [];
        $allCategories = Category::all();
        $categories = get_categories();

        foreach ($allCategories as $k){
            $v = AdminVideo::orderby('id', 'desc')->with('videoimage')->where('category_id', $k->id)->first();
            if ($v != NULL) {
                array_push($lastVideos, $v);
            }
        }

        return view('r.user.tag-videos')
            ->with('page' , 'Videos by tag')
            ->with('subPage' , 'Videos by tag')
            ->with('categories' , $categories)
            ->with('videos_by_cat' , $lastVideos)
            ->with('videos', $videos);
    }

    public function videosByType($id)
    {

        $videos = AdminVideo::with('videoimage', 'category', 'likes')->where('video_type', $id)->orderby('id' , 'desc')->get();

        return view('r.user.category-videos')->with('videos', $videos)->with('videoType', $id);
    }

    public function getVideosByCategory($id)
    {
        $category = Category::where('name', $id)->first();
        $videos = AdminVideo::with('videoimage', 'category', 'likes')->where('category_id', $category->id)->orderby('id' , 'desc')->get();

        return view('r.user.category-videos')->with('videos', $videos)->with('videoType', $id);
    }

    public function vimeoVideo()
    {
        $client_id = '105bb6f8cebedfe7708618ea8723701d13048d73';
        $client_secret = 'F3wa2utJ9BMumoZ3/0jQ5Uwv6Oj/C77NRCgCWKpkk7RPEgOhU4IyR0aXY1rhvc2Amclad3mdJKFuRMOz46vjDJflRsE0E0lJ0t8V9ETI7BAuH15MXaifVlmrgXnSjDs6';
        $access_token = '659bb3e7403fc463fee853d83a298827';

        //$vimeoModel = new \Vimeo\Vimeo($client_id, $client_secret);
        $lib = new Vimeo('105bb6f8cebedfe7708618ea8723701d13048d73', 'F3wa2utJ9BMumoZ3/0jQ5Uwv6Oj/C77NRCgCWKpkk7RPEgOhU4IyR0aXY1rhvc2Amclad3mdJKFuRMOz46vjDJflRsE0E0lJ0t8V9ETI7BAuH15MXaifVlmrgXnSjDs6', '659bb3e7403fc463fee853d83a298827');
        $file_name = public_path('movies/20170719133233/1500471153321.mp4');

        $uri = $lib->upload($file_name);
        $video_data = $lib->request($uri);
        $link = $video_data['body']['link'];
        dd($link);
    }

    public function checkTrial($id)
    {
        $trials = TrialPeriod::where('user_id', Auth::id())->get();

        if(count($trials) < 3) {
            return true;
        }
        return false;

//        if(count($trials) > 0) {
//            foreach ($trials as $trial) {
//                if ($trial->admin_video_id == $id) {
//                    return true;
//                }
//            }
//            if(count($trials ) < 3) {
//                return true;
//            } else {
//            return false;
//            }
//        }
//
//        return true;

    }

    public function getRelatedVideos($video)
    {
//        $videos = $video->videoTags;
        $tags = $video->videoTags;
        $collection = new Collection;
        foreach ($tags as $tag) {
            $collection->push($tag->adminVideos()->with('videoimage', 'category', 'likes')->get());
        }

//       dd($collection);

        $collection2 = new Collection;

        foreach ($collection as $item) {
            foreach ($item as $value) {
                $collection2->push($value);
            }
        }


        $unique = $collection2->unique('watchid');

        $keyed = $unique->keyBy('watchid');

        $keyed->forget($video->watchid);

        if ($keyed->count() == 0) {
            $random = [];
        }
        elseif ($keyed->count() == 1) {
            $random = $keyed;
        }
        elseif ($keyed->count() < 15) {
            $random = $keyed->random($keyed->count());
        } else {
            $random = $keyed->random(15);
        }


//        dd($keyed);

        return $random;
    }

    public function myPlaylist()
    {
        $videosId = UserPlaylist::where('user_id', Auth::id())->get();
        $ids = [];
        foreach($videosId as $item) {
            array_push($ids, $item->admin_video_id);
        }
        $videos = AdminVideo::with('videoimage', 'likes', 'category')->find($ids);

        return $videos;
//        return view('r.user.movie-list')
//            ->with('videos', $videos);
    }

    public function updateAvatar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'useravatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048'
        ]);
        // If validator Fails, redirect same with error values
        if ($validator->fails()) {
            //throw new Exception("error", tr('admin_published_video_failure'));
            return back()->with('flash_error','Image Upload failed');
        }

        $image = $request->file('useravatar');
        $useravatar = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/user');
        $image->move($destinationPath, $useravatar);

        $user = Auth::user();
        $user->picture = URL::to('/').'/images/user/'.$useravatar;
        $user->save();

        return back()->with('flash_success','Image Upload successful');
    }

    public function seeMyPlaylist()
    {
        $videosId = UserPlaylist::where('user_id', Auth::id())->get();
        $ids = [];
        foreach($videosId as $item) {
            array_push($ids, $item->admin_video_id);
        }
        $videos = AdminVideo::with('videoimage', 'likes', 'category')->find($ids);

        return view('r.user.movie-list')
            ->with('videos', $videos);
    }

    public function watchVideo($id)
    {

        $video = AdminVideo::with('comments.user', 'videoimage')->where('watchid', $id)->firstOrFail();




        $checkTrial = true;
        $flag = 0;
        if(Auth::check()) {
            $flag = Auth::user()->paymentPlans[0]->flag;
            if($flag == 1) {
                $checkTrial = $this->checkTrial($video->id);
            }
        } else {
            return view('r.landing')->with('payment_plans', PaymentPlan::orderBy('flag', 'asc')->get())
                ->with('video', $video);
        }





        $relatedVideos = $this->getRelatedVideos($video);


        $images = Videoimage::where('admin_video_id', $video->id)->first();
        if ($images == null)
        {
            $images = [];
        }

        $videoId = substr($video->video, 8);



        $likes = Like::where('admin_video_id', $video->id)->where('type', 'like')->get();
        $disLikes = Like::where('admin_video_id', $video->id)->where('type', 'dislike')->get();
        $checkLike = Like::where('user_id', Auth::id())->where('admin_video_id', $video->id)->where('type', 'like')->first();
        $checkDisLike = Like::where('user_id', Auth::id())->where('admin_video_id', $video->id)->where('type', 'dislike')->first();


        $tags = [];
        foreach($video->videoTags as $tag) {
            array_push($tags, $tag->name);
        }
        $tags = implode(', ', $tags);

        $actors = [];
        foreach($video->videoActors as $actor) {
            array_push($actors, $actor->name);
        }
        $actors = implode(', ', $actors);

        $directors = [];
        foreach($video->videoDirectors as $director) {
            array_push($directors, $director->name);
        }
        $directors = implode(', ', $directors);


        list($hours, $minutes, $seconds) = explode(':', $video->duration);
        $duration = $hours.'h '.$minutes.'min '.$seconds.'s';

        $seasonsArr = [];
        $episodes = Season::where('admin_video_id', $video->id)->where('season_id', 1)->get();
        foreach ($episodes as $episode) {
            array_push($seasonsArr, $episode->vimeo_id);
        }
        $seasons = [];
        $seasons = Season::where('admin_video_id', $video->id)->orderBy('id', 'asc')->distinct()->get(['season_id']);

//        $seasonsArr = implode(',', $seasonsArr);
//        $seasonsArr = 'https://vimeo.com/39050404,https://vimeo.com/39050404';


        return view('r.user.single-video')
//            ->with('trailer_video' , $trailer_video)
//            ->with('main_video' , $main_video)
//            ->with('videoStreamUrl', $main_video)
//            ->with('history_status' , $history_status)
//            ->with('videos' , $videos)
//            ->with('videoTitle' , $video)
//            ->with('images' , $images)
            ->with('video', $video)
            ->with('duration', $duration)
            ->with('checkTrial', $checkTrial)
            ->with('videoId', $videoId)
            ->with('actors', $actors)
            ->with('checkLike', $checkLike)
            ->with('checkDisLike', $checkDisLike)
            ->with('tags', $tags)
            ->with('relatedVideos', $relatedVideos)
            ->with('payPlan', $flag)
//            ->with('episodesArr', $seasonsArr)
            ->with('episodesArr', $episodes)
            ->with('seasons', $seasons)
            ->with('likes', count($likes))
            ->with('dislikes', count($disLikes))
            ->with('directors', $directors);
//            ->with('categories', $categories);
    }

    public function getEpisodesBySeason(Request $request)
    {
        $episodes = Season::where('admin_video_id', $request->video_id)->where('season_id', $request->season_id)->get();

        return response()->json($episodes);
    }

    public function addToPlaylist(Request $request)
    {
        switch (Auth::user()->paymentPlans[0]->flag) {
            case 1:
            	if(App::getLocale()=='en'){
            		$result = [
                    'title' => 'Oops...',
                    'text' => 'To add a video to <b>your playlist</b>, you need to <a href="/package">upgrade the payment plan</a>',
                    'type' => 'warning'
                ];
            	}else{
            		$result = [
                    'title' => 'Oh la la...',
                    'text' => 'Pour ajouter une video à <b>votre liste</b>, vous devez tout dabord <a href="/package">améliorer votre paquet</a>',
                    'type' => 'warning'
                ];
            	}
                

                return response()->json($result);
                break;
            case 2:

                $playlist = UserPlaylist::where('user_id', Auth::id())->get();
                if(count($playlist) < 5) {
                    foreach ($playlist as $item) {
                      if($item->admin_video_id == $request->id) {
          							if(App::getLocale()=='en'){
                          $result = [
                              'title' => 'Hey!',
                              'text' => 'Video already added in your <a href="/my-playlist">playlist</a>',
                              'type' => 'info'
                          ];
	                      }else{
                          $result = [
                              'title' => 'Hey!',
                              'text' => 'Cette video a déjà ajoutée à la <a href="/my-playlist">liste</a>',
                              'type' => 'info'
                          ];
                        }//else
                        return response()->json($result);
                      }//if
                    }//foreach
                    $newPlaylist = new UserPlaylist();
                    $newPlaylist->user_id = Auth::id();
                    $newPlaylist->admin_video_id = $request->id;
                    $newPlaylist->save();


            				if(App::getLocale()=='en'){
	                    $result = [
	                        'title' => 'Good job!',
	                        'text' => 'Video was added in your <a href="/my-playlist">playlist</a>',
	                        'type' => 'success'
	                    ];
	                  } else {
	                    $result = [
	                        'title' => 'Superbe!',
	                        'text' => 'la video a été ajoutée à la <a href="/my-playlist">liste</a>',
	                        'type' => 'success'
	                    ];
	                  }
                    return response()->json($result);
                } else {
            			if(App::getLocale()=='en'){
                    $result = [
                      'title' => 'Oops...',
                      'text' => 'You have already 5 videos in your <a href="/my-playlist">playlist</a>! To add more, you need to <a href="#">upgrade</a> your payment plan',
                      'type' => 'error'
                    ];
                  }else{
                    $result = [
                      'title' => 'Ouille...',
                      'text' => 'Vous avez déjà 5 videos dans votre <a href="/my-playlist">liste</a>! Pour en ajouter plus, <a href="#">améliorez</a> votre paquet',
                      'type' => 'error'
                    ];
                  }
                  return response()->json($result);
                }
                break;
            case 3:
                $playlist = UserPlaylist::where('user_id', Auth::id())->get();
                    foreach ($playlist as $item) {
                      if($item->admin_video_id == $request->id) { 
            						if(App::getLocale()=='en'){
	                        $result = [
                            'title' => 'Hey!',
                            'text' => 'Video already added in your <a href="/my-playlist">playlist</a>',
                            'type' => 'info'
	                        ];
	                      }else{
	                        $result = [
                            'title' => 'Oh!',
                            'text' => 'Video déjà ajoutée a votre <a href="/my-playlist">liste</a>',
                            'type' => 'info'
	                        ];
	                      }
                        return response()->json($result);
                      }
                    }
                $newPlaylist = new UserPlaylist();
                $newPlaylist->user_id = Auth::id();
                $newPlaylist->admin_video_id = $request->id;
                $newPlaylist->save();

								if(App::getLocale()=='en'){
	                $result = [
	                  'title' => 'Good job!',
	                  'text' => 'Video was added in your <a href="/my-playlist">playlist</a>',
	                  'type' => 'success'
	                ];
	              }else{
	                $result = [
	                  'title' => 'Superbe!',
	                  'text' => 'Video ajoutée a votre <a href="/my-playlist">liste</a>',
	                  'type' => 'success'
	                ];
	              }
                return response()->json($result);
                break;

            default:
  
							if(App::getLocale()=='en'){
	              $result = [
                  'title' => 'Oops..',
                  'text' => 'Something went wrong, try later',
                  'type' => 'error'
	              ];
	            }else{
	              $result = [
                  'title' => 'Oh la la...',
                  'text' => 'Quelque chose ne tourne pas rond. Veuillez réessayer plutard.',
                  'type' => 'error'
	              ];
	            }
              return response()->json($result);
        }

    }

    public function showVideo($id)
    {

        $video = AdminVideo::where('watchid', $id)->first();

        $checkTrial = $this->checkTrial($video->id);

        $checkTrialRecord = false;
        $trials = TrialPeriod::where('user_id', Auth::id())->get();
        if(count($trials) < 3) {
                foreach ($trials as $trial) {
                    if ($trial->admin_video_id == $video->id) {
                        $checkTrialRecord = true;
                    }
                }

            if(!$checkTrialRecord) {
                $trialRecord = new TrialPeriod();
                $trialRecord->user_id = Auth::id();
                $trialRecord->admin_video_id = $video->id;
                $trialRecord->save();
            }
        }

        $video->watch_count++;
        $video->save();
        $videoId = substr($video->video, 8);

        if (Auth::check()) {
            $hist = new UserHistory();
            $hist->user_id = Auth::id();
            $hist->admin_video_id = $video->id;
            $hist->status = 0;
            $hist->save();
        }

        return view('r.user.watch-video')
            ->with('videoId', $videoId)
            ->with('checkTrial', $checkTrial)
            ->with('video', $video);
    }


//Added New function by Vishnu

    public function single_newvideo($id) {

        $video = Helper::get_video_details($id);

        $trendings = Helper::trending(WEB);

        $recent_videos = Helper::recently_added(WEB);

        $categories = get_categories();

        $comments = Helper::get_video_comments($id,0,WEB);

        $suggestions = Helper::suggestion_videos('', '', $id);

        $wishlist_status = $history_status = WISHLIST_EMPTY;

        $trailer_video = $main_video = "";

        $report_video = getReportVideoTypes();

        // Load the user flag

        $flaggedVideo = (Auth::check()) ? Flag::where('video_id',$id)->where('user_id', Auth::user()->id)->first() : '';

        if($video) {

            $trailer_video = $video->trailer_video;

            $main_video = $video->video; 

            if($video->video_type == 1) {

                if(check_valid_url($video->video) && $video->video_upload_type == 2) {
                    if(\Setting::get('streaming_url')) {
                        $main_video = \Setting::get('streaming_url').get_video_end($video->video);
                    }
                }

                if(check_valid_url($video->trailer_video) && $video->video_upload_type == 2) {
                    if(\Setting::get('streaming_url')) {
                        //$trailer_video = \Setting::get('streaming_url').get_video_end($video->trailer_video);
						$trailer_video = \Setting::get('streaming_url').get_video_end($video->video);
                    }
                }
            }


            $videoPath = $video_pixels = $trailer_video_path = $trailer_pixels = $trailerstreamUrl = $videoStreamUrl = '';
            if ($video->video_type == 1) {
                if (\Setting::get('streaming_url')) {
                    $trailerstreamUrl = \Setting::get('streaming_url').get_video_end($video->video);
                    $videoStreamUrl = \Setting::get('streaming_url').get_video_end($video->video);
                    if ($video->is_approved == 1) {
                        if($video->trailer_video_resolutions) {
                            $trailerstreamUrl = Helper::web_url().'/uploads/smil/'.get_video_end_smil($video->video).'.smil';
                        } 
                        if ($video->video_resolutions) {
                            $videoStreamUrl = Helper::web_url().'/uploads/smil/'.get_video_end_smil($video->video).'.smil';
                        }
                    }
                } else {

                    $videoPath = $video->video_resize_path ? $video->video.','.$video->video_resize_path : $video->video;
                    $video_pixels = $video->video_resolutions ? 'original,'.$video->video_resolutions : 'original';
                    $trailer_video_path = $video->trailer_video_path ? $video->trailer_video.','.$video->trailer_video_path : $video->trailer_video;
                    $trailer_pixels = $video->trailer_video_resolutions ? 'original'.$video->trailer_video_resolutions : 'original';

                }
            } else {
				
                //$trailerstreamUrl = $video->trailer_video;
				$trailerstreamUrl = $video->video;
                $videoStreamUrl = $video->video;
            }
            
        } else {
            return redirect('/')->with('flash_error' , tr('video_not_found'));
        }

        if(\Auth::check()) {
            $wishlist_status = Helper::check_wishlist_status(\Auth::user()->id,$id);
            $history_status = Helper::history_status(\Auth::user()->id,$id);

        }
        $share_link = route('user.single' , $id);
        
        return view('user.single_newvideo')
                    ->with('page' , '')
                    ->with('subPage' , '')
                    ->with('video' , $video)
                    ->with('recent_videos' , $recent_videos)
                    ->with('trendings' , $trendings)
                    ->with('comments' , $comments)
                    ->with('suggestions',$suggestions)
                    ->with('wishlist_status' , $wishlist_status)
                    ->with('history_status' , $history_status)
                    ->with('trailer_video' , $main_video)
                    ->with('main_video' , $main_video)
                    ->with('url' , $main_video)
                    ->with('categories' , $categories)
                    ->with('report_video', $report_video)
                    ->with('videoPath', $videoPath)
                    ->with('video_pixels', $video_pixels)
                    ->with('trailer_video_path', $trailer_video_path)
                    ->with('trailer_pixels', $trailer_pixels)
                    ->with('videoStreamUrl', $videoStreamUrl)
                    ->with('trailerstreamUrl', $videoStreamUrl)
                    ->with('flaggedVideo', $flaggedVideo);
    }

    /**
     * Show the profile list.
     *
     * @return \Illuminate\Http\Response
     */
	// End By Vishnu
	 
	public function single_video($id) {

	    //#testing
	    return view('r.user.single-video');
	    //#end

        $video = Helper::get_video_details($id);

        $trendings = Helper::trending(WEB);

        $recent_videos = Helper::recently_added(WEB);

        $categories = get_categories();

        $comments = Helper::get_video_comments($id,0,WEB);

        $suggestions = Helper::suggestion_videos('', '', $id);

        $wishlist_status = $history_status = WISHLIST_EMPTY;

        $trailer_video = $main_video = "";

        $report_video = getReportVideoTypes();

        // Load the user flag

        $flaggedVideo = (Auth::check()) ? Flag::where('video_id',$id)->where('user_id', Auth::user()->id)->first() : '';

        if($video) {

            $trailer_video = $video->trailer_video;

            $main_video = $video->video; 

            if($video->video_type == 1) {

                if(check_valid_url($video->video) && $video->video_upload_type == 2) {
                    if(\Setting::get('streaming_url')) {
                        $main_video = \Setting::get('streaming_url').get_video_end($video->video);
                    }
                }

                if(check_valid_url($video->trailer_video) && $video->video_upload_type == 2) {
                    if(\Setting::get('streaming_url')) {
                        $trailer_video = \Setting::get('streaming_url').get_video_end($video->trailer_video);
                    }
                }
            }


            $videoPath = $video_pixels = $trailer_video_path = $trailer_pixels = $trailerstreamUrl = $videoStreamUrl = '';
            if ($video->video_type == 1) {
                if (\Setting::get('streaming_url')) {
                    $trailerstreamUrl = \Setting::get('streaming_url').get_video_end($video->trailer_video);
                    $videoStreamUrl = \Setting::get('streaming_url').get_video_end($video->video);
                    if ($video->is_approved == 1) {
                        if($video->trailer_video_resolutions) {
                            $trailerstreamUrl = Helper::web_url().'/uploads/smil/'.get_video_end_smil($video->trailer_video).'.smil';
                        } 
                        if ($video->video_resolutions) {
                            $videoStreamUrl = Helper::web_url().'/uploads/smil/'.get_video_end_smil($video->video).'.smil';
                        }
                    }
                } else {

                    $videoPath = $video->video_resize_path ? $video->video.','.$video->video_resize_path : $video->video;
                    $video_pixels = $video->video_resolutions ? 'original,'.$video->video_resolutions : 'original';
                    $trailer_video_path = $video->trailer_video_path ? $video->trailer_video.','.$video->trailer_video_path : $video->trailer_video;
                    $trailer_pixels = $video->trailer_video_resolutions ? 'original'.$video->trailer_video_resolutions : 'original';

                }
            } else {
                $trailerstreamUrl = $video->trailer_video;
                $videoStreamUrl = $video->video;
            }
            
        } else {
            return redirect('/')->with('flash_error' , tr('video_not_found'));
        }

        if(\Auth::check()) {
            $wishlist_status = Helper::check_wishlist_status(\Auth::user()->id,$id);
            $history_status = Helper::history_status(\Auth::user()->id,$id);

        }
        $share_link = route('user.single' , $id);
        
        return view('user.single-video')
                    ->with('page' , '')
                    ->with('subPage' , '')
                    ->with('video' , $video)
                    ->with('recent_videos' , $recent_videos)
                    ->with('trendings' , $trendings)
                    ->with('comments' , $comments)
                    ->with('suggestions',$suggestions)
                    ->with('wishlist_status' , $wishlist_status)
                    ->with('history_status' , $history_status)
                    ->with('trailer_video' , $trailer_video)
                    ->with('main_video' , $main_video)
                    ->with('url' , $main_video)
                    ->with('categories' , $categories)
                    ->with('report_video', $report_video)
                    ->with('videoPath', $videoPath)
                    ->with('video_pixels', $video_pixels)
                    ->with('trailer_video_path', $trailer_video_path)
                    ->with('trailer_pixels', $trailer_pixels)
                    ->with('videoStreamUrl', $videoStreamUrl)
                    ->with('trailerstreamUrl', $trailerstreamUrl)
                    ->with('flaggedVideo', $flaggedVideo);
    }

    /**
     * Show the profile list.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('user.profile')
                    ->with('page' , 'profile')
                    ->with('subPage' , 'user-profile');
    }

    /**
     * Show the profile list.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_profile()
    {
        return view('user.edit-profile')->with('page' , 'profile')
                    ->with('subPage' , 'user-update-profile');
    }

    /**
     * Save any changes to the users profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_save(Request $request)
    {
        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token,
        ]);

        $response = $this->UserAPI->update_profile($request)->getData();

        if($response->success) {

            return back()->with('flash_success' , tr('profile_updated'));

        } else {

            $message = $response->error." ".$response->error_messages;
            return back()->with('flash_error' , $message);
        }
    }

    /**
     * Save changed password.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_save_password(Request $request)
    {
        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token,
        ]);

        $response = $this->UserAPI->change_password($request)->getData();

        if($response->success) {
            return back()->with('flash_success' , tr('password_success'));
        } else {
            $message = $response->error." ".$response->error_messages;
            return back()->with('flash_error' , $message);
        }

        return back()->with('response', $response);
    }

    public function profile_change_password(Request $request) {

        return view('user.change-password')->with('page' , 'profile')
                    ->with('subPage' , 'user-change-password');

    }

    public function add_history(Request $request) {

        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token
        ]);

        $response = $this->UserAPI->add_history($request)->getData();

        if($response->success) {
            $response->message = Helper::get_message(118);
        } else {
            $response->success = false;
            $response->message = "Something Went Wrong";
        }

        $response->status = $request->status;

        if ($request->video_status == 1) {

            // Load Payperview
            $payperview = PayPerView::where('user_id', \Auth::user()->id)->where('video_id',$request->admin_video_id)
                            ->where('status',0)->first();
            if ($payperview) {
                $payperview->status = DEFAULT_TRUE;
                $payperview->save();
            }
        }

        return response()->json($response);
    
    }

    public function delete_history(Request $request) {

        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token
        ]);

        $response = $this->UserAPI->delete_history($request)->getData();

        if($response->success) {
            return back()->with('flash_success' , Helper::get_message(121));

        } else {
            return back()->with('flash_error' , tr('admin_not_error'));
        }
    }

    public function history(Request $request) {

        $histories = Helper::watch_list(\Auth::user()->id,WEB);

        return view('user.history')
                        ->with('page' , 'profile')
                        ->with('subPage' , 'user-history')
                        ->with('histories' , $histories);
    }

    public function add_wishlist(Request $request) {

        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token
        ]);

        if($request->status == 1) {
            $response = $this->UserAPI->add_wishlist($request)->getData();
        } else {
            $response = $this->UserAPI->delete_wishlist($request)->getData();
        }

        if($response->success) {
            $response->message = Helper::get_message(118);
        } else {
            $response->success = false;
            $response->message = "Something Went Wrong";
        }

        $response->status = $request->status;

        return response()->json($response);
    }

    public function delete_wishlist(Request $request) {


        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token
        ]);

        $response = $this->UserAPI->delete_wishlist($request)->getData();

        if($response->success) {
            return back()->with('flash_success',tr('wishlist_removed'));
        } else {
            return back()->with('flash_error', "Something Went Wrong");
        }
    } 

    public function wishlist(Request $request) {
        
        $videos = Helper::wishlist(\Auth::user()->id,WEB);

        return view('user.wishlist')
                    ->with('page' , 'profile')
                    ->with('subPage' , 'user-wishlist')
                    ->with('videos' , $videos);
    }

    public function add_comment(Request $request) {

        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token
        ]);

        $response = $this->UserAPI->user_rating($request)->getData();

        if($response->success) {
            $response->message = Helper::get_message(118);
        } else {
            $response->success = false;
            $response->message = "Something Went Wrong";
        }

        return response()->json($response);
    
    }

    public function comments(Request $request) {

        $videos = Helper::get_user_comments(\Auth::user()->id,WEB);

        return view('user.comments')
                    ->with('page' , 'profile')
                    ->with('subPage' , 'user-comments')
                    ->with('videos' , $videos);
    }

    public function all_categories(Request $request) {

        $categories = get_categories();

        $recent_videos = Helper::recently_added(WEB);

        $trendings = Helper::trending(WEB);

        $suggestions = Helper::suggestion_videos(WEB);

        return view('user.all-categories')
                    ->with('page' , 'categories')
                    ->with('subPage' , 'categories')
                    ->with('categories' , $categories)
                    ->with('trendings' , $trendings)
                    ->with('suggestions' , $suggestions)
                    ->with('recent_videos' , $recent_videos);
    }


    public function category_videos($id) {

        $sub_categories = get_sub_categories($id);

        $videos = Helper::category_videos($id,WEB);

        $trendings = Helper::trending(WEB);

        $suggestions = Helper::suggestion_videos(WEB);

        $categories = get_categories();

        $category = Category::find($id);

        return view('r.user.category-videos')
                    ->with('page' , 'categories')
                    ->with('subPage' , 'categories')
                    ->with('category' , $category)
                    ->with('categories' , $categories)
                    ->with('sub_categories' , $sub_categories)
                    ->with('trendings' , $trendings)
                    ->with('suggestions' , $suggestions)
                    ->with('videos' , $videos);
    }

    public function sub_category_videos($id) {

        $videos = Helper::sub_category_videos($id,WEB);

        $trendings = Helper::trending(WEB);

        $suggestions = Helper::suggestion_videos(WEB);

        $sub_category = get_sub_category_details($id);

        $genres = get_genres($id);

        return view('user.sub_categories')
                    ->with('page' , 'categories')
                    ->with('subPage' , 'categories')
                    ->with('videos' , $videos)
                    ->with('trendings' , $trendings)
                    ->with('genres' , $genres)
                    ->with('sub_category' , $sub_category)
                    ->with('suggestions' , $suggestions);
    } 

    public function genre_videos($id) {

        $videos = Helper::genre_videos($id,WEB);

        $trendings = Helper::trending(WEB);

        $suggestions = Helper::suggestion_videos(WEB);

        $genre = get_genre_details($id);

        return view('user.genres')
                    ->with('page' , 'categories')
                    ->with('subPage' , 'categories')
                    ->with('videos' , $videos)
                    ->with('trendings' , $trendings)
                    ->with('genre' , $genre)
                    ->with('suggestions' , $suggestions);
    }

    public function contact() {



        return view('r.contact');

    }

    public function sendContactForm(Request $requset)
    {
        $subject = "Message from contact form";
        $email_data = $requset;
        $page = "emails.contact";
        $email = 'info@ukumbitv.com';
        Helper::send_email($page,$subject,$email,$email_data);

        return response()->json(['message' => 'ok'], 200);
    }

    public function trending()
    {
        $trending = Helper::trending(1);
        $categories = get_categories();

        return view('user.trending')->with('page', 'trending')
                                    ->with('videos',$trending)
                                    ->with('categories', $categories);
    }

    public function delete_account(Request $request) {

        if(\Auth::user()->login_by == 'manual') {

            return view('user.delete-account')
                    ->with('page' , 'profile')
                    ->with('subPage' , 'delete-account');
        } else {

            $request->request->add([ 
                'id' => \Auth::user()->id,
                'token' => \Auth::user()->token,
                'device_token' => \Auth::user()->device_token
            ]);

            $response = $this->UserAPI->delete_account($request)->getData();

            if($response->success) {
                return back()->with('flash_success', tr('user_account_delete_success'));
            } else {
                if($response->error == 101)
                    return back()->with('flash_error', $response->error_messages);
                else
                    return back()->with('flash_error', $response->error);
            }

            return back()->with('flash_error', Helper::get_error_message(146));

        }
        
    }

    public function delete_account_process(Request $request) {

        $request->request->add([ 
            'id' => \Auth::user()->id,
            'token' => \Auth::user()->token,
            'device_token' => \Auth::user()->device_token
        ]);

        $response = $this->UserAPI->delete_account($request)->getData();

        if($response->success) {
            return back()->with('flash_success', tr('user_account_delete_success'));
        } else {
            if($response->error == 101)
                return back()->with('flash_error', $response->error_messages);
            else
                return back()->with('flash_error', $response->error);
        }

        return back()->with('flash_error', Helper::get_error_message(146));

    }

    /**
     * Function Name : save_report_videos
     * Save report videos based on user based
     *
     * @param object $request - Post Attributes
     *
     * @return flash message
     */
    public function save_report_video(Request $request) {
        try {
            // Validate the coming post values
            $validator = Validator::make($request->all(), [
                'video_id' => 'required',
                'reason' => 'required',
            ]);
            // If validator Fails, redirect same with error values
            if ($validator->fails()) {
                 //throw new Exception("error", tr('admin_published_video_failure'));
                return back()->with('flash_error', tr('admin_published_video_failure'));
            }
            // Assign Post request values into Data variable
            $data = $request->all();
            // include user_id index into the data varaible  "Auth::user()->id" -> Logged In user id
            $data['user_id'] = \Auth::user()->id;
            // Save the values in DB
            if ($report_video = Flag::create($data)) {
                return redirect('/')->with('flash_success', tr('report_video_success_msg'));
            } else {
                //throw new Exception("error", tr('admin_published_video_failure'));
                return back()->with('flash_error', tr('admin_published_video_failure'));
            }
        } catch (Exception $e) {
            return back()->with('flash_error', $e);
        }
    }

    /**
     * Function Name : remove_report_video()
     * Remove the video from spam folder and make it as unspam
     *
     * @param integer $id Flag id
     *
     * @return flash error/flash success
     */
    public function remove_report_video($id) {
        // Load Spam Video from flag section
        $model = Flag::where('id', $id)->first();
        Log::info("Loaded Values : ".print_r($model, true));
        // If the flag model exists then delete the row
        if ($model) {
            Log::info("Loaded Values 1 : ".print_r($model, true));
            Log::info("Delete values :". print_r($model->delete()));
            $model->delete();
            return back()->with('flash_success', tr('unmark_report_video_success_msg'));
        } else {
            // throw new Exception("error", tr('admin_published_video_failure'));
            return back()->with('flash_error', tr('admin_published_video_failure'));
        }
    }

    /**
     * Function Name : spam_videos()
     * Based on logged in user load spam videos
     *
     * @return spam videos
     */
    public function spam_videos() {
        // Get logged in user id
        $id = Auth::user()->id;
        $model = Flag::where('user_id', $id)
            ->leftJoin('admin_videos' , 'flags.video_id' , '=' , 'admin_videos.id')
            ->leftJoin('categories' , 'admin_videos.category_id' , '=' , 'categories.id')
            ->leftJoin('sub_categories' , 'admin_videos.sub_category_id' , '=' , 'sub_categories.id')
            ->select('flags.*','admin_videos.is_approved', 'admin_videos.status')
            ->where('admin_videos.is_approved' , 1)
            ->where('admin_videos.status' , 1)
            ->paginate(16);
        // Return array of values
        return view('user.spam_videos')->with('model' , $model)
                        ->with('page' , 'Profile')
                        ->with('subPage' , 'Spam Videos');
    }   

    /**
     * Function Name: payper_videos()
     * To load all the paper views
     *
     * @return view page
     */
    public function payper_videos() {
        // Get Logged in user id
        $id = Auth::user()->id;
        // Load all the paper view videos based on logged in user id
        $model = PayPerView::where('user_id', $id)->paginate(16);
        // Return the view page
        return view('user.payperview')->with('model' , $model)
                        ->with('page' , 'Profile')
                        ->with('subPage' , 'Payper Videos');
    }
    
    /**
     * 
     * @return type
     */
    public function payment()
    {
        $videos = AdminVideo::all();
        $categories = Category::all();
        return view('user.userpayment')
                    ->with('page' , 'profile')
                    ->with('subPage' , 'user-profile')
                    ->with('categories' , $categories)
                    ->with('videos', $videos);
    }

    //Payment plans

    public function selectPayPlan()
    {
        $payPlans = PaymentPlan::all();
        $planId = UserPayment::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

        if(count($planId) != 0) {
            $payPlan = PaymentPlan::find($planId->payment_plan_id);
            $id = $payPlan->name;
            $expdate = $planId->expiry_date;
        }
        else {$id = NULL;$expdate = NULL;}

        return view('user.select_payment_plan')
            ->with('payplan', $id)
            ->with('expdate', $expdate)
            ->with('payPlans', $payPlans);
    }

    public function resetTrial()
    {
        $trials = UserHistory::where('user_id', Auth::id())->get();
        foreach ($trials as $trial) {
            $trial->delete();
        }

        return back()->with('flash_error' , 'ok');
    }

    public function stripePay()
    {
        $msg = 'test';

        $gateway = Omnipay::create('Stripe');
        $gateway->setApiKey('sk_test_BoUW18Zo8GZAgRgZqb4r6Apn');

// Example form data
        $formData = [
            'number' => '4242424242424242',
            'expiryMonth' => '6',
            'expiryYear' => '2018',
            'cvv' => '123'
        ];

// Send purchase request
        $response = $gateway->purchase(
            [
                'amount' => '10.00',
                'currency' => 'USD',
                'card' => $formData
            ]
        )->send();

// Process response
        if ($response->isSuccessful()) {

            // Payment was successful
            return view('errors.503')
                ->with('msg', 'ok');

        } elseif ($response->isRedirect()) {

            // Redirect to offsite payment gateway
            $response->redirect();

        } else {

            // Payment failed
            return view('errors.503')->with('msg', $response->getMessage());
        }

    }

    public function stripePayPost()
    {
        // Setup payment gateway
        $gateway = Omnipay::create('Stripe');
        $gateway->setApiKey('sk_test_BoUW18Zo8GZAgRgZqb4r6Apn');

// Example form data
        $formData = [
            'number' => '4242424242424242',
            'expiryMonth' => '6',
            'expiryYear' => '2018',
            'cvv' => '123'
        ];

// Send purchase request
        $response = $gateway->purchase(
            [
                'amount' => '10.00',
                'currency' => 'USD',
                'card' => $formData
            ]
        )->send();

// Process response
        if ($response->isSuccessful()) {

            // Payment was successful
            print_r($response);

        } elseif ($response->isRedirect()) {

            // Redirect to offsite payment gateway
            $response->redirect();

        } else {

            // Payment failed
            echo $response->getMessage();
        }
    }

    public function choosePayPlan($id)
    {

        $payPlan = PaymentPlan::find($id);

        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername('accounting-facilitator_api1.mungodigital.com');
        $gateway->setPassword('6R2J5K7SYKMKC5J8');
        $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31A29KVfo-.eMT26Dj3IuPQ0AjdFfz');
        $gateway->setTestMode(true);

        $response = $gateway->purchase(
            array(
                'cancelUrl' => URL::to('/').'/select-payment-plan',
                'returnUrl' => URL::to('/').'/paypal-success-pay/'.$payPlan->id,
                'description' => 'Payment plan',
                'amount' => $payPlan->price,
                'currency' => 'USD'
            )
        )->send();

        $response->redirect();

    }


    public function successPayPalPay($id)
    {
        $payPlan = PaymentPlan::find($id);

        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername('accounting-facilitator_api1.mungodigital.com');
        $gateway->setPassword('6R2J5K7SYKMKC5J8');
        $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31A29KVfo-.eMT26Dj3IuPQ0AjdFfz');
        $gateway->setTestMode(true);

        $response = $gateway->purchase(
            array(
                'cancelUrl' => URL::to('/').'/select-payment-plan',
                'returnUrl' => URL::to('/').'/paypal-success-pay/'.$payPlan->id,
                'description' => 'Payment plan',
                'amount' => $payPlan->price,
                'currency' => 'USD'
            )
        )->send();

        $data = $response->getData();

        if($data['ACK']=='Success'){

            $payment = new UserPayment();
            $payment->user_id = Auth::id();
            $payment->payment_id = $data['TOKEN'];
            $payment->payment_plan_id = $payPlan->id;
            $payment->amount = $payPlan->price;
            $payment->expiry_date = $data['TIMESTAMP'];
            $payment->save();

            $expiry_date = Carbon::now()->addMonth();

            $userPaymentPlan = UserPaymentPlan::where('user_id', Auth::id())->first();
            $userPaymentPlan->payment_plan_id = $payPlan->id;
            $userPaymentPlan->expiry_date = $expiry_date;
            $userPaymentPlan->save();

            return redirect()->action('UserController@packages')->with('flash_success' , 'Plan was successful updated');
        }


        return 'ERROR';
    }

   public function unique_multidim_array($array, $key) {
        $temp_array = [];
        $i = 0;
        $key_array = [];

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function searchData()
    {
        $videos = AdminVideo::with('videoDirectors', 'videoActors', 'videoTags')->get();

        $result = [];
//        foreach ($videos as $video) {
//            if(array_search($video->title, array_column($result, 'word')) === FALSE) {
//              array_push($result, ['word' => $video->title, 'type' => 'video title']);
//            }
//            foreach ($video->videoDirectors as $director) {
//                if(array_search($director->name, array_column($result, 'word')) === FALSE) {
//                    array_push($result, ['word' => $director->name, 'type' => 'directors']);
//                }
//            }
//            foreach ($video->videoActors as $actor) {
//                if(array_search($actor->name, array_column($result, 'word')) === FALSE) {
//                    array_push($result, ['word' => $actor->name, 'type' => 'actors']);
//                }
//            }
//            foreach ($video->videoTags as $tag) {
//                if(array_search($tag->name, array_column($result, 'word')) === FALSE) {
//                    array_push($result, ['word' => $tag->name, 'type' => 'tags']);
//                }
//            }
//        }

        foreach($videos as $video) {
            array_push($result, $video->title);
            foreach ($video->videoDirectors as $director) {
                array_push($result, $director->name);
            }
            foreach ($video->videoActors as $actor) {
                array_push($result, $actor->name);
            }
            foreach ($video->videoTags as $tag) {
                array_push($result, $tag->name);
            }
        }
//        $result = implode(',', $result);


//       $result = $this->unique_multidim_array($result,'word');
//        $found_key = array_search('test', array_column($result, 'word'));
//dd($found_key);
        return response()->json($result);
//        return $result;

    }

    public function searchAll(Request $request)
    {
        $result = new Collection;
        $videos = AdminVideo::with('videoimage', 'likes', 'category')->where('title', 'like', '%'.$request->key.'%')->get();
        $videosByTag = VideoTag::with('adminVideos.videoimage', 'adminVideos.likes', 'adminVideos.category')->where('name', $request->key)->get();
        $videosByActor = VideoActor::with('adminVideos.videoimage', 'adminVideos.likes', 'adminVideos.category')->where('name', $request->key)->get();
        $videosByDirector = VideoDirector::with('adminVideos.videoimage', 'adminVideos.likes', 'adminVideos.category')->where('name', $request->key)->get();

        foreach ($videos as $adminVideo) {
            $result->push($adminVideo);
        }
        foreach ($videosByTag as $videoByTag) {
            foreach ($videoByTag->adminVideos as $video) {
                $result->push($video);
            }
        }
        foreach ($videosByActor as $videoByActor) {
            foreach ($videoByActor->adminVideos as $video) {
                $result->push($video);
            }
        }
        foreach ($videosByDirector as $videoByDirector) {
            foreach ($videoByDirector->adminVideos as $video) {
                $result->push($video);
            }
        }

        $unique = $result->unique();
//        dd($unique);

        return view('r.user.search-result')->with('videos', $unique);
    }

    public function updateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'max:255',
        ]);
        // If validator Fails, redirect same with error values
        if ($validator->fails()) {
            //throw new Exception("error", tr('admin_published_video_failure'));
            return response()->json(['title' => 'Hmm...', 'message' => 'You need to fill in all the fields', 'type' => 'error']);
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->phone;

        $user->save();

        return response()->json($user);
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required|max:255',
            'newpassword' => 'required|max:255',
        ]);
        // If validator Fails, redirect same with error values
        if ($validator->fails()) {
            //throw new Exception("error", tr('admin_published_video_failure'));
            return response()->json(['title' => 'Hmm...', 'message' => 'You need to fill in all the fields', 'type' => 'error', 'errors' => $validator->messages()]);
        }

        if (Hash::check($request->oldpassword, Auth::user()->password)) {
            $user = Auth::user();
            $user->password = bcrypt($request->newpassword);
            $user->save();
            return response()->json(['title' => 'Cool', 'message' => 'Password was updated', 'type' => 'success']);
        }
        return response()->json(['title' => 'Hmm...', 'message' => 'Wrong current password', 'type' => 'error']);
    }

    public function test()
    {
        return view('r.user.test');
    }

    public function getAllVideos()
    {
        $videos = AdminVideo::with('videoimage')->get();

        return response()->json($videos, 200);
    }

}