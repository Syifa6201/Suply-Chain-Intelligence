@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- HERO --}}
    <div class="recommendation-hero mb-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="hero-badge">
                    🤖 AI Powered Recommendation
                </span>

                <h1 class="hero-title mt-3">

                    Recommendation Engine

                </h1>

                <p class="hero-subtitle">

                    AI Trade Decision Support System for Global Supply Chain

                    <br>

                    Analyze 216 Countries using Economy, Currency, Weather,
                    Port Intelligence, News Intelligence and AI Risk Analysis.

                </p>

            </div>

            <div class="col-lg-4 text-end">

                <div class="hero-score">

                    <div class="score-title">

                        AI Confidence

                    </div>

                    <div class="score-value">

                        {{ round(collect($results)->avg('confidence')) }}%

                    </div>

                    <small>

                        Real-Time Intelligence

                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- KPI --}}
    <div class="row g-4">

        <div class="col-lg-3">

            <div class="recommend-card">

                <div class="icon success">

                    🌍

                </div>

                <h6>

                    Recommended Countries

                </h6>

                <h2>

                    {{ collect($results)->where('ai.recommendation','Expand Export')->count() }}

                </h2>

                <small class="text-success">

                    +8 this week

                </small>

            </div>

        </div>


        <div class="col-lg-3">

            <div class="recommend-card">

                <div class="icon warning">

                    ⚠️

                </div>

                <h6>

                    Monitor

                </h6>

                <h2>

                    {{ collect($results)->where('ai.recommendation','Monitor')->count() }}

                </h2>

                <small class="text-warning">

                    Need Observation

                </small>

            </div>

        </div>


        <div class="col-lg-3">

            <div class="recommend-card">

                <div class="icon danger">

                    🚫

                </div>

                <h6>

                    High Risk

                </h6>

                <h2>

                    {{ collect($results)->where('ai.recommendation','Avoid')->count() }}

                </h2>

                <small class="text-danger">

                    Avoid Shipment

                </small>

            </div>

        </div>


        <div class="col-lg-3">

            <div class="recommend-card">

                <div class="icon primary">

                    ⭐

                </div>

                <h6>

                    Average Score

                </h6>

                <h2>

                {{ round(collect($results)->avg('score'),1) }}

                </h2>

                <small class="text-primary">

                    Excellent

                </small>

            </div>

        </div>

    </div>

</div>

<div class="row mt-5 g-4">

    {{-- WORLD MAP --}}
    <div class="col-lg-8">

        <div class="card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold">
                        🌍 Global Recommendation Map
                    </h3>

                    <small class="text-muted">
                        AI Trade Recommendation by Country
                    </small>

                </div>

                <span class="badge bg-primary">

                    216 Countries

                </span>

            </div>

            <hr>

            <div id="recommendationMap"></div>

        </div>

    </div>


    {{-- AI INSIGHT --}}
    <div class="col-lg-4">

        <div class="card-custom p-4 mb-4">

            <h4>

                🤖 AI Best Opportunity

            </h4>

            <hr>

            <div class="d-flex align-items-center mb-3">

                <div class="country-icon">

                    🇸🇬

                </div>

                <div class="ms-3">

                    <h5 class="mb-0">

                        {{ $results[0]['country']->name }}

                    </h5>

                    <small class="text-success">

                        Trade Score

{{ $results[0]['score'] }}

/

100

                    </small>

                </div>

            </div>

            <ul class="list-unstyled">

<li>

✅ {{ $results[0]['reason'] }}

</li>

<li>

⭐ Confidence :

{{ $results[0]['confidence'] }}%

</li>

<li>

📊 Trade Score :

{{ $results[0]['score'] }}

</li>

<li>

🚢 Recommendation :

{{ $results[0]['recommendation'] }}

</li>

</ul>

            <div class="alert alert-success mt-3">

                <b>Recommendation</b>

                <br>

                {{ $results[0]['recommendation'] }}

            </div>

        </div>



        <div class="card-custom p-4">

            <h4>

                🚨 Highest Risk

            </h4>

            <hr>

            <div class="d-flex align-items-center mb-3">

                <div class="country-icon bg-danger text-white">

                    🇮🇷

                </div>

                <div class="ms-3">

                    <h5 class="mb-0">

                        {{ $highestRisk['country']->name }}

                    </h5>

                    <small class="text-danger">

                        Risk Score 92

                    </small>

                </div>

            </div>

            <ul class="list-unstyled">

                <li>❌ Political Risk</li>

                <li>❌ Currency Volatility</li>

                <li>❌ Negative News</li>

                <li>❌ Trade Restriction</li>

            </ul>

            <div class="alert alert-danger mt-3">

                <b>Recommendation</b>

                <br>

                Avoid Shipment

            </div>

        </div>

    </div>

</div>

<div class="row mt-5 g-4">

    {{-- RANKING CHART --}}
    <div class="col-lg-8">

        <div class="card-custom p-4">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="fw-bold">

                    📊 AI Trade Score Ranking

                </h3>

                <span class="badge bg-success">

                    TOP 10

                </span>

            </div>

            <hr>

            <canvas id="recommendChart" height="120"></canvas>

        </div>

    </div>



    {{-- TOP LIST --}}
    <div class="col-lg-4">

        <div class="card-custom p-4">

            <h4>

                🏆 Top Recommended

            </h4>

            <hr>
@foreach(collect($results)->take(5) as $country)

