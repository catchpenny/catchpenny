<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->integer('creatorId')->unsigned(); // user id
            $table->integer('ownerId')->unsigned();  // i dont knw
            $table->integer('domainId')->unsigned(); // domain id
            $table->integer('channelId')->unsigned();
            $table->timestamps();
            $table->foreign('creatorId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
    }
}
