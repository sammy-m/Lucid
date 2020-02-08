<?php

namespace App\Http\Middleware;

use Closure;

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
    {
        //check if the user is a consultant
        //return $next($request);
        if(auth()->user()->role == 2){

            return $next($request);
            
            }
            
            return redirect('consultant/dashboard')->with('error',"ERR: InValid ReQUESt!");
            
    }
}
