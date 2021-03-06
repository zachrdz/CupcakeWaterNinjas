@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Register</div>
        <div class="panel-body">
          	{{Form::open(['id' => 'register','action' => 'RegistrationController@registerUser', 'method' => 'POST', 'class' => 'form-horizontal'])}}
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              {{ Form::text('name', Input::old('username'), [ 'placeholder' => 'Name',
              'class' => 'form-control', 'required']) }}
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              {{ Form::email('email', Input::old('email'), [ 'placeholder' => 'Email',
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
            <label class="col-sm-2 control-label">Password Confirm</label>
            <div class="col-sm-10">
              {{ Form::password("repassword" , [ 'placeholder' => 'Password Confirm', 'class' => 'form-control', 'required'])}}
            </div>
          </div>
          <div class="form-group">
            <div class = 'row'>
              <div class="col-sm-offset-4 col-sm-6 ">
                {{ Form:: submit('Sign Up', [ 'class' => 'btn btn-primary btn-block']) }}
                {{Form::close()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
