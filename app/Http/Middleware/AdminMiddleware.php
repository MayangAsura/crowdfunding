<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        // if(Auth::user()->isAdmin()){
        // dd(auth()->user());
        if($request->user()->isAdmin()){
            // dd($request->user());
            return $next($request);
        }
        // dd(Auth::user());
        abort(403);
        
    }
}
