<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'view employees']);
        Permission::create(['name' => 'view job roles']);
        Permission::create(['name' => 'view patients']);
        Permission::create(['name' => 'view ubs']);
        Permission::create(['name' => 'view users']);

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo('view employees');
        $role->givePermissionTo('view job roles');
        $role->givePermissionTo('view patients');
        $role->givePermissionTo('view ubs');

        $role = Role::create(['name' => 'Ubs']);
        $role->givePermissionTo('view job roles');
        $role->givePermissionTo('view patients');
        $role->givePermissionTo('view ubs');
        $role->givePermissionTo('view users');
    }
}
