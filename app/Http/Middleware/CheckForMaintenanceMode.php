<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Foundation\Application;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpKernel\Exception\HttpException;


class CheckForMaintenanceMode
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check() || $request->is('social') || $request->is('callback/*') || $request->is('/')) {
            return $next($request);
        }
        throw new HttpException(503);

        //return response()->view('comingsoon');
    }
}
