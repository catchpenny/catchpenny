<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domainID')->unsigned();
            $table->foreign('domainID')->references('id')->on('domain')->onDelete('cascade');
            $table->integer('channelID')->unsigned();
            $table->foreign('channelID')->references('id')->on('channel')->onDelete('cascade');
            $table->integer('created_by')->unsigned();
            $table->text('body');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('channel_posts');
    }
}
