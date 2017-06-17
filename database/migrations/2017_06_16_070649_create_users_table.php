<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('users',function($table){
        $table->increments('id');
        $table->string('username',30);
        $table->string('email',80);
        $table->string('typeAccount',2);
        $table->string('password');
    });
    Schema::create('detail_user_info',function($table){
        $table->string('mssv',8);
        $table->string('phonenumber',12);
        $table->unique('phonenumber');
        $table->integer('user_id')->unsigned();
        $table->primary('user_id');
        $table->foreign('user_id')->references('id')->on('users');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
