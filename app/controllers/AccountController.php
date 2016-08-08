<?php

class AccountController extends BaseController {

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

	public function showAccountPage()
	{

    //query for logged in user Info
		$user = Auth::user();
    //pass info to the page to fill out
		return View::make('useraccountpage',['user' =>$user]);
	}

  public function postAccountChanges(){


    showAccountPage();
  }

}
