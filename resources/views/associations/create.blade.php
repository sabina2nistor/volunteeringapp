@extends('main')

@section('title', '| Creeare Asociatie ')


@section('container')
	<div class="main">
		<div class="row">
			 <div class="col-md-8 col-md-offset-2"> 
				 <h1>Creeaza o noua asociatie</h1> 
				 <hr> 
				

			{!! Form::open(array('route' => 'associations.store','data-parsley-validate' => '', 'files' => true)) !!}
			 	{{ Form::label('name', 'Nume:') }}
			 	{{ Form::text('name',null, array('class' => 'form-control','required' => '','maxlength' => '255' )) }}

			 	{{ Form::label('description', 'Descriere:') }}
			 	{{ Form::textarea('description',null, array('class' => 'form-control','required' => '','minlength' => '5','maxlength' => '1500' )) }}


			 	{{ Form::label('location', 'Locatie:') }}
			 	{{ Form::text('location',null, array('class' => 'form-control','required' => '','maxlength' => '255' )) }}
			 	

			 	{{ Form::label('field', 'Domeniu:') }}
			 	{{ Form::text('field',null, array('class' => 'form-control','required' => '','maxlength' => '255' )) }}

			 	{{ Form::label('logo_image', 'Incarca logo-ul asociatiei:',['class' => 'form-spacing-top']) }}
			 	{{ Form::file('logo_image') }} 

			 	{{ Form::submit('Adauga asociatie', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
			 {!! Form::close() !!}
			 </div> 
		 </div>﻿
	</div>
@endsection

