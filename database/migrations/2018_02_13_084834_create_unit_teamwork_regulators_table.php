<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitTeamworkRegulatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unit_teamwork_regulators', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('creation')->nullable(true);
			$table->integer('ministry_id')->nullable(true);
			$table->integer('document_id')->comment('the id of the document related to this table');
			$table->integer('unit_teamwork_type_id')->comment('the id of the unit teamwork type of this document regulator');
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
		Schema::drop('unit_teamwork_regulators');
	}

}
