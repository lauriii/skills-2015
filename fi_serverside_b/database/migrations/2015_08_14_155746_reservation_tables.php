<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('organization');
            $table->string('phone');
            $table->string('email');
            $table->string('country', 2);
        });
        Schema::create('competition_days', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
        });
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
        });
        Schema::create('seatings', function (Blueprint $table) {
            $table->increments('id');
            $table->time('time');
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');
        });
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('organization');
            $table->string('country', 2);
            $table->integer('status');
            $table->integer('competition_day_id')->unsigned();
            $table->foreign('competition_day_id')->references('id')->on('competition_days');
            $table->integer('request_id')->unsigned();
            $table->foreign('request_id')->references('id')->on('requests');
            $table->integer('seating_id')->unsigned();
            $table->foreign('seating_id')->references('id')->on('seatings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('requests');
        Schema::drop('competition_days');
        Schema::drop('modules');
        Schema::drop('seatings');
        Schema::drop('guests');
    }
}
