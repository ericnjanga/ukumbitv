<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('setlocale/{locale}', function ($locale) {
    return redirect()->back()->withCookie(cookie('locale', $locale));                             # Redirect with select lang
});

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
    Route::get('/videos', 'ApiController@getAllVideos');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::post('/login', 'ApiController@login');
});

// Report Video type

if(!defined('REPORT_VIDEO_KEY')) define('REPORT_VIDEO_KEY', 'REPORT_VIDEO');
if (!defined('IMAGE_RESOLUTIONS_KEY')) define('IMAGE_RESOLUTIONS_KEY', 'IMAGE_RESOLUTIONS');
if (!defined('VIDEO_RESOLUTIONS_KEY')) define('VIDEO_RESOLUTIONS_KEY', 'VIDEO_RESOLUTIONS');

// User Type
if(!defined('NORMAL_USER')) define('NORMAL_USER', 1);
if(!defined('PAID_USER')) define('PAID_USER', 2);
if(!defined('BOTH_USERS')) define('BOTH_USERS', 3);

// Subscription Type
if(!defined('ONE_TIME_PAYMENT')) define('ONE_TIME_PAYMENT', 1);
if(!defined('RECURRING_PAYMENT')) define('RECURRING_PAYMENT', 2);

// REQUEST STATE

if(!defined('REQUEST_STEP_1')) define('REQUEST_STEP_1', 1);
if(!defined('REQUEST_STEP_2')) define('REQUEST_STEP_2', 2);
if(!defined('REQUEST_STEP_3')) define('REQUEST_STEP_3', 3);
if(!defined('REQUEST_STEP_FINAL')) define('REQUEST_STEP_FINAL', 4);


if(!defined('USER')) define('USER', 0);

if(!defined('Moderator')) define('Moderator',1);

if(!defined('NONE')) define('NONE', 0);

if(!defined('MAIN_VIDEO')) define('MAIN_VIDEO', 1);
if(!defined('TRAILER_VIDEO')) define('TRAILER_VIDEO', 2);


if(!defined('DEFAULT_TRUE')) define('DEFAULT_TRUE', 1);
if(!defined('DEFAULT_FALSE')) define('DEFAULT_FALSE', 0);

if(!defined('ADMIN')) define('ADMIN', 'admin');
if(!defined('MODERATOR')) define('MODERATOR', 'moderator');

if(!defined('VIDEO_TYPE_UPLOAD')) define('VIDEO_TYPE_UPLOAD', 1);
if(!defined('VIDEO_TYPE_YOUTUBE')) define('VIDEO_TYPE_YOUTUBE', 2);
if(!defined('VIDEO_TYPE_OTHER')) define('VIDEO_TYPE_OTHER', 3);


if(!defined('VIDEO_UPLOAD_TYPE_s3')) define('VIDEO_UPLOAD_TYPE_s3', 1);
if(!defined('VIDEO_UPLOAD_TYPE_DIRECT')) define('VIDEO_UPLOAD_TYPE_DIRECT', 2);

if(!defined('NO_INSTALL')) define('NO_INSTALL' , 0);

if(!defined('SYSTEM_CHECK')) define('SYSTEM_CHECK' , 1);

if(!defined('THEME_CHECK')) define('THEME_CHECK' , 2);

if(!defined('INSTALL_COMPLETE')) define('INSTALL_COMPLETE' , 3);


if(!defined('ADMIN')) define('ADMIN', 'admin');
if(!defined('MODERATOR')) define('MODERATOR', 'moderator');

// Payment Constants
if(!defined('COD')) define('COD',   'cod');
if(!defined('PAYPAL')) define('PAYPAL', 'paypal');
if(!defined('CARD')) define('CARD',  'card');


if(!defined('RATINGS')) define('RATINGS', '0,1,2,3,4,5');

if(!defined('DEVICE_ANDROID')) define('DEVICE_ANDROID', 'android');
if(!defined('DEVICE_IOS')) define('DEVICE_IOS', 'ios');

if(!defined('WISHLIST_EMPTY')) define('WISHLIST_EMPTY' , 0);
if(!defined('WISHLIST_ADDED')) define('WISHLIST_ADDED' , 1);
if(!defined('WISHLIST_REMOVED')) define('WISHLIST_REMOVED' , 2);

if(!defined('RECENTLY_ADDED')) define('RECENTLY_ADDED' , 'recent');
if(!defined('TRENDING')) define('TRENDING' , 'trending');
if(!defined('SUGGESTIONS')) define('SUGGESTIONS' , 'suggestion');
if(!defined('WISHLIST')) define('WISHLIST' , 'wishlist');
if(!defined('WATCHLIST')) define('WATCHLIST' , 'watchlist');
if(!defined('BANNER')) define('BANNER' , 'banner');

