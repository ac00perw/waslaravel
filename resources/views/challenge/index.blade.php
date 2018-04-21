@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Your Challenges
    <a href="/challenges/create">Start a New Challenge</a>
    </div>


@foreach ($list as $l)
    <div class="container running{{ App\Http\Controllers\ChallengesController::contestIsRunning($l->id) }}">
        <h1>{{ $l->name }}</h1>

        <div class="col-md-4">
            <p>{{ Helper::tz(\Carbon\Carbon::parse($l->start_date), 'm/d/Y') }} - {{ Helper::tz(\Carbon\Carbon::parse($l->end_date)->endOfDay(), 'm/d/Y') }} - {{ Carbon\Carbon::now('UTC')->diffInDays(Carbon\Carbon::parse($l->end_date)->endOfDay() ) }} days remaining</p>
            <p>{{ $l->description }}</p>


        </div>
        <stats challenge="{{ $l->id }}"></stats>
        @if (count($l->users) < 2)
            <div class="user">
                <a href="/challenges/addToChallenge/{{ $l->getSlug() }}">Add team</a>
            </div>
        @endif
    </div>
@endforeach
</div>
@stop
