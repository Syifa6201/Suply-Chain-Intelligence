@extends('layouts.app')

@section('content')

<div class="row g-4">

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>USD → IDR</h6>
            <h3>{{ number_format($usdToIdr,2) }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>USD → EUR</h6>
            <h3>{{ number_format($usdToEur,2) }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>USD → CNY</h6>
            <h3>{{ number_format($usdToCny,2) }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>Currency Risk</h6>
            <h3>{{ $risk }}</h3>
        </div>
    </div>

</div>

@endsection