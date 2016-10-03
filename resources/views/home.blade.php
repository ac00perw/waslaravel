@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <h4>{{ $user->team_name }}'s Stats</h4></div>

                <div class="panel-body">
                    <div class="col-lg-8">
                    
                     @if (App\Models\Waste::wasteSum()['totalItems']==0)
                        You have not recorded any garbage yet
                    @else
                    <h4>Food waste in ounces</h4>
                        <waste-graph type="line" :width="800" :height="300" :keys="{{ $months }}" :values="{{ $weight }}"></waste-graph>
                        <h4>Food cost in US dollars</h4>
                        <cost-graph type="bar" :width="800" :height="300" :keys="{{ $months }}" :values="{{ $cost }}" ></cost-graph>
                    @endif
                    </div>
                    <div class="col-lg-4">
                   
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr class="info">
                                <td>Stat</td>
                                <td>Total</td>
                                <td>Per Person</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>People</td>
                            <td>{{ $user->teammates }}</td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td>Days</td>
                            <td>{{ $wasteSum['days'] }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Items</td>
                            <td>{{ $wasteSum['totalItems'] }}</td>
                            <td>{{ round($wasteSum['totalItems']/$user->teammates, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Waste</td>
                            <td>{{ round($wasteSum['totalWeight'],2) }} oz.</td>
                            <td> {{ round($wasteSum['totalWeight']/$user->teammates, 2) }} oz.</td>
                        </tr>
                        <tr>
                            <td>Cost</td>
                            <td>${{ sprintf("%0.2f", round($wasteSum['totalCost'], 2) ) }}</td>
                            <td>${{ sprintf("%0.2f",round($wasteSum['totalCost']/$user->teammates, 2) ) }}</td>
                        </tr>
                        <tr>
                            <td>Waste/day</td>
                            <td>{{ round($wasteSum['totalWeight']/$wasteSum['days'], 2) }} oz.</td>
                            <td>{{ round( ($wasteSum['totalWeight']/$user->teammates)/$wasteSum['days'], 2) }} oz.</td>
                        </tr>
                        <tr>
                            <td colspan=3>On average, each member of an American family of four wastes ${{ round( (1560/365)/4*$wasteSum['days'], 2) }} in food in {{ $wasteSum['days']}} days. Your team is losing ${{ round( ($wasteSum['totalCost']/$user->teammates )/$wasteSum['days'], 2) }} to food waste in {{ $wasteSum['days']}} days.</td>
                        </tr>
                        </tbody>
                    </table>
                       
                        <!-- p>$1560 per family of four per year https://www.nrdc.org/sites/default/files/wasted-food-IP.pdf</p -->
                        @if (App\Models\Waste::wasteSum()['totalItems']>0)
                            <h4>Breakdown by type/ounce</h4>
                            <pie-graph type="pie"  :width="200" :height="200" :keys="{{ $types }}" :values="{{  $weights }}" ></pie-graph>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <h4>Last recorded items</h4>
                        <table class="table table-striped waste-list">
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
