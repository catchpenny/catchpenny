<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domainId')->unique()->unsigned();
            $table->string('name');
            $table->string('description');
            $table->integer('created_by')->unique()->unsigned();
            $table->boolean('official');
            $table->boolean('status');
            $table->integer('invite_code')->unique();
            $table->foreign('domainId')->references('id')->on('domain')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('posts', function ($table) {
            $table->foreign('belongsTo')->references('id')->on('channel')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('channel');
    }
}
