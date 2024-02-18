<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',191)->nullable(false)->comment('Name of tag');
            $table->text('desp')->nullable(true)->comment('description of tag');
            $table->integer('pid')->default(0)->comment('Parent id of this tag');
            $table->string('model',191)->nullable()->comment('The model of this tag, it is used to differential tag base on the model objective. And only the root tag has model');
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
        Schema::dropIfExists('tags');
    }
}
