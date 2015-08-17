<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seatings', function (Blueprint $table) {
            $table->removeColumn('amount');
        });
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount');
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tables');
        Schema::table('seatings', function (Blueprint $table) {
            $table->integer('amount');
        });
    }
}
