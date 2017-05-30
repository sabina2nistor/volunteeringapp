@extends('main')

@section('title','| Statistici')

@section('container')

<div class="container-fluid">
	<div id="main">

        <div class="row">
        	<div class="col-md-6">
				<h1>Statistici </h1>
					{!! $chart->render() !!} 
			</div>

			
        </div>

    </div>

</div>


@stop