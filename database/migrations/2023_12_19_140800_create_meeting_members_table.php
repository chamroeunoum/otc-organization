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
        Schema::create('meeting_members', function (Blueprint $table) {
            $table->id();
            $table->integer('meeting_id')->comment('The id of meeting table');
            $table->integer('people_id')->nullable(false)->comment('The id of people table');
            $table->string('role',191)->nullable(true)->default('member')->comment('The role name of the member to join the meeting.');
            $table->string('group',191)->nullable(true)->default('audient')->comment('The group name of the member to join the meeting.');
            $table->text('remark')->nullable(true)->comment('The remark');
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
        Schema::dropIfExists('meeting_members');
    }
};
