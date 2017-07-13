<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvest', function (Blueprint $table) {
            $table->integer('id')->unsigned();
			$table->decimal('weight',5,1);
			$table->string('quality',30);
			$table->date('created_at');
			$table->foreign('id')->references('id')->on('node_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('harvest');
    }
}
