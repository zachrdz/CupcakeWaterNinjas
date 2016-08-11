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
Route::get('/recipepage/{id}', ['before' => 'auth', 'uses' => 'RecipeController@showRecipePage']);

//create a comment on  recipe page
Route::post('/recipepage/{id}', ['before' => 'auth', 'uses' => 'RecipeController@createComment']);
