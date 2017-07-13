<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_status', function (Blueprint $table) {
				$table->integer('node_id')->unsigned();
                $table->foreign('node_id')->references('id')->on('node_info');
				$table->dateTime('created_at');
				$table->decimal('temperature',5,2);
				$table->decimal('water_temp',5,2);
				$table->string('light_color',7);
				$table->decimal('light_intensity',5,2);
				$table->decimal('flow',5,2);
				$table->decimal('humidity',5,2);
				$table->integer('warning_id')->unsigned();
				$table->primary('node_id','created_at');
				$table->foreign('warning_id')->references('id')->on('warning_dict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('node_status');
    }
}
