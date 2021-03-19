<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            if(\auth()->user()->role_id == 1 || \auth()->user()->role_id==2 || \auth()->user()->role_id==3){
                return $next($request);
            }else{
                return redirect()->route('dangnhap.dangnhap');
            }

        }else {
            return redirect()->route('dangnhap.dangnhap');
        }

    }
}
