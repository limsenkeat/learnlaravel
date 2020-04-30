<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        
        $user = Auth::user();

        //if not role not admin, redirect to home page
        if(!$user->isAdmin()){
            return redirect('/');
        }
        
        //else process next request
        return $next($request);
    }
}
