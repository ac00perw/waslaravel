@extends('layouts.app')

@section('content')

<div class="container">

	{!! Form::model($user, ['method'=> 'patch', 'action' => ['UsersController@update', $user->id]  ]) !!}
		@include('user._form', ['submitButtonText' => 'Update Team'])
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