# Todo List Backend with Laravel

This project provides a backend API for a Todo List application built using the Laravel framework.

# create a new repository on the command line

### echo "# Todo-List-Backend-with-Laravel-11" >> README.md
```bash
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/MdThoratIslam/Todo-List-Backend-with-Laravel-11.git
git push -u origin main

…or push an existing repository from the command line

git remote add origin https://github.com/MdThoratIslam/Todo-List-Backend-with-Laravel-11.git
git branch -M main
git push -u origin main
```
## Prerequisites

Before starting, ensure you have the following installed:

- PHP (>= 8.0)
- Composer
- MySQL or any other supported database
- Laravel CLI

## Installation

### 1. Create a New Laravel Project

```bash
composer create-project laravel/laravel example-app
cd example-app
```
### 2. Env file database Configration
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_backend_api_task
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate 
php artisan serve --host=192.168.1.77 --port=8080
```


### 3. Make Model and also related all file create
```bash
php artisan make:model Task/Task --all
```

### 4. Route Folder make api file create

Laravel version 11 api.php amke a command use and also install auth:sanctum

```bash
php artisan install:api
```

### 5. Login Controller Make

Make Login Controller and also make login request validation file 

```bash
php artisan make:request Login/LoginRequest
```
<pre>
namespace App\Http\Requests\Auth;
use Illuminate\Foundation\Http\FormRequest;
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email', 'string', 'max:255', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }
}
</pre>

```bash
php artisan make:controller Auth/LoginController -i
```
<pre>
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
            // Retrieve the authenticated user
            $user = auth()->user();
            //$token = $user->createToken('auth_token')->plainTextToken;
            $token = $user->createToken('auth_token')->plainTextToken;
            // Return success response with user details and token
            return response()->json([
                'message' => 'User logged in successfully',
                'user' => $user,
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
</pre>
