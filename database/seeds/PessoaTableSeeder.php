<?php

use Illuminate\Database\Seeder;
use App\Models\Pessoa;
use App\Models\Pessoa\Fisica;
use App\Models\Pessoa\Juridica;

class PessoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $pessoa = new Pessoa();
        $pessoa->tipo_id = 2;
        $pessoa->save()

        $juridica = new Juridica();
        $juridica->pessoa_id = $pessoa->id;
        $juridica->razao_social = $faker->userName;
        $juridica->fantasia = $faker->userName;
        $juridica->cnpj = '12345678988';
        $juridica->ie = '3266844';
        $juridica->save();

        $pessoa = new Pessoa();
        $pessoa->tipo_id = 1;
        $pessoa->empresa_id = 1;
        $pessoa->save()

        $fisica = new Fisica();
        $fisica->pessoa_id = $pessoa->id;
        $fisica->nome = $faker->userName;
        $fisica->cpf = '12345678988';
        $fisica->rg = '3266844';
        $fisica->aniversario = now();
        $fisica->save();

    }
}
