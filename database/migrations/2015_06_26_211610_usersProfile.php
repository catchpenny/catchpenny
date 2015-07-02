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
            $table->integer('id')->unique()->unsigned();
            $table->text("aboutMe");
            $table->string("relationshipStatus");
            $table->string("photoBig");
            $table->string("photoMedium");
            $table->string("photoSmall");
            $table->string("city");
            $table->string("country");
            $table->string("contactNumber");
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
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
