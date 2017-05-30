@extends('main')

@section('title', '| Toti voluntarii')

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
		
			<div class="col-md-7">
				<h1>Voluntari </h1>
				<p>Pagina destinata vizualizarii tuturor voluntarilor</p>
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
						<th class="success">Nume</th>
						<th class="success">Email</th>
						<th class="success">Departament</th>
						<th class="success">Cont creat la data</th>
						<th class="success"></th>
						<th class="success"></th>

					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<th>{{ $user->id }}</th>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->department->name }}</td>
								<td>{{ date('M j, Y H:i',strtotime($user->created_at)) }}</td>
								<td>
									{{-- @if((in_array($user->id, $userDist)))
								
									 	<form role="form" method="POST" action="{{ route('admin.approve', ['userId'=>$user->id]) }}">
									 	    {{ csrf_field() }}
											  <button class="btn btn-sm btn-success ">
												<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
											</button> 
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
										</form>
												
											
										
										@else()
										<form role="form" method="POST" action="{{ route('admin.approve', ['userId'=>$user->id]) }}">
											{{ csrf_field() }}
											<button class="btn btn-sm btn-warning disabled">
												<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
											</button>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
										</form>  
									@endif
								</td>
								<td>
									@if((in_array($user->id, $userDist)))
								
									 	<form role="form" method="POST" action="{{ route('admin.disapprove', ['userId'=>$user->id]) }}">
									 	    {{ csrf_field() }}
											  <button class="btn btn-sm btn-danger ">
												<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											</button> 
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
										</form>
												
											
										
										@else()
										<form role="form" method="POST" action="{{ route('admin.disapprove', ['userId'=>$user->id]) }}">
											{{ csrf_field() }}
											<button class="btn btn-sm btn-danger disabled">
												<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
											</button>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
										</form>  
									@endif
								</td>
 --}}

							</tr>
						@endforeach
					</tbody>

				</table>

				
				
			</div>
		</div>

		
		
	</div>
</div>

@endsection