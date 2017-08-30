<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function ($table) {
                $table->increments('id');
                $table->string('name');
                $table->string('intro', 1000);
                $table->string('imgUrl');
                $table->string('fileUrl');
                $table->string('tags', 60);
                $table->string('category', 40);
                $table->timestamps();
                $table->integer('user_id')->unsigned();
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
            Schema::drop('articles');
    }
}
