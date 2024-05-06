<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstname', 50);
			$table->string('lastname', 191);
			$table->integer('gender')->nullable()->comment('0 is Female');
			$table->date('dob')->nullable();
			$table->string('mobile_phone', 50)->nullable();
			$table->string('office_phone', 50)->nullable();
			$table->string('email', 191)->nullable();
			$table->integer('nid')->nullable();
			$table->string('image', 191)->nullable();
			$table->string('marry_status', 191)->nullable();
			$table->string('father', 191)->nullable();
			$table->string('mother', 191)->nullable();
			$table->string('model', 191)->nullable()->comment('The model path that differentiate the row data');
			$table->timestamps();
			$table->string('deleted_at', 191)->nullable();
			$table->string('created_by', 191)->nullable();
			$table->string('modified_by', 191)->nullable();
			$table->string('deleted_by', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('people');
	}

}
