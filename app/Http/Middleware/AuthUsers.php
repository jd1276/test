<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Closure;

class AuthUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if (Auth::guard()->check()) {
            return redirect('/user-dashboard');
        }

        return $next($request);
    }
}
