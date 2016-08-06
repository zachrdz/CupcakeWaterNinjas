@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png' />
<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="js/owl-carousel/owl.carousel.css">

<!-- Default Theme -->
<link rel="stylesheet" href="js/owl-carousel/owl.theme.css">

<!--  jQuery 1.7+  -->
<script src="jquery-1.9.1.min.js"></script>

<!-- Include js plugin -->
<script src="js/owl-carousel/owl.carousel.js"></script>

@endsection

@section('content')
<script>
$(document).ready(function() {

  $("#owl-demo").owlCarousel({

      autoPlay: 3000, //Set AutoPlay to 3 seconds

      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]

  });

});
</script>
<style type="text/css">


#owl-demo .item{
  margin: 3px;
}
#owl-demo .item img{
  display: block;
  width: 100%;
  height: auto;
}

</style>

<div id="owl-demo">
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/thumb/7/7e/006Charizard.png/600px-006Charizard.png" alt="Owl Image"></div>
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/thumb/7/78/150Mewtwo.png/600px-150Mewtwo.png" alt="Owl Image"></div>
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/thumb/5/55/212Scizor.png/600px-212Scizor.png" alt="Owl Image"></div>
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/8/8b/149Dragonite.png" alt="Owl Image"></div>
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/thumb/3/3e/635Hydreigon.png/600px-635Hydreigon.png" alt="Hydreigon"></div>
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/thumb/b/b8/059Arcanine.png/600px-059Arcanine.png" alt="Arcanine"></div>
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/thumb/0/02/009Blastoise.png/600px-009Blastoise.png" alt="Blastoise"></div>
  <div class="item"><img src="http://cdn.bulbagarden.net/upload/thumb/a/ae/003Venusaur.png/600px-003Venusaur.png" alt="Venusaur"></div>

</div>
@endsection
