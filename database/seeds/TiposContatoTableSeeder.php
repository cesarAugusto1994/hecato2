<?php

use Illuminate\Database\Seeder;
use App\Models\TipoContato;

class TiposContatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = ['Telefone Fixo', 'Telefone Comercial', 'Celular', 'Fax'];

        foreach ($itens as $key => $item) {
            $tipo = new TipoContato();
            $tipo->nome = $item;
            $tipo->save();
        }
    }
}
