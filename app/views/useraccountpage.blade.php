@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
@endsection

@section('content')
<div class="container">
  <div class='row'>


  <div class="col-md-6 myform">

    @if(Session::has('error_message'))

      <div class="alert alert-danger" role="alert">
        {{Session::get('error_message')}}
      </div>

    @endif
  </div>
    </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Account Information</div>
      <img src='{{$user->profile_pic}}' alt="Smiley face" height="42" width="42">
        <div class="panel-body">
          	{{Form::open(['action' => 'AccountController@postAccountChanges', 'method' => 'POST', 'class' => 'form-horizontal'])}}
          <div class="form-group">
            <label class="col-sm-2 control-label">Profile Picture Link</label>
            <div class="col-sm-10">
              {{ Form::text('profile_pic', $user->username, [ 'placeholder' => 'Enter a link to a picture',
              'class' => 'form-control', '']) }}
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              {{ Form::text('name', $user->name, [ 'placeholder' => 'Username',
              'class' => 'form-control', 'required']) }}
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              {{ Form::email('email', $user->email, [ 'placeholder' => 'Email',
              'class' => 'form-control', 'disabled']) }}
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
                {{Form::submit('Change Account Information', [ 'class' => 'btn btn-primary btn-block']) }}
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
