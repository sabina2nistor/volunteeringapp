
@extends('main')

@section('title', '| Editeaza Proiectul')

@section('stylesheets')
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

	<script>
 	tinymce.init({
 		selector: 'textarea',
		  height: 500,
		  menubar: false,
		  plugins: [
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code'
		  ],
		  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  content_css: '//www.tinymce.com/css/codepen.min.css'
		});
 	</script>
@stop

@section('container')
	<div id="main">
		<div class="container">
			<div class="row">

				{{-- <form method="POST" action="{{ route('projects.update', $project->id) }}"> 
					<div class="col-md-8">
						 <div class="form-group"> 
							<label for="title">Titlu:</label> 
							<textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none;">
							{{ $project->title }}</textarea> 
						</div>

						<div class="form-group"> 
							<label for="slug">Url-ul proiectului:</label> 
							<textarea type="text" class="form-control input-lg" id="slug" name="slug" rows="1" style="resize:none;">{{ $project->slug }}</textarea> 
						</div> 

						<div class="form-group"> 
							<label for="body">Descriere:</label> 
							<textarea type="text" class="form-control input-lg" id="body" name="body" rows="10">{{ $project->body }}</textarea> 
						</div> 

						<div class="form-group"> 
							<strong>Incepand cu data: </strong>  
		    				<input class="date form-control" id="begin_date" name="begin_date" style="width: 300px;" type="text">
		    				<br>
						</div>
					</div>

						<div class="col-md-4"> 
							<div class="well"> 
								<dl class="dl-horizontal"> 
									<dt>Incepand cu data:</dt> 
									<dd>{{ date('M j, Y ', strtotime($project->begin_date)) }}</dd> 
								</dl>
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
				</form>﻿ --}}



				{!! Form::model($project, ['route' => ['projects.update', $project->id], 'method'=> 'PUT', 'files'=>true]) !!}
				 	<div class="col-md-8">
				 		{{ Form::label('title', 'Title:') }}
						{{ Form::text('title',null, ['class' => 'form-control input-lg']) }}

						{{ Form::label('slug', 'Slug:',['class' => 'form-spacing-top']) }}
						{{ Form::text('slug',null, ['class' => 'form-control']) }}

						{{ Form::label('department_id', 'Departament:', ['class' => 'form-spacing-top'])  }}
						{{ Form::select('department_id', $departments, null, ['class' => 'form-control']) }}

						{{-- {{ Form::label('tags', "Tags:", ['class' => 'form-spacing-top'])  }}
						{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}--}}


						{{ Form::label('featured_image', 'Upload an image', ['class' => 'form-spacing-top']) }}
						{{ Form::file('featured_image') }} 
						
						{{ Form::label('body', 'Descrierea proiectului:') }}
					 	{{ Form::textarea('body',null, array('class' => 'form-control')) }}

					 	{{ Form::label('begin_date', 'Data de inceput:') }}
					 	{{ Form::text('begin_date',null, array('class' => 'date form-control','required' => '')) }}
				 	</div>


					<div class="col-md-4"> 
							<div class="well"> 
								<dl class="dl-horizontal"> 
									<dt>Incepand cu data:</dt> 
									<dd>{{ date('M j, Y ', strtotime($project->begin_date)) }}</dd> 
								</dl>
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
				{{-- </form>﻿ --}}
				{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
	</div>
@stop

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
	<script type="text/javascript">  

        $('.date').datepicker({  

           format: 'yyyy-mm-dd'  

         });  

    </script>  
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=d225gurfclcqnz1m0qfp4aqu8uu6nfb1tap5mrgdkyv63kq7"></script>
@stop