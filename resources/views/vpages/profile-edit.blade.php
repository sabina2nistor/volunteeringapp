@extends('main')

@section('title','| Profil')

@section('container')

<div class="container-fluid">
	<div id="main">

        <div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Editare Profil</h1>

				{{ Form::model($user, ['route' => ['vpages.update', $user->id], 'method'=>'PUT' ]) }}

					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' =>'form-control', 'disabled' => '']) }}

					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' =>'form-control', 'disabled' => '']) }}

					{{ Form::label('password', 'Password:') }}
					{{ Form::text('password', null, ['class' =>'form-control']) }}

					{{ Form::submit('Submit', ['class'=>'btn btn-block btn-success', 'style'=>'margin-top:15px']) }}

				{{ Form::close() }}

			</div>
		</div>
@endsection
{{-- @section('scripts')
    <script src="{{url('/js/profile-edit.js')}}"></script>
@endsection --}}