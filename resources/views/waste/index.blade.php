@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Stats at a Glance</div>
    
    <table class="table waste-list">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Weight</th>
                <th>Cost</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $l)
                <tr>
                    <td>{{ Helper::tz($l->created_at, "m/d/Y g:ia") }}</td>
                    <td>{{ str_limit($l->description, $limit = 20, $end = '...') }}</td>
                    <td>{{ $l->weight }} oz.</td>
                    <td>{{ Helper::parseCost($l->cost) }}</td>
                    <td>{{ App\Models\WasteType::find($l->waste_type_id)->name }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop