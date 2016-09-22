@extends('layouts.app')

@section('content')

<div class="container">
<h1>Editing {{ $user->first_name }}</h1>


	{!! Form::model($user, ['method'=> 'patch', 'action' => ['UsersController@update', $user->id]  ]) !!}
		@include('user._form', ['submitButtonText' => 'Update User'])
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