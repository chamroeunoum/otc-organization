<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->id();
            $table->string('title',191)->default('Timeslot')->comment('The name of the timeslot');
            $table->string('start',50)->default('00:00')->comment('The start time of slot');
            $table->string('end',50)->default('00:00')->comment('The start time of slot');
            $table->string('effective_day',191)->default('1,2,3,4,5,6')->comment('The days of week that timeslot will be used. 1 -> Mon , 2 -> Tue ...');
            $table->integer('active')->default(1)->comment('The status of the record is in active or unactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_slots');
    }
};
