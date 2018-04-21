@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="searchteams container">
		<h1>{{ $challenge->name }}</h1>
		<div>Starts: {{ $challenge->start_date }}</div>
		<div class="col-md-2 form-group">
			{!! Form::label('team_type', "Type of Team") !!}<br />
			{!! Form::select('team_type', array_merge(array("any"=>"any"), Config::get('enums.team_types') )  ) !!}
		    {{ csrf_field() }}
		</div>
		<div class="col-md-10 form-group">
			{!! Form::label('term', "Search for a Team to Challenge") !!}
			{!! Form::text('term', null, ['id' => 'searchbox', 'class' => 'form-control']) !!}
			{!! Form::hidden('challenge_id', $challenge->id, ['id' => 'challenge_id']) !!}
			<p>Start typing a user's name, school, or email address to search for a user.</p>
		</div>
		<div class="results" id="teams" name="teams">
			
		</div>
	</div>
</div>
@stop

@section('bottom-scripts')
	<script src="{{ asset('js/search-teams.js') }}"></script>
@stop