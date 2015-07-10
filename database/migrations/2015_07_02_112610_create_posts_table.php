<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->longText('content');
            $table->string('type');
            $table->string('image')->nullable();
            $table->integer('ownerId')->unsigned();
            $table->integer('belongsTo')->unsigned();
            $table->foreign('ownerId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('belongsTo')->references('id')->on('channel')->onDelete('cascade');
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
        Schema::drop('posts');
    }
}
