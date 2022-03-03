<?php

namespace App\Http\Middleware;

use Closure;

class CustomAuth
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
        
        if(session()->has('loggedin')&&($request->path()=='login')){
            return redirect('dashboard');
        }
        if(!session()->has('loggedin') && ($request->path()=='dashboard')){
            return redirect('login');         
        }
        return $next($request);
    }
}
