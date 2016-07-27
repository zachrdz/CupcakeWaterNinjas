<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('recipe_name', 255);
			$table->integer('difficulty');
			$table->integer('likes');
			$table->integer('dislikes');
			$table->integer('views');
			$table->text('ingredients');
			$table->text('directions');
			$table->string('recipe_pic');
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
		Schema::drop('recipes');
	}

}
