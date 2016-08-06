<?php


class RecipeController extends \BaseController {


//create recipe View
public function showCreateView(){

    return View::make('recipes/createrecipe');
}


public function createRecipe(){

  		$validation = Validator::make(Input::all(),[
  			'recipeName' =>' required',
  			'difficulty'	=> 'required',
        'ingredients' =>' required',
  			'directions'	=> 'required'
  		]);
      if($validation->fails()){
              $messages = $validation->messages();
              Session::flash('error_messages', $messages);
              return Redirect::back()->withInput();
          }

          $user = Auth::user();
          $recipeName = Input::get('recipeName');
          $difficulty = Input::get('difficulty');
          $ingredients = Input::get('ingredients');
          $directions = Input::get('directions');
          $recipe_pic = Input::get('recipe_pic');
          try{
          
          	// try to create recipe
            $recipe = Recipe::create([
              'user_id' => 0,
              'recipe_name'=> $recipeName,
              'difficulty' => $difficulty,
              'likes' => 0,
              'dislikes' => 0,
              'views' => 0,
              'ingredients' =>  $ingredients,
              'directions' => $directions,
              'recipe_pic' => $recipe_pic
          	]);
              //test print
            /*  echo '<p>' .
              $recipeName .'<br />' .
              $difficulty .'<br />' .
              $ingredients .'<br />' .
              $directions .'<br />' .
              $recipe_pic .
              '</p>';
              */

          }catch(Exception $e){
          	Session::flash('error_message',
          	$e);
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
