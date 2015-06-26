<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string('name');
            $table->string('coverBigUrl');
            $table->string('coverSmallUrl');
            $table->string('website')->nullable();
            $table->string('about');
            $table->text('description')->nullable();
            $table->string('contactNumber')->nullable();
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
        if (Schema::hasTable('groups'))
        {
            Schema::drop('groups');
        }
	}

}
