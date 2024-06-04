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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable(false)->comment('The file name');
            $table->text('meta')->nullable(true)->comment('The file metadata');
            $table->text('tags')->nullable(true)->comment('The tags of file');
            $table->integer('created_by')->default(0)->comment('The creator of the file, the id of the people table ');
            $table->integer('updated_by')->default(0)->comment('The updater of the file, the id of the people table ');
            $table->string('model',191)->nullable(true)->comment('The model path used to differentiate file');
            $table->integer('model_id')->default(0)->comment('The id of the table that under the model');
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
        Schema::dropIfExists('files');
    }
};
