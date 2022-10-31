<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_references', function (Blueprint $table) {
            $table->integer('document_id')->nullable(false)->comment('The id of the regulator');
            $table->integer('document_reference_id')->nullable(false)->comment('The id of the regulator that is being referenced in order to create the regulator of document_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_references');
    }
}
