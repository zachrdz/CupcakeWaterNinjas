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

		$validation = Validator::make(Input::all(),[
			'profile_pic' => '',
			'name'  => 'required',
			'password' => 'required',
			'repassword' => 'required|same:password'
		]);
		if($validation->fails()){
						$messages = $validation->messages();
						Session::flash('error_message', $messages);
						return Redirect::back()->withInput();
				}
		$user = Auth::user();

		if(Input::get('profile_pic') != null){
			DB::table('users')
            ->where('id', $user->id)
            ->update(['profile_pic' => Input::get('profile_pic')]);
					}
		DB::table('users')
				    ->where('id', $user->id)
				    ->update(['password' => Hash::make(Input::get('password'))]);



  return View::make('useraccountpage',['user' =>$user]);
  }

}
