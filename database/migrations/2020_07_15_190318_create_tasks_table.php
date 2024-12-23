<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('objective')->nullable(false)->comment("name of the task");
            $table->double('minutes')->nullable(false)->comment("Duration that the task should be done, measure as minutes");
            $table->datetime('start')->nullable(true)->comment('start date of task');
            $table->datetime('end')->nullable(true)->comment('end date of the task');
            $table->integer('created_by')->nullable(true)->comment('id of creator');
            $table->integer('active')->default(0)->comment('status of using record');
            $table->integer('status')->default(0)->comment('0: New, 1: Start, 2: End, 4: Pending, Cancel: 8, Close: 16');
            $table->text('pdf')->nullable(true)->comment('reference files');
            $table->text('image')->nullable(true)->comment('reference files');
            $table->integer('updated_by')->nullable(true)->comment('Task editor');
            $table->integer('pid')->default(0)->comment('id of parent task');
            $table->integer('tpid')->default(0)->comment('id of parent at the top level of task');
            $table->string('parent_level',191)->default(0)->comment('the series of parent ids seperated by colon');
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
        Schema::dropIfExists('tasks');
    }
}
