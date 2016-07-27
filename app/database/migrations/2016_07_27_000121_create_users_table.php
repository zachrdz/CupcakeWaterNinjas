<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 255);
			$table->string('email', 255);
			$table->string('password', 255);
			$table->string('profile_pic', 255);
			$table->string('recipes_followed', 255);
			$table->string('profile_type', 255);
			$table->string('g_auth_token', 255);
			$table->binary('status');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
