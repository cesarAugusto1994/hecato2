<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(StatusGuiaTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(TiposContatoTableSeeder::class);
        $this->call(TiposPessoaTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ScheduleStatus::class);
        Model::reguard();
    }
}
