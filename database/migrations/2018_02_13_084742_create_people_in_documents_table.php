<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleInDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people_in_documents', function(Blueprint $table)
		{
			$table->integer('document_id');
			$table->integer('people_id');
			$table->integer('countesy_id')->nullable();
			$table->integer('officer_position_id')->nullable();
			$table->integer('officer_rank_id')->nullable();
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
		Schema::drop('people_in_documents');
	}

}
