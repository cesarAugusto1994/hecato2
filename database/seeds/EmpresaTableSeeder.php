<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Pessoa;
use App\Models\Pessoa\{Tipo};

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
        $tipo = new Tipo();
        $tipo->nome = 'Pessoa Juridica';
        $tipo->save();
        */

        $empresa = new Empresa();
        $empresa->nome = 'Hecato';
        $empresa->email = 'hecato@hecato.com.br';
        $empresa->informacoes = 'Hecato';
        $empresa->site = 'hecato.com.br';
        $empresa->aniversario_fundacao = now();
        $empresa->tipo_id = 2;
        $empresa->save();

        $empresa = new Empresa();
        $empresa->nome = 'Empresa Teste ' . str_random(12);
        $empresa->email = 'empresa@'.str_random(12).'.com.br';
        $empresa->informacoes = 'Empresa Teste ' . str_random(12);
        $empresa->site = 'empresa@'.str_random(12).'.com.br';
        $empresa->aniversario_fundacao = now();
        $empresa->tipo_id = 2;
        $empresa->save();

/*
        $pessoa = new Pessoa();
        $pessoa->nome = 'Empresa Teste ' . str_random(12);
        $pessoa->informacoes = 'Empresa Teste ' . str_random(12);
        $pessoa->site = 'empresa@'.str_random(12).'.com.br';
        $pessoa->tipo_id = $tipo->id;
        $pessoa->save();
*/

    }
}
