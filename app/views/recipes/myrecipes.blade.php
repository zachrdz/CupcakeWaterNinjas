@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />

<link rel="stylesheet" href="../js/dropzone/dist/min/dropzone.min.css">

<!-- Include js plugin -->
<script src="../js/dropzone/dist/min/dropzone.min.js"></script>
@endsection

@section('content')

<a href="/create/recipe" class="btn btn-primary">Create a new recipe</a>


@foreach($myRecipes as $recipe)


<p>
  {{$recipe->recipe_name}}
</p>


@endforeach
@foreach($myLikedRecipes as $likedrecipe)

<div>


<p>
  {{$likedrecipe->recipe_name}}
</p>
</div>

@endforeach

@endsection
