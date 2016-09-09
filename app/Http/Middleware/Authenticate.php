<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class Authenticate
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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                if($guard=='admin')
                    return redirect()->guest('admin\login');
                else
                    return redirect()->guest('login');
            }
        }
        //用户是否锁定
        if(!$guard&&Auth::user()->is_lock){
            return redirect()->guest('lock_fail');
        }
        //用户是否激活
        if(!$guard&&!Auth::user()->is_pass){
            return redirect()->guest('pass_fail');
        }

        return $next($request);
    }
}
