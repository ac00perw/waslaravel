	    {{ csrf_field() }}
	<div class="container">
	<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">Team Info</div>
		<div class="form-group">
			{!! Form::label('team_name', 'Team Name') !!}
			{!! Form::text('team_name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('team_description', "Team Description") !!}
			{!! Form::text('team_description', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('city', "City") !!}
			{!! Form::text('city', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('state', "State") !!}
			{!! Form::text('state', null, ['class' => 'form-control']) !!}
		</div>
	</div>

<div class="panel panel-default">
		<div class="panel-heading">Contact Info</div>
			<div class="form-group">
				{!! Form::label('first_name', "Contact First Name") !!}
				{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('last_name', "Contact Last Name") !!}
				{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('email', "Contact Email Address") !!}
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('birthdate', "Birth Date") !!}
				{!! Form::text('birthdate', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-sm-4">
	<div class="panel panel-default">
		<div class="panel-heading">Details</div>
		<div class="form-group">
				{!! Form::label('avg_food_cost', "Average monthly food bill") !!}
				{!! Form::text('avg_food_cost', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('timezone', "Timezone") !!}
				<select id="timezone" name="timezone">
					<option value="">select...</option>
					@foreach ($timezonelist as $tz)
						<option @if ( $tz == $user->timezone)
						selected
						@endif
						>{{ $tz }}</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				{!! Form::label('teammates', "Number of Teammates") !!}
				{!! Form::selectRange('teammates', 1, 100) !!}
			</div>
			<div class="form-group">
				{!! Form::label('team_type', "Team Type") !!}
				{!! Form::select('team_type', Config::get('enums.team_types') ) !!}
			</div>
			<div class="form-group">
				{!! Form::label('currency', "Preferred currency") !!}
				{!! Form::select('currency', array('usd' => 'US Dollars', 'euro' => 'Euro'), null ) !!}
			</div>
			<div class="form-group">
				{!! Form::label('weight_scale', "Preferred weight scale") !!}
				{!! Form::select('weight_scale', array('imperial' => 'Imperial', 'metric' => 'Metric'), null ) !!}
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		{!! Form::submit($submitButtonText, ['class' => 'small-btn btn-primary form-control']) !!}
	</div>
</div>