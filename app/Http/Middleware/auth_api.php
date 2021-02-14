<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class auth_api
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
        $token = $request->api_token;

        if(!$token) {
            return response()->json(['error' => 'Access denied!'], 401);
        } elseif(!User::where('remember_token', $token)->first()) {
            return response()->json(['error' => 'Access denied!'], 401);
        }


        return $next($request);
    }
}
