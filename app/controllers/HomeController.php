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

		$user = Auth::user();
		$recipes = Recipe::all();
		$my_recipes = Recipe::where('user_id', '=', $user->id)->get();



		return View::make('home', [
			'user' => $user,
			'recipes' => $recipes,
			'my_recipes' => $my_recipes

		]);
	}

}
