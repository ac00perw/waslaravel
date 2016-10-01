@extends('layouts.app')

@section('content')

<div class="container">
<h1>Editing {{ $challenge->name }}</h1>


	{!! Form::model($challenge, ['method'=> 'patch', 'action' => ['ChallengesController@update', $challenge->id]  ]) !!}
		@include('challenge._form', ['submitButtonText' => 'Update Challenge'])
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