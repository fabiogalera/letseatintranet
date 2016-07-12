<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTablesAndExt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function($table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->string('description', 255);
            $table->timestamps();
        });

        Schema::table('funcionarios', function ($table) {
            $table->integer('role_id')->default(0);
            $table->foreign('role_id')->references('id')->on('roles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
