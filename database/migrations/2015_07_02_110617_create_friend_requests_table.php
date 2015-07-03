<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_request', function (Blueprint $table) {
            $table->integer('userOneId')->unsigned();
            $table->integer('userTwoId')->unsigned();
            $table->timestamps();
            $table->foreign('userOneId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('userTwoId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friend_request');
    }
}
