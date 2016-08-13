<?php
use \FunctionalTester;

class LikesCest
{
    public function _before(FunctionalTester $I)
    {
      $I->amOnPage('/login');
      $I->submitForm('form#login', ['email' => 'mail@mail.com', 'password' => 'aaa']);
    }

    public function _after(FunctionalTester $I)
    {
      Session::flush();
    }

    // tests
    public function LikeRecipe(FunctionalTester $I)
    {
    }
    public function UnLikeRecipe(FunctionalTester $I)
    {
    }
}
