<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;

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
        $raw_locale = Cookie::get('locale');     # if user was on website
        //dd($raw_locale);
        if (in_array($raw_locale, Config::get('app.locales'))) {  # check locales
            $locale = $raw_locale;
        }                                                         # set $locale.
        else $locale = Config::get('app.locale');                 # set default lang

        App::setLocale($locale);                                  # Set app locale

        return $next($request);
    }
}
