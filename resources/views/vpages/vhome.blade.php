@extends('main')

@section('title','| V Home')

 @section('stylesheets')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<style>
		.mySlides {display:none;}
	</style>
@stop 



@section('container')

<div class="container-fluid">
	<div id="main">
		<div class="row">
			<div id="slider">
				<div class="w3-content w3-section" style="max-width:500px">
					<img class="mySlides" src="http://img.wall-street.ro/image_thumbs/articles/0/8/8/208821/p_208821_760x420-00-65.jpg" style="width:100%">
					<img class="mySlides" src="http://www.lsfetc.ro/wp-content/uploads/volunteer.jpg" style="width:100%">
				</div>
			</div>
		</div>

	</div>
</div>

@stop

@section('scripts')
	<script>
		var myIndex = 0;
		carousel();

		function carousel() {
		    var i;
		    var x = document.getElementsByClassName("mySlides");
		    for (i = 0; i < x.length; i++) {
		       x[i].style.display = "none";  
		    }
		    myIndex++;
		    if (myIndex > x.length) {myIndex = 1}    
		    x[myIndex-1].style.display = "block";  
		    setTimeout(carousel, 1500); // Change image every 2 seconds
		}
	</script>
@stop