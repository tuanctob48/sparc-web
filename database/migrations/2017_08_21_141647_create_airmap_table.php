<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirmapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airmap', function (Blueprint $table) {
            $table->increments('id');
            $table->timestampsTz();
            $table->integer('node_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->decimal('temp_air', 5, 2);
            $table->decimal('tempWater', 5, 2);
            $table->decimal('anhSangWater', 5, 2);
            $table->decimal('anhSangKK', 5, 2);
            $table->decimal('luuLuong', 5, 2);
            $table->decimal('airHumidity', 5, 2);
            $table->float('red');
            $table->float('blue');
            $table->float('green');
            $table->foreign('node_id')->references('node_id')->on('node_info');
            $table->foreign('project_id')->references('id')->on('project');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('airmap');
    }
}
