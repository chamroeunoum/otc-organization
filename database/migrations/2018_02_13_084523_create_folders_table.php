<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('folders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable(false);
			$table->string('name', 191)->nullable();
			$table->text('description')->nullable();
			$table->integer('pid')->unsigned()->comment('The parent id of the folder');
			$table->integer('active')->unsigned()->comment('The status of the folder to be used or disabled.');
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
		Schema::drop('folders');
	}

}
