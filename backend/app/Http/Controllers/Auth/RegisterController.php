<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    public function __invoke(RegistrationRequest $request)
    {
        try
        {

            $user                   = User::create($request->getSanitized());
            $role                   = Role::firstOrCreate(
                                    ['name'         => 'Customer'],
                                    ['guard_name'   => 'api']);
            $user->assignRole($role);
            $defaultPermissions     = $permissions = Permission::where('name', '=', 'dashboard')
                ->orWhere('name', '=', 'task-create')
                ->orWhere('name', '=', 'task-edit')
                ->orWhere('name', '=', 'task-delete')
                ->pluck('name');

            foreach ($defaultPermissions as $permission)
            {
                $permissionModel    = Permission::firstOrCreate(
                                        ['name'         => $permission],
                                        ['guard_name'   => 'api']);
                $role->givePermissionTo($permissionModel);
            }
            $token                  = JWTAuth::fromUser($user);
            $user_data              = new UserResource($user);
            return response()->json([
                'message'           => 'User registered successfully',
                //'user'              => $user_data,
                'token'             => $token
            ], 201);

        } catch (\Exception $e)
        {
            return response()->json([
                'message'           => 'Registration failed. Please check your input data.',
                'error'             => $e->getMessage()
            ], 500);
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e)
        {
            return response()->json([
                'message'           => 'Registration failed. Please check your input data.',
                'error'             => $e->getMessage()
            ], 404);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return response()->json([
                'message'           => 'Registration failed. Please check your input data.',
                'error'             => $e->getMessage()
            ], 404);
        }
    }
}

