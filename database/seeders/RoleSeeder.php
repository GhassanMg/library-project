<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin permissions
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'view user info']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'assign book to user']);
        Permission::create(['name' => 'view user books']);

        Permission::create(['name' => 'edit book']);
        Permission::create(['name' => 'delete book']);
        Permission::create(['name' => 'view all books']);

        //user permissions
        Permission::create(['name' => 'show books']);

        //Default Roles
        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'add user',
                'edit user',
                'view user info',
                'delete user',
                'assign book to user',
                'view user books',
                'edit book',
                'delete book',
                'view all books',
            ]);

        Role::create(['name' => 'user'])
            ->givePermissionTo([
                'show books',
            ]);
    }
}