if(!defined('WEB')) define('WEB' , 1);

Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Route::get('select-payment-plan', 'UserController@selectPayPlan')->name('user.select-pay-plan');
Route::get('/email/verification' , 'ApplicationController@email_verify')->name('email.verify');
// Installation

Route::get('/install/theme', 'InstallationController@install')->name('installTheme');

Route::get('/system/check', 'InstallationController@system_check_process')->name('system-check');

Route::post('/install/theme', 'InstallationController@theme_check_process')->name('install.theme');

Route::post('/install/settings', 'InstallationController@settings_process')->name('install.settings');

Route::get('/testmin', 'UserController@test')->name('test');

// Elastic Search Test

//get all movies
Route::get('/get-all-movies', 'UserController@getAllVideos')->name('user.getAllVideos');

Route::get('/addIndex', 'ApplicationController@addIndex')->name('addIndex');

Route::get('/addAll', 'ApplicationController@addAllVideoToEs')->name('addAll');

// CRON

Route::get('/publish/video', 'ApplicationController@cron_publish_video')->name('publish');

Route::get('/notification/payment', 'ApplicationController@send_notification_user_payment')->name('notification.user.payment');

Route::get('/payment/expiry', 'ApplicationController@user_payment_expiry')->name('user.payment.expiry');

// Static Pages

Route::get('/privacy', 'UserApiController@privacy')->name('user.privacy');

Route::get('/terms', 'UserApiController@terms')->name('user.terms');

Route::get('/contact', 'UserController@contact')->name('user.contact');
Route::post('/contact', 'UserController@sendContactForm')->name('user.send-contact-form');

Route::get('/privacy-statement', 'ApplicationController@privacy')->name('user.privacy_policy');

Route::get('/terms-of-use', 'ApplicationController@terms')->name('user.terms-condition');

Route::get('/about-us', 'ApplicationController@about')->name('user.about');
Route::get('/jobs/{id?}', 'ApplicationController@jobs')->name('user.jobs');
Route::get('/test' , 'ApplicationController@test');
Route::get('/help-center/{id?}','ApplicationController@helpCenter')->name('user.help-center');
Route::get('/advertising','ApplicationController@advertising')->name('user.advertising');
Route::get('/package', 'UserController@packages')->name('user.package');


// Video upload 

Route::post('select/sub_category' , 'ApplicationController@select_sub_category')->name('select.sub_category');

Route::post('select/genre' , 'ApplicationController@select_genre')->name('select.genre');


