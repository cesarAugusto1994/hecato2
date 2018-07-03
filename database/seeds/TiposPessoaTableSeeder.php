<?php

use Illuminate\Database\Seeder;
use App\Models\Pessoa\Tipo;

class TiposPessoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = ['Fisíca', 'Jurídica'];

        foreach ($itens as $key => $item) {
            $tipo = new Tipo();
            $tipo->nome = $item;
            $tipo->save();
        }
    }
}
