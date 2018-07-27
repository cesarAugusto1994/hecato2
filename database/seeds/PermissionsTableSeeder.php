<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Users')->first() === null) {
            Permission::create([
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Users')->first() === null) {
            Permission::create([
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Users')->first() === null) {
            Permission::create([
                'name'        => 'Can Edit Users',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Users')->first() === null) {
            Permission::create([
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can View Agenda')->first() === null) {
            Permission::create([
                'name'        => 'Can View Agenda',
                'slug'        => 'view.agenda',
                'description' => 'Can view agenda',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Agenda')->first() === null) {
            Permission::create([
                'name'        => 'Can Create Agenda',
                'slug'        => 'create.agenda',
                'description' => 'Can create new agenda',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Agenda')->first() === null) {
            Permission::create([
                'name'        => 'Can Edit Agenda',
                'slug'        => 'edit.agenda',
                'description' => 'Can edit agenda',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Agenda')->first() === null) {
            Permission::create([
                'name'        => 'Can Delete Agenda',
                'slug'        => 'delete.agenda',
                'description' => 'Can delete agenda',
                'model'       => 'Permission',
            ]);
        }


        if (Permission::where('name', '=', 'Can View Contato')->first() === null) {
            Permission::create([
                'name'        => 'Can View Contato',
                'slug'        => 'view.contato',
                'description' => 'Can view contato',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Contato')->first() === null) {
            Permission::create([
                'name'        => 'Can Create Contato',
                'slug'        => 'create.contato',
                'description' => 'Can create new contato',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Contato')->first() === null) {
            Permission::create([
                'name'        => 'Can Edit Contato',
                'slug'        => 'edit.contato',
                'description' => 'Can edit contato',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Contato')->first() === null) {
            Permission::create([
                'name'        => 'Can Delete Contato',
                'slug'        => 'delete.contato',
                'description' => 'Can delete contato',
                'model'       => 'Permission',
            ]);
        }
    }
}
