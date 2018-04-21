@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12">
		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
			    <strong>{{ $message }}</strong>
			</div>
		@endif
		<h1>Upload a Team Logo</h1>
		@if (isset($errors) && count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>

	<div class="col-md-6">
	{!! Form::open(array('route' => 'resizeImagePost','enctype' => 'multipart/form-data', 'files' => 'true')) !!}
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4">
				<br/>
				{!! Form::text('title', 'image',array('class' => 'form-control','placeholder'=>'Add Title')) !!}
			</div>
			<div class="col-md-12">
				<br/>
				{!! Form::file('image', array('class' => 'image')) !!}
			</div>
			<div class="col-md-12">
				<br/>
				<button type="submit" class="btn btn-success">Upload Image</button>
			</div>
		</div>
	{!! Form::close() !!}
	</div>
	<div class="col-md-6">
	@if ( file_exists(public_path()."/".\Auth::user()->avatar_path))

	<div class="row">
		<div class="col-md-12">
			<div>Current Avatar:</div>
			
			<img width="100%" src="{{ \Auth::user()->avatar_path }}" />
		</div>
		
	</div>
	@endif
</div>
</div>
@endsection