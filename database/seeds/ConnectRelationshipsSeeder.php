<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Get Available Permissions.
         */
        $permissions = Permission::all();

        $roleOwner = Role::where('name', '=', 'Owner')->first();
        foreach ($permissions as $permission) {
            $roleOwner->attachPermission($permission);
        }

        /**
         * Attach Permissions to Roles.
         */
        $roleAdmin = Role::where('name', '=', 'Admin')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }
    }
}
