<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('featured_recipes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('recipe_id_1');
			$table->integer('recipe_id_2');
			$table->integer('recipe_id_3');
			$table->integer('recipe_id_4');
			$table->integer('recipe_id_5');
			$table->integer('recipe_id_6');
			$table->integer('recipe_id_7');
			$table->integer('recipe_id_8');
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
		Schema::drop('featured_recipes');
	}

}
