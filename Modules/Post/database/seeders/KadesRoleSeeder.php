<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class KadesRoleSeeder extends Seeder
{
    public function run()
    {
        // Check if role exists, if not create it
        $role = Role::firstOrCreate(['name' => 'kades', 'guard_name' => 'web']);

        // Assign permissions if needed (e.g. view_backend)
        // Assign permissions
        $role->givePermissionTo([
            'view_backend',
            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',
            'restore_posts',
        ]);
    }
}
