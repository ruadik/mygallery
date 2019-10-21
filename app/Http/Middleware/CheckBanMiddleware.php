<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBanMiddleware
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

      if(Auth::check() && Auth::user()->status == 0 || Auth::check() && Auth::user()->role_id == 2)
        {
            return $next($request);
        }else {
            Auth::logout();
            return redirect()->route('FrontHome')->with('status', 'Ваша учетная запись забанена! Обратитесь к администратору!');
        }
    }
}
