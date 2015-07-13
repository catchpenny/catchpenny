<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelUserLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_user_level', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->integer('channelId')->unsigned();
            $table->boolean('level');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('channelId')->references('id')->on('channel')->onDelete('cascade');
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
        Schema::drop('channel_user_level');
    }
}
