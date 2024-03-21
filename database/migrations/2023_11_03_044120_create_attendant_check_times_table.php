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
            $table->integer('organization_id')->default(0)->comment('The id of the organization that the user check in/out');
            $table->string('checktime',50)->nullable(false)->comment('The check time of the attendant');
            $table->string('check_status',10)->nullable(true)->default('1')->comment('The status identify that the checktime is the check-in => "1" or check-out => "0" ');
            $table->string('checktype',50)->default('0')->comment('0 => SYSETM , 1 => FACE , 2 => FINGER');
            $table->integer('parent_checktime_id')->nullable(true)->comment('This field used to link the previous record with this one, used in checkin -> checkout.');
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
