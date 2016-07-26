<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedores', function ($table) {
            $table->char('estado', 2);
            $table->integer('prazoentrega');
            $table->integer('prazofatura');
            $table->string('forma');
            $table->string('faturamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            //
        });
    }
}
