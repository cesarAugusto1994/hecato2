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
        /*if (Permission::where('slug', '=', 'view.users')->first() === null) {
            Permission::create([
                'name'        => 'Visualizar Usuários',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'App\User',
            ]);
        }

        if (Permission::where('slug', '=', 'create.users')->first() === null) {
            Permission::create([
                'name'        => 'Criar Usuários',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'App\User',
            ]);
        }

        if (Permission::where('slug', '=', 'edit.users')->first() === null) {
            Permission::create([
                'name'        => 'Editar Usuários',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'App\User',
            ]);
        }

        if (Permission::where('slug', '=', 'delete.users')->first() === null) {
            Permission::create([
                'name'        => 'Deletar Usuários',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'App\User',
            ]);
        }*/

        if (Permission::where('slug', '=', 'view.agenda')->first() === null) {
            Permission::create([
                'name'        => 'Visualizar Agenda',
                'slug'        => 'view.agenda',
                'description' => 'Can view agenda',
                'model'       => 'App\Models\Schedule',
            ]);
        }

        if (Permission::where('slug', '=', 'create.agenda')->first() === null) {
            Permission::create([
                'name'        => 'Criar Agenda',
                'slug'        => 'create.agenda',
                'description' => 'Can create new agenda',
                'model'       => 'App\Models\Schedule',
            ]);
        }

        if (Permission::where('slug', '=', 'edit.agenda')->first() === null) {
            Permission::create([
                'name'        => 'Editar Agenda',
                'slug'        => 'edit.agenda',
                'description' => 'Can edit agenda',
                'model'       => 'App\Models\Schedule',
            ]);
        }

        if (Permission::where('slug', '=', 'delete.agenda')->first() === null) {
            Permission::create([
                'name'        => 'Deletar Agenda',
                'slug'        => 'delete.agenda',
                'description' => 'Can delete agenda',
                'model'       => 'App\Models\Schedule',
            ]);
        }

        if (Permission::where('slug', '=', 'view.contato')->first() === null) {
            Permission::create([
                'name'        => 'Visualizar Contato',
                'slug'        => 'view.contato',
                'description' => 'Can view contato',
                'model'       => 'App\Models\Pessoa',
            ]);
        }

        if (Permission::where('slug', '=', 'create.contato')->first() === null) {
            Permission::create([
                'name'        => 'Criar Contato',
                'slug'        => 'create.contato',
                'description' => 'Can create new contato',
                'model'       => 'App\Models\Pessoa',
            ]);
        }

        if (Permission::where('slug', '=', 'edit.contato')->first() === null) {
            Permission::create([
                'name'        => 'Editar Contato',
                'slug'        => 'edit.contato',
                'description' => 'Can edit contato',
                'model'       => 'App\Models\Pessoa',
            ]);
        }

        if (Permission::where('slug', '=', 'delete.contato')->first() === null) {
            Permission::create([
                'name'        => 'Deletar Contato',
                'slug'        => 'delete.contato',
                'description' => 'Can delete contato',
                'model'       => 'App\Models\Pessoa',
            ]);
        }

        if (Permission::where('slug', '=', 'view.guia')->first() === null) {
            Permission::create([
                'name'        => 'Visualizar Guia',
                'slug'        => 'view.guia',
                'description' => 'Can view guia',
                'model'       => 'App\Models\Agendamento\Guia',
            ]);
        }

        if (Permission::where('slug', '=', 'create.guia')->first() === null) {
            Permission::create([
                'name'        => 'Criar Guia',
                'slug'        => 'create.guia',
                'description' => 'Can create new guia',
                'model'       => 'App\Models\Agendamento\Guia',
            ]);
        }

        if (Permission::where('slug', '=', 'edit.guia')->first() === null) {
            Permission::create([
                'name'        => 'Editar Guia',
                'slug'        => 'edit.guia',
                'description' => 'Can edit guia',
                'model'       => 'App\Models\Agendamento\Guia',
            ]);
        }

        if (Permission::where('slug', '=', 'delete.guia')->first() === null) {
            Permission::create([
                'name'        => 'Deletar Guia',
                'slug'        => 'delete.guia',
                'description' => 'Can delete guia',
                'model'       => 'App\Models\Agendamento\Guia',
            ]);
        }
    }
}