Route::group(['prefix' => 'admin'], function(){

    Route::get('login', 'Auth\AdminAuthController@showLoginForm')->name('admin.login');

    Route::post('login', 'Auth\AdminAuthController@login')->name('admin.login.post');

    Route::get('logout', 'Auth\AdminAuthController@logout')->name('admin.logout');

    // Registration Routes...

    Route::get('register', 'Auth\AdminAuthController@showRegistrationForm');

    Route::post('register', 'Auth\AdminAuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\AdminPasswordController@showResetForm');

    Route::post('password/email', 'Auth\AdminPasswordController@sendResetLinkEmail');

    Route::post('password/reset', 'Auth\AdminPasswordController@reset');

    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    Route::get('/profile', 'AdminController@profile')->name('admin.profile');

	Route::post('/profile/save', 'AdminController@profile_process')->name('admin.save.profile');

	Route::post('/change/password', 'AdminController@change_password')->name('admin.change.password');

    // users

    Route::get('/users', 'AdminController@users')->name('admin.users');

    Route::get('/add/user', 'AdminController@add_user')->name('admin.add.user');

    Route::get('/edit/user', 'AdminController@edit_user')->name('admin.edit.user');

    Route::post('/add/user', 'AdminController@add_user_process')->name('admin.save.user');

    Route::get('/delete/user', 'AdminController@delete_user')->name('admin.delete.user');

    Route::get('/view/user/{id}', 'AdminController@view_user')->name('admin.view.user');

    Route::get('/user/upgrade/{id}', 'AdminController@user_upgrade')->name('admin.user.upgrade');

    Route::any('/upgrade/disable', 'AdminController@user_upgrade_disable')->name('user.upgrade.disable');

    // User History - admin

    Route::get('/user/history/{id}', 'AdminController@view_history')->name('admin.user.history');

    Route::get('/delete/history/{id}', 'AdminController@delete_history')->name('admin.delete.history');
    
    // User Wishlist - admin

    Route::get('/user/wishlist/{id}', 'AdminController@view_wishlist')->name('admin.user.wishlist');

    Route::get('/delete/wishlist/{id}', 'AdminController@delete_wishlist')->name('admin.delete.wishlist');

    // Spam Videos
    Route::get('/spam-videos', 'AdminController@spam_videos')->name('admin.spam-videos');

    Route::get('/view-users/{id}', 'AdminController@view_users')->name('admin.view-users');

    // Moderators

    Route::get('/moderators', 'AdminController@moderators')->name('admin.moderators');

    Route::get('/add/moderator', 'AdminController@add_moderator')->name('admin.add.moderator');

    Route::get('/edit/moderator/{id}', 'AdminController@edit_moderator')->name('admin.edit.moderator');

    Route::post('/add/moderator', 'AdminController@add_moderator_process')->name('admin.save.moderator');

    Route::get('/delete/moderator/{id}', 'AdminController@delete_moderator')->name('admin.delete.moderator');
    
    Route::get('/moderator/approve/{id}', 'AdminController@moderator_approve')->name('admin.moderator.approve');

    Route::get('/moderator/decline/{id}', 'AdminController@moderator_decline')->name('admin.moderator.decline');

    Route::get('/view/moderator/{id}', 'AdminController@moderator_view_details')->name('admin.moderator.view');

    // Categories

    Route::get('/categories', 'AdminController@categories')->name('admin.categories');

    Route::get('/add/category', 'AdminController@add_category')->name('admin.add.category');

    Route::get('/edit/category/{id}', 'AdminController@edit_category')->name('admin.edit.category');

    Route::post('/add/category', 'AdminController@add_category_process')->name('admin.save.category');

    Route::get('/delete/category', 'AdminController@delete_category')->name('admin.delete.category');

    Route::get('/view/category/{id}', 'AdminController@view_category')->name('admin.view.category');

    Route::get('/category/approve', 'AdminController@approve_category')->name('admin.category.approve');

    // Admin Sub Categories

    Route::get('/subCategories/{category}', 'AdminController@sub_categories')->name('admin.sub_categories');

    Route::get('/add/subCategory/{category}', 'AdminController@add_sub_category')->name('admin.add.sub_category');

    Route::get('/edit/subCategory/{category_id}/{sub_category_id}', 'AdminController@edit_sub_category')->name('admin.edit.sub_category');

    Route::post('/add/subCategory', 'AdminController@add_sub_category_process')->name('admin.save.sub_category');

    Route::get('/delete/subCategory/{id}', 'AdminController@delete_sub_category')->name('admin.delete.sub_category');

    Route::get('/view/subCategory/{id}', 'AdminController@view_sub_category')->name('admin.view.sub_category');

    Route::get('/subCategory/approve', 'AdminController@approve_sub_category')->name('admin.sub_category.approve');

    // Genre

    Route::post('/save/genre' , 'AdminController@save_genre')->name('admin.save.genre');

    Route::get('/genre/approve', 'AdminController@approve_genre')->name('admin.genre.approve');

    Route::get('/delete/genre/{id}', 'AdminController@delete_genre')->name('admin.delete.genre');

    Route::get('/view/genre/{id}', 'AdminController@view_genre')->name('admin.view.genre');

    // Videos

    Route::get('/videos', 'AdminController@videos')->name('admin.videos');

    Route::get('/add/video', 'AdminController@add_video')->name('admin.add.video');

    Route::get('/edit/video/{id}', 'AdminController@edit_video')->name('admin.edit.video');

    Route::post('/edit/video/process', 'AdminController@edit_video_process')->name('admin.save.edit.video');

    Route::get('/view/video', 'AdminController@view_video')->name('admin.view.video');

    Route::post('/add/video', 'AdminController@add_video_process')->name('admin.save.video');

    Route::post('/save_video_payment/{id}', 'AdminController@save_video_payment')->name('admin.save.video-payment');

    Route::get('/delete/video/{id}', 'AdminController@delete_video')->name('admin.delete.video');

    Route::get('/video/approve/{id}', 'AdminController@approve_video')->name('admin.video.approve');

    Route::get('/video/publish-video/{id}', 'AdminController@publish_video')->name('admin.video.publish-video');

    Route::get('/video/decline/{id}', 'AdminController@decline_video')->name('admin.video.decline');


    //MOVIE



    Route::get('/add/movie', 'AdminController@add_movie')->name('admin.add.movie');
    Route::post('/add/movie', 'AdminController@add_movie_process')->name('admin.save.movie');
    Route::post('edit-movie/update-movie', 'AdminController@updateMovie')->name('admin.update.movie');

    Route::post('movie-upload-image', ['as' => 'movie-upload-images', 'uses' =>'AdminController@postUpload']);
    Route::post('add/movie-upload-image/delete', ['as' => 'movie-upload-remove', 'uses' =>'AdminController@deleteUpload']);
    Route::post('add/create-movie', ['as' => 'create-movie', 'uses' =>'AdminController@createMovie']);
    Route::post('delete-movie', ['as' => 'delete-movie', 'uses' =>'AdminController@deleteMovie']);
    Route::get('edit-movie/{id}', ['as' => 'edit-movie', 'uses' =>'AdminController@editMovie']);

    //episodes
    Route::get('/episodes', 'AdminController@episodes')->name('admin.episodes');
    Route::get('/add/episode', 'AdminController@addEpisode')->name('admin.add.episode');
    Route::get('/edit-season/{id}', 'AdminController@editEpisode')->name('admin.edit.episode');
    Route::get('/edit-seasons/{id}/{sid}', 'AdminController@editEpisodes')->name('admin.edit.episodes');
    Route::post('/add/episode', 'AdminController@addEpisodeProcess')->name('admin.save.episode');
    Route::post('/update/episode', 'AdminController@updateEpisode')->name('admin.updateone.episode');
    Route::post('edit-episode/update-episode', 'AdminController@updateEpisode')->name('admin.update.episode');
    Route::get('/delete-seasons/{id}', 'AdminController@deleteEpisode')->name('admin.delete-episode');
    Route::get('/edit-one-episode/{id}', 'AdminController@editOneEpisode')->name('admin.editOneEpisode');

    Route::post('episode-upload-image', ['as' => 'episode-upload-images', 'uses' =>'AdminController@postEpisodeUpload']);
    Route::post('add/episode-upload-image/delete', ['as' => 'episode-upload-remove', 'uses' =>'AdminController@deleteEpisodeUpload']);
    Route::post('add/create-episode', ['as' => 'create-episode', 'uses' =>'AdminController@createEpisode']);
    Route::post('delete-episode', ['as' => 'delete-episode', 'uses' =>'AdminController@deleteEpisode']);
    Route::get('edit-episode/{id}', ['as' => 'edit-episode', 'uses' =>'AdminController@editEpisode']);

    //category
    Route::post('add/create-category', ['as' => 'create-category', 'uses' =>'AdminController@createCategory']);
    Route::post('delete-category', ['as' => 'delete-category', 'uses' =>'AdminController@deleteCategory']);
    Route::get('edit-category/{id}', ['as' => 'edit-category', 'uses' =>'AdminController@editCategory']);
    Route::post('edit-category/update-category', 'AdminController@updateCategory')->name('admin.update.category');


    //actors
    Route::get('/actors', 'AdminController@actors')->name('admin.actors');
    Route::get('/add/actor', 'AdminController@add_actor')->name('admin.add.actor');
    Route::post('add/create-actor', ['as' => 'create-actor', 'uses' =>'AdminController@createActor']);
    Route::post('delete-actor', ['as' => 'delete-actor', 'uses' =>'AdminController@deleteActor']);
    Route::get('edit-actor/{id}', ['as' => 'edit-actor', 'uses' =>'AdminController@editActor']);
    Route::post('edit-actor/update-actor', 'AdminController@updateActor')->name('admin.update.actor');

    //directors
    Route::get('/directors', 'AdminController@directors')->name('admin.directors');
    Route::get('/add/director', 'AdminController@add_director')->name('admin.add.director');
    Route::post('add/create-director', ['as' => 'create-director', 'uses' =>'AdminController@createDirector']);
    Route::post('delete-director', ['as' => 'delete-director', 'uses' =>'AdminController@deleteDirector']);
    Route::get('edit-director/{id}', ['as' => 'edit-director', 'uses' =>'AdminController@editDirector']);
    Route::post('edit-director/update-director', 'AdminController@updateDirector')->name('admin.update.director');

    //langs
    Route::get('/langs', 'AdminController@langs')->name('admin.langs');
    Route::get('/add/lang', 'AdminController@add_lang')->name('admin.add.lang');
    Route::post('add/create-lang', ['as' => 'create-lang', 'uses' =>'AdminController@createLang']);
    Route::post('delete-lang', ['as' => 'delete-lang', 'uses' =>'AdminController@deleteLang']);
    Route::get('edit-lang/{id}', ['as' => 'edit-lang', 'uses' =>'AdminController@editLang']);
    Route::post('edit-lang/update-lang', 'AdminController@updateLang')->name('admin.update.lang');

    //payment plans
    Route::get('/payment-plans', 'AdminController@payPlans')->name('admin.pay-plans');
    Route::get('/add/payment-plan', 'AdminController@addPayPlan')->name('admin.add.pay-plan');
    Route::post('add/create-payment-plan', ['as' => 'create-payment-plan', 'uses' =>'AdminController@createPayPlan']);
    Route::post('delete-payment-plan', ['as' => 'delete-payment-plan', 'uses' =>'AdminController@deletePayPlan']);
    Route::get('edit-payment-plan/{id}', ['as' => 'edit-payment-plan', 'uses' =>'AdminController@editPayPlan']);
    Route::post('edit-payment-plan/update-payment-plan', 'AdminController@updatePayPlan')->name('admin.update.pay-plan');


    //producer agent
    Route::get('/producer-agents', 'AdminController@producerAgents')->name('admin.producer-agents');
    Route::get('/add/producer-agent', 'AdminController@addProducerAgent')->name('admin.add.producer-agent');
    Route::post('add/create-producer-agent', ['as' => 'create-producer-agent', 'uses' =>'AdminController@createProducerAgent']);
    Route::post('delete-producer-agent', ['as' => 'delete-producer-agent', 'uses' =>'AdminController@deleteProducerAgent']);
    Route::get('edit-producer-agent/{id}', ['as' => 'edit-producer-agent', 'uses' =>'AdminController@editProducerAgent']);
    Route::post('edit-producer-agent/update-producer-agent', 'AdminController@updateProducerAgent')->name('admin.update.producer-agent');

    //movie producer
    Route::get('/movie-producers', 'AdminController@movieProducers')->name('admin.movie-producers');
    Route::get('/add/movie-producer', 'AdminController@addMovieProducers')->name('admin.add.movie-producer');
    Route::post('add/create-movie-producer', ['as' => 'create-movie-producer', 'uses' =>'AdminController@createMovieProducer']);
    Route::post('delete-movie-producer', ['as' => 'delete-movie-producer', 'uses' =>'AdminController@deleteMovieProducer']);
    Route::get('edit-movie-producer/{id}', ['as' => 'edit-movie-producer', 'uses' =>'AdminController@editMovieProducer']);
    Route::post('edit-movie-producer/update-movie-producer', 'AdminController@updateMovieProducer')->name('admin.update.movie-producer');


    // Slider Videos

    Route::get('/slider/video/{id}', 'AdminController@slider_video')->name('admin.slider.video');

    // Banner Videos

    Route::get('/banner/videos', 'AdminController@banner_videos')->name('admin.banner.videos');

    Route::get('/add/banner/video', 'AdminController@add_banner_video')->name('admin.add.banner.video');

    Route::get('/change/banner/video/{id}', 'AdminController@change_banner_video')->name('admin.change.video');
    
    // User Payment details
    Route::get('user/payments' , 'AdminController@user_payments')->name('admin.user.payments');

    Route::get('user/video-payments' , 'AdminController@video_payments')->name('admin.user.video-payments');

    Route::get('/remove_payper_view/{id}', 'AdminController@remove_payper_view')->name('admin.remove_pay_per_view');

    // Settings

    Route::get('settings' , 'AdminController@settings')->name('admin.settings');

    Route::post('save_common_settings' , 'AdminController@save_common_settings')->name('admin.save.common-settings');

    Route::get('payment/settings' , 'AdminController@payment_settings')->name('admin.payment.settings');

    Route::get('theme/settings' , 'AdminController@theme_settings')->name('admin.theme.settings');
    
    Route::post('settings' , 'AdminController@settings_process')->name('admin.save.settings');

    Route::get('settings/email' , 'AdminController@email_settings')->name('admin.email.settings');

    Route::post('settings/email' , 'AdminController@email_settings_process')->name('admin.email.settings.save');

    Route::get('help' , 'AdminController@help')->name('admin.help');

    // Pages

    Route::get('/viewPage', array('as' => 'viewPages', 'uses' => 'AdminController@viewPages'));

    Route::get('/editPage/{id}', array('as' => 'editPage', 'uses' => 'AdminController@editPage'));

    Route::post('/editPage', array('as' => 'editPageProcess', 'uses' => 'AdminController@pagesProcess'));

    Route::get('/pages', array('as' => 'addPage', 'uses' => 'AdminController@add_page'));

    Route::post('/pages', array('as' => 'adminPagesProcess', 'uses' => 'AdminController@pagesProcess'));

    Route::get('/deletePage/{id}', array('as' => 'deletePage', 'uses' => 'AdminController@deletePage'));

    // Custom Push

    Route::get('/custom/push', 'AdminController@custom_push')->name('admin.push');

    Route::post('/custom/push', 'AdminController@custom_push_process')->name('admin.send.push');

});

