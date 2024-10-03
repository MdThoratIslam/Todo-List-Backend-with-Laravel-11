<?php

namespace App\Providers;

use App\Models\Task\Task;
use App\Policies\Task\TaskPolicy;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Define default API token permissions in Jetstream
        Jetstream::defaultApiTokenPermissions(['read']);
        // Define available permissions in Jetstream (for API token usage)
//        Jetstream::permissions([
//            'dashboard',
//            'role-create',
//            'role-edit',
//            'role-delete',
//            'role-view',
//            'role-list',
//            'task-create',
//            'task-edit',
//            'task-delete',
//            'task-view',
//            'task-list',
//        ]);

        // Use Spatie Permission to create roles and assign permissions
        // Super Admin Role
//        $superAdminRole = Role::findOrCreate('Super Admin', 'api');  // Ensure role is created for 'api' guard
//        $superAdminRole->syncPermissions([
//            'dashboard',
//            'role-create',
//            'role-edit',
//            'role-delete',
//            'role-view',
//            'role-list',
//            'task-create',
//            'task-edit',
//            'task-delete',
//            'task-view',
//            'task-list',
//        ]);
//
//        // Admin Role
//        $adminRole = Role::findOrCreate('Admin', 'api');  // Ensure role is created for 'api' guard
//        $adminRole->syncPermissions([
//            'dashboard',
//            'role-create',
//            'role-edit',
//            'role-delete',
//            'role-view',
//            'role-list',
//            'task-create',
//            'task-edit',
//            'task-delete',
//            'task-view',
//            'task-list',
//        ]);
    }
}
