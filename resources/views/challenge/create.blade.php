@extends('layouts.app')

@section('content')
<h1>Start a Challenge!</h1>
	{!! Form::open(['url'=> 'challenges']) !!}
		@include('challenge._form', ['submitButtonText' => 'GO'])
	{!! Form::close() !!}

	@if ($errors->any() )
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop
