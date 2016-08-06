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
		return View::make('signup');
});

Route::get('/register' ,function()
{
		return View::make('register');
});
//auth routes
Route::post('/register', 'RegistrationController@registerUser');
Route::post('/login', 'RegistrationController@signUp');
Route::post('/login', 'RegistrationController@loginWithGoogle');
Route::post('/loginUser', 'RegistrationController@loginUser');
Route::get('/gAuth', 'RegistrationController@loginWithGoogle');

Route::get('/logout', 'RegistrationController@logout');

Route::get('/', function()
{
	return View::make('home');
});


Route::get('/login' ,function()
{
		return View::make('login');
});


//routes for view and create crecipe
Route::get('/create/recipe', 'RecipeController@showCreateView');
Route::get('/view/myrecipes','RecipeController@showMyRecipesView');

Route::post('/create/recipe','RecipeController@createRecipe');
