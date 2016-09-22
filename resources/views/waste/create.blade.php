@extends('layouts.app')

@section('content')
<h1>Record Food Scraps</h1>
	{!! Form::open(['url'=> 'waste']) !!}
		@include('waste._form', ['submitButtonText' => 'Add Waste'])
	{!! Form::close() !!}

	@if ($errors->any() )
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop
