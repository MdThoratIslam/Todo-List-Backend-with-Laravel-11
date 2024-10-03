<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // =============================== Dashboard Permission =========================================
            [
                'name'         => 'dashboard',
                'guard_name'   => 'api'
            ],
            // ================================================================================================
            // =============================== Role Permission ==============================================
            [
                'name'         => 'role-create',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'role-edit',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'role-delete',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'role-view',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'role-list',
                'guard_name'   => 'api'
            ],
            // ================================================================================================
            // =============================== Task Permission ==============================================
            [
                'name'         => 'task-create',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'task-edit',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'task-delete',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'task-view',
                'guard_name'   => 'api'
            ],
            [
                'name'         => 'task-list',
                'guard_name'   => 'api'
            ],
        ];
    }
}
