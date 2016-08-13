<?php
use \FunctionalTester;

class UserACcountCest
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
    public function ModifyUserInformation(FunctionalTester $I)
    {
    }
    public function ModifyUserInformationInvalidInput(FunctionalTester $I)
    {
    }
}
