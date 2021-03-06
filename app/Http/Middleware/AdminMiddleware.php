<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
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
        if(Auth::user()->user_type != 0 && Auth::user()->user_type != 1)
        {
            abort(403, 'Unauthorized action');
        }

        return $next($request);
    }
    
}
