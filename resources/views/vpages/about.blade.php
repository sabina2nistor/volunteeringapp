@extends('main')

@section('title', '| Despre Manage V')

@section('stylesheets')
	<style>
  .bg-1 { 
      background: linear-gradient(white, #79d189); /* Green */
      color: black;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background: linear-gradient(#e59a32, white); /* White */
      color: #555555;
  }
  </style>
@stop

@section('container')

			<div class="container-fluid bg-1 text-center">
			  <h3>Cine suntem?</h3>
			  <img src="https://sitebooster-appsharp.netdna-ssl.com/i/56632c96839d1504447010fe/392db5bc86a440dba7aa46a3a958eb29/f=JPEG"  alt="Logo" width="350" height="350">
			  <h3>Suntem voluntari</h3>
			</div>

			<div class="container-fluid bg-2 text-center">
			  <h3>Manage V</h3>
			  <p>Manage V este o aplicatie de manageriere a voluntarilor dintr-un ONG.</p>
			  <p> Vrem sa aducem si mai aproape comunitatea din cadrul unei asociatii asa ca te invitam sa folosesti aplicatia ce va salva timp si iti va arata cat de mult ai contribuit societatii</p>
			</div>

			<div class="container-fluid bg-3 text-center">
			  <h3>Inscrie-te si tu</h3>
			  <p>Fa-ti cont si fa parte din asociatiile care reusesc sa-si organizeze evenimentele si voluntarii cu ajutorul Manage V</p>
			</div>



@stop