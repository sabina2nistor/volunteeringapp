@extends('main')

 @section('title', '| '.$project->title)  

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
			
			<ul class="breadcrumb">
			  <li><a href="{{ route('vapp.seeprojects') }}">Proiecte</a></li>
			  <li class="active">Proiectul {{ $project->title }}</li>
			  <li><a href="{{ url('vapp/'.$project->slug.'/tasks' ) }}">Taskuri</a></li>
			</ul>
			
		</div>
		<div class="row">
				<div class="col-md-8 col-md-offset-2">

					<h1 style="padding-bottom: 30px"> {{ $project->title }} </h1> 

					<img src="{{ asset('images/' . $project->image) }}" alt=" " height="400" width="800" />

					<p> {!! $project->body !!}﻿ </p>
					<hr>
					 <p>Proiect al departamentului de: {{ $project->department->name }}</p> 

					 

					<div class="tags">
						@foreach($project->tags as $tag)
							<span class="label label-default">{{ $tag->name }}</span>
						@endforeach
					</div>
					<hr>

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

	<div class="row">
	<hr>
	<div class="col-md-8 col-md-offset-2">
		<h3 class="comments-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>  {{ $project->comments()->count() }} Comentarii:</h3>
		@foreach($project->comments as $comment)
			<div class="comment">
				<div class="author-info">
					<img src="{{ "https://www.gravatar.com/avatar/" .md5(strtolower(trim($comment->email))) ."?s=50&d=monsterid" }}" class="author-image">
					<div class="author-name">
						<h4>{{ $comment->name }}</h4>
						{{-- <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at) ) }}</p> --}}
						<p class="author-time">{{ $comment->updated_at->diffForHumans() }}</p>
					</div>
				</div>

				<div class="comment-content">
						{{ $comment->comment }}
				</div>
			</div>
		@endforeach
	</div>
</div>


<div class="row">
	<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 40px">
	<h3> Adauga un comentariu: </h3>
	<hr>
		{{ Form::open(['route' => ['comments.store', $project->id], 'method'=>'POST']) }}
			<div class="row">
				{{-- <div class="col-md-6">
					{{ Form::label('name', "Name:") }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>

				<div class="col-md-6">
					{{ Form::label('email', "email:") }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}
				</div> --}}

				<div class="col-md-12">
					{{ Form::label('comment', "Comentariu:") }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' =>'5']) }}

					{{ Form::submit('Adauga', ['class' => 'btn btn-success btn-block', 'style'=>'margin-top:15px']) }}
				</div>


			</div>

		{{ Form::close() }}
	</div>
</div>

	</div>
</div>

		
	

@endsection