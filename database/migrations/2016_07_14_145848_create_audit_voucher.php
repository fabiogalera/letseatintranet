<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditVoucher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers_audit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id');
            $table->string('nome')->nullable();
            $table->string('action');
            $table->dateTime('data');
            $table->string('lista');
            $table->string('listanova');
            $table->string('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vouchers_audit');
    }
}
