@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- ================= HEADER ================= --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="d-flex align-items-center">

            <img
                src="{{ $info['flag'] }}"
                width="65"
                class="rounded shadow me-3">

            <div>

                <h2 class="fw-bold mb-0">

                    {{ $country }}

                </h2>

                <small class="text-muted">

                    Global Supply Chain Intelligence Dashboard

                </small>

            </div>

        </div>

        <span class="badge bg-success px-4 py-2 fs-6">

            LIVE

        </span>

    </div>



    {{-- ================= EXECUTIVE SCORE ================= --}}

    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <small class="text-muted">

                        Supply Chain Score

                    </small>

                    <h1 class="text-primary mt-3">

                        {{ $supplyScore['overall'] }}/100

                    </h1>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <small class="text-muted">

                        Economic Stability

                    </small>

                    <h1 class="text-success mt-3">

                        {{ $supplyScore['economic'] }}/100

                    </h1>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <small class="text-muted">

                        Logistics

                    </small>

                    <h1 class="text-warning mt-3">

                        {{ $supplyScore['logistics'] }}/100

                    </h1>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <small class="text-muted">

                        Market Opportunity

                    </small>

                    <h1 class="text-info mt-3">

                        {{ $supplyScore['market'] }}/100

                    </h1>

                </div>

            </div>

        </div>

    </div>



    {{-- ================= AI EXECUTIVE SUMMARY ================= --}}

    <div class="card shadow border-0 mb-4">

        <div class="card-body">

            <h4>

                🤖 AI Executive Insight

            </h4>

            <hr>

            <p class="mb-0">

                <strong>{{ $country }}</strong>

                currently has

                <strong>{{ strtolower($risk['status']) }}</strong>

                supply chain risk.

                Current inflation is

                <strong>

                    {{ number_format($statistics['inflation'] ?? 0,2) }}%

                </strong>

                with total export value reaching

                <strong>

                    ${{ number_format(($statistics['export'] ?? 0)/1000000000,2) }} B

                </strong>

                and import

                <strong>

                    ${{ number_format(($statistics['import'] ?? 0)/1000000000,2) }} B.

                </strong>

                Based on the latest economic indicators, this country is categorized as

                <strong>

                    {{ $tradeAnalysis['status'] }}

                </strong>

                for international trade.

            </p>

        </div>

    </div>

    {{-- ================= REALTIME OVERVIEW ================= --}}

<div class="row g-4 mb-4">

    {{-- Temperature --}}
    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <small class="text-muted">

                    🌡 Temperature

                </small>

                <h2 class="mt-2">

                    {{ $weather['current']['temperature_2m'] ?? '-' }} °C

                </h2>

                <small>

                    Wind

                    {{ $weather['current']['wind_speed_10m'] ?? '-' }}

                    km/h

                </small>

            </div>

        </div>

    </div>



    {{-- GDP --}}
    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                @php

                    $gdp = $economy[1][0]['value'] ?? null;

                @endphp

                <small class="text-muted">

                    💰 GDP

                </small>

                <h2 class="mt-2">

                    @if($gdp)

                        ${{ number_format($gdp/1000000000000,2) }} T

                    @else

                        -

                    @endif

                </h2>

                <small>

                    World Bank

                </small>

            </div>

        </div>

    </div>



    {{-- Currency --}}
    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <small class="text-muted">

                    💱 Currency

                </small>

                <h2 class="mt-2">

                    {{ $currency['currency'] ?? '-' }}

                </h2>

                <div>

                    1 USD =

                    <b>

                        {{ number_format($currency['rate'] ?? 0,2) }}

                        {{ $currency['currency'] ?? '' }}

                    </b>

                </div>

                <span class="badge bg-{{ $currency['color'] ?? 'secondary' }} mt-2">

                    {{ $currency['status'] ?? 'Unknown' }}

                </span>

            </div>

        </div>

    </div>



    {{-- Risk --}}
    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <small class="text-muted">

                    ⚠ AI Risk Analysis

                </small>

                <h2 class="text-{{ $risk['color'] }} mt-2">

                    {{ $risk['status'] }}

                </h2>

                <div>

                    Score

                    <b>

                        {{ $risk['score'] }}/100

                    </b>

                </div>

                <hr>

                <small class="text-muted">

                    Risk Factors

                </small>

                <ul class="small mb-0 mt-2">

                    @forelse(($risk['reasons'] ?? []) as $reason)

                        <li>

                            {{ $reason }}

                        </li>

                    @empty

                        <li>

                            No significant risk detected

                        </li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

</div>



{{-- ================= COUNTRY STATISTICS ================= --}}

<div class="row g-4 mb-4">

    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <small class="text-muted">

                    📈 Inflation

                </small>

                <h3 class="mt-2">

                    {{ number_format($statistics['inflation'] ?? 0,2) }}%

                </h3>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <small class="text-muted">

                    👥 Population

                </small>

                <h3 class="mt-2">

                    {{ number_format($statistics['population'] ?? 0) }}

                </h3>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <small class="text-muted">

                    📦 Export

                </small>

                <h3 class="mt-2">

                    ${{ number_format(($statistics['export'] ?? 0)/1000000000,2) }} B

                </h3>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <small class="text-muted">

                    📥 Import

                </small>

                <h3 class="mt-2">

                    ${{ number_format(($statistics['import'] ?? 0)/1000000000,2) }} B

                </h3>

            </div>

        </div>

    </div>

</div>

{{-- ================= MAP ================= --}}

<div class="card shadow border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between">

            <h4>

                🗺 Country Location

            </h4>

            <span class="badge bg-primary">

                LIVE MAP

            </span>

        </div>

        <hr>

        <div
            id="countryMap"
            style="height:500px;border-radius:15px;">
        </div>

    </div>

