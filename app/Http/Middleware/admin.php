<?php

namespace App\Http\Middleware;

use Closure;

class admin
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
        //return $next($request);

        if(auth()->user()->role == 1){

            return $next($request);
            
            }
            
            return redirect('manage/dashboard')->with('error',"ERR: InValid ReQUESt!");
            
            
    }
}
