@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 myform">

      @if(Session::has('error_message'))

      <div class="alert alert-danger" role="alert">
        {{Session::get('error_message')}}
      </div>


      @endif
    </div>
  </div>
  <div class="row">


      {{Form::open(['action'=> 'RecipeController@createRecipe', 'method' => 'POST', 'class' => 'form-horizontal'])}}
      <div class="form-group">
        <label class="col-sm-2 control-label">Recipe Name</label>
        <div class="col-sm-7">
          {{ Form::text('recipeName', null, [ 'placeholder' => 'Recipe Name',
          'class' => 'form-control', 'required']) }}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Difficulty</label>
        <div class="col-sm-7">
          {{ Form::radio('difficulty', 'Beginner', true,['class' => 'field']) }} Beginner<br>
          {{ Form::radio('difficulty', 'Intermediate',null,['class' => 'field']) }} Intermediate<br>
          {{ Form::radio('difficulty', 'Advanced',null,['class' => 'field']) }} Advanced
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Recipe Name</label>
        <div class="col-sm-7">
          {{ Form::textarea('ingredients', null, [ 'placeholder' => 'Ingredients: Separate each ingredient by a new line!',
          'class' => 'form-control', 'required']) }}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Recipe Name</label>
        <div class="col-sm-7">
          {{ Form::textarea('directions', null, [ 'placeholder' => 'Directions: Label each step and separate each step by a new line!',
          'class' => 'form-control', 'required']) }}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Cooked Food Picture</label>
        <div class="col-sm-7">
          {{ Form::text('recipe_pic', null, [ 'placeholder' => 'Directions: Integrate api',
          'class' => 'form-control', 'required']) }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
        {{ Form:: submit('Submit Recipe', [ 'class' => 'btn btn-primary btn-block']) }}
        </div>
      </div>

  </div>

</div>

@endsection
