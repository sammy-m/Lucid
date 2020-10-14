<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class consultant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {/*
        //check if the user is a consultant
        //return $next($request);
        if(Auth::check()){
        if(auth()->user()->role == 2){

            return $next($request);
            
            }
            
           // return redirect('/')->with('error',"ERR: InValid ReQUESt!");
        }
        return redirect('/consultant/auth')->with('error', 'please reauthenticate');*/
        if(auth()->user()->role == 2){

            return $next($request);
            
            }
            
            return redirect('/home')->with('error',"ERR: InValid ReQUESt!");
            
    }
}
