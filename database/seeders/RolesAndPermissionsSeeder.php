<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

        ];

        $roles = [
            'Developer',
            'Moderator',
            'Admin',
            'Super Admin'
        ];

        $rolesHasPermissions = [
            // Example
            // 'Developer' => [
            //     'create users',
            //     'delete users',
            // ]
        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        foreach($roles as $role)
        {
            Role::create(['name' => $role]);
        }

        foreach($rolesHasPermissions as $role => $permissions)
        {
            Role::where(['name' => $role])->first()->syncPermissions($permissions);
        }
    }
}
