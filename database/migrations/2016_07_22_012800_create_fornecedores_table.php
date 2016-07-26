<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apelido')->unique();
            $table->string('razao');
            $table->string('cnpj')->unique();
            $table->string('email')->unique();
            $table->string('contato');
            $table->string('telefone');
            $table->string('IE');
            $table->string('endereco');
            $table->integer('num');
            $table->string('comp');
            $table->string('cidade');
            $table->string('cep');
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
        Schema::drop('fornecedores');
    }
}

