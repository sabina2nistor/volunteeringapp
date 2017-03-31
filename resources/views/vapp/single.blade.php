@extends('main')

 @section('title', '| '.$project->title)  

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
				<div class="col-md-8 col-md-offset-2">

					<h1 style="padding-bottom: 30px"> {{ $project->title }} </h1> 

					<img src="{{ asset('images/' . $project->image) }}" alt=" " height="400" width="800" />

					<p> {!! $project->body !!}﻿ </p>
					<hr>
					 <p>Proiect al departamentului de: {{ $project->department->name }}</p> 
					<a href="{{ url('vapp/'.$project->slug.'/tasks' ) }}" class="button" style="vertical-align:middle"><span>Join </span></a>

				</div>
		</div>



		{{-- <div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 > {{ $project->tasks()->count() }} tasks:</h3>
				@foreach($project->tasks as $task)
					
						
							<p>{{ $task->description }}</p>
						
								<h4>{{ $task->name }}</h4>
								 <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($task->created_at) ) }}</p> --}}
								{{-- <p>{{ $task->updated_at->diffForHumans() }}</p>
				@endforeach

			</div>
		</div> --}}
	</div>
</div>

		
	

@endsection