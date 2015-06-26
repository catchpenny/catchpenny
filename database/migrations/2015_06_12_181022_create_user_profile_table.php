<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile', function(Blueprint $table)
		{
            $table->increments('id');
            if (Schema::hasTable('users'))
            {
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
            }
            $table->text('about me')->nullable();
            $table->dateTime('birthday');
            $table->string('firstname', 60);
            $table->string('lastname', 60);
            $table->string('interest')->nullable();
            // TODO: Set character limit for url based on length of URL generated
            $table->string('bigUrl');
            $table->string('smallUrl');
            $table->integer('wallCount');
            $table->enum('privacy', ['PUBLIC', 'FRIEND', 'PRIVATE']);
            $table->boolean('gender');  // 1 - Male, 0 - Female
            $table->integer('location')->unsigned();
            $table->foreign('location')->references('id')->on('location');
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
        if (Schema::hasTable('profile'))
        {
            Schema::drop('profile');
        }
	}

}
