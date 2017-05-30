@extends('main')

@section('title', '| Creeare proiect')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
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
		  toolbar: 'undo | redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  content_css: '//www.tinymce.com/css/codepen.min.css'
		});
 	</script>
@stop

@section('container')
	<div id="main">
		<div class="row">
			 <div class="col-md-8 col-md-offset-2"> 
				 <h1>Creeaza un nou proiect</h1> 
				 <hr> 
				 {{-- <form method="POST" action="{{ route('projects.store') }}"> 
					 <div class="form-group"> 
					 	 <label name="title">Titlu:</label> 
						 <input id="title" name="title" class="form-control"> 
					 </div> 

					 <div class="form-group"> 
					 	 <label name="slug">Url-ul proiectului:</label> 
						 <input id="slug" name="slug" class="form-control"> 
					 </div> 

					 <div class="form-group"> 
						 <label name="body">Descrierea proiectului:</label> 
						 <textarea id="body" name="body" rows="20" class="form-control"></textarea> 
					 </div> 

					    <strong>Incepand cu data: </strong>  
	    				<input class="date form-control" id="begin_date" name="begin_date" style="width: 300px;" type="text">
	    				<br>

				    	<br>
					 <input type="submit" value="Creeaza proiect" class="btn btn-success btn-lg btn-block"> 
					 <input type="hidden" name="_token" value="{{ Session::token() }}"> 
				 </form>  --}}

			{!! Form::open(array('route' => 'projects.store','data-parsley-validate' => '', 'files' => true)) !!}
			 	{{ Form::label('title', 'Title:') }}
			 	{{ Form::text('title',null, array('class' => 'form-control','required' => '','maxlength' => '255' )) }}

			 	{{ Form::label('slug', 'Slug:',['class' => 'form-spacing-top']) }}
			 	{{ Form::text('slug',null, array('class' => 'form-control','required' => '','minlength' => '5','maxlength' => '255' )) }}

			 	{{ Form::label('department_id', 'Departament:',['class' => 'form-spacing-top']) }}
			 	<select class='form-control' name='department_id'>
			 		@foreach($departments as $department)
			 			<option value='{{ $department->id }}'>{{ $department->name }}</option>
			 		@endforeach
			 	</select>

			 	{{ Form::label('tags', 'Tag:',['class' => 'form-spacing-top']) }}
			 	<select class='form-control select2-multi' name='tags[]' multiple="multiple">
			 		@foreach($tags as $tag)
			 			<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
			 		@endforeach
			 	</select> 

			 	{{ Form::label('featured_image', 'Incarca o imagine sugestiva:',['class' => 'form-spacing-top']) }}
			 	{{ Form::file('featured_image') }} 

			 	{{ Form::label('body', 'Descrierea proiectului:',['class' => 'form-spacing-top']) }}
			 	{{ Form::textarea('body',null, array('class' => 'form-control')) }}

			 	{{ Form::label('begin_date', 'Data de inceput (YYYY-MM-DD):',['class' => 'form-spacing-top']) }}
			 	{{ Form::text('begin_date',null, array('class' => 'date form-control','required' => '')) }}

			 	{{ Form::label('end_date', 'Data de sfarsit:',['class' => 'form-spacing-top']) }}
			 	{{ Form::text('end_date',null, array('class' => 'date form-control','required' => '')) }}

			 	{{ Form::submit('Adauga proiect', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
			 {!! Form::close() !!}
			 </div> 
		 </div>﻿
	</div>
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  

	<script type="text/javascript">  

        $('.date').datepicker({  

           format: 'yyyy-mm-dd'  

         });   

     
    </script>  
    
  {!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		
		$('.select2-multi').select2();
	</script>

    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=d225gurfclcqnz1m0qfp4aqu8uu6nfb1tap5mrgdkyv63kq7"></script>
    
@stop