<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
                    $table->string('name', 80);
                    $table->integer('number_member')->unsigned();
                    $table->string('leader_name', 80);
                    $table->integer('table_id')->unsigned();
                    $table->integer('leader_id')->unsigned();
                    $table->string('department', 80);
                    $table->date('date_started');
                    $table->foreign('leader_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project');
    }
}