Route::get('/', 'UserController@index')->name('user.dashboard');
Route::get('/tag/{id}', 'UserController@getVideosByTag');

Route::get('/single/{id}', 'UserController@single_video')->name('single-video');

Route::get('/user/searchall' , 'ApplicationController@search_video')->name('search');

Route::post('search' , 'UserController@searchAll')->name('search-all');
Route::get('search-data' , 'UserController@searchData')->name('search-data');

// Route::any('/user/search' , 'ApplicationController@search_all')->name('search-all');

// Categories and single video 

Route::get('categories', 'UserController@all_categories')->name('user.categories');
Route::get('videos/{id}', 'UserController@videosByType')->name('user.videotype');

Route::get('category/{id}', 'UserController@getVideosByCategory')->name('user.getVideosByCategory');

Route::get('subcategory/{id}', 'UserController@sub_category_videos')->name('user.sub-category');
//Route::get('category/{id}', 'UserController@category_videos')->name('user.category');

Route::get('genre/{id}', 'UserController@genre_videos')->name('user.genre');
Route::post('add-to-playlist', 'UserController@addToPlaylist')->name('user.add-to-playlist');

Route::post('vimeo-video-play', 'UserController@checkVideoPlays')->name('user.vimeo-video-play');
Route::post('get-episodes', 'UserController@getEpisodesBySeason')->name('user.get-episodes');



//Route::get('video/{id}', 'UserController@single_video')->name('user.single');

Route::get('newvideo/{id}', 'UserController@single_newvideo')->name('user.single'); // Added By Vishnu

//Route::get('videos/{id}', 'UserController@watchVideo')->name('user.singleVideo');
Route::get('video/{id}', 'UserController@watchVideo')->name('user.singleVideo');
Route::get('watch/{id}', 'UserController@ShowVideo')->name('user.show-video');
//Route::get('watch', 'UserController@watchVideo')->name('user.singleVideo');

Route::get('my-playlist', 'UserController@seeMyPlaylist')->name('user.playlist');

Route::post('like', 'LikeController@like')->name('like');
Route::post('unlike', 'LikeController@unLike')->name('unlike');
Route::post('send-commentsend-comment', 'CommentController@sendComment')->name('send-comment');


Route::get('vimeo', 'UserController@vimeoVideo');
Route::get('account', 'UserController@account')->name('user.account');

//Route::get('/stripe-pay', 'UserController@stripePay')->name('stripe-pay');
//Route::post('/stripe-pay-post', 'UserController@stripePayPost')->name('stripe-pay-post');

//payment plans

Route::get('user-reset-trial', 'UserController@resetTrial')->name('user.reset-trial');
Route::get('select-payment-plan/{id}', 'UserController@choosePayPlan')->name('user.choose-payplan');
Route::get('paypal-success-pay/{id}', 'UserController@successPayPalPay');

