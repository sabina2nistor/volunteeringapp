@extends('main')

@section('title', '| Toate asociatiile')

@section('container')

<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-md-offset-1">
				<a href="{{ route('associations.index') }}" style="font-size: 40px">Toate asociatiile</a>
			</div>
			

			<div class="col-md-3">
				<a href="{{ route('associations.create') }}" class="btn btn-lg btn-block btn-success ">Creeaza Asociatie</a>
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
						<th class="success">Descriere</th>
						<th class="success">Locatie</th>
						<th class="success">Domeniu</th>
						<th class="success">Logo</th>
						{{-- <th class="success">Creat la data</th> --}}
						<th class="success"></th>
					</thead>
					<tbody>
						@foreach($associations as $association)
							<tr>
								<th>{{ $association->id }}</th>
								<td>{{ $association->name }}</td>
								<td>{{ $association->description}}</td>
								<td>{{ $association->location }}</td>
								<td>{{ $association->field }}</td>
								<td><img src="{{ asset('images/' . $association->logoimg) }}" alt="img" height="70" width="70" /></td>
								{{-- <td>{{ date('M j, Y H:i',strtotime($association->created_at)) }}</td> --}}
								<td>
									
									<a href="{{ route('associations.edit',$association->id) }}" class="btn btn-default btn-sm">Editeaza</a>
									<a href="{{ url('departments/'.$association->id.'/departments-create/') }}" class="btn btn-default btn-sm">Adauga departament</a>
								</td>


							</tr>
						@endforeach
					</tbody>

				</table>

			</div>
		</div>
	</div>
</div>

@endsection