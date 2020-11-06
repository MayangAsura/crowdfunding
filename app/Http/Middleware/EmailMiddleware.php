<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class EmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        $user = auth()->user();
        // dd(auth()->user());
        if($user->email_verified_at != null){
            return $next($request);
        }
        // abort(403);
        else{
            return response()->json([
                'message' => 'Email Belum terverifikasi'
            ]);   
        }
        
    }
}
