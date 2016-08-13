@extends('layouts.app')

@section('head')
<link rel='icon' type='image/png' href='http://i.imgur.com/jm7EdAX.png'/>
<link rel="stylesheet" href="../js/dropzone/dist/min/dropzone.min.css">

<script src="../js/dropzone/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="../js/createrecipe.js">
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


		  {{Form::open(['id' => 'recipeCreate','url'=> '/create/recipe', 'method' => 'POST', 'class' =>
		  'form-horizontal'])}}
		  <div class="form-group">
				<label class="col-sm-2 control-label">Recipe Name</label>

				<div class="col-sm-7">
					 {{ Form::text('recipeName', null, [ 'placeholder' => 'Recipe Name',
					 'class' => 'form-control', 'required', 'name' => 'recipe_name']) }}
				</div>
		  </div>
		  <div class="form-group">
				<label class="col-sm-2 control-label">Difficulty</label>

				<div class="col-sm-7">
					 {{ Form::radio('difficulty', 'Beginner', true,['class' => 'field', 'name'=>'diff']) }} Beginner<br>
					 {{ Form::radio('difficulty', 'Intermediate',null,['class' => 'field', 'name'=>'diff']) }} Intermediate<br>
					 {{ Form::radio('difficulty', 'Advanced',null,['class' => 'field', 'name'=>'diff']) }} Advanced
				</div>
		  </div>
		  <div class="form-group">
				<label class="col-sm-2 control-label">Cook Time</label>

				<div class="col-sm-7">
					 {{ Form::text('cook_time', null, [ 'placeholder' => 'Cook Time in minutes: Enter 70 for 70 minutes',
					 'class' => 'form-control', 'required', 'name'=>'cook_time']) }}
				</div>
		  </div>
		  <div class="form-group">
				<label class="col-sm-2 control-label">Ingredients</label>

				<div class="col-sm-7">
					 {{ Form::textarea('ingredients', null, [ 'placeholder' => 'Ingredients: Separate each ingredient by a
					 new line!',
					 'class' => 'form-control ingr', 'required']) }}
				</div>
		  </div>
		 <div class="form-group">
			 <label class="col-sm-2 control-label">Directions</label>
			 <div class="col-sm-7">
				 {{ Form::textarea('directions', null, [ 'placeholder' => 'Directions: Label each step and separate each step by a new line!',
				 'class' => 'form-control dir', 'required']) }}
			 </div>
		 </div>
		  <div class="form-group">
				<label class="col-sm-2 control-label">Cooked Food Picture</label>

				<div class="col-sm-7">
					<!--- DROPZONE SHIT --->
					<div id="dZUpload" class="dropzone">
						<div class="dz-default dz-message"></div>
					</div>
				</div>
                <br>
		  </div>

         <div class="form-group">
             <div class="col-sm-offset-2 col-sm-6">
                 {{ Form:: submit('Submit Recipe', [ 'class' => 'btn btn-primary btn-block', 'id' => 'create_recipe_submit']) }}
                 {{Form::close()}}
             </div>
         </div>

	 </div>
	<input type="hidden" id="insertedRecipeId" name="insertedRecipeId" value="">

    <script>
        $(document).ready(function () {
			$( '#recipeCreate' ).on( 'submit', function(e) {
				e.preventDefault();

				var recipename = $('input[name=recipe_name]').val();
				var diff = $('input[name=diff]').val();
				var cooktime = $('input[name=cook_time]').val();
				var ingr = $('.ingr').val();
				var dir = $('.dir').val();

				$.ajax({
					type: "POST",
					url: '/create/recipe',
					data: {recipeName:recipename, difficulty:diff, ingredients:ingr, directions:dir, cook_time:cooktime}
				}).done(function( msg ) {
					if($.isNumeric((msg))){
						alert("success: recipe added.");
						//$('#insertedRecipeId').val(msg);
						console.log("submitting image...");

						$('#dZUpload').get(0).dropzone.processQueue();
						redirect('../view/myrecipes');
					}
					//alert( msg );
				});
			});

			Dropzone.autoDiscover = false;
            $("#dZUpload").dropzone({
                url: "/upload",
                addRemoveLinks: true,
                paramName: "file",
				autoProcessQueue: false,
				maxFiles: 1,
				maxfilesexceeded: function(file) {
					this.removeAllFiles();
					this.addFile(file);
				},
                success: function (file, response) {
                    var imgName = response;
                    file.previewElement.classList.add("dz-success");
                    console.log("Successfully uploaded :" + imgName);
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                }
            });

			$('#create_recipe_submit').click(function(){

			});
        });

		function redirect (url) {
			var ua        = navigator.userAgent.toLowerCase(),
				isIE      = ua.indexOf('msie') !== -1,
				version   = parseInt(ua.substr(4, 2), 10);

			// Internet Explorer 8 and lower
			if (isIE && version < 9) {
				var link = document.createElement('a');
				link.href = url;
				document.body.appendChild(link);
				link.click();
			}

			// All other browsers can use the standard window.location.href (they don't lose HTTP_REFERER like IE8 & lower does)
			else {
				window.location.href = url;
			}
		}
    </script>
@endsection
