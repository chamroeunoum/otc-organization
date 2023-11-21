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
        Schema::create('user_timeslots', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false)->comment('The id of a user');
            $table->integer('timeslot_id')->nullable(false)->comment('The id of a timeslot that user work on');
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
        Schema::dropIfExists('user_timeslots');
    }
};
