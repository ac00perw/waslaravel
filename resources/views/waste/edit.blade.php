@extends('layouts.app')

@section('content')
<div class="panel panel-default">
		{!! Form::model($waste, ['method'=> 'patch', 'action' => ['WastesController@update', $waste->id]  ]) !!}
		@include('waste._form', ['submitButtonText' => 'Update Waste', 'headerText' => 'Edit Entry'])
		{!! Form::close() !!}

		@if ($errors->any() )
			<ul class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
</div>
@stop
