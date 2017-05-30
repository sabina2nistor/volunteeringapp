@extends('main')

@section('title', '| Toate Tagurile')

@section('container')
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Taguri</h1>
				<table class="table">
					<thead>
						<tr>
							<th class="success">#</th>
							<th class="success">Nume</th>
						</tr>
					</thead>

					<tbody>
						@foreach($tags as $tag)
							<tr>
								<th>{{ $tag->id }}	</th>
								<td><a href="{{  route('tags.show', $tag->id)}}">{{ $tag->name }}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div> <!--end of col-md-8 -->

			<div class="col-md-3">
				<div class="well">
				
					<form method="POST" action="{{ route('tags.store') }}">
						 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
						<h2>Adauga tag</h2>
						
						 	 <label name="name">Nume:</label> 
							 <input id="name" name="name" class="form-control"> <br>
					 	<input type="submit"  value="Adauga tag" class="btn btn-success btn-block btn-h1-spacing"> 

					</form>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