// Social Login

Route::post('/social', array('as' => 'SocialLogin' , 'uses' => 'SocialAuthController@redirect'));

Route::get('/callback/{provider}', 'SocialAuthController@callback');



Route::group([], function(){


    Route::get('login', 'Auth\AuthController@showLoginForm')->name('user.login.form');

    Route::post('login', 'Auth\AuthController@login')->name('user.login.post');

    Route::get('logout', 'Auth\AuthController@logout')->name('user.logout');

    // Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('user.register.form');


    Route::post('register', 'Auth\AuthController@register')->name('user.register.post');

    Route::get('confirm-email', 'Auth\AuthController@confirmEmailMsg')->name('user.confirm-email');
    Route::get('confirm-user-email', 'UserController@confirmEmailMsgPage')->name('user.confirm-user-email');
    Route::get('resend-email/{id}', 'Auth\AuthController@resendVerifyEmail')->name('user.resend-confirm-email');
    Route::get('welcome-email/{id?}', 'Auth\AuthController@welcomeEmail')->name('user.welcome-email');

    //PAYPAL ROUTES
    Route::get('create_paypal_plan', 'PaypalPlanController@create_plan');
    Route::get('/subscribe/paypal/plan/{id}', 'PaypalController@paypalRedirect')->name('paypal.redirect');
    Route::get('/subscribe/paypal/return', 'PaypalController@paypalReturn')->name('paypal.return');
    Route::get('/getplanlist', 'PaypalPlanController@getPlansList')->name('paypal.list');
    Route::get('/cancel-payment-plan', 'PaypalController@cancelPaymentPlan')->name('paypal.cancel-payment-plan');

    //STRIPE ROUTES
    Route::post('stripe/create/card', 'StripeController@createUserCard')->name('stripe.create-card');
    Route::get('stripe/cancel-payment-plan', 'StripeController@cancelSubscription')->name('stripe.cancel-payment-plan');

    Route::get('payment', 'UserController@payment')->name('user.userpayment');
    Route::get('getcustomer', 'StripeController@getCustomer')->name('stripe.getcustomer');

    //VIMEO ROUTES
    Route::get('vimeo/videos', 'VimeoController@getVideos');
    Route::get('vimeo/create-album', 'VimeoController@createAlbum');



    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');

    Route::post('password/reset', 'Auth\PasswordController@reset');
    Route::post('profile-update', 'UserController@updateProfile')->name('user.update-profile');
    Route::post('avatar-update', 'UserController@updateAvatar')->name('user.update-avatar');
    Route::post('password-update-new', 'UserController@updatePassword')->name('user.update-password');

//    Route::get('profile', 'UserController@profile')->name('user.profile');
//
//    Route::get('update/profile', 'UserController@update_profile')->name('user.update.profile');
//
//    Route::post('update/profile', 'UserController@profile_save')->name('user.profile.save');

    Route::get('/profile/password', 'UserController@profile_change_password')->name('user.change.password');

    Route::post('/profile/password', 'UserController@profile_save_password')->name('user.profile.password');

    // Delete Account

    Route::get('/delete/account', 'UserController@delete_account')->name('user.delete.account');

    Route::post('/delete/account', 'UserController@delete_account_process')->name('user.delete.account.process');


    Route::get('history', 'UserController@history')->name('user.history');

    Route::get('deleteHistory', 'UserController@delete_history')->name('user.delete.history');

    Route::post('addHistory', 'UserController@add_history')->name('user.add.history');

    // Report Spam Video

    Route::post('markSpamVideo', 'UserController@save_report_video')->name('user.add.spam_video');

    Route::get('unMarkSpamVideo/{id}', 'UserController@remove_report_video')->name('user.remove.report_video');

    Route::get('spamVideos', 'UserController@spam_videos')->name('user.spam-videos');

    Route::get('pay-per-videos', 'UserController@payper_videos')->name('user.pay-per-videos');

    // Wishlist

    Route::post('addWishlist', 'UserController@add_wishlist')->name('user.add.wishlist');

    Route::get('deleteWishlist', 'UserController@delete_wishlist')->name('user.delete.wishlist');

    Route::get('wishlist', 'UserController@wishlist')->name('user.wishlist');

    // Comments

    Route::post('addComment', 'UserController@add_comment')->name('user.add.comment');

    Route::get('comments', 'UserController@comments')->name('user.comments');
    
    // Paypal Payment
    Route::get('/paypal/{id}','PaypalController@pay')->name('paypal');

    Route::get('/user/payment/status','PaypalController@getPaymentStatus')->name('paypalstatus');

    Route::get('/videoPaypal/{id}','PaypalController@videoSubscriptionPay')->name('videoPaypal');

    Route::get('/user/payment/video-status','PaypalController@getVideoPaymentStatus')->name('videoPaypalstatus');

    Route::get('/trending', 'UserController@trending')->name('user.trending');


    Route::get('/new-videos', 'UserController@newVideos');

});


