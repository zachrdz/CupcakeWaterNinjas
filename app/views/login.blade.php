@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
@endsection

@section('content')
<div class="container">
		<!--col 1 -->
		<div class="col-md-3">
		</div>

		<!--col 2 -->
		<div class="col-md-6 myform">

			@if(Session::has('error_message'))

				<div class="alert alert-danger" role="alert">
				  {{Session::get('error_message')}}
				</div>

			@endif
			<h1 class="text-center">Welcome to RecipeBois oh shit wut up!</h1>
			<p class="text-center text-blue">Login to get started or sign in through Google</p>
			{{Form::open(['action' => 'RegistrationController@loginUser', 'method' => 'POST', 'class' => 'form-horizontal'])}}
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
          <div class = 'row'>
				<div class="col-sm-offset-2 col-sm-10">

				{{ Form:: submit('Login', [ 'class' => 'btn btn-primary btn-block']) }}
          </div>
					<div class ="col-sm-offset-2 col-sm-10">
			{{Form::close()}}
					{{Form::open(['action' => 'RegistrationController@loginWithGoogle', 'method' => 'POST', 'class' => 'form-horizontal'])}}
					{{Form::submit('Login With Google', ['class' => 'btn btn-primary btn-block'])}}
					{{Form::close()}}
				</div>
		</div>
	</div>

		<!--col 3 -->
		<div class="col-md-3">
		</div>
	</div>

@endsection
