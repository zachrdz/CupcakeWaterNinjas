@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Account Created</div>
        <div class="panel-body">
          <h2>Thank You for creating an account {{$result['name']}}!</h2>
          <a href='/' class='btn btn-primary'>Home Page</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
