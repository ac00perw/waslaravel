@extends('layouts.app')

@section('content')
	{!! Form::open(['url'=> 'waste']) !!}
		@include('waste._form', ['submitButtonText' => 'Record Waste', 'headerText' => 'New entry'])
	{!! Form::close() !!}

	@if ($errors->any() )
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop

@section('bottom-scripts')
<script>
	$(function(){
    $('#description').focus();
    
	});
</script>
@Stop
