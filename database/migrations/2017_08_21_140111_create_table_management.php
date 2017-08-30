<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_management', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('security_key', 255);
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');
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
        Schema::drop('table_management');
    }
}
