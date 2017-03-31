@extends('main')

@section('title', '| Editare Taskuri')

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Edt task</h1>

				{{ Form::model($task, ['route'=>['tasks.update', $task->id], 'method'=>'PUT' ]) }}

					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' =>'form-control']) }}

					{{ Form::label('description', 'Descriere task:') }}
					{{ Form::text('description', null, ['class' =>'form-control']) }}

					{{ Form::submit('Update task', ['class'=>'btn btn-block btn-success', 'style'=>'margin-top:15px']) }}

				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>
@endsection