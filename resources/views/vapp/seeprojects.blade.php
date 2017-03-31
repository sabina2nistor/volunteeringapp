@extends('main')

@section('title','| Proiecte propuse')

@section('container')

<div class="container-fluid">
	<div id="main">
	<h2 style="text-align: center"> Proiecte propuse</h2>
	<br>

		<div class="container-2">
			<?php $i = 0; ?>
			@foreach($projects as $project)
			  <?php $i++; ?>
			
			  <div class="container-2-box">
			    <h3>{{ $project->title }}</h3>
			    <p>{{ substr(strip_tags($project->body), 0, 300)}}{{ strlen(strip_tags($project->body)) >300 ? "..." : ""}}</p>
			    <a href="{{ url('vapp/'.$project->slug) }}" class="btn btn-success">Mai mult..</a>  
			  </div>

		@if($i % 3 == 0)
			</div><br>
			<div class="container-2">
		@endif

			@endforeach
			</div>


		
	</div>
</div>
@stop

@section('scripts')
	<script src='https://cdn.slaask.com/chat.js'></script>
	<script>
	    _slaask.init('07536178df905e9284774e766f75b9aa');
	</script>
@stop