<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if(!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        // check has session token

        // check token
        if(!Hash::check($token . 'Zxcv!1234', session()->get('token'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
