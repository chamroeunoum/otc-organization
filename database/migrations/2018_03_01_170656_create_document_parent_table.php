<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_parents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id');
            $table->integer('parent_id');
            $table->string('amend',191)->nullable(true)->comment('this field is used to store all the ids of the related document with this document.');
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
        Schema::dropIfExists('document_parents');
    }
}
