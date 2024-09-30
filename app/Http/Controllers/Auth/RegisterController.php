<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
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
            return response()->json([
                'message'       => 'User registered successfully',
                'user'          => $user
            ], 201);
        } catch (\Exception $e)
        {
            // Return error response if an exception occurs
            return response()->json([
                'message'       => $e->getMessage(),
                'error'         => 'Failed to register user'
            ], 500);
        }
        catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e)
        {
            // Return error response if an exception occurs
            return response()->json([
                'message'       => $e->getMessage(),
                'error'         => 'Failed to register user'
            ], 404);
        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            // Return error response if an exception occurs
            return response()->json([
                'message'       => $e->getMessage(),
                'error'         => 'Failed to register user'
            ], 404);
        }
    }
}
