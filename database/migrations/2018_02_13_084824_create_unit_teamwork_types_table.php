<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitTeamworkTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unit_teamwork_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->comment('The title of unit_teamwork_type');
			$table->text('note', 65535)->nullable()->comment('The note of the Unit Teamwork Type');
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
		Schema::drop('unit_teamwork_types');
	}

}
