@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
<link rel="stylesheet" href="../js/dropzone/dist/min/dropzone.min.css">

<script src="../js/dropzone/dist/min/dropzone.min.js"></script>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 myform">

      @if(Session::has('error_messages'))

      <div class="alert alert-danger" role="alert">
        {{Session::get('error_messages')}}
      </div>


      @endif
    </div>
  </div>
  <div class="row">


      {{Form::open(['id' => 'recipeCreate','action'=> 'RecipeController@createRecipe', 'method' => 'POST', 'class' => 'form-horizontal'])}}
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
        <label class="col-sm-2 control-label">Cook Time</label>
        <div class="col-sm-7">
          {{ Form::text('cook_time', null, [ 'placeholder' => 'Cook Time in minutes: Enter 70 for 70 minutes',
          'class' => 'form-control', 'required']) }}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Ingredients</label>
        <div class="col-sm-7">
          {{ Form::textarea('ingredients', null, [ 'placeholder' => 'Ingredients: Separate each ingredient by a new line!',
          'class' => 'form-control', 'required']) }}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Directions</label>
        <div class="col-sm-7">
          {{ Form::textarea('directions', null, [ 'placeholder' => 'Directions: Label each step and separate each step by a new line!',
          'class' => 'form-control', 'required']) }}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Cooked Food Picture</label>
        <div class="col-sm-7">
          <div class='dropzone' id='dopzoneFileUpload'></div>
      </div>
    </div>
    </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
        {{ Form:: submit('Submit Recipe', [ 'class' => 'btn btn-primary btn-block']) }}
        {{Form::close()}}
        </div>
      </div>

  </div>

</div>
<script type="text/javascript">
            var baseUrl = "{{ url('/') }}";
            var token = "{{ Session::getToken() }}";
            Dropzone.autoDiscover = false;
             var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                 url: baseUrl+"/dropzone/uploadFiles",
                 params: {
                    _token: token
                  }
             });
             Dropzone.options.myAwesomeDropzone = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                addRemoveLinks: true,
                accept: function(file, done) {

                },
              };
</script>
@endsection
