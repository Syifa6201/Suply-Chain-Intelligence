@extends('layouts.app')

@section('content')

<div class="row g-4 mb-4">

    <div class="col-md-6">
        <div class="card card-custom p-4 text-center">
            <h5>Total Risk Score</h5>
            <h1>{{ $score }}</h1>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-custom p-4 text-center">
            <h5>Risk Level</h5>

            @if($level == "HIGH")
                <h1 class="text-danger">{{ $level }}</h1>
            @elseif($level == "MEDIUM")
                <h1 class="text-warning">{{ $level }}</h1>
            @else
                <h1 class="text-success">{{ $level }}</h1>
            @endif
        </div>
    </div>

</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>Weather</h6>
            <h2>{{ $weatherScore }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>Currency</h6>
            <h2>{{ $currencyScore }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>News</h6>
            <h2>{{ $newsScore }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-3">
            <h6>Economy</h6>
            <h2>{{ $economyScore }}</h2>
        </div>
    </div>
</div>

<div class="card card-custom p-4">
    <h4>AI Recommendation</h4>
    <p class="mt-3">{{ $recommendation }}</p>
</div>

@endsection