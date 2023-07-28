<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('document_id')->index('user_document_id');
			$table->integer('user_id')->index('user_id');
			$table->integer('created_by')->nullable()->default(0);
			$table->integer('modified_by')->nullable()->default(0);
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
		Schema::drop('document_users');
	}

}
