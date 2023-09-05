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
        Schema::create('organization_parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',191)->nullable(false);
            $table->integer('organization_id')->default(0)->comment('Id of the document that describe the relationship.');
            $table->integer('tpid')->nullable()->comment('Id of the document which is the top level of this document.');
            $table->integer('pid')->nullable()->comment('Id of the record which is the parent of this record.');
            $table->string('amend',191)->nullable(true)->comment('this field is used to store all the ids of the related document with this document.');
            $table->text('desc')->nullable(true);
            $table->string('image',191)->nullable(true);
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
        Schema::dropIfExists('organization_parents');
    }
};
