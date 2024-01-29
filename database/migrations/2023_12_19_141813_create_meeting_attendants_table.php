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
        Schema::create('meeting_attendants', function (Blueprint $table) {
            $table->id();
            $table->integer('meeting_member_id')->comment('The id of the meeting member');
            $table->integer('people_id')->comment('The person who come to join the meeting');
            $table->text('remark')->nullable(true)->comment('the remark');
            $table->string('checktime',50)->nullable(true)->comment('the checktime that the member has joined the meeting.');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meeting_attendants');
    }
};
