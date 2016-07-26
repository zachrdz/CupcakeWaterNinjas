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

Route::get('/signup' ,function()
{
		return View::make('signup');
});

Route::get('/register' ,function()
{
		return View::make('register');
});
Route::post('/register', 'RegistrationController@registerUser');
Route::post('/signup', 'RegistrationController@signUp');
Route::post('/signup', 'RegistrationController@loginWithGoogle');
Route::post('/loginUser', 'RegistrationController@loginUser');
Route::get('/gAuth', 'RegistrationController@loginWithGoogle');

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/login' ,function()
{
		return View::make('login');
});
