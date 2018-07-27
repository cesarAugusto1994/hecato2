<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('pessoa_tipo');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->integer('grupo_id')->nullable();
            $table->string('nome');
            $table->string('email');

            $table->string('ramo_atividade')->nullable();
            $table->text('informacoes')->nullable();
            $table->string('site')->nullable();

            $table->uuid('uuid');

            $table->boolean('paciente')->default(false);
            $table->boolean('cliente')->default(false);
            $table->boolean('fornecedor')->default(false);
            $table->boolean('funcionario')->default(false);
            $table->boolean('prospecto')->default(false);

            $table->string('identificacao_estrangeiro')->nullable();

            $table->boolean('ativo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
