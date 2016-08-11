@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />

<link rel="stylesheet" href="../js/dropzone/dist/min/dropzone.min.css">

<!-- Include js plugin -->
<script src="../js/dropzone/dist/min/dropzone.min.js"></script>

<link rel="stylesheet" href="../css/my_recipes.css">
<link rel="stylesheet" href="../css/font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/font-awesome-4.6.3/css/font-awesome.css">
<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
<!--  jQuery 1.7+  -->
<script src="jquery-1.9.1.min.js"></script>
@endsection

@section('content')





<div class="container">
    <div class="col-md-4">
      <div class="profile">
        <img src="{{$user->profile_pic}}">
        <h1>{{$user->name}}</h1>
        <p>Number of recipes added: {{$myRecipe_count}}</p>
        <p><a href="/create/recipe" class="btn btn-primary">Create a new recipe</a></p>
      </div>
    </div>
    <div class = "row">
      <div class="col-md-8">
        <div id="content">
          <h2><b>My Recipes</b></h2>
          @foreach($myRecipes as $recipe)
          <div class="recipe">
            <div class="image">
              <a href={{ url('/recipepage/' . $recipe->id) }}><img src="{{$recipe->recipe_pic}}"></a>
              <div class="likes">
                <i class="fa fa-heart-o lv" data-test="pulse"></i>
              </div>
              <div class="name">
                <h3>{{$recipe->recipe_name}}</h3>
              </div>
            </div>
            <ul class="media">
              <li><i class="fa fa-clock-o"></i> {{$recipe->cook_time}} Minutes</li>
              <li><i class="fa fa-leaf"></i> 250 Calories</li>
              <li><i class="fa fa-cutlery"></i> 4 People</li>
            </ul>
          </div>
          @endforeach
          <div>
            {{ $myRecipes->links() }}
          </div>
        </div>
      </div>
    </div>
    <div class = "row">
      <div class="col-md-8">
        <div id="content">
          <h2><b>My Liked Recipes</b></h2>
          @foreach($myLikedRecipes as $recipe)
          <div class="recipe">
            <div class="image">
              <a href={{ url('/recipepage/' . $recipe->id) }}><img src="{{$recipe->recipe_pic}}"></a>
              <div class="likes">
                <i class="fa fa-heart-o lv" data-test="pulse"></i>
              </div>
              <div class="name">
                <h3>{{$recipe->recipe_name}}</h3>
              </div>
            </div>
            <ul class="media">
              <li><i class="fa fa-clock-o"></i> {{$recipe->cook_time}} Minutes</li>
              <li><i class="fa fa-leaf"></i> 250 Calories</li>
              <li><i class="fa fa-cutlery"></i> 4 People</li>
            </ul>
          </div>
          @endforeach
          <div>
            {{ $myLikedRecipes->links() }}
          </div>
        </div>
      </div>
    </div>

</div>

<script>
var heart = false;
$('.lv').click(function(){
  if(!heart){
    $(this).addClass('fa-heart').removeClass('fa-heart-o');
    heart = true;
  }
  else {
    $(this).removeClass('fa-heart').addClass('fa-heart-o');
    heart = false;
  }
});
</script>
@endsection
