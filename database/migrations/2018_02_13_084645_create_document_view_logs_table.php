<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentViewLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_view_logs', function(Blueprint $table)
		{
			$table->integer('user_id')->nullable();
			$table->string('email',191)->nullable(true);
			$table->integer('document_id');
			$table->dateTime('date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_view_logs');
	}

}
