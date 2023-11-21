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
        Schema::create('attendant_check_times', function (Blueprint $table) {
            $table->id();
            $table->integer('attendant_id')->nullable(false)->comment('The id of the attendant');
            $table->integer('timeslot_id')->nullable(false)->comment('The id of the attendant timeslot');
            $table->date('date')->null(false)->comment('The date that attendant checked.');
            $table->string('checktime',50)->nullable(false)->comment('The check time of the attendant');
            $table->string('checktype',50)->default('AfterLogin')->comment('The method of checking time.');
            $table->text('meta')->nullable(true)->comment("The metadata of the checking time. Device's information, Agent's information, ...");
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
        Schema::dropIfExists('attendant_timeslots');
    }
};
