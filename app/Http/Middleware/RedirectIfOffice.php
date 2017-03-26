<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;



class RedirectIfOffice
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if (Auth::guard('office')->check() || Auth::guard('user')->check())
//            return $next($request);
//        return redirect()->guest('login');

        if (Auth::guard('office')->check())
            return $next($request);
        return redirect()->guest('office');

    }
}
