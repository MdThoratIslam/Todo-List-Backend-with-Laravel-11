<?php
namespace Database\Seeders;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);

        // User::factory(10)->create();

        $usersData = (new UserFactory())->definition();
        foreach ($usersData as $uData)
        {
            $user = User::create([
                'name'              => $uData['name'],
                'email'             => $uData['email'],
                'phone'             => $uData['phone'],
                'email_verified_at' => $uData['email_verified_at'],
                'password'          => bcrypt($uData['password']),
                'remember_token'    => $uData['remember_token'],
                'status_active'     => 1,
                'is_delete'         => 0,
                'created_at'        => now(),
                'updated_at'        => null,
                'role'              => $uData['role'],
            ]);

            // Use firstOrCreate to avoid duplicate roles
            $role = Role::firstOrCreate(['name' => $uData['role']]);
            $user->assignRole($role);
            $userFactory = new UserFactory();
            $withPermissions = $userFactory->withPermissions($uData['role']);
            $role->syncPermissions($withPermissions['permissions']);
        }
    }
}
