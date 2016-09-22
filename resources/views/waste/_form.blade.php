    {{ csrf_field() }}
		<div class="col-md-6 form-group">
			{!! Form::label('waste_type_id', "Type of Food") !!}<br />
			{!! Form::select('waste_type_id', App\Models\Waste::getWasteList(), ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('description', "Short description") !!}
			{!! Form::text('description', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="col-md-6 form-group">
			{!! Form::label('weight', "Weight in ounces") !!}
			{!! Form::text('weight', null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('cost', "Cost in USD") !!}
			{!! Form::text('cost', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'small-btn btn-primary form-control']) !!}
		</div>