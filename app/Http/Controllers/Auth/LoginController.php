<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        try {
            if (!auth()->attempt($request->only('email', 'password')))
            {
                return response()->json(['message' => 'Invalid login details'], 401);
            }
            // Retrieve the authenticated User
            $user = auth()->user();
            //$token = $User->createToken('auth_token')->plainTextToken;
            $token = $user->createToken('auth_token')->plainTextToken;
            // Return success response with User details and token
            return response()->json([
                'message' => 'User logged in successfully',
                'User' => $user,
                'token' => $token
            ], 200);
        } catch (\Exception $e)

        {
            // Return error response if an exception occurs
            return response()->json([
                'message' => $e->getMessage(),
                'error' => 'Failed to login'
            ], 500);
        }
    }
}