Route::group(['prefix' => 'moderator'], function(){

    Route::get('login', 'Auth\ModeratorAuthController@showLoginForm')->name('moderator.login');

    Route::post('login', 'Auth\ModeratorAuthController@login')->name('moderator.login.post');

    Route::get('logout', 'Auth\ModeratorAuthController@logout')->name('moderator.logout');

    // Registration Routes...
    Route::get('register', 'Auth\ModeratorAuthController@showRegistrationForm');

    Route::post('register', 'Auth\ModeratorAuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\ModeratorPasswordController@showResetForm');

    Route::post('password/email', 'Auth\ModeratorPasswordController@sendResetLinkEmail');

    Route::post('password/reset', 'Auth\ModeratorPasswordController@reset');

    Route::get('/', 'ModeratorController@dashboard')->name('moderator.dashboard');


    Route::get('/profile', 'ModeratorController@profile')->name('moderator.profile');

	Route::post('/profile/save', 'ModeratorController@profile_process')->name('moderator.save.profile');

	Route::post('/change/password', 'ModeratorController@change_password')->name('moderator.change.password');


    // Categories

    Route::get('/categories', 'ModeratorController@categories')->name('moderator.categories');

    Route::get('/add/category', 'ModeratorController@add_category')->name('moderator.add.category');

    Route::get('/edit/category/{id}', 'ModeratorController@edit_category')->name('moderator.edit.category');

    Route::post('/add/category', 'ModeratorController@add_category_process')->name('moderator.save.category');

    Route::get('/delete/category', 'ModeratorController@delete_category')->name('moderator.delete.category');

    Route::get('/view/category/{id}', 'ModeratorController@view_category')->name('moderator.view.category');

    // Admin Sub Categories

    Route::get('/subCategories/{category}', 'ModeratorController@sub_categories')->name('moderator.sub_categories');

    Route::get('/add/subCategory/{category}', 'ModeratorController@add_sub_category')->name('moderator.add.sub_category');

    Route::get('/edit/subCategory/{category_id}/{sub_category_id}', 'ModeratorController@edit_sub_category')->name('moderator.edit.sub_category');

    Route::post('/add/subCategory', 'ModeratorController@add_sub_category_process')->name('moderator.save.sub_category');

    Route::get('/delete/subCategory/{id}', 'ModeratorController@delete_sub_category')->name('moderator.delete.sub_category');

    // Genre

    Route::post('/save/genre' , 'ModeratorController@save_genre')->name('moderator.save.genre');

    Route::get('/delete/genre/{id}', 'ModeratorController@delete_genre')->name('moderator.delete.genre');

    // Videos

    Route::get('/videos', 'ModeratorController@videos')->name('moderator.videos');

    Route::get('/add/video', 'ModeratorController@add_video')->name('moderator.add.video');

    Route::get('/edit/video/{id}', 'ModeratorController@edit_video')->name('moderator.edit.video');

    Route::post('/edit/video', 'ModeratorController@edit_video_process')->name('moderator.save.edit.video');

    Route::get('/view/video', 'ModeratorController@view_video')->name('moderator.view.video');

    Route::post('/add/video', 'ModeratorController@add_video_process')->name('moderator.save.video');

    Route::get('/delete/video', 'ModeratorController@delete_video')->name('moderator.delete.video');

});


