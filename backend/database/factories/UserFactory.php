<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * {
     * "name" : "Test",
     * "email":"test1@example.com",
     * "password":"password",
     * "password_confirmation":"password"
     * }
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'name'              => "Super Admin",
                'email'             => "superadmin@gmail.com",
                'phone'             => '+8801313131313',
                'email_verified_at' => now(),
                'password'          => 'zXx;X}h}H7xU',
                'remember_token'    => Str::random(10),
                'role'              => 'Super Admin',
            ],
            [
                'name'              => "Admin",
                'email'             => "admin@gmail.com",
                'phone'             => '+8801878469349',
                'email_verified_at' => now(),
                'password'          => '123456789',
                'remember_token'    => Str::random(10),
                'role'              => 'Admin',
            ]
        ];
    }
    public function withPermissions($role)
    {
        $permissions = [];
        switch ($role)
        {
            case 'Super Admin':
                $permissions = Permission::all()->pluck('name');
                break;
            case 'Admin':
                $permissions = Permission::where('name', '=', 'dashboard')
                    ->orWhere('name', '=', 'task-create')
                    ->orWhere('name', '=', 'task-edit')
                    ->orWhere('name', '=', 'task-delete')
                    ->pluck('name');
                break;
            default:
                $permissions = [];
                break;

        }
        return ['permissions' => $permissions];
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
