<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Route;


class Rbac
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
//        $route = Route::current()->uri();
//        $uid=Auth::user()->id;
//        $user = User::find($uid);
//            if (!$user->can($route)){
//                return back();
//            }
        return $next($request);
    }
}
