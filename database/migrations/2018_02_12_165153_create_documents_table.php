<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('fid', 191)->nullable();
			$table->text('title', 65535)->nullable();
			$table->text('objective', 65535)->nullable();
			$table->string('pdf', 191)->nullable();
			$table->string('document_year', 50);
			$table->integer('document_type');
			$table->integer('publish')->nullable()->default(0);
			$table->integer('approved_by')->nullable()->default(0);
			$table->integer('created_by')->nullable()->default(0);
			$table->integer('updated_by')->nullable();
			$table->integer('deleted_by')->nullable()->default(0);
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
		Schema::drop('documents');
	}

}
