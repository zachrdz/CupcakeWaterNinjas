<?php


class RegistrationController extends \BaseController{

  public function registerUser(){

  		$validation = Validator::make(Input::all(),[
        'username' => 'required|unique:users',
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
  		$email = Input::get('email');
  		$password = Input::get('password');
  		$repassword = Input::get('repassword');
  		//compare passwords
  		try{
  			User::create([
          'username' => $uname,
  				'email'	=> $email,
  				'password'	=> Hash::make($password),
          'profile_pic' => '',
          'recipes_followd' => '',
          'profile_type' => 'user',
          'g_auth_token' => '',
          'status' => 0
  			]);
  		}catch(Exception $e){
  			//Errors Log
  			 Session::flash('error_message', 'Oops! Something is wrong!');
  			return Redirect::back()->withInput();
  		}
  		Session::flash('success_message', 'Success! Welcome to Our Facbook');
  		return Redirect::to('/signup');
  	}

    public function signUp(){
      return;
    }

    public function loginUser(){
      return;
    }

    public function loginWithGoogle(){

    $code = Input::get( 'code' );

    $googleService = OAuth::consumer( 'Google' );

    if ( !empty( $code ) ) {


        $token = $googleService->requestAccessToken( $code );

        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

        //Insert a user model to create a database entry given input returned by Google.

        $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
        echo $message. "<br/>";

        dd($result);

    }

    else {
        $url = $googleService->getAuthorizationUri();

        return Redirect::to( (string)$url );
      }
    }
}
