<?php


class RecipeController extends \BaseController {



  public function showCreateView(){

      return View::make('recipes/createrecipe');
  }

}
