@extends('main')

 @section('title', '| '.$project->title )  

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
		<h1>Taskurile pentru {{ $project->title }}</h1>
		<h3 > {{ $project->tasks()->count() }}  taskuri:</h3>
					{{-- <table class="table">
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
								<td> --}}
								@foreach($project->tasks as $task)
								 	 <form role="form" method="POST" action="{{ route('tasks.assign', ['taskId'=>$task->id]) }}">
										 {{-- <button class="btn btn-sm btn-success">
											<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
										</button> --}} 
										{{ csrf_field() }}
											
											<div class="checkbox">
											   <label>
											     <input type="checkbox"> {{ $task->name }}
											   </label>
											   <label> <p>{{ $task->description }}</p></label>
											 </div>

										@endforeach
										<input class = "btn btn-success" type="submit" value="Submit">
									</form>  
									
									{{-- <input type="checkbox" name="chkbox" id="chkbox" class="chkbox"> --}}
							{{-- 	</td> --}}
								{{-- <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($task->created_at) ) }}</p> --}}
								{{-- <p>{{ $task->updated_at->diffForHumans() }}</p> --}}
							{{-- </tr>
							@endforeach --}}

						

						{{-- </tbody>
					</table> --}}
				</div>

		</div>
	</div>
</div>

@endsection