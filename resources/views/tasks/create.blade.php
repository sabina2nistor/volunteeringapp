@extends('main')

@section('title', '| Taskuri')

@section('container')
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Taskuri </h1>
				<table class="table">
					<thead>
						<tr>
							<th class="success">#</th>
							<th class="success">Nume</th>
							<th class="success">Desecriere</th>
						</tr>
					</thead>

					<tbody>
						@foreach($project->tasks as $task)
							<tr>
								<th>{{ $task->id }}	</th>
								<td>{{ $task->name }}</td>
								<td>{{ $task->description }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div> <!--end of col-md-8 -->

			<div class="col-md-3">
				<div class="well">
				
					<form method="POST" action="{{ route('tasks.store',$project->slug) }}">
							 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
							<h2>Task nou</h2>
							
							 	 <label name="name">Nume:</label> 
								 <input id="name" name="name" class="form-control"> 

								 <label name="description">Descriere:</label> 
								 <input id="description" name="description" class="form-control"> 

						 	<input type="submit" value="Adauga un nou task" class="btn btn-success btn-block btn-h1-spacing" style="margin-top: 15px"> 

					</form>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection