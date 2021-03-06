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

        Schema::table('users', function ($table) {
            $table->integer('role_id')->default(0)->unsigned();
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
