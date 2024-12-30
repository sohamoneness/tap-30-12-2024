<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateOnlyIfLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        dd(auth()->guard('web')->check());
        if (!auth()->guard('web')->check()) {
           $url = route('front.user.login');
           return redirect($url);
        }else{
            return $next($request);
    
        }
    }
}
