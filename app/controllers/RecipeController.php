<?php


class RecipeController extends \BaseController {



  public function showCreateView(){

      return View::make('recipes/createrecipe');
  }


  public function showMyRecipesView(){
    //auth check
  //  if(){

    //}


    //db request all recipes that correspond to the user id


  
    //return View
    return View::make('recipes/myrecipes');
  }

}
