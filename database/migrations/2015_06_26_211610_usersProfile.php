<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->text("aboutMe");
            $table->string("status");
            $table->string("photoBig");
            $table->string("photoSmall");
            $table->string("city");
            $table->string("country");
            $table->string("contactEmail");
            $table->tinyInteger("contactNumber");
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profile');
    }
}
