@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png'/>
<link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.css">
@endsection

@section('content')
<div class="container">
	<!--col 1 -->
	<div class="col-md-3">
	</div>

	<!--col 2 -->
	<div class='row'>


		<div class="col-md-6 myform">

			@if(Session::has('error_message'))

			<div class="alert alert-danger" role="alert">
				{{Session::get('error_message')}}
			</div>

			@endif
		</div>
	</div>
	<h1 class="text-center">Welcome to RecipeBois!</h1>

	<p class="text-center text-blue">Login to get started or sign in through Google</p>
	{{Form::open(['id' => 'login','action' => 'RegistrationController@loginUser', 'method' => 'POST', 'class' =>
	'form-horizontal'])}}
	<div class="form-group">
		<label class="col-sm-2 control-label">Email</label>

		<div class="col-sm-10">
			{{ Form::email('email', null, [ 'placeholder' => 'Email',
			'class' => 'form-control', 'required']) }}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Password</label>

		<div class="col-sm-10">
			{{ Form::password("password" , [ 'placeholder' => 'Password', 'class' => 'form-control', 'required'])}}
		</div>
	</div>
	<div class="form-group">
		<div class='row'>
			<div class="col-sm-offset-3 col-sm-4">

				{{ Form:: submit('Login', [ 'class' => 'btn btn-primary btn-block']) }}
			</div>
			<div class="col-sm-4">
				{{Form::close()}}
				{{Form::open(['action' => 'RegistrationController@loginWithGoogle', 'method' => 'POST', 'class' => 'form-horizontal'])}}
        {{Form::submit("Login with Google", ['class' => 'btn btn-primary'])}}
        {{Form::close()}}
			</div>
		</div>
	</div>

	<!--col 3 -->
	<div class="col-md-3">
	</div>
</div>

@endsection