Route::group(['prefix' => 'userApi'], function(){

    Route::post('/register','UserApiController@register');
    
    Route::post('/login','UserApiController@login');

    Route::get('/userDetails','UserApiController@user_details');

    Route::get('/userDetails','UserApiController@user_details');

    Route::post('/updateProfile', 'UserApiController@update_profile');

    Route::post('/forgotpassword', 'UserApiController@forgot_password');

    Route::post('/changePassword', 'UserApiController@change_password');

    Route::get('/tokenRenew', 'UserApiController@token_renew');

    Route::post('/deleteAccount', 'UserApiController@delete_account');

    Route::post('/settings', 'UserApiController@settings');


    // Categories And SubCategories

    Route::post('/categories' , 'UserApiController@get_categories');

    Route::post('/subCategories' , 'UserApiController@get_sub_categories');


    // Videos and home

    Route::post('/home' , 'UserApiController@home');
    
    Route::post('/common' , 'UserApiController@common');

    Route::post('/categoryVideos' , 'UserApiController@get_category_videos');

    Route::post('/subCategoryVideos' , 'UserApiController@get_sub_category_videos');

    Route::post('/singleVideo' , 'UserApiController@single_video');

    Route::post('/searchVideo' , 'UserApiController@search_video')->name('search-video');

    Route::post('/test_search_video' , 'UserApiController@test_search_video');


    // Rating and Reviews

    Route::post('/userRating', 'UserApiController@user_rating');

    // Wish List

    Route::post('/addWishlist', 'UserApiController@add_wishlist');

    Route::post('/getWishlist', 'UserApiController@get_wishlist');

    Route::post('/deleteWishlist', 'UserApiController@delete_wishlist');

    // History

    Route::post('/addHistory', 'UserApiController@add_history');

    Route::post('getHistory', 'UserApiController@get_history');

    Route::post('/deleteHistory', 'UserApiController@delete_history');

    Route::get('/clearHistory', 'UserApiController@clear_history');

    // 


});
