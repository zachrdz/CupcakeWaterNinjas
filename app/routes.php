<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/login' ,function()
{
		return View::make('login');
});

Route::get('/register' ,function()
{
		return View::make('register');
});
//auth routes
Route::post('/register', 'RegistrationController@registerUser');
Route::post('/login', 'RegistrationController@showLogin');
Route::post('/login', 'RegistrationController@login');
Route::post('/login', 'RegistrationController@loginWithGoogle');
Route::post('/loginUser', 'RegistrationController@loginUser');
Route::get('/gAuth', ['before' => 'auth', 'uses' => 'RegistrationController@loginWithGoogle']);
Route::get('/useraccount', ['before' => 'auth', 'uses' => 'AccountController@showAccountPage']);
Route::post('/useraccount', ['before' => 'auth', 'uses' => 'AccountController@postAccountChanges']);

Route::get('/logout', 'RegistrationController@logout');

//Route::get('/', function()
//{
	//return View::make('home');
//});


Route::get('/', 'HomeController@showWelcome');

//routes for view and create crecipe
Route::get('/create/recipe', ['before' => 'auth', 'uses' => 'RecipeController@showCreateView']);
Route::get('/view/myrecipes', ['before' => 'auth', 'uses' => 'RecipeController@showMyRecipesView']);
Route::post('/create/recipe', ['before' => 'auth', 'uses' => 'RecipeController@createRecipe']);
//routes for reutrning recipes changes
Route::get('/recipepage/{id}', 'RecipeController@showRecipePage');

//create a comment on  recipe page
Route::post('/recipepage/{id}', 'RecipeController@createComment');
//like a recipe
Route::post('/recipe/like',['before' => 'auth', 'uses' => 'RecipeController@likeRecipe']);
//unlike recipe
Route::post('/recipe/unlike',['before' => 'auth', 'uses' => 'RecipeController@unlikeRecipe']);

//Dropzone upload route
Route::post('/upload', function () {

	$rows = DB::table('recipes')->orderBy('id', 'desc')->take(5)->get();

	//$id = "0";
	$dbId = "0";
	if(isset($rows[0]->id)){
		$dbId = strval($rows[0]->id);
	}

	$input = Input::all();

	$rules = array(
		'file' => 'image|max:3000',
	);

	$validation = Validator::make($input, $rules);

	if ($validation->fails())
	{
		return Response::make($validation->errors->first(), 400);
	}

	$file = Input::file('file');

	if($file) {

		$destinationPath = public_path() . '/uploads/';
		$filename = $file->getClientOriginalName();
		$ext = explode(".", $filename);

		$newFilename = $dbId.".".$ext[1];

		$upload_success = Input::file('file')->move($destinationPath, $newFilename);

		if ($upload_success) {

			// resizing an uploaded file
			//Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);

			return Response::json('success', 200);
		} else {
			return Response::json('error', 400);
		}
	}
});