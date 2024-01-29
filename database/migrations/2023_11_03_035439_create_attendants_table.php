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
        Schema::create('attendants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0)->comment('The ID of the user');
            $table->date('date')->nullable(false)->comment('The date of the attendant');
            $table->integer('late_or_early')->default(0)->comment('Total minutes that overtime (+) or owned (-).');
            $table->integer('worked_time')->default(0)->comment('Total minutes that has worded the whole day');
            $table->integer('duration')->default(0)->comment('Total minutes that need to complete for the whole day');
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
        Schema::dropIfExists('attendant_attendants');
    }
};
