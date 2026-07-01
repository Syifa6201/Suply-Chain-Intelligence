@extends('layouts.app')

@section('content')

<div class="row g-4">
    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>Temperature</h6>
            <h2>{{ $temperature }} °C</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>Rainfall</h6>
            <h2>{{ $rain }} mm</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>Wind Speed</h6>
            <h2>{{ $wind }} km/h</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>Storm Risk</h6>
            <h2>{{ $stormRisk }}</h2>
        </div>
    </div>
</div>

@endsection