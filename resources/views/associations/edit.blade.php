
@extends('main')

@section('title', '| Editeaza Asociatia')



@section('container')
	<div id="main">
		<div class="container">
			<div class="row">


				{!! Form::model($association, ['route' => ['associations.update', $association->id], 'method'=> 'PUT', 'files'=>true]) !!}
				 	<div class="col-md-8">
				 		{{ Form::label('name', 'Nume:') }}
						{{ Form::text('name',null, ['class' => 'form-control input-lg']) }}

						{{ Form::label('location', 'Locatie:',['class' => 'form-spacing-top']) }}
						{{ Form::text('location',null, ['class' => 'form-control']) }}


						{{ Form::label('field', 'Domeniu:',['class' => 'form-spacing-top']) }}
						{{ Form::text('field',null, ['class' => 'form-control']) }}

						{{ Form::label('logo_image', 'Incarca logou-ul asociatiei', ['class' => 'form-spacing-top']) }}
						{{ Form::file('logo_image') }} 
						
						{{ Form::label('description', 'Descrierea asociatiei:') }}
					 	{{ Form::textarea('description',null, array('class' => 'form-control')) }}

				 	</div>


					<div class="col-md-4"> 
							<div class="well"> 
								

								<dl class="dl-horizontal"> 
									<dt>Creat la data:</dt> 
									<dd>{{ date('M j, Y h:i:sa', strtotime($association->created_at)) }}</dd> 
								</dl> 
								<dl class="dl-horizontal"> 
									<dt>Modificat la data:</dt> 
									<dd>{{ date('M j, Y h:i:sa', strtotime($association->updated_at)) }}</dd> 
								</dl> 
								<hr>

								<div class="row"> 
									
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