<div class="d-flex justify-content-between mb-3">

    <span>

        🌍 {{ $country['country']->name }}

    </span>

    <span class="badge bg-success">

        {{ $country['score'] }}

    </span>

</div>

@endforeach

        </div>



        <div class="card-custom p-4 mt-4">

            <h4>

                🚫 High Risk

            </h4>

            <hr>

            @php

$riskCountries = collect($results)

->sortBy('score')

->take(5);

@endphp

            @foreach($riskCountries as $country)

<div class="d-flex justify-content-between mb-3">

<span>

⚠ {{ $country['country']->name }}

</span>

<span class="badge bg-danger">

{{ $country['score'] }}

</span>

</div>

@endforeach

        </div>

    </div>

</div>

<div class="card-custom p-4 mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>

            🌍 Recommendation Table

        </h3>

        <input
            class="form-control"
            style="width:250px"
            placeholder="Search Country">

    </div>

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

            <tr>

                <th>Country</th>

                <th>Trade Score</th>

                <th>Economy</th>

                <th>Currency</th>

                <th>Port</th>

                <th>Weather</th>

                <th>Recommendation</th>

                <th>Action</th>

            </tr>

            </thead>

            <tbody>

@foreach($results as $item)

<tr>

<td>

{{ $item['country']->name }}

</td>

<td>

<span class="badge bg-primary">

{{ $item['score'] }}

</span>

</td>

<td>

{{ $item['ai']['economy'] }}

</td>

<td>

{{ $item['ai']['currency'] }}

</td>

<td>

{{ $item['ai']['port'] }}

</td>

<td>

{{ $item['ai']['weather'] }}

</td>

<td>

<span class="badge bg-{{ $item['badge'] }}">

{{ $item['recommendation'] }}

</span>

</td>

<td>

<a

href="{{ route('recommendation.show',$item['country']->id) }}"

class="btn btn-primary btn-sm">

View

</a>

</td>

</tr>

@endforeach

</tbody>

        </table>

    </div>

</div>



@push('scripts')

<script>

window.onload = function () {

    const map = L.map('recommendationMap').setView([20, 0], 2);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution: '&copy; OpenStreetMap'
        }
    ).addTo(map);

    const countries = @json($results);

    console.log(countries);

    countries.forEach(function(item){

        if(!item.country) return;
        if(!item.country.latitude) return;
        if(!item.country.longitude) return;

        let color="#22c55e";

        switch(item.badge){

            case "primary":
                color="#2563eb";
                break;

            case "warning":
                color="#facc15";
                break;

            case "danger":
                color="#ef4444";
                break;

            case "dark":
                color="#111827";
                break;
        }

        L.circleMarker(
            [
                parseFloat(item.country.latitude),
                parseFloat(item.country.longitude)
            ],
            {
                radius:7,
                fillColor:color,
                color:"#fff",
                weight:2,
                fillOpacity:1
            }
        )
        .addTo(map)
        .bindPopup(`
            <b>${item.country.name}</b><br>
            Trade Score : ${item.score}<br>
            Confidence : ${item.confidence}%<br>
            Recommendation : ${item.recommendation}
        `);

    });

};


new Chart(

document.getElementById("recommendChart"),

{

type:"bar",

data:{

labels:@json(
collect($results)
->take(10)
->pluck('country.name')
),

datasets:[{

label:'Trade Score',

data:@json(
collect($results)
->take(10)
->pluck('score')
),

borderWidth:2

}]

},

options:{

responsive:true,

plugins:{

legend:{

display:false

}

}

}

}

);

</script>

@endpush

@endsection


<style>

.recommendation-hero{

background:linear-gradient(135deg,#2563eb,#38bdf8);

padding:50px;

border-radius:30px;

color:white;

box-shadow:0 20px 45px rgba(37,99,235,.25);

}

.hero-badge{

background:rgba(255,255,255,.2);

padding:8px 20px;

border-radius:50px;

font-weight:600;

display:inline-block;

}

.hero-title{

font-size:52px;

font-weight:800;

margin-bottom:15px;

}

.hero-subtitle{

font-size:18px;

opacity:.95;

line-height:1.8;

}

.hero-score{

background:white;

color:#111827;

padding:30px;

border-radius:25px;

display:inline-block;

text-align:center;

min-width:220px;

box-shadow:0 15px 35px rgba(0,0,0,.15);

}

.score-title{

font-weight:600;

color:#64748b;

}

.score-value{

font-size:56px;

font-weight:800;

color:#2563eb;

}

.recommend-card{

background:white;

border-radius:25px;

padding:30px;

box-shadow:0 15px 35px rgba(0,0,0,.08);

transition:.3s;

height:100%;

}

.recommend-card:hover{

transform:translateY(-8px);

}

.recommend-card h6{

color:#64748b;

margin-top:20px;

}

.recommend-card h2{

font-size:42px;

font-weight:800;

margin:10px 0;

}

.icon{

width:65px;

height:65px;

border-radius:18px;

display:flex;

align-items:center;

justify-content:center;

font-size:30px;

}

.icon.success{

background:#dcfce7;

}

.icon.warning{

background:#fef3c7;

}

.icon.danger{

background:#fee2e2;

}

.icon.primary{

background:#dbeafe;

}

#recommendationMap{

height:600px;

border-radius:20px;

overflow:hidden;

}

.country-icon{

width:60px;

height:60px;

border-radius:15px;

background:#dbeafe;

display:flex;

align-items:center;

justify-content:center;

font-size:28px;

}

</style>