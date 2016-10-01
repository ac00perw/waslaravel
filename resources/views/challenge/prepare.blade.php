@extends('layouts.app')

@section('content')
<h1>{{ $challenge->name }}</h1>

<p>Add specific message to email. List team name and partial email?? to send</p>
{{ $challenge }}
{{ $user }}
{{ \Auth::user() }}
jhere
@stop