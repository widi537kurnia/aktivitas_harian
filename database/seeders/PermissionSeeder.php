<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::updateOrCreate([
            'name'  => 'admin',
        ],
        ['name' => 'admin']
        );
        $role_writer = Role::updateOrCreate([
            'name'  => 'writer',
        ],
        ['name' => 'writer']
        );
        $role_guest = Role::updateOrCreate([
            'name'  => 'guest',
        ],
        ['name' => 'guest']
        );
        $permission = Permission::updateOrCreate([
            'name'  => 'view_dashboard',
        ],
        ['name' => 'view_dashboard']
        );

        $role_admin->givePermissionTo($permission);
    }
}
