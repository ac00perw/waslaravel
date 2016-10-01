@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Your Challenges
    <a href="/challenges/create">Start a New Challenge</a>
    </div>

    

<table class="table challenge-list">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Dates</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $l)
            <tr class="running{{ App\Http\Controllers\ChallengesController::contestIsRunning($l->id) }}">
                <!-- <td>{{ Helper::tz($l->created_at) }}</td> -->
                <td>{{ $l->name }} </td>
                <td>{{ str_limit($l->description, $limit = 20, $end = '...') }}</td>
                
                <td>{{ Helper::tz(\Carbon\Carbon::parse($l->start_date), 'm/d/Y') }} - {{ Helper::tz(\Carbon\Carbon::parse($l->end_date), 'm/d/Y') }}
                    ( {{ Carbon\Carbon::parse($l->end_date)->diffInDays(Carbon\Carbon::parse($l->start_date)) }} days )
                </td>
                <td>
                @if ($l->status == 'created')
                    <ul>
                        <li><a href="/challenges/{{ $l->id }}/edit">[Edit]</a></li>
                        <li><a href="{{ URL::action('ChallengesController@sendChallenge') }}">Send Challenge</a></li>
                        <li></li>
                    </ul>
                @endif
                </td>
            </tr>
            <tr class="running{{ App\Http\Controllers\ChallengesController::contestIsRunning($l->id) }}">
                <td>Teams:</td>
                <td colspan=3>
                    @foreach ($l->users as $u)
                        <button><img class="avatar" src="{{ $u->avatar_path }}" alt=""><br />{{ $u->team_name }}</button>
                    @endforeach
                    @if (count($l->users) < 3)
                    <a href="/challenges/addToChallenge/{{ $l->getSlug() }}">Add team</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop