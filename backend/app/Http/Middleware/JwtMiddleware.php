<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if (!$token)
        {
            // No token was provided
            return response()->json(['error' => 'Token not provided'], 401);
        }
        $decodedToken = $this->decodeJwtToken($token);
        if (!$decodedToken)
        {
            return response()->json(['error' => 'Invalid token'], 401);
        }
        $request->user()->permissions = $decodedToken->user_role->permissions ?? [];

        return $next($request);
    }
    protected function decodeJwtToken($token)
    {
        $key = env('JWT_SECRET'); // Get JWT secret key from environment
        try {
            return JWT::decode($token, $key, ['HS256']);
        } catch (\Exception $e) {
            return null;
        }
    }
}
