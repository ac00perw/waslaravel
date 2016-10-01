    {{ csrf_field() }}
		<div class="col-md-12 form-group">
			{!! Form::label('name', "Name") !!}<br />
			{!! Form::text('name', \Carbon\Carbon::now("America/New_York")->format('m/d/Y') . " Challenge", ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-12 form-group">
			{!! Form::label('description', "Brief Description") !!}<br />
			{!! Form::text('description', null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('start_date', "Start Date") !!}
			{!! Form::text('start_date', null, ['class' => 'startdate form-control']) !!}
		</div>
		<div class="dateboxes">
			<div class="col-md-4 form-group">
				{!! Form::label('length', "Challenge Length") !!}<br />
				{!! Form::select('length', array('30' => '1 month', '90' => '3 months', '180' => '6 months'), '1 month', ['class' => 'length']) !!}
			</div>
			<div class="col-md-4 form-group">
				{!! Form::label('end_date', "End Date (click to refine)") !!}
				{!! Form::text('end_date', null, ['class' => 'enddate form-control']) !!}
			</div>
		</div>

		

		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'small-btn btn-primary form-control']) !!}
		</div>