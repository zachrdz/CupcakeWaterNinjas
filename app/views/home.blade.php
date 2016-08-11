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
<div id="owl-demo">
  <div class="item"><img src="http://www.handletheheat.com/wp-content/uploads/2013/10/Ultimate-Chocolate-Chip-Cookies-Square-550x550.jpg" alt="Chocolate Chip"></div>
  <div class="item"><img src="http://www.handletheheat.com/wp-content/uploads/2015/02/Coconut-Oil-Brownies-Square.jpg" alt="Brownies"></div>
  <div class="item"><img src="http://images.bigoven.com/image/upload/v1421123263/salmon-sushi-3.jpg" alt="Sushi"></div>
  <div class="item"><img src="http://www.seriouseats.com/images/2015/02/20150213-chicken-fried-steak-joshua-bousel.jpg" alt="Chicken Fried Steak"></div>
  <div class="item"><img src="http://www.centercutcook.com/wp-content/uploads/2014/03/fried-shrimp-6.jpg" alt="Fried Shrimp"></div>
  <div class="item"><img src="http://greatist.com/sites/default/files/styles/big_share/public/SlowCooker-Pork-Ramen_0.jpg?itok=kvBKeje7" alt="Arcanine"></div>
  <div class="item"><img src="http://www.noobcook.com/wp-content/uploads/2014/06/japbeefcurry.jpg" alt="Beef Curry"></div>
  <div class="item"><img src="http://smokeybones.com/wp-content/uploads/2015/11/smokehouse-burger.jpg" alt="Burger"></div>

</div>



<!-- Content Start - Just for visualization -->
<div id="content">
  <h2><b>Most recent recipes</b></h2>
 <!-- Recipe Start -->
 @foreach($recipes as $recipe)
	<div class="recipe">
		<div class="image">
	    	<img src="{{$recipe->recipe_pic}}">
	  		<div class="likes">
	    		<i class="fa fa-heart-o lv" data-test="pulse"></i>
			</div>
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
