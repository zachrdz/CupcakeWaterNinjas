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
<!--  jQuery 1.7+  -->
<script src="jquery-1.9.1.min.js"></script>

<!-- Include js plugin -->
<script src="js/owl-carousel/owl.carousel.js"></script>

@endsection

@section('content')


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
	<div class="recipe">
		<div class="image">
	    	<img src="http://media-cache-ak0.pinimg.com/736x/1d/00/01/1d0001fa63225bff898025658a90bece.jpg">
	  		<div class="likes">
	    		<i class="fa fa-heart-o lv" data-test="pulse"></i>
			</div>
	 		<div class="name">
	 			<h3>Conchiglioni with Tofu Ricotta</h3>
	 		</div>
		</div>
  		<ul class="media">
		    <li><i class="fa fa-clock-o"></i> 30 Minutes</li>
		    <li><i class="fa fa-leaf"></i> 250 Calories</li>
		    <li><i class="fa fa-cutlery"></i> 4 People</li>
  		</ul>
	</div>
  <!-- Recipe End -->
   <!-- Recipe Start -->
	<div class="recipe">
		<div class="image">
	    	<img src="https://anodetomungbeans.files.wordpress.com/2013/11/dsc_0330.jpg">
	  		<div class="likes">
	    		<i class="fa fa-heart-o lv"></i>
			</div>
	 		<div class="name">
	 			<h3>Cauliflower Rice Sushi</h3>
	 		</div>
		</div>
  		<ul class="media">
		    <li><i class="fa fa-clock-o"></i> 45 Minutes</li>
		    <li><i class="fa fa-leaf"></i> 175 Calories</li>
		    <li><i class="fa fa-cutlery"></i> 2 People</li>
  		</ul>
	</div>
  <!-- Recipe End -->
   <!-- Recipe Start -->
	<div class="recipe">
		<div class="image">
	    	<img src="http://gourmandelle.com/wp-content/uploads/2013/10/Chiftelute-de-naut-Falafel-Chickpea-Patties-Recipe.jpg">
	  		<div class="likes">
	    		<i class="fa fa-heart-o lv"></i>
			</div>
	 		<div class="name">
	 			<h3>Chickpea Falafel</h3>
	 		</div>
		</div>
  		<ul class="media">
		    <li><i class="fa fa-clock-o"></i> 75 Minutes</li>
		    <li><i class="fa fa-leaf"></i> 85 Calories</li>
		    <li><i class="fa fa-cutlery"></i> 6 People</li>
  		</ul>
	</div>
  <!-- Recipe End -->
   <!-- Recipe Start -->
	<div class="recipe">
		<div class="image">
	    	<img src="http://data3.whicdn.com/images/60675612/large.jpg">
	  		<div class="likes">
	    		<i class="fa fa-heart-o lv"></i>
			</div>
	 		<div class="name">
	 			<h3>Banana Walnut Muffin Pancakes</h3>
	 		</div>
		</div>
  		<ul class="media">
		    <li><i class="fa fa-clock-o"></i> 25 Minutes</li>
		    <li><i class="fa fa-leaf"></i> 270 Calories</li>
		    <li><i class="fa fa-cutlery"></i> 2 People</li>
  		</ul>
	</div>
  <!-- Recipe End -->



@for($i = 0; $i < 20; $i++)
<!-- Recipe Start -->
<div class="recipe">
 <div class="image">
     <img src="http://data3.whicdn.com/images/60675612/large.jpg">
     <div class="likes">
       <i class="fa fa-heart-o lv"></i>
   </div>
   <div class="name">
     <h3>Banana Walnut Muffin Pancakes</h3>
   </div>
 </div>
   <ul class="media">
     <li><i class="fa fa-clock-o"></i> 25 Minutes</li>
     <li><i class="fa fa-leaf"></i> 270 Calories</li>
     <li><i class="fa fa-cutlery"></i> 2 People</li>
   </ul>
</div>
<!-- Recipe End -->
@endfor


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
