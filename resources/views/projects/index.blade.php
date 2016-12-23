@extends('main')

@section('title', '| Toate proiectele')

@section('container')

	<div class="row">
		<div class="col-md-10">
			<h1>Toate proiectele</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('projects.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Creeaza proiect</a>
		</div>

		<div class="col-md-12">
			<hr>
		</div>

	</div><!-- end of the row-->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Titlu</th>
					<th>Descriere</th>
					<th>Creat la data</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($projects as $project)
						<tr>
							<th>{{ $project->id }}</th>
							<td>{{ $project->title }}</td>
							<td>{{ substr($project->body, 0,50) }}{{ strlen($project->body)>50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y H:i',strtotime($project->created_at)) }}</td>
							<td>
								<a href="{{ route('projects.show',$project->id) }}" class="btn btn-default btn-sm">Vizualizeaza</a>
								<a href="{{ route('projects.edit',$project->id) }}" class="btn btn-default btn-sm">Editeaza</a>
							</td>


						</tr>
					@endforeach
				</tbody>

			</table>

			<div "text-center">
			{!! $projects->links(); !!}

			</div>
			
		</div>
	</div>

@endsection