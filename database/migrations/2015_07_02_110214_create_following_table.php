<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('following', function (Blueprint $table) {
            $table->integer('userOneId')->unsigned();
            $table->integer('userTwoId')->unsigned();
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
        Schema::drop('following');
    }
}
