@extends('main')

@section('title','| Proiecte propuse')

@section('container')


<div id="main">

	<div class="container">
		{{-- <img src="{{ asset('images/bg-projects.jpg') }} "> --}}
		<div class="row">
		<div class="col-md-4 ">
			<h1 > Proiecte propuse</h1>
		</div>

		<div class="col-md-3 col-md-offset-4">
				<form method="GET" > 
					
		            <div class="input-group">
		    			<input class="form-control" placeholder="Search..." id="query" name="search" value="" type="text">
		                <div class="input-group-btn">
		                   	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
		                </div>
		    		</div>
				</form>
			</div>
			<br>
		</div>
		<hr>

				


		@foreach ($projects->chunk(3) as $chunk)
			<div class="row">
				@foreach ($chunk as $project)
					<div class="col-xs-4">
						<h3>{{ $project->title }}</h3>
						{{-- <h5>Durata: {{ date('M j, Y H:i',strtotime($project->begin_date)) }}</h5>  - {{ date('M j, Y H:i',strtotime($project->begin_date)) }}</h5> --}}
						<p>{{ substr(strip_tags($project->body), 0, 300)}}{{ strlen(strip_tags($project->body)) >300 ? "..." : ""}}</p>
						<a href="{{ url('vapp/'.$project->slug) }}" class="btn btn-success">Mai mult..</a> 
						<hr>
					</div>
				@endforeach
			</div>
		@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
			{!! $projects->links() !!}
			</div>
			
		</div>
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