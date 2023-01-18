<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCredential
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->rola != 1){
            return redirect()->route('technican.home');
        }
        if(Auth::user()->status!='potwierdzone' && Auth::user()->status!='Potwierdzone'){
            Auth::logout();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
