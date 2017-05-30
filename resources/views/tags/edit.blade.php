@extends('main')

@section('title', "| Editeaza Tag")

@section('container')
<div id="main">
	<div class="container">
		<div class="row">
			{{ Form::model($tag, ['route'=>['tags.update',$tag->id], 'method' => "PUT"]) }}
				{{ Form::label('name',"Titlu:") }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::submit('Salveaza', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}

			{{ Form::close() }}
		</div>
	</div>
</div>
@stop