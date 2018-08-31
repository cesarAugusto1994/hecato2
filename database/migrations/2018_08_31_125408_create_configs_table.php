<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('slug');
            $table->enum('tipo', ['texto', 'boolean', 'float', 'inteiro'])->default('float');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });

        Schema::create('config_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('config_id')->unsigned();
            $table->foreign('config_id')->references('id')->on('configs');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->string('valor');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_empresas');
        Schema::dropIfExists('configs');
    }
}
