@extends('main')

 @section('title', '| '.$project->title )  

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
			
			<ul class="breadcrumb">
			  <li><a href="{{ route('vapp.seeprojects') }}">Proiecte</a></li>
			  <li><a href="{{ url('vapp/'.$project->slug) }}">Proiectul {{ $project->title }}</a></li>
			  <li class="active">Taskuri</li>
			</ul>
			
		</div>

		<div class="row">
		<h1>Taskurile pentru {{ $project->title }}</h1>
		<h3 > {{ $project->tasks()->count() }}  taskuri:</h3>
					 <table class="table">
						<thead>
							<tr>
								<th class="success">#</th>
								<th class="success">Nume</th>
								<th class="success">Descriere</th>
								<th class="success"></th>
							</tr>
						</thead>

						<tbody>

							@foreach($project->tasks as $task)


							<tr>						
								<td>{{ $task->id }}</td>
								<td>{{ $task->name }}</td>
								<td>{{ $task->description }}</td>
								<td>
								@if((in_array($task->id, $taskDist)))
								
								 	<form role="form" method="POST" action="{{ route('tasks.assign', ['taskId'=>$task->id]) }}">
								 	    {{ csrf_field() }}
										  <button class="btn btn-sm btn-success disabled">
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button> 
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									</form>
											
										
									
									@else()
									<form role="form" method="POST" action="{{ route('tasks.assign', ['taskId'=>$task->id]) }}">
										{{ csrf_field() }}
										<button class="btn btn-sm btn-success ">
											<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										</button>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									</form>  
								@endif
								
								
								</td> 
								{{-- <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($task->created_at) ) }}</p> --}}
								{{-- <p>{{ $task->updated_at->diffForHumans() }}</p> --}}
							{{-- </tr>
							@endforeach --}}

						

							@endforeach
						 </tbody>
					</table>
				</div>

		</div>
	</div>
</div>

@endsection