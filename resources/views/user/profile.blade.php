@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-8">
		<img src="{{ Gravatar::src($user->email) }}">
		<h1>Profile <a href="/user/{{ $user->id }}/edit">[edit]</a></h1>
		<ul>
			<li><strong>Name</strong>: {{ $user->first_name }} {{ $user->last_name }}</li>
			<li>{{ $user->city }}, {{ $user->state }}</li>
			<li>Currency: {{ strtoupper($user->currency) }}</li>
			<li>Weight Scale: {{ $user->weight_scale }}</li>
			<li>Age: {{ $user->getAge() }}</li>
			<li>Create Date: {{ $user->created_at }}</li>
			
		</ul>
	</div>
	<div class="col-md-4">
		<h1>Team: {{ $user->team->name }}</h1>
		<ul>
			<li>Food Bill: ${{ $user->team->avg_spent_food_month }} per month</li>
			<li>Latitude: {{ $user->team->latitude }}</li>
			<li>Longitude: {{ $user->team->longitude }}</li>
			
		</ul>
	</div>
</div>
{{ $user->team }}
@stop
