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
        Schema::create('meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('organization_id')->default(0)->unsigned(); 
			$table->integer('meeting_id')->unsigned();
            $table->integer('room_id')->unsigned()->comment('The room number');
            $table->text('remark')->nullable(true)->comment('The remark of the meeting with the organization that ask for the meeting.');
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
        Schema::dropIfExists('meeting_rooms');
    }
};