</div>



{{-- ================= NEWS & TRADE TREND ================= --}}

<div class="row g-4 mb-4">

    <div class="col-lg-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <h4>

                    📰 Latest News

                </h4>

                <hr>

                @forelse(($news['articles'] ?? []) as $article)

                    <div class="mb-4">

                        <a
                            href="{{ $article['url'] }}"
                            target="_blank"
                            class="fw-bold text-decoration-none">

                            {{ $article['title'] }}

                        </a>

                        <br>

                        <small class="text-muted">

                            {{ $article['source']['name'] ?? '-' }}

                            •

                            {{ $article['publishedAt'] ?? '' }}

                        </small>

                    </div>

                    <hr>

                @empty

                    <div class="text-center text-muted py-5">

                        No news available

                    </div>

                @endforelse

            </div>

        </div>

    </div>



    <div class="col-lg-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <h4>

                    📈 Trade Trend

                </h4>

                <hr>

                <div style="height:380px">

                    <canvas id="tradeChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ================= AI RECOMMENDATION ================= --}}

<div class="row g-4 mb-4">

<div class="col-lg-6">

<div class="card shadow border-0 h-100">

<div class="card-body">

<h4>

🤖 AI Recommendation

</h4>

<hr>

<h3 class="text-{{ $recommendation['color'] }}">

{{ $recommendation['title'] }}

</h3>

<ul class="mt-3">

@forelse(($recommendation['reasons'] ?? []) as $reason)

<li>

{{ $reason }}

</li>

@empty

<li>

No recommendation.

</li>

@endforelse

</ul>

</div>

</div>

</div>



<div class="col-lg-6">

<div class="card shadow border-0 h-100">

<div class="card-body">

<h4>

📦 Trade Intelligence

</h4>

<hr>

<div class="text-center">

<h2 class="text-{{ $tradeAnalysis['color'] }}">

{{ $tradeAnalysis['status'] }}

</h2>

</div>

<table class="table mt-4">

<tr>

<th>Export</th>

<td>

${{ number_format(($tradeAnalysis['export'] ?? 0)/1000000000,2) }}

B

</td>

</tr>

<tr>

<th>Import</th>

<td>

${{ number_format(($tradeAnalysis['import'] ?? 0)/1000000000,2) }}

B

</td>

</tr>

<tr>

<th>Trade Balance</th>

<td>

${{ number_format(($tradeAnalysis['balance'] ?? 0)/1000000000,2) }}

B

</td>

</tr>

<tr>

<th>Recommendation</th>

<td>

{{ $tradeAnalysis['status'] }}

</td>

</tr>

</table>

</div>

</div>

</div>

</div>

{{-- ================= PORT INTELLIGENCE ================= --}}

<div class="row g-4 mb-4">

    <div class="col-lg-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <h4>

                    ⚓ Major Ports

                </h4>

                <hr>

                @forelse($ports as $port)

                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">

                        <div>

                            <h6 class="mb-1">

                                {{ $port->name }}

                            </h6>

                            <small class="text-muted">

                                {{ $port->city }}

                            </small>

                        </div>

                        <div>

                            @php

                                $status = $port->current_status ?? 'Normal';

                            @endphp

                            @if($status=="Normal")

                                <span class="badge bg-success">

                                    Normal

                                </span>

                            @elseif($status=="Delay")

                                <span class="badge bg-warning">

                                    Delay

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Congested

                                </span>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="text-center py-5 text-muted">

                        No port information available.

                    </div>

                @endforelse

            </div>

        </div>

    </div>



    <div class="col-lg-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <h4>

                    🚢 Port Performance

                </h4>

                <hr>

                <table class="table">

                    <tr>

                        <th>Status</th>

                        <td>

                            {{ $portSummary['status'] ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th>Congestion</th>

                        <td>

                            {{ $portSummary['congestion'] ?? 0 }} %

                        </td>

                    </tr>

                    <tr>

                        <th>Total Capacity</th>

                        <td>

                            {{ number_format($portSummary['capacity'] ?? 0) }}

                            TEU

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded",function(){

    const map=L.map("countryMap").setView([

        {{ $info['lat'] }},

        {{ $info['lon'] }}

    ],5);

    L.tileLayer(

        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

        {

            maxZoom:19

        }

    ).addTo(map);

    L.marker([

        {{ $info['lat'] }},

        {{ $info['lon'] }}

    ])

    .addTo(map)

    .bindPopup(

        "<b>{{ $country }}</b><br>{{ $info['capital'] }}"

    )

    .openPopup();

});

</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded",function(){

    const chart=document.getElementById("tradeChart");

    if(!chart) return;

    new Chart(chart,{

        type:"line",

        data:{

            labels:@json($tradeTrend['export']['labels'] ?? []),

            datasets:[

                {

                    label:"Export",

                    data:@json($tradeTrend['export']['values'] ?? []),

                    borderColor:"#0d6efd",

                    backgroundColor:"rgba(13,110,253,.15)",

                    fill:true,

                    tension:.4

                },

                {

                    label:"Import",

                    data:@json($tradeTrend['import']['values'] ?? []),

                    borderColor:"#dc3545",

                    backgroundColor:"rgba(220,53,69,.15)",

                    fill:true,

                    tension:.4

                }

            ]

        },

        options:{

            responsive:true,

            maintainAspectRatio:false,

            plugins:{

                legend:{

                    position:"top"

                }

            },

            interaction:{

                mode:"index",

                intersect:false

            }

        }

    });

});

</script>

</div>

@endsection