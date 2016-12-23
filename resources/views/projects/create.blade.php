@extends('main')

@section('title', '| Creare proiect')


@section('container')
	<div class="row">
		 <div class="col-md-8 col-md-offset-2"> 
			 <h1>Creeaza un nou proiect</h1> 
			 <hr> 
			 <form method="POST" action="{{ route('projects.store') }}"> 
				 <div class="form-group"> 
				 	 <label name="title">Titlu:</label> 
					 <input id="title" name="title" class="form-control"> 
				 </div> 

				{{-- <div class="form-group"> 
				 	 <label name="slug">Slug:</label> 
					 <input id="slug" name="slug" class="form-control"> 
				 </div> --}}

				 <div class="form-group"> 
					 <label name="body">Descrierea proiectului:</label> 
					 <textarea id="body" name="body" rows="10" class="form-control"></textarea> 
				 </div> 

				    <strong>Date : </strong>  
    				<input class="date form-control" style="width: 300px;" type="text">
    				<br>
				 <input type="submit" value="Creaza proiect" class="btn btn-success btn-lg btn-block"> 
				 <input type="hidden" name="_token" value="{{ Session::token() }}"> 
			 </form> 
		 </div> 
	 </div>﻿
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
	<script type="text/javascript">  

        $('.date').datepicker({  

           format: 'mm-dd-yyyy'  

         });  

    </script>  
@stop