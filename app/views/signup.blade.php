@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
@endsection

@section('content')
<h1>Sign Up</h1>
{{Form::open(['action' => 'RegistrationController@signUp', 'method' => 'POST'])}}

  {{Form::text('username', null, ['placeholder' => 'Username', 'required'])}}
  {{Form::email('email', null, ['placeholder' => 'Email', 'required'])}}
  {{Form::password('password', null, ['placeholder' => 'Password', 'required'])}}
  {{Form::password('repassword', null, ['placeholder' => 'Re-Enter Password', 'required'])}}
  {{Form::submit('SignUp')}}

{{Form::close()}}

@endsection
