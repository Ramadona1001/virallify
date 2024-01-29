<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

//    public function handle(Request $request, Closure $next, ...$guards)
//    {
//        $guards = empty($guards) ? [null] : $guards;
//
//        if (Auth::guard('vendor')->check()) {
//            return redirect('/vendor-dashboard');
//        }
//        elseif (Auth::guard('employee')->check()) {
//            return redirect('/');
//        }elseif (Auth::guard('web')->check()){
//            return redirect('/');
//        }
//
//        foreach ($guards as $guard) {
//            if (Auth::guard($guard)->check()) {
//                return redirect(RouteServiceProvider::HOME);
//            }
//        }
//
//        return $next($request);
//    }


    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }



}
