@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                <h1>{!! \App\Helpers\Helper::getRandomQuote() !!} </h1>
                <h1>Starve Your Garbage is the working title</h1>
                    <ul>
                        <li>WasteLandr.com</li>
                        <li>Disposable.com</li>
                        <li>SlimYourWaste.com</li>
                        <li>StarveYourGarbage.com</li>
                        
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
