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
        Schema::create('parent_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_document_id')->nullable(false)->comment('ID of document which is parent.');
            $table->integer('child_document_id')->nullable(false)->comment('ID of document which is chile.');
            $table->string('desc_of_relationship',191)->nullable(false)->comment('Description of the relatonship between document.');
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
        Schema::dropIfExists('parent_documents');
    }
};
