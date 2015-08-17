<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEndTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seatings', function (Blueprint $table) {
            $table->removeColumn('time');
            $table->time('start_time');
            $table->time('end_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seatings', function (Blueprint $table) {
            $table->time('time');
            $table->removeColumn('start_time');
            $table->removeColumn('end_time');
        });
    }
}
