<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_info', function (Blueprint $table) {
            $table->integer('node_id')->unsigned();
            $table->timestamps();
            $table->integer('project_id')->unsigned();
            $table->string('name', 20);
            $table->string('address', 80);
            $table->integer('updated_by')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');
            $table->primary(['node_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('node_info');
    }
}
