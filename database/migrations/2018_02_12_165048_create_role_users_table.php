<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_users', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned();
			$table->integer('user_id')->unsigned()->index('role_users_user_id_foreign');
			$table->integer('is_accpted')->nullable();
			$table->date('accpted_at')->nullable();
			$table->primary(['role_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_users');
	}

}
