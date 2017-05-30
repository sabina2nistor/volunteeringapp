@extends('main')

@section('title', "| $tag->name Tag")

@section('container')
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>{{ $tag->name }} Tag <small>{{ $tag->projects()->count() }} Proiecte</small></h1>
			</div>

			<div class="col-md-2">
				<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block" style="margin-top: 20px">Edit</a>
			</div>

			<div class="col-md-2">
				{{ Form::open(['route'=>['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px']) }}
				{{ Form::close() }}
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th class="success">#</th>
							<th class="success">Titlu</th>
							<th class="success"> Tags</th>
							<th class="success"> </th>
						</tr>
					</thead>

					<tbody>
						@foreach($tag->projects as $project)
						<tr>
							<th>{{ $project->id }}</th>
							<td>{{ $project->title }}</td>
							<td>
							@foreach($project->tags as $tag)
								<span class="label label-default">{{ $tag->name }}</span>
							@endforeach
							</td>
							<td><a href="{{ route('projects.show', $project->id) }} " class="btn btn-default btn-xs">View</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection