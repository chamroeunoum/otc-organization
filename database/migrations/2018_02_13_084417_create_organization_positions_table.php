<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationPositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organization_positions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organization_id')->unsigned(); 
			$table->integer('position_id')->unsigned();
			$table->integer('power_level')->unsigned()->default(0)->comment('The number idenfity the power of the position on another position.');
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
		Schema::drop('organization_staffs');
	}

}
