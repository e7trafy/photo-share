<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;
use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next, $role = null, $permission = null)
    {

        if (Auth::check()) {
            if (isset($role)) {

                if (Auth::user()->hasRole($role)) {
                    return $next($request);
                }
            }else{

                $currentName = Request::route()->getName();
//
                if (Auth::user()->hasPermissionTo($currentName) || Auth::user()->id == 1) {

                    return $next($request);
                } else {
                    dump('else ');
                    return redirect(\route('login'));

//
                }
            }

        }

        return redirect(\route('login'));

//        return $next($request);
    }
}
