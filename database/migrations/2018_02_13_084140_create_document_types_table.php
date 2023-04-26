<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('format', 100)->default('');
			$table->string('color', 191)->default('#333333');
			$table->integer('document_index')->default(0);
			$table->string('document_fields', 100)->nullable()->comment('fid:1|title:2|objective:3|document_ministry:4|document_related_ministry:5|document_year:6|document_signature:7|pdf:8');
			$table->integer('created_by')->default(0);
			$table->integer('modified_by')->default(0);
			$table->integer('deleted_by')->default(0);
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
		Schema::drop('types');
	}

}
