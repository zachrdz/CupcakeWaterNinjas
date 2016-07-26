<?php


class RegistrationController extends \BaseController{

  protected function validator(array $data)
     {

 		//these are required but not being filled out in the registration form
 	    //'firstName' => 'required|max:20',
 	    //'lastName' => 'required|max:40',

         return Validator::make($data, [

 		'email' => 'required|email|max:255|unique:users',
 		'password' => 'required|confirmed|min:6|max:20',
 		'username' => 'required|max:255|unique:users,displayName',
  ]);
     }

    public function registerUser(){

      return User::create([
              //'name' => $data['name'],
              'email' => Input::get('email'),
              'password' => Hash::make(Input::get('password')),

      	    'username' => Input::get('username'),
          ]);

      return Make::view('hello');
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
