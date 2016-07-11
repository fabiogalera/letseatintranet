<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->date('nascimento')->index();

            $table->string('email')->unique();
            $table->string('contato');
            $table->string('endereco');
            $table->integer('num');
            $table->string('bairro');
            $table->string('cidade');
            $table->char('estado', 2);
            $table->string('cep');

            $table->string('telefone');
            $table->string('celular');

            $table->string('pis');
            $table->string('cargo');
            $table->decimal('salario', 10, 2);
            $table->string('ctps');
            $table->string('serie');
            $table->date('recisao');
            $table->date('admissao');
            $table->string('motivo');
            $table->string('mesa')->index();

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
        Schema::drop('funcionarios');
    }
}
