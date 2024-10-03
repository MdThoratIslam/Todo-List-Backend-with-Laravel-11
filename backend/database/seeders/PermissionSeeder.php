<?php

namespace Database\Seeders;

use Database\Factories\PermissionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // how to permission factory
        $permissionFactory = new PermissionFactory();
        $permissionFactory->definition();
        foreach ($permissionFactory->definition() as $row)
        {
            Permission::create($row);
        }
    }
}
