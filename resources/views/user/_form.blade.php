    {{ csrf_field() }}
		<div class="form-group">
			{!! Form::label('first_name', "First") !!}
			{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('last_name', "Last") !!}
			{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('city', "City") !!}
			{!! Form::text('city', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('state', "State") !!}
			{!! Form::text('state', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('birthdate', "Birth Date") !!}
			{!! Form::text('birthdate', null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				{!! Form::label('currency', "Preferred currency") !!}
				{!! Form::select('currency', array('usd' => 'US Dollars', 'euro' => 'Euro'), null ) !!}
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				{!! Form::label('weight_scale', "Preferred weight scale") !!}
				{!! Form::select('weight_scale', array('imperial' => 'Imperial', 'metric' => 'Metric'), null ) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'small-btn btn-primary form-control']) !!}
		</div>
