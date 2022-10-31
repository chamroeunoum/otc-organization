<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_users', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->integer('permission_id')->unsigned()->index('permission_users_permission_id_foreign');
			$table->primary(['user_id','permission_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permission_users');
	}

}
