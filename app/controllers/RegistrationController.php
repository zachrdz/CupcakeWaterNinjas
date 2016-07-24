<?php
class RegistrationController extends \BaseController{

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
