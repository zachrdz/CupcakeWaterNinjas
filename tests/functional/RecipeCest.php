<?php

class RecipeCest
{
    public function _before(FunctionalTester $I)
    {
      $I->amOnPage('/login');
      $I->submitForm('form#login', ['email' => 'mail@mail.com', 'password' => 'aaa']);
    }

    public function _after()
    {
      Session::flush();
    }

    public function MakeRecipe(FunctionalTester $I)
    {
      $I->wantTo("Make A Recipe");
      $I->amOnPage("/create/recipe");
      $I->submitForm('form#recipeCreate', ['recipeName' => 'Cookies', 'difficulty' => 'Beginner',
      'ingredients' => 'love', 'directions' => 'love', 'cook_time' => 20]);
      $I->seeCurrentUrlEquals('/view/myrecipes');
    }

    public function MakeRecipeWithNull(FunctionalTester $I)
    {
      $I->wantTo("Make A Recipe");
      $I->amOnPage("/create/recipe");
      $I->submitForm('form#recipeCreate', ['recipeName' => Null, 'difficulty' => 'Beginner',
      'ingredients' => 'love', 'directions' => 'love', 'cook_time' => 20]);
      $I->seeCurrentUrlEquals('/create/recipe');
    }

    public function ViewRecipePage(FunctionalTester $I)
    {
      $I->wantTo("View A Recipe");
      $I->amOnPage("/recipepage/1");
      $I->see('Cookies');
    }

    public function CreateComments(FunctionalTester $I)
    {
      $I->wantTo("Create a Comment");
      $I->amOnPage("/recipepage/1");
      $I->submitForm('form#commentId', ['comment' => "hello", 'id' => 1]);
      $I->seeCurrentUrlEquals('/recipepage/1');
    }

    public function CreateNullComments(FunctionalTester $I)
    {
      $I->wantTo("Create a Comment");
      $I->amOnPage("/recipepage/1");
      $I->submitForm('form#commentId', ['comment' => Null, 'id' => 1]);
      $I->see('{"comment":["The comment field is required."]');
    }

}
