@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">At a Glance</div>

                <div class="panel-body">
                    <div class="col-lg-8">
                    
                     @if (App\Models\Waste::wasteSum()['totalItems']==0)
                        You have not recorded any garbage yet
                    @else
                    <h4>Food waste in ounces</h4>
                        <waste-graph :width="800" :height="300" :gtype="line" :keys="{{ $months }}" :values="{{ $weight }}"></waste-graph>
                        <h4>Food cost in US dollars</h4>
                        <cost-graph  :width="800" :height="300" :gtype="line" :keys="{{ $months }}" :values="{{ $cost }}" ></cost-graph>
                    @endif
                    </div>
                    <div class="col-lg-4">
                    <h4>Your Stats</h4>
                        <ul class="circle">
                            <li>
                                <span class="key">Total Items: <span class="has-tip" title="Total number of wasted items"></span></span>
                                {{ App\Models\Waste::wasteSum()['totalItems'] }}
                            </li>
                            <li>
                                <span class="key">Total Waste: <span class="has-tip" title="Total pounds of wasted food"></span></span>
                                {{ App\Models\Waste::wasteSum()['totalWeight'] }}
                            </li>
                            <li>
                                <span class="key">Total Cost: <span class="has-tip" title="Total cost in dollars"></span></span>
                                ${{ App\Models\Waste::wasteSum()['totalCost'] }}
                            </li>
                            <li>
                                <span class="key">Lbs/Day: <span class="has-tip" title="Total pounds/date"></span></span>
                                <?php print round(100/date('z'), 3); ?> lbs in  days
                            </li> 
                            <li>
                                <span class="key">Avg Annual cost</span>: <?php print round((600/1440)*100, 3); ?>% of <span class="has-tip" title="According to umn.edu">$1440</span>
                            </li> 
                            <li>
                                <span class="key">Annual Waste: </span>
                                <?php print round((100/1898)*100, 3); ?>% of <span class="has-tip" title="Avg US household waste in pounds per Waste360.com">1898 lbs</span>
                            </li> 
                            <li>
                            <span class="key">Total Cost: </span>
                            <span class="has-tip" title="$100 / $12000 (estimated monthly food budget) * 100"><?php print round(100/12000*100,2); ?>%</span>
                            </li>  
                            <li><span class="key">Weight vs. average this month:</span></li>   
                            
                        </ul>
                        @if (App\Models\Waste::wasteSum()['totalItems']>0)
                            <h4>Breakdown by type/ounce</h4>
                            <pie-graph  :width="200" :height="200" :gtype="pie" :keys="{{ $types }}" :values="{{  $weights }}" ></pie-graph>
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
</div>
@endsection
