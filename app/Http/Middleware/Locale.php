<?php

namespace App\Http\Middleware;

use App\UserPlaylist;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class Locale
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
        if(Auth::check()) {
            $videoCount = $this->videoCount();
            View::share('videoCount', $videoCount);
        }
        $raw_locale = Cookie::get('locale');     # if user was on website
        //dd($raw_locale);
        if (in_array($raw_locale, Config::get('app.locales'))) {  # check locales
            $locale = $raw_locale;
        }                                                         # set $locale.
        else $locale = Config::get('app.locale');                 # set default lang

        App::setLocale($locale);                                  # Set app locale

        return $next($request);
    }

    public function videoCount()
    {
        $playlist = UserPlaylist::where('user_id', Auth::id())->get();
        switch (Auth::user()->paymentPlans[0]->flag) {
            case 1:
                return $result = 5 - count($playlist);
                break;
            case 2:
                return $result = 0;
                break;
            case 3:
                return $result = 'unlimited';
                break;
            default:
                return $result = null;
        }
    }
}
