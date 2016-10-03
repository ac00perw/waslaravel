@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Stats at a Glance</div>
    <h1>Coming Soon.</h1>
    <table class="table waste-list">
        <thead>
            <tr>
                <th>Team</th>
                <th>Date</th>
                <th>Description</th>
                <th>Weight</th>
                <th>Cost</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $l)
                <tr class="@if ($l->user->id == \Auth::user()->id )active @endif">
                    <td><a href="/home/{{ $l->user->id }}">{{ $l->user->team_name }}</a></td>
                    <td>{{ Helper::tz($l->created_at, "m/d/Y g:ia") }}</td>
                    <td>{{ str_limit($l->description, $limit = 20, $end = '...') }}</td>
                    <td>{{ $l->weight }} oz.</td>
                    <td>{{ Helper::parseCost($l->cost) }}</td>
                    <td>
{{ App\Models\WasteType::find($l->waste_type_id)->name }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop