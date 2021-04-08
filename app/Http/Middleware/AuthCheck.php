<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(Str::contains($request->url(),'login')){
            return $next($request);
        }
        $token = $request->header('_token');         
        $user = ($token?User::where('api_token',$token)->first()->id:''); 
        
        if(!$user){            
            return response()->json(['message'=>'Your Not authorized'],401);
        }
        return $next($request);
    }
}
