@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="panel panel-default">
  		<h1>{{ $name }}</h1>
  		<p>{{ $description }}</p>
    </div>
	</div>
@stop