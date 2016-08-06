<?php


class RecipeController extends \BaseController {


//create recipe View
  public function showCreateView(){

      return View::make('recipes/createrecipe');
  }


  public function createRecipe(){

    		$validation = Validator::make(Input::all(),[
    			'' =>' required',
    			''	=> 'required'
    		]);
        if($validation->fails()){
                $messages = $validation->messages();
                Session::flash('validation_messages', $messages);
                return Redirect::back()->withInput();
            }

            $user = Auth::user();

            try{

            	//to create recipe
                $recipeName = Input::get('recipeName');
                $difficulty = Input::get('difficulty');


            }catch(Exception $e){
            	Session:flash('error_message',
            	'Oops! Something is wrong');
            	return Redirect::back()->withInput();
            }

            return Redirect::to('/view/myrecipes');


  }

  //show recipes page
  public function showMyRecipesView(){
    //auth check
  //  if(){

    //}


    //db request all recipes that correspond to the user id



    //return View
    return View::make('recipes/myrecipes');
  }

}
