<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        try {
            // Attempt to authenticate the user and retrieve the token
            if (!$token = JWTAuth::attempt($request->only('email', 'password')))
            {
                return response()->json(['message' => 'Invalid login details'], 401);
            }
            $user = auth()->user();
            return response()->json([
                'message' => 'User logged in successfully',
                'user' => $user,
                'token' => $token
            ], 200);

        } catch (\Exception $e) {
            // Catch any exceptions and return an error response
            return response()->json([
                'message' => $e->getMessage(),
                'error' => 'Failed to login'
            ], 500);
        }
    }
}
