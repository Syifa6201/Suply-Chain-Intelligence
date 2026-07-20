@extends('layouts.app')

@section('title', 'Shipping Planner')

@section('content')

<div class="container-fluid">

    <!-- HERO -->

    <div class="shipping-hero mb-4">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-light text-primary px-3 py-2 mb-3">
                    AI Powered Logistics
                </span>

                <h1 class="fw-bold text-white mb-3">

                    <i class="bi bi-truck me-2"></i>

                    Shipping Planner

                </h1>

                <p class="text-white opacity-75 mb-0">

                    Plan international shipment, estimate delivery time,
                    shipping cost and AI logistics recommendation.

                </p>

            </div>

            <div class="col-lg-4 text-end">

                <i class="bi bi-globe-americas hero-icon"></i>

            </div>

        </div>

    </div>

    <!-- STATISTICS -->

    <div class="row mb-4">

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>Total Countries</small>

                        <h2>{{ $countries->count() }}</h2>

                    </div>

                    <div class="stat-icon bg-primary">

                        <i class="bi bi-globe2"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>Transport</small>

                        <h2>Sea & Air</h2>

                    </div>

                    <div class="stat-icon bg-success">

                        <i class="bi bi-truck"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>Coverage</small>

                        <h2>Global</h2>

                    </div>

                    <div class="stat-icon bg-warning">

                        <i class="bi bi-geo-alt"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>AI Status</small>

                        <h2 class="text-success">

                            Online

                        </h2>

                    </div>

                    <div class="stat-icon bg-danger">

                        <i class="bi bi-cpu"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FORM -->

    <div class="card shadow-lg border-0">

        <div class="card-header bg-white border-0 py-4">

            <h4 class="fw-bold">

                <i class="bi bi-box-seam text-primary"></i>

                Shipment Information

            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('shipping.calculate') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-lg-6 mb-4">

                        <label class="fw-semibold">

                            Origin Country

                        </label>

                        <select
                            class="form-select modern-input"
                            name="origin_country"
                            required>

                            <option value="">

                                Select Country

                            </option>

                            @foreach($countries as $country)

                            <option value="{{ $country->id }}">

                                {{ $country->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-lg-6 mb-4">

                        <label class="fw-semibold">

                            Destination Country

                        </label>

                        <select
                            class="form-select modern-input"
                            name="destination_country"
                            required>

                            <option value="">

                                Select Country

                            </option>

                            @foreach($countries as $country)

                            <option value="{{ $country->id }}">

                                {{ $country->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-lg-4">

                        <label class="fw-semibold">

                            Weight

                        </label>

                        <div class="input-group">

                            <input
                                type="number"
                                class="form-control modern-input"
                                name="weight"
                                placeholder="1000"
                                required>

                            <span class="input-group-text">

                                Kg

                            </span>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <label class="fw-semibold">

                            Transport

                        </label>

                        <select
                            class="form-select modern-input"
                            name="transport">

                            <option value="sea">

                                🚢 Sea Freight

                            </option>

                            <option value="air">

                                ✈ Air Freight

                            </option>

                        </select>

                    </div>

                    <div class="col-lg-4">

                        <label class="fw-semibold">

                            Priority

                        </label>

                        <select
                            class="form-select modern-input"
                            name="priority">

                            <option value="balanced">

                                Balanced

                            </option>

                            <option value="fastest">

                                Fastest

                            </option>

                            <option value="cheapest">

                                Cheapest

                            </option>

                        </select>

                    </div>

                </div>

                <hr class="my-4">

                <button class="btn btn-gradient w-100 py-3">

                    <i class="bi bi-stars"></i>

                    Generate AI Shipping Plan

                </button>

            </form>

        </div>

    </div>

</div>

@if(isset($result))

<div class="row mt-4">

    <div class="col-12">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-primary text-white py-3">

                <h4 class="mb-0">

                    <i class="bi bi-stars"></i>

                    AI Shipping Result

                </h4>

            </div>

            <div class="card-body">

                <div class="row g-4">

                    <div class="col-lg-3">

                        <div class="result-card">

                            <small>Origin</small>

                            <h5>{{ $result['origin_country'] }}</h5>

                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="result-card">

                            <small>Destination</small>

                            <h5>{{ $result['destination_country'] }}</h5>

                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="result-card">

                            <small>Distance</small>

                            <h5>{{ number_format($result['distance']) }} Km</h5>

                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="result-card">

                            <small>ETA</small>

                            <h5>{{ $result['estimated_days'] }} Days</h5>

                        </div>

                    </div>

                </div>

                <div class="row g-4 mt-1">

                    <div class="col-lg-4">

                        <div class="result-card">

                            <small>Estimated Cost</small>

                            <h4>

                                USD {{ number_format($result['estimated_cost'],2) }}

                            </h4>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="result-card">

                            <small>Origin Port</small>

                            <h5>

                                {{ $result['origin_port'] }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="result-card">

                            <small>Destination Port</small>

                            <h5>

                                {{ $result['destination_port'] }}

                            </h5>

                        </div>

                    </div>

                </div>

                <div class="mt-4">

                    <label class="fw-bold">

                        Shipping Score

                    </label>

                    <div class="progress" style="height:30px;">

                        <div
                            class="progress-bar bg-success"
                            style="width:{{ $result['shipping_score'] }}%">

                            {{ $result['shipping_score'] }}%

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4 g-4">

    <div class="col-lg-3">

        <div class="result-card">

            <small>Weather</small>

            <h5>

                <i class="bi bi-cloud-sun-fill text-warning"></i>

                {{ $result['weather'] }}

            </h5>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="result-card">

            <small>Country Risk</small>

            <h5>

                <i class="bi bi-shield-fill-check text-success"></i>

                {{ $result['risk'] }}

            </h5>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="result-card">

            <small>Currency</small>

            <h5>

                <i class="bi bi-currency-exchange text-primary"></i>

                {{ $result['currency'] }}

            </h5>

        </div>

    </div>

    <div class="col-12 mt-4">

    <div class="card border-0 shadow-lg">

        <div class="card-header bg-dark text-white py-3">

            <h4 class="mb-0">
                🤖 AI Logistics Recommendation
            </h4>

        </div>

        <div class="card-body">

            <div class="row text-center">

                <div class="col-lg-3 mb-4">

                    <h1 class="display-4 text-warning mb-0">
                        {{ $result['ai_rating'] }}
                    </h1>

                    <h5 class="fw-bold mt-2">
                        {{ $result['ai_level'] }}
                    </h5>

                    <span class="badge bg-primary">
                        Score {{ $result['shipping_score'] }}/100
                    </span>

                </div>

                <div class="col-lg-3 mb-4">

                    <div class="mb-3">

                        <small class="text-muted">
                            Weather
                        </small>

                        <h5>

                            <span class="badge bg-{{ $result['weather_color'] }}">
                                {{ $result['weather'] }}
                            </span>

                        </h5>

                    </div>

                    <div>

                        <small class="text-muted">
                            Country Risk
                        </small>

                        <h5>

                            <span class="badge bg-{{ $result['risk_color'] }}">
                                {{ $result['risk'] }}
                            </span>

                        </h5>

                    </div>

                </div>

                <div class="col-lg-3 mb-4">

                    <div class="mb-3">

                        <small class="text-muted">
                            Currency
                        </small>

                        <h5>

                            <span class="badge bg-{{ $result['currency_color'] }}">
                                {{ $result['currency'] }}
                            </span>

                        </h5>

                    </div>

                    <div>

                        <small class="text-muted">
                            Insurance
                        </small>

                        <h5>
                            {{ $result['insurance'] }}
                        </h5>

                    </div>

                </div>

                <div class="col-lg-3 mb-4">

                    <div class="mb-3">

                        <small class="text-muted">
                            Delay Probability
                        </small>

                        <h5 class="text-danger">

                            {{ $result['delay_probability'] }} %

                        </h5>

                    </div>

                    <div>

                        <small class="text-muted">
                            Carbon Emission
                        </small>

                        <h5>

                            {{ number_format($result['carbon_emission'],2) }}

                            kg CO₂

                        </h5>

                    </div>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <div class="alert alert-info">

                        <strong>Alternative Route</strong>

                        <br>

                        {{ $result['alternative_route'] }}

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="alert alert-success">

                        <strong>Recommendation</strong>

                        <br>

                        {{ $result['recommendation'] }}

                    </div>

                </div>

            </div>

            <div class="alert alert-light border mt-3">

                <h5 class="fw-bold mb-3">

                    🧠 AI Analysis

                </h5>

                <p class="mb-0">

                    {{ $result['ai_summary'] }}

                </p>

            </div>

        </div>

    </div>

</div>

</div>

<div class="card border-0 shadow-lg mt-4">

    <div class="card-header bg-white">

        <h4 class="fw-bold mb-0">

            <i class="bi bi-signpost-2-fill text-primary"></i>

            Shipping Route Timeline

        </h4>

    </div>

    <div class="card-body">

        <div class="shipping-timeline">

            <div class="timeline-item success">

                <div class="timeline-dot bg-primary"></div>

                <div class="timeline-content">

                    <h6 class="mb-1">

                        Origin Country

                    </h6>

                    <p class="mb-0">

                        {{ $result['origin_country'] }}

                    </p>

                    <small class="text-muted">

                        {{ $result['origin_port'] }}

                    </small>

                </div>

            </div>

            <div class="timeline-line"></div>

            <div class="timeline-item warning">

                <div class="timeline-dot bg-warning"></div>

                <div class="timeline-content">

                    <h6 class="mb-1">

                        Transportation

                    </h6>

                    <p class="mb-0">

                        {{ ucfirst(request('transport')) }}

                    </p>

                    <small>

                        ETA {{ $result['estimated_days'] }} Days

                    </small>

                </div>

            </div>

            <div class="timeline-line"></div>

            <div class="timeline-item success">

                <div class="timeline-dot bg-success"></div>

                <div class="timeline-content">

                    <h6 class="mb-1">

                        Destination Country

                    </h6>

                    <p class="mb-0">

                        {{ $result['destination_country'] }}

                    </p>

                    <small>

                        {{ $result['destination_port'] }}

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-lg mt-4">

    <div class="card-header bg-white">

        <h4 class="fw-bold mb-0">

            <i class="bi bi-map-fill text-primary"></i>

            Shipping Route Map

        </h4>

    </div>

    <div class="card-body">

        <div id="shippingMap"></div>

    </div>

</div>

@endif

<style>

.shipping-hero{

background:linear-gradient(135deg,#2563eb,#4f46e5);

padding:45px;

border-radius:20px;

box-shadow:0 10px 30px rgba(0,0,0,.15);

}

.hero-icon{

font-size:120px;

color:rgba(255,255,255,.2);

}

.stat-card{

background:white;

padding:22px;

border-radius:18px;

box-shadow:0 10px 20px rgba(0,0,0,.08);

transition:.3s;

}

.stat-card:hover{

transform:translateY(-6px);

}

.stat-card h2{

font-weight:700;

margin-top:8px;

}

.stat-icon{

width:60px;

height:60px;

border-radius:16px;

display:flex;

align-items:center;

justify-content:center;

color:white;

font-size:28px;

}

.modern-input{

height:52px;

border-radius:12px;

}

.btn-gradient{

background:linear-gradient(135deg,#2563eb,#4f46e5);

border:none;

color:white;

font-weight:600;

border-radius:14px;

}

.btn-gradient:hover{

color:white;

transform:translateY(-2px);

}

.result-card{

background:#fff;

padding:22px;

border-radius:18px;

box-shadow:0 8px 20px rgba(0,0,0,.08);

height:100%;

transition:.3s;

}

.result-card:hover{

transform:translateY(-5px);

box-shadow:0 18px 35px rgba(37,99,235,.18);

}

.result-card small{

color:#6c757d;

font-weight:600;

}

.result-card h4,
.result-card h5{

margin-top:10px;

font-weight:700;

}

.shipping-timeline{

display:flex;

align-items:center;

justify-content:space-between;

flex-wrap:wrap;

gap:20px;

}

.timeline-item{

flex:1;

display:flex;

align-items:center;

gap:15px;

}

.timeline-dot{

width:50px;

height:50px;

border-radius:50%;

}

.timeline-line{

width:80px;

height:4px;

background:#2563eb;

border-radius:20px;

}

.timeline-content h6{

font-weight:700;

margin:0;

}

.timeline-content p{

font-weight:600;

}

@media(max-width:992px){

.shipping-timeline{

flex-direction:column;

align-items:flex-start;

}

.timeline-line{

width:4px;

height:60px;

margin-left:23px;

}

}

#shippingMap{

height:500px;

width:100%;

border-radius:18px;

overflow:hidden;

}

</style>

<script>

@if(isset($result))

document.addEventListener("DOMContentLoaded",function(){

    const map=L.map('shippingMap').setView([20,110],3);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{

        attribution:'© OpenStreetMap'

    }).addTo(map);

    let origin=[{{ $result['origin_lat'] }},{{ $result['origin_lng'] }}];

    let destination=[{{ $result['destination_lat'] }},{{ $result['destination_lng'] }}];

    L.marker(origin)

        .addTo(map)

        .bindPopup("<b>{{ $result['origin_country'] }}</b><br>{{ $result['origin_port'] }}");

    L.marker(destination)

        .addTo(map)

        .bindPopup("<b>{{ $result['destination_country'] }}</b><br>{{ $result['destination_port'] }}");

    L.polyline(

        [origin,destination],

        {

            color:'#2563eb',

            weight:5,

            opacity:.8

        }

    ).addTo(map);

    map.fitBounds([origin,destination]);

});

@endif

</script>

@endsection