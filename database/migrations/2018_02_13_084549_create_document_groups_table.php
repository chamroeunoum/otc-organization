<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('document_id')->index('document_id_2');
			$table->integer('group_id')->index('document_groups_group_id_idx');
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
		Schema::drop('document_groups');
	}

}
