@extends('layouts.app')

@section('content')

<div class="row g-4">
    <div class="col-md-4">
        <div class="card card-custom p-4">
            <h6>GDP</h6>
            <h4>${{ number_format($gdpValue,0,',','.') }}</h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom p-4">
            <h6>Inflation</h6>
            <h2>{{ round($inflationValue,2) }} %</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom p-4">
            <h6>Population</h6>
            <h4>{{ number_format($populationValue,0,',','.') }}</h4>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-custom p-4">
            <h6>Export</h6>
            <h4>${{ number_format($exportValue,0,',','.') }}</h4>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-custom p-4">
            <h6>Import</h6>
            <h4>${{ number_format($importValue,0,',','.') }}</h4>
        </div>
    </div>
</div>

@endsection