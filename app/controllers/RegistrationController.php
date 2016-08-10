<?php


class RegistrationController extends \BaseController{

  public function registerUser(){

  		$validation = Validator::make(Input::all(),[
        'username' => 'required|unique:users',
        'name'  => 'required',
        'email' =>' required|unique:users',
  			'password' => 'required',
  			'repassword' => 'required'
  		]);
  		if($validation->fails()){
              $messages = $validation->messages();
              Session::flash('validation_messages', $messages);
              return Redirect::back()->withInput();
          }
      $uname = Input::get('username');
      $name = Input::get('name');
  		$email = Input::get('email');
  		$password = Input::get('password');
  		$repassword = Input::get('repassword');

  		try{
  			User::create([
          'username' => 'ds',
          'name'  => $name,
  				'email'	=> $email,
  				'password'	=> Hash::make($password),
          'profile_pic' => '',
          'recipes_followd' => '',
          'profile_type' => 'user',
          'status' => 0
  			]);

  		}catch(Exception $e){
  			//Errors Log
  			 Session::flash('error_message', 'Oops! Something is wrong!');
  			return Redirect::back()->withInput();
  		}
  		Session::flash('success_message', 'Success! Welcome to Our Facbook');
      if (Auth::attempt(['email' => $email, 'password' => $password])){
        return Redirect::to('/');
      }

    }

    public function logout(){
      Session::flush();
      return Redirect::to('/');
    }

    public function loginWithGoogle(){

    $code = Input::get( 'code' );

    $googleService = OAuth::consumer( 'Google' );

    if ( !empty( $code ) ) {

        $token = $googleService->requestAccessToken( $code );

        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );


        if (Auth::attempt(['email' => $result['email'], 'password' => $result['id']])){
          return Redirect::to('/');
        }

        try{
    			User::create([
            'name'  => $result['name'],
    				'email'	=> $result['email'],
    				'password'	=> Hash::make($result['id']),
            'profile_pic' => '',
            'recipes_followd' => '',
            'profile_type' => 'user',
            'status' => 0
    			]);

    		}catch(Exception $e){
    			//Errors Log
    			 Session::flash('error_message', 'Oops! Something is wrong!');
    			return Redirect::back()->withInput();
    		}
        if (Auth::attempt(['email' => $result['email'], 'password' => $result['id']])){
          return View::make('gAuth', ['result' => $result]);
        }
      }

    else {
        $url = $googleService->getAuthorizationUri();

        return Redirect::to( (string)$url );
      }
    }
}
