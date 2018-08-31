<?php

use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = ['valor_padrao_consulta' => 'Valor Padrão Consulta'];

        foreach ($itens as $key => $value) {
            Config::create(['slug' => $key, 'nome' => $value, 'tipo' => 'float']);
        }
    }
}
