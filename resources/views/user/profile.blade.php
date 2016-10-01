@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Profile <a href="/user/{{ $user->id }}/edit">[edit]</a></h1>
	<div class="col-sm-5">
	
		<div class="col-md-3">
			<img src="{{ Gravatar::src($user->email) }}">
		</div>
		<div class="col-md-9">
			<ul class="list-unstyled">
				<li><span class="list-larger">{{ $user->first_name }} {{ $user->last_name }}</span></li>
				<li>{{ $user->city }}, {{ $user->state }}</li>
				<li>{{ $user->username }}</li>
				<li>{{ $user->email }}</li>
				<li>Currency: {{ strtoupper($user->currency) }}</li>
				<li>Weight Scale: {{ $user->weight_scale }}</li>
				<li>Timezone: {{ $user->timezone }}</li>
				<li>Age: {{ $user->getAge() }}</li>
				<li>Create Date: {{ $user->created_at }}</li>
			</ul>
		</div>
	</div>
	<div class="col-sm-7">

		<div class="col-md-4">
			@if(file_exists($user->avatar_path)) 
				<img class="avatar" src="/{{ $user->avatar_path }}" alt="" />
			@else
				<img class="avatar" src="/avatars/trash.jpg" alt="" />
			@endif
			<br /><a href="/avatar">update avatar</a>
		</div>
		<div class="col-md-8">
			<ul class="list-unstyled">
				<li><span class="list-larger">{{ $user->team_name }}</span></li>
				<li>Description: {{ $user->team_description }}</li>
				<li>Type: {{ $user->team_type }}</li>
				<li>Number of teammates: {{ $user->teammates }}</li>
			</ul>
		</div>
	</div>
</div>

<hr>
Last Login: {{ Helper::tz(Carbon\Carbon::parse($user->last_login) ) }} from: {{ $user->last_ip }}
	
@stop
