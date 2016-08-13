<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$recipes1 = Recipe::where('id','>', 0)->paginate(8);
		$recipes = Recipe::all();

		//Check to see if the table is empty
		$is_table_empty = Featured::where('id', '>', 0)->get();

		//If table is empty, we will create a row and fill it up depending on the amount of recipes in the DB
		if ($is_table_empty->isEmpty()){


			$random_recipe_id = [];

			//This is for if there are less than 8 recipes in the DB
			if(count($recipes) < 8){

				//This for loop is used to pull random recipes from the DB
				for ($i = 0; $i < count($recipes); $i++){
					$random = Recipe::orderByRaw("RAND()")->first();
					$random_recipe_id[$i] = $random->id;

					//This for and while loop are used to make sure we don't pull the same recipe twice from DB
					for ($k = 0; $k < $i; $k++){
						while ($random_recipe_id[$i] == $random_recipe_id[$k]){
							$random = Recipe::orderByRaw("RAND()")->first();
							$random_recipe_id[$i] = $random->id;
							$k = 0;
						}
					}
				}
			}

			//This block will run if there are at least 8 recipes in the DB
			else{
				//This for loop is used to pull random recipes from the DB
				for ($i = 0; $i < 8; $i++){
					$random = Recipe::orderByRaw("RAND()")->first();
					$random_recipe_id[$i] = $random->id;

					//This for and while loop are used to make sure we don't pull the same recipe twice from DB
					for ($k = 0; $k < $i; $k++){
						while ($random_recipe_id[$i] == $random_recipe_id[$k]){
							$random = Recipe::orderByRaw("RAND()")->first();
							$random_recipe_id[$i] = $random->id;
							$k = 0;
						}
					}
				}
			}

			//After putting the unique recipe id's in the array, we will try to add a row to the DB
 			try{
				 // try to create recipe
				 Featured::create([
					 'recipe_id_1' => $random_recipe_id[0],
					 'recipe_id_2' => $random_recipe_id[1],
					 'recipe_id_3' => $random_recipe_id[2],
					 'recipe_id_4' => $random_recipe_id[3],
					 'recipe_id_5' => $random_recipe_id[4],
					 'recipe_id_6' => $random_recipe_id[5],
					 'recipe_id_7' => $random_recipe_id[6],
					 'recipe_id_8' => $random_recipe_id[7]
				 ]);


			 }catch(Exception $e){
		 		Session::flash('error_message',
		 		$e);
		 		return Redirect::back()->withInput();
		  }

		}


		//This block of code is used in case the featured recipes table already has an entry
		else{

			$recipes = Recipe::all();
			$featured_list = Featured::all();

			//Used to get the current row in the featured recipes table
			foreach($featured_list as $list){
					$previous_featured_recipes = $list;
			}

			$previous_recipe_id = [];

			//Fill an array with the recipe id's from the freatured recipes table
			//These values will be used to ensure that the next set of featured recipes
			//are different from last weeks or last months featured recipes
			$previous_recipe_id[0] = $previous_featured_recipes->recipe_id_1;
			$previous_recipe_id[1] = $previous_featured_recipes->recipe_id_2;
			$previous_recipe_id[2] = $previous_featured_recipes->recipe_id_3;
			$previous_recipe_id[3] = $previous_featured_recipes->recipe_id_4;
			$previous_recipe_id[4] = $previous_featured_recipes->recipe_id_5;
			$previous_recipe_id[5] = $previous_featured_recipes->recipe_id_6;
			$previous_recipe_id[6] = $previous_featured_recipes->recipe_id_7;
			$previous_recipe_id[7] = $previous_featured_recipes->recipe_id_8;



			echo "elapsed time is " . (time() - strtotime($previous_featured_recipes->updated_at)) . " seconds. ";
			echo "Today's featured recipes is currently set to change every 60 seconds on page refresh for testing purposes. ";

			echo "Note: Will change refresh-rate to every 24 hours before presentation. Delete this message before presentation";

			//This if statement tests to see if a certain amount of seconds has passed.
			//After the specified time has passed, The featured recipe list will change to a
			//new set of recipes.

			//The if statement below is basically "if the amount of seconds that have elapsed since the
		  //                                     the last update is greater than (amount in seconds),
			//                                     update the featured recipes to a new set.

			//The featured recipes is currently set to refresh every 60 seconds.
			if (time() - strtotime($previous_featured_recipes->updated_at) > 60){

				//This block will run if there are 16 or more recipes in the DB
				if (count($recipes) >= 16){

					for ($i = 0; $i < 8; $i++){

						$random = Recipe::orderByRaw("RAND()")->first();
						$random_recipe_id[$i] = $random->id;

						if($i == 0){
							for ($r = 0; $r < 8; $r++){
								while($random_recipe_id[0] == $previous_recipe_id[$r]){
								$random = Recipe::orderByRaw("RAND()")->first();

								$random_recipe_id[0] = $random->id;
								$r = 0;
								}
							}
						}

						for ($k = 0; $k < $i; $k++){
							for ($j = 0; $j < 8; $j++){
							while ($random_recipe_id[$i] == $random_recipe_id[$k] || $random_recipe_id[$i] == $previous_recipe_id[$j]){
								$random = Recipe::orderByRaw("RAND()")->first();

								$random_recipe_id[$i] = $random->id;
								$k = 0;
								$j = 0;
							}
						}
					}
				}

					//Update the DB with the new set of featured recipes
					Featured::where('recipe_id_1','=', $previous_recipe_id[0])
				 				 ->update([
				 					 'recipe_id_1' => $random_recipe_id[0],
				 					 'recipe_id_2' => $random_recipe_id[1],
				 					 'recipe_id_3' => $random_recipe_id[2],
				 					 'recipe_id_4' => $random_recipe_id[3],
				 					 'recipe_id_5' => $random_recipe_id[4],
				 					 'recipe_id_6' => $random_recipe_id[5],
				 					 'recipe_id_7' => $random_recipe_id[6],
				 					 'recipe_id_8' => $random_recipe_id[7]
				 				 ]);

				}



				//This block will run if there less than 16 recipes but more than 8 recipes
				else if (count($recipes) > 8){

					for ($i = 0; $i < 8; $i++){

						$random = Recipe::orderByRaw("RAND()")->first();
						$random_recipe_id[$i] = $random->id;

						if($i == 0){
							for ($r = 0; $r < 8; $r++){
								while($random_recipe_id[0] == $previous_recipe_id[$r]){
								$random = Recipe::orderByRaw("RAND()")->first();

								$random_recipe_id[0] = $random->id;
								$r = 0;
								}
							}
						}

						for ($k = 0; $k < $i; $k++){
							for ($j = 0; $j < count($recipes) - 8; $j++){
							while ($random_recipe_id[$i] == $random_recipe_id[$k] || $random_recipe_id[$i] == $previous_recipe_id[$j]){
								$random = Recipe::orderByRaw("RAND()")->first();

								$random_recipe_id[$i] = $random->id;
								$k = 0;
								$j = 0;
							}
						}
					}
				}
					//Update the DB with the new set of featured recipes
					Featured::where('recipe_id_1','=', $previous_recipe_id[0])
				 				 ->update([
				 					 'recipe_id_1' => $random_recipe_id[0],
				 					 'recipe_id_2' => $random_recipe_id[1],
				 					 'recipe_id_3' => $random_recipe_id[2],
				 					 'recipe_id_4' => $random_recipe_id[3],
				 					 'recipe_id_5' => $random_recipe_id[4],
				 					 'recipe_id_6' => $random_recipe_id[5],
				 					 'recipe_id_7' => $random_recipe_id[6],
				 					 'recipe_id_8' => $random_recipe_id[7]
				 				 ]);

				}


			}

		}

		//Used to get the featured recipes from DB
		$updated_list = Featured::all();
		foreach($updated_list as $updated){
				$updated_featured_recipes_list = $updated;
		}

		//Grap all current entries out of the featured_recipes table
		$updated_featured_recipes = Recipe::where('id','=', $updated_featured_recipes_list->recipe_id_1)
																				->orwhere('id','=', $updated_featured_recipes_list->recipe_id_2)
																				->orwhere('id','=', $updated_featured_recipes_list->recipe_id_3)
																				->orwhere('id','=', $updated_featured_recipes_list->recipe_id_4)
																				->orwhere('id','=', $updated_featured_recipes_list->recipe_id_5)
																				->orwhere('id','=', $updated_featured_recipes_list->recipe_id_6)
																				->orwhere('id','=', $updated_featured_recipes_list->recipe_id_7)
																				->orwhere('id','=', $updated_featured_recipes_list->recipe_id_8)
																				->get();

		return View::make('home', [
			'recipes' => $recipes,
			'recipes1' => $recipes1,
			'updated_featured_recipes' => $updated_featured_recipes]);

	}

}
