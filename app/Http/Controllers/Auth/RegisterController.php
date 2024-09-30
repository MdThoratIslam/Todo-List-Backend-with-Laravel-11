<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegistrationRequest $request)
    {
        try {
            $user               = User::create($request->getSanitized());
            $user_data          = new UserResource($user);
            $token              = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message'       => 'User registered successfully',
                'user'          =>  $user_data,
                'token'         => $token
            ], 201);
        } catch (\Exception $e)
        {
            // Return error response if an exception occurs
            return response()->json([
                'message'       => $e->getMessage(),
                'error'         => 'Failed to register User'
            ], 500);
        }
        catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e)
        {
            // Return error response if an exception occurs
            return response()->json([
                'message'       => $e->getMessage(),
                'error'         => 'Failed to register User'
            ], 404);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Return error response if an exception occurs
            return response()->json([
                'message'       => $e->getMessage(),
                'error'         => 'Failed to register User'
            ], 404);
        }
    }
}
