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
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('legal_draft_id')->nullable(true)->comment('The legal draft that the meeting is talking about.');
            $table->text('objective')->nullable(false)->comment('The objective of the meaing or title');
            $table->date('date')->nullable(false)->comment('The date of the meeting');
            $table->string('start',20)->nullable(true)->comment('The start time of the meeting');
            $table->string('end',20)->nullable(true)->comment('The expected end time of the meeting');
            $table->string('actual_start',20)->nullable(true)->comment('The actual start time of the meeting');
            $table->string('actual_end',20)->nullable(true)->comment('The actual expected end time of the meeting');
            $table->integer('status')->default(1)->comment('1 => New, 2 => Meeting, 4 => Continue , 8 => Change , 16 => Delayed, 32 => Finished');
            $table->text('seichdey_preeng')->nullable(true)->comment('The SEICHDEY_PREENG documents of the meeting');
            $table->text('reports')->nullable(true)->comment('The report(s) at the end of the meeting.');
            $table->text('other_documents')->nullable(true)->comment('Another documentst that is/are support the meeting');
            $table->text('contact_info')->nullable(true)->comment('The contact information about the meeting.');
            $table->integer('pid')->nullable(true)->comment('The the previous meeting of this meeting');
            $table->integer('created_by')->nullable(true)->comment('The id of the who created it -> user table');
            $table->integer('updated_by')->nullable(true)->comment('The id of the who updated it -> user table');
            $table->integer('type_id')->default(0)->comment("The meeting type");
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
        Schema::dropIfExists('meetings');
    }
};
