<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentFoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_folders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('document_id')->unsigned();
			$table->integer('folder_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('is_deleted')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_folders');
	}

}
