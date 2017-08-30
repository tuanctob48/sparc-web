<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_management', function (Blueprint $table) {
            $table->increments('id');
                    $table->integer('project_id')->unsigned();
                    $table->integer('member_id')->unsigned();
                    $table->string('permission_database', 40);
                    $table->date('date_joined');
                    $table->string('role', 40);
                    $table->foreign('project_id')->references('id')->on('project');
                    $table->foreign('member_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_management');
    }
}
