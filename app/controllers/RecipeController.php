<?php


class RecipeController extends \BaseController {


//create recipe View
public function showCreateView(){
  if(!Auth::check()){
    Redirect::to('/');
  }
    return View::make('recipes/createrecipe');
}

//create a recipe
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
          $cook_time = Input::get('cook_time');
          $recipe_pic = "";
          if($recipe_pic == ""){
            $recipe_pic = "http://www.pani-food.com/img/uploads/restaurant-default.png";
          }

          //test print
        /*  echo '<p>' .
          $recipeName .'<br />' .
          $difficulty .'<br />' .
          $ingredients .'<br />' .
          $directions .'<br />' .
          $recipe_pic .
          '</p>';
          */
         try{

          	// try to create recipe
            $recipe = Recipe::create([
              'user_id' => $user->id,
              'recipe_name'=> $recipeName,
              'difficulty' => $difficulty,
              'likes' => 0,
              'dislikes' => 0,
              'views' => 0,
              'ingredients' =>  $ingredients,
              'directions' => $directions,
              'cook_time' => $cook_time,
              'recipe_pic' => $recipe_pic

          	]);


          }catch(Exception $e){
          	Session::flash('error_message',
          	$e);
          	return Redirect::back()->withInput();
         }

          return Redirect::to('/view/myrecipes');


}

//show my recipes
public function showMyRecipesView(){
  //auth check
  if(!Auth::check()){
    Redirect::to('/');
  }

  $user = Auth::user();
  //db request all recipes that correspond to the user id
  $myRecipes = recipe::where('user_id','=', $user->id)->paginate(6);


  //myRecipes2 is used get the correct number of recipes since the paginate above
  //will produce an incorrect # of recipes with count()
  $myRecipes2 = recipe::where('user_id','=', $user->id)->get();
  $myLikedRecipes = like::where('user_liking_id', '=', $user->id)->get();
  $likeList = [];
  $i=0;
  foreach($myLikedRecipes as $likes){
    $likeList[$i++] = recipe::where('id' ,'=', $likes->recipe_id)->first();
  }

  //Get the number of recipes added by the current user
  $myRecipe_count = count($myRecipes2);

  //return View
  return View::make('recipes/myrecipes',[
    'myRecipes' => $myRecipes,
    'myRecipe_count' => $myRecipe_count,
    'myLikedRecipes' => $likeList,
    'user' => $user
  ]);
}

//show indiviual recipe page
public function showRecipePage($id){
  //query for the id in the database grab data store in oci_fetch_object
  $recipe = recipe::where('id' ,'=',$id)->first();
  $comments = comment::where('recipe_id','=', $id)->get();
   return View::make('recipes/viewrecipe',['recipe' => $recipe,'comments' => $comments]);
 }


 public function createComment($id){

   $validation = Validator::make(Input::all(),[
     'comment' =>' required',
     'id'	=> 'required'
   ]);

   if($validation->fails()){
           $messages = $validation->messages();
           Session::flash('error_messages', $messages);
           return Redirect::back()->withInput();
       }

       $user = Auth::user();

       try{

        $comment = comment::create([
          'comment' => Input::get('comment'),
          'user_id'	=> $user->id,
          'recipe_id'	=> Input::get('id'), //Post ID
          'fname'	=> $user->name,
          'profile_pic'	=> $user->profile_pic
        ]);


       }catch(Exception $e){
        Session::flash('error_message',
        'Oops! Something is wrong');
        return Redirect::back()->withInput();
       }
       $recipe = recipe::where('id' ,'=',Input::get('id'))->first();
       $comments = comment::where('recipe_id','=', Input::get('id'))->get();
       return Redirect::back()->with( 'recipe', $recipe)->with( 'comments' , $comments);
        //return View::make('recipes/viewrecipe',['recipe' => $recipe,'comments' => $comments]);

 }
}
