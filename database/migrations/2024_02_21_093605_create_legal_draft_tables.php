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
        Schema::create("legal_drafts",function(Blueprint $table){
            $table->increments('id');
            $table->integer('regulator_id')->nullable(true)->comment('The regulator that publish by this legal draft');
            $table->string('title', 191 )->nullable(true)->comment('The title of the draft');
            $table->text('objective')->comment('The objective of the draft');
            $table->text('files')->nullable(true)->comment('The links of the files');
            $table->longText('content')->comment('The whole content of the draft');
            $table->integer('created_by')->comment('The creator of the file');
            $table->integer('updated_by')->comment('The creator of the file');
            $table->integer('deleted_by')->nullable(true)->comment('The creator of the file');
            $table->integer('status')->default(0)->comment('The status of the legal draft, 0 : NEW , 1 : PROGRESSING , 2 : FINISHED');
            $table->integer('pid')->default(0)->comment('The id of the parent legal draft.');
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
        //
    }
};
