@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
@endsection

@section('content')
<p>
  {{$recipe->recipe_name}}
</p>
<p>
  {{$recipe->difficulty}}
</p>
<p>
  {{$recipe->likes}}
</p>
<p>
  {{$recipe->dislikes}}
</p>
<p>
  {{$recipe->views}}
</p>
<!--make sure to have a delmin split by ' '-->
<p>
  {{$recipe->ingredients}}
</p>
<!--make sure to have a delmin split by ' '-->
<p>
  {{$recipe->directions}}
</p>
<p>
  {{$recipe->recipe_pic}}
</p>
<p>
  {{$recipe->created_at}}
</p>





<!--comments section -->
<div class="row">
  <div class="col-md-6 myform">

    @if(Session::has('error_message'))

    <div class="alert alert-danger" role="alert">
      {{Session::get('error_message')}}
    </div>


    @endif
  </div>
</div>
@if(Auth::check())
{{Form::open(['action' => 'RecipeController@createComment', 'class' => 'form', 'method'=> 'POST'])}}
  <div class="form-group">
    <textarea name="comment"></textarea>
  </div>
  {{Form::hidden('id', $recipe->id)}}
  <div class="form-group">
    {{Form::submit('Comment',['class' => 'btn btn-primary'])}}
  </div>
{{Form::close()}}
@endif

<!-- show all the comments -->
@foreach($comments as $comment)
<p>
  {{$comment->user_id}}
</p>
<p>
  {{$comment->recipe_id}}
</p>
<p>
  {{$comment->comment}}
</p>
<p>
  {{$comment->fname}}
</p>
<img src='{{$comment->profile_pic}}' alt="Smiley face" height="42" width="42">
<p>
  {{$comment->created_at}}
</p>
@endforeach
@endsection
