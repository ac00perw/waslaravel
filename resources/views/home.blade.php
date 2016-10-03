@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">At a Glance</div>

                <div class="panel-body">
                    <div class="col-lg-8">
                    
                     @if (App\Models\Waste::wasteSum()['totalItems']==0)
                        You have not recorded any garbage yet
                    @else
                    <h4>Food waste in ounces</h4>
                        <waste-graph :width="800" :height="300" :keys="{{ $months }}" :values="{{ $weight }}"></waste-graph>
                        <h4>Food cost in US dollars</h4>
                        <cost-graph  :width="800" :height="300" :keys="{{ $months }}" :values="{{ $cost }}" ></cost-graph>
                    @endif
                    </div>
                    <div class="col-lg-4">
                    <h4>{{ $user->team_name }}'s Stats</h4>
                    <table class="table">
                        <tr>
                            <td>Stat</td>
                            <td>Total</td>
                            <td>Per Person</td>
                        </tr>
                        <tr>
                            <td>People</td>
                            <td>{{ $user->teammates }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Days</td>
                            <td>{{ App\Models\Waste::wasteSum()['days'] }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Waste</td>
                            <td>{{ round(App\Models\Waste::wasteSum()['totalWeight'],2) }} oz.</td>
                            <td> {{ round(App\Models\Waste::wasteSum()['totalWeight']/$user->teammates, 2) }} oz.</td>
                        </tr>
                        <tr>
                            <td>Cost</td>
                            <td>${{ sprintf("%0.2f", round(App\Models\Waste::wasteSum()['totalCost'], 2) ) }}</td>
                            <td>${{ sprintf("%0.2f",round(App\Models\Waste::wasteSum()['totalCost']/$user->teammates, 2) ) }}</td>
                        </tr>
                        <tr>
                            <td>Waste/day</td>
                            <td>{{ round(App\Models\Waste::wasteSum()['totalWeight']/App\Models\Waste::wasteSum()['days'], 2) }} oz.</td>
                            <td>{{ round( (App\Models\Waste::wasteSum()['totalWeight']/$user->teammates)/App\Models\Waste::wasteSum()['days'], 2) }} oz.</td>
                        </tr>
                        <tr>
                            <td colspan=3>Each member of an American family of four wastes ${{ round( (1560/365)/4*App\Models\Waste::wasteSum()['days'], 2) }} in food in {{ App\Models\Waste::wasteSum()['days']}} days. Your team is losing ${{ round( (App\Models\Waste::wasteSum()['totalCost']/$user->teammates )/App\Models\Waste::wasteSum()['days'], 2) }} to food waste in {{ App\Models\Waste::wasteSum()['days']}} days.</td>
                        </tr>

                    </table>
                       
                        <!-- p>$1560 per family of four per year https://www.nrdc.org/sites/default/files/wasted-food-IP.pdf</p -->
                        @if (App\Models\Waste::wasteSum()['totalItems']>0)
                            <h4>Breakdown by type/ounce</h4>
                            <pie-graph  :width="200" :height="200" :keys="{{ $types }}" :values="{{  $weights }}" ></pie-graph>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <h4>Last recorded items</h4>
                        <table class="table waste-list">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Weight</th>
                                <th>Cost</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $l)
                                    <tr>
                                        <td>{{ Helper::tz($l->created_at, "m/d/Y g:i a") }}</td>
                                        <td>{{ str_limit($l->description, $limit = 20, $end = '...') }}</td>
                                        <td>{{ $l->weight }} oz.</td>
                                        <td>{{ Helper::parseCost($l->cost) }}</td>
                                        <td>{{ App\Models\WasteType::find($l->waste_type_id)->name }}</td>
                                        <td><a href="/waste/{{ $l->id }}/edit">[edit]</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
