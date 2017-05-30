@extends('main')

@section('title', '| Toate proiectele')

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
		@if (auth()->user()->admin === 1)
			<div class="col-md-7">
				<a href="{{ route('projects.index') }}" style="font-size: 40px">Toate proiectele</a>
			</div>
			<div class="col-md-3">
				<form method="GET" > 
					
		            <div class="input-group">
		    			<input class="form-control" placeholder="Search titlu..." id="query" name="search" value="" type="text">
		                <div class="input-group-btn">
		                   	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
		                </div>
		    		</div>
				</form>
			</div>

			<div class="col-md-2">
				<a href="{{ route('projects.create') }}" class="btn btn-lg btn-block btn-success btn-h1-spacing">Creeaza proiect</a>
			</div>

			<div class="col-md-12">
				<hr>
			</div>

		</div><!-- end of the row-->

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th class="success">#</th>
						<th class="success">Titlu</th>
						<th class="success">Descriere</th>
						<th class="success">Departament</th>
						<th class="success">Creat la data</th>
						<th class="success"></th>
					</thead>
					<tbody>
						@foreach($projects as $project)
							<tr>
								<th>{{ $project->id }}</th>
								<td>{{ $project->title }}</td>
								<td>{{ $project->name }}</td>
								<td>{{ substr(strip_tags($project->body), 0, 50)}}{{ strlen(strip_tags($project->body)) >50 ? "..." : ""}}</td>
								<td>{{ date('M j, Y H:i',strtotime($project->created_at)) }}</td>
								<td>
									<a href="{{ route('projects.show',$project->id) }}" class="btn btn-default btn-sm">Vizualizeaza</a>
									<a href="{{ route('projects.edit',$project->id) }}" class="btn btn-default btn-sm">Editeaza</a>
									<a href="{{ url('vapp/'.$project->slug.'/tasks-create/') }}" class="btn btn-warning btn-sm">Adauga task</a>
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

		
		@endif
	</div>
</div>

@endsection