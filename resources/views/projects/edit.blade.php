
@extends('main')

@section('title', '| Editeaza Proiectul')

@section('container')

		<div class="row">

			<form method="POST" action="{{ route('projects.update', $project->id) }}"> 
				<div class="col-md-8">
					 <div class="form-group"> 
						<label for="title">Titlu:</label> 
						<textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none;">
						{{ $project->title }}</textarea> 
					</div>

					{{-- <div class="form-group"> 
						<label for="slug">slug:</label> 
						<textarea type="text" class="form-control input-lg" id="slug" name="slug" rows="1" style="resize:none;">{{ $project->slug }}</textarea> 
					</div> --}}

					<div class="form-group"> 
						<label for="body">Descriere:</label> 
						<textarea type="text" class="form-control input-lg" id="body" name="body" rows="10">{{ $project->body }}</textarea> 
					</div> 
				</div>

					<div class="col-md-4"> 
						<div class="well"> 
							<dl class="dl-horizontal"> 
								<dt>Creat la data:</dt> 
								<dd>{{ date('M j, Y h:i:sa', strtotime($project->created_at)) }}</dd> 
							</dl> 
							<dl class="dl-horizontal"> 
								<dt>Modificat la data:</dt> 
								<dd>{{ date('M j, Y h:i:sa', strtotime($project->updated_at)) }}</dd> 
							</dl> 
							<hr>

							<div class="row"> 
								<div class="col-sm-6"> 
									<a href="{{ route('projects.show', $project->id) }}" class="btn btn-danger btn-block">Inapoi</a> 
								</div> 
							<div class="col-sm-6"> 
								<button type="submit" class="btn btn-success btn-block">Salveaza</button> 
								<input type="hidden" name="_token" value="{{ Session::token() }}"> {{ method_field('PUT') }} 
							</div>
					</div>
			</form>﻿
		</div>
@stop