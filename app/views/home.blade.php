@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="js/owl-carousel/owl.carousel.css">

<!-- Default Theme -->
<link rel="stylesheet" href="js/owl-carousel/owl.theme.css">

<link rel="stylesheet" href="css/home_page.css">
<link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.css">
<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
<!--  jQuery 1.7+  -->
<script src="jquery-1.9.1.min.js"></script>

<!-- Include js plugin -->
<script src="js/owl-carousel/owl.carousel.js"></script>

@endsection

@section('content')

<!-- Code for the search bar -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search for recipes" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
	</div>
</div>






<!-- Code for the owl picture carousel -->

<h2><b>Today's Featured recipes</b></h2>
<div id="owl-demo">

  @if(count($recipes) <= 8)
    @foreach($recipes as $recipe)
    <div class="item"><a href={{ url('/recipepage/' . $recipe->id) }}><img src="{{$recipe->recipe_pic}}" alt="{{$recipe->recipe_name}}"></div></a>
    @endforeach
  @else
    @foreach($updated_featured_recipes as $featured)
    <div class="item"><a href={{ url('/recipepage/' . $featured->id) }}><img src="{{$featured->recipe_pic}}" alt="{{$featured->recipe_name}}"></div></a>
    @endforeach
  @endif

</div>



<!-- Content Start - Just for visualization -->
<div id="content">
  <h2><b>Most recent recipes</b></h2>
 <!-- Recipe Start -->
 @foreach($recipes1 as $recipe)
	<div class="recipe">
		<div class="image">
	    	  <a href={{ url('/recipepage/' . $recipe->id) }}><img src="{{$recipe->recipe_pic}}"></a>
	 		<div class="name">
	 			<h3>{{$recipe->recipe_name}}</h3>
	 		</div>
		</div>
  		<ul class="media">
		    <li><i class="fa fa-clock-o"></i> 30 Minutes</li>
		    <li><i class="fa fa-leaf"></i> 250 Calories</li>
		    <li><i class="fa fa-cutlery"></i> 4 People</li>
  		</ul>
	</div>
  <!-- Recipe End -->
  @endforeach
  <div>
{{ $recipes1->links() }}
</div>



<!-- Content End -->
</div>

<script>
$(document).ready(function() {

  $("#owl-demo").owlCarousel({

      autoPlay: 3000, //Set AutoPlay to 3 seconds

      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]

  });

});

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
