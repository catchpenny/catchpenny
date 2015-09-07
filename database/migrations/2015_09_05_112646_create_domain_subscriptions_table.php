<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainSubscriptionsTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_subscriptions', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->integer('domainId')->unsigned();
            $table->tinyInteger('level')->default(1);
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('domainId')->references('id')->on('domain')->onDelete('cascade');
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
        Schema::drop('domain_subscription');
    }
}
