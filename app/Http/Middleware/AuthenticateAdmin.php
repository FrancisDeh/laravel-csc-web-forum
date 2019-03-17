<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    
        if (Auth::guard($guard)->guest() || Auth::user()->role==0) {
             if ($request->ajax()) {
               return response('Unauthorized, ', 401);
             }
             else {
               return redirect()->route('home');
             }
         }
        return $next($request);
    }
}
