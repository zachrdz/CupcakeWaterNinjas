<?php


class AuthenticationCest
{
    public function _before(FunctionalTester $I)
    {
      $I->amOnPage('/');
    }

    public function _after()
    {
      Session::flush();
    }

    // tests

    public function Login(FunctionalTester $I){
      $I->wantTo("Login");
      $I->amOnPage("login");
      $I->seeCurrentUrlEquals("/login");
      $I->submitForm('form#login', ['email' => 'mail@mail.com', 'password' => 'aaa']);
      $I->seeCurrentUrlEquals('');
    }

    public function NoLogin(FunctionalTester $I){
      $I->wantTo("Not Login");
      $I->amOnPage('login');
      $I->seeCurrentUrlEquals("/login");
      $I->submitForm('form#login', ['email' => 'no@nomail.com', 'password' => 'aaasdada']);
      $I->seeCurrentUrlEquals('/login');
    }

    public function NullLogin(FunctionalTester $I){
      $I->wantTo("Null Login");
      $I->amOnPage("login");
      $I->seeCurrentUrlEquals("/login");
      $I->submitForm('form#login', ['email' => Null, 'password' => Null]);
      $I->seeCurrentUrlEquals('/login');
    }

    public function Logout(FunctionalTester $I){
      $I->wantTo("Login");
      $I->amOnPage("/login");
      $I->seeCurrentUrlEquals("/login");
      $I->submitForm('form#login', ['email' => 'mail@mail.com', 'password' => 'aaa']);
      $I->seeCurrentUrlEquals('');
      $I->wantTo("Logout");
      $I->amOnPage('');
      $I->click('Logout');
      $I->seeCurrentUrlEquals('');
    }

    public function Register(FunctionalTester $I){
      $I->wantTo("Register");
      $I->amOnPage("/register");
      $I->submitForm('form#register', ['name' => 'Zachary', 'email' => 'no@nomail.com', 'password' => 'aaa', 'repassword' => 'aaa']);
      $I->seeCurrentUrlEquals('');
    }

    public function RegisterWithSameInfo(FunctionalTester $I){
      $I->wantTo("Register With Same Info");
      $I->amOnPage("/register");
      $I->submitForm('form#register', ['name' => 'Zachary', 'email' => 'no@nomail.com', 'password' => 'aaa', 'repassword' => 'aaa']);
      $I->seeCurrentUrlEquals('/register');
    }

}
