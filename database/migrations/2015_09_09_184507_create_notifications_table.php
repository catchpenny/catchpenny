<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fromId')->unsigned();
            $table->integer('toId')->unsigned();
            $table->integer('deleteOnAction')->unsigned();
            $table->string('data');
            $table->string('url');
            $table->boolean('read')->default(0);
            $table->smallInteger('type');
            $table->string('accept');
            $table->string('cancel');
            $table->timestamps();
            $table->foreign('toId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');
    }
}
