@extends('main')

@section('title', '| Toate Departamentele')

@section('container')

	<div id="main">
    	<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-2">
					<h1>Departamente</h1>
					{{-- <table class="table">
						<thead>
							<tr>
								<th class="success">#</th>
								<th class="success">Nume</th>
								<th class="success">Descriere</th>
							</tr>
						</thead>

						<tbody>
							@foreach($departments as $department)
								<tr>
									<th>{{ $department->id }}	</th>
									<td>{{ $department->name }}</td>
									<td>{{ $department->description }}</td>
								</tr>
							@endforeach
						</tbody>
					</table> --}}
					@foreach($departments as $department)
						<div class="panel-group">
							<div class="panel panel-success">
						      <div class="panel-heading">{{ $department->name }}</div>
						      <div class="panel-body">{{ $department->description }}</div>
						    </div>
						</div>
					@endforeach
				</div> <!--end of col-md-8 -->



				<div class="col-md-3">
					<div class="well">
						<form method="POST" action="{{ route('departments.store') }}">
							 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
							<h2>Departament nou</h2>
							
							 	 <label name="name">Nume:</label> 
								 <input id="name" name="name" class="form-control"> 

								 <label name="description">Descriere:</label> 
								 <input id="description" name="description" class="form-control"> 

						 	<input type="submit" value="Adauga un nou departament" class="btn btn-success btn-block btn-h1-spacing" style="margin-top: 15px"> 

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection