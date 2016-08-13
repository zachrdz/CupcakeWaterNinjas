@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />

<link rel="stylesheet" href="../js/dropzone/dist/min/dropzone.min.css">
<link rel="stylesheet" href="../css/view_recipe.css">

<!-- Include js plugin -->
<script src="../js/dropzone/dist/min/dropzone.min.js"></script>
@endsection

@section('content')
<!--
    Available Recipe Fields:
    name
    difficulty
    likes
    dislikes
    views
    directions
    ingredients
    recipe_pic
    created_at
-->

<!--recipe section -->
<div class="container">
	<div class="row">
        <div class="col-md-4">
            <h3>Name</h3>
            <p>{{$recipe->recipe_name}}</p>
            <br><br><hr>
            <h5>Difficulty</h5>
            <span>{{$recipe->difficulty}}</span>
        </div>
        <div class="col-md-8 recipe_main_image">
            <img src="{{$recipe->recipe_pic}}" height="300px">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3>Ingredients</h3>
            <p>{{$recipe->ingredients}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3>Directions</h3>
            <p>{{$recipe->directions}}</p>
        </div>
    </div>
    <br>
</div>

<!--comments section -->
<div class="container">
    <hr>
    <div class="row">
        <div>
            @if(Session::has('error_messages'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error_messages')}}
            </div>
            @endif
						{{Form::open(['id' => 'like','action'=> 'RecipeController@likeRecipe', 'method' => 'POST'])}}
	          {{Form::hidden('id', $recipe->id)}}
						<div class='form-group'>
						{{Form::submit("Like", ['class' => 'btn btn-primary'])}}
	          {{Form::close()}}
						</div>
            @if(Auth::check())
            <div class="well" style="padding-bottom: 0px;">
                {{Form::open(['id' => 'commentId','action' => 'RecipeController@createComment','role' => 'form', 'method'=> 'POST'])}}
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" style="height: 70px;"class="form-control"></textarea>
                </div>
                {{Form::hidden('id', $recipe->id)}}
                <div class="form-group">
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                </div>
                {{Form::close()}}
            </div>
            @endif
        </div>
    </div>

    <!-- show all the comments -->
    @foreach($comments as $comment)
    <?php
        $date = new DateTime($comment->created_at);
        $created_at = $date->format('m\/d\/y \a\t h:i:sa');
    ?>
    <div class="row">
        <div class="col-sm-2">
            <div class="thumbnail">
                <img class="img-responsive user-photo" src='{{$comment->profile_pic}}'>
            </div><!-- /thumbnail -->
        </div><!-- /col-sm-1 -->

        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>{{$comment->name}}</strong> <span class="text-muted">{{$created_at}}</span>
                </div>
                <div class="panel-body">
                    {{$comment->comment}}
                </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
        </div><!-- /col-sm-5 -->
    </div><!-- /row -->
    @endforeach

</div>
@endsection
