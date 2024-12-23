<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegulatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regulators', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('image',191)->nullable(true)->comment('Cover of the regulator');
			$table->string('fid', 191)->nullable();
			$table->text('title', 65535)->nullable();
			$table->text('objective', 65535)->nullable();
			$table->string('pdf', 191)->nullable();
			$table->string('year', 50);
			$table->integer('document_type')->nullable()->default(0);
			$table->integer('publish')->nullable()->default(0);
			$table->integer('active')->nullable()->default(0);
			$table->integer('approved_by')->nullable()->default(0);
			$table->integer('created_by')->nullable()->default(0);
			$table->integer('updated_by')->nullable()->default(0);
			$table->integer('deleted_by')->nullable()->default(0);
			$table->integer('accessibility')->nullable()->default(0)
			->comment('The accessibility of the file to the outside. 0 -> disable for all, 1 -> private for owner or shared user, 2 -> Public for the whole system, 4 -> Global access for the world.');
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
		Schema::drop('regulators');
	}

}
