@extends('main')

@section('title','| V Home')

 @section('stylesheets')
	
	<style>
		* {
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration:none;
}
p#white{
    z-index: 10000;
    font-size:75px;
    text-align: right;
    position:absolute;
    width: 20%;
    padding-top: 100px;
    color: #32c83e;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.slider{
    overflow: hidden;
    height:400px;
}

.slider figure div{
    width:20%;
    float:left;
}

.slider figure img{
    width: 100%;
    float: left;
}

.slider figure{
    position: relative;
    width: 500%;
    margin: 0;
    left: 0;
    animation: 30s slidy infinite;
}

@keyframes slidy{
    0%{
        left: 0%;
    }
    10% {
        left: 0%;
    }
    12%{
        left: -100%;
    }
    22% {
        left: -100%;
    }
    24% {
        left: -200%;
    }
    34%{
        left: -200%;
    }
    36%{
        left: -300%;
    }
    46%{
        left: -300%;
    }
    48%{
        left: -400%;
    }
    58%{
        left: -400%;
    }
    60%%{
        left: -300%;
    }
    70%{
        left: -300%;
    }
    72%{
        left: -200%;
    }
    82%{
        left: -200%;
    }
    84%{
        left: -100%;
    }
    94%{
        left: -100%;
    }
    96%{
        left: -0%;
    }
}
	</style>
@stop 



@section('container')

<div class="container-fluid">
	<div id="main">
		<div class="row">
			<div class="slider">
	            <figure>

	                <div class="slide">
	                    <img src="http://www.sibfest.ro/voluntar/images/bg-02.jpg" />
	                    <p id="white"></p>
	                </div>
	                <div class="slide">
	                    <img src="http://img.wall-street.ro/image_thumbs/articles/0/8/8/208821/p_208821_760x420-00-65.jpg" />
	                    <p id="white"></p>
	                </div>
	                <div class="slide">
	                    <img src="http://www.sibfest.ro/voluntar/images/bg-02.jpg" />
	                    <p id="white"></p>
	                </div>
	                <div class="slide">
	                    <img src="http://img.wall-street.ro/image_thumbs/articles/0/8/8/208821/p_208821_760x420-00-65.jpg" />
	                    <p id="white"></p>
	                </div>
	            </figure>
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
		    // x[myIndex-1].style.display = "block";  
		    setTimeout(carousel, 1500); // Change image every 2 seconds
		}
	</script>
@stop