@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- ================= HEADER ================= --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="d-flex align-items-center">

    <img
        src="{{ $info['flag'] }}"
        width="80"
        class="rounded shadow me-4">


    <div>


        <h1 class="fw-bold mb-1">

            {{ $country }}

        </h1>


        <p class="text-muted mb-2">

            🌍 Global Supply Chain Intelligence Dashboard

        </p>



        <div class="d-flex gap-2 flex-wrap">


            <span class="badge bg-primary">

                🌐 {{ $info['region'] ?? 'Global Market' }}

            </span>


            <span class="badge bg-success">

                💱 {{ $currency['currency'] ?? '-' }}

            </span>


            <span class="badge bg-warning text-dark">

                🏛 {{ $info['capital'] ?? '-' }}

            </span>


            <span class="badge bg-dark">

                📡 Live Monitoring

            </span>


        </div>


    </div>


</div>

        <span class="badge bg-success px-4 py-2 fs-6">

            LIVE

        </span>

    </div>



    {{-- ================= EXECUTIVE SCORE ================= --}}

    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">

            <div class="card score-card shadow border-0 h-100">

<div class="card-body">


<div class="d-flex justify-content-between">


<small class="text-muted">

🚢 Supply Chain Score

</small>


<span class="badge bg-primary">

AI Score

</span>


</div>



<h1 class="text-primary mt-3">

{{ $supplyScore['overall'] }}/100

</h1>



<div class="progress mt-3">


<div class="progress-bar bg-primary"

style="width:{{ $supplyScore['overall'] }}%">

</div>


</div>



<small class="text-muted mt-3 d-block">


Overall country supply chain performance


</small>


</div>

</div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card score-card shadow border-0 h-100">

<div class="card-body">


<div class="d-flex justify-content-between">


<small class="text-muted">

📈 Economic Stability

</small>


<span class="badge bg-success">

Economy

</span>


</div>



<h1 class="text-success mt-3">

{{ $supplyScore['economic'] }}/100

</h1>


<div class="progress mt-3">


<div class="progress-bar bg-success"

style="width:{{ $supplyScore['economic'] }}%">

</div>


</div>



<small class="text-muted mt-3 d-block">

Based on GDP, inflation and economic data

</small>



</div>

</div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card score-card shadow border-0 h-100">

<div class="card-body">


<div class="d-flex justify-content-between">


<small class="text-muted">

⚓ Logistics Performance

</small>


<span class="badge bg-warning text-dark">

Logistics

</span>


</div>


<h1 class="text-warning mt-3">

{{ $supplyScore['logistics'] }}/100

</h1>



<div class="progress mt-3">


<div class="progress-bar bg-warning"

style="width:{{ $supplyScore['logistics'] }}%">

</div>


</div>


<small class="text-muted mt-3 d-block">

Based on ports and transportation

</small>


</div>

</div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card score-card shadow border-0 h-100">

<div class="card-body">


<div class="d-flex justify-content-between">


<small class="text-muted">

🌎 Market Opportunity

</small>


<span class="badge bg-info">

Market

</span>


</div>


<h1 class="text-info mt-3">

{{ $supplyScore['market'] }}/100

</h1>


<div class="progress mt-3">


<div class="progress-bar bg-info"

style="width:{{ $supplyScore['market'] }}%">

</div>


</div>


<small class="text-muted mt-3 d-block">

Based on population and trade potential

</small>


</div>

</div>

        </div>

    </div>



    {{-- ================= AI EXECUTIVE SUMMARY ================= --}}

<div class="card shadow border-0 mb-4">


<div class="card-body">


<h4 class="fw-bold">

🤖 AI Executive Insight

</h4>


<hr>



<div class="row g-4">



{{-- Risk Summary --}}

<div class="col-lg-4">


<div class="ai-box">


<h6>

⚠ Supply Chain Risk

</h6>


<h3 class="text-{{ $risk['color'] }}">

{{ strtoupper($risk['status']) }}

</h3>


<p>

AI evaluates current supply chain condition based on:

</p>


<ul>

<li>

Economic stability

</li>


<li>

Market condition

</li>


<li>

Logistics performance

</li>


</ul>


</div>


</div>





{{-- Economic Analysis --}}

<div class="col-lg-4">


<div class="ai-box">


<h6>

📈 Economic Analysis

</h6>


<p>


{{ $country }}

has inflation rate:


<strong>

{{ number_format($statistics['inflation'] ?? 0,2) }}%

</strong>


</p>


<p>


GDP:

<strong>

${{ number_format(($statistics['gdp'] ?? 0)/1000000000,2) }} B

</strong>


</p>


</div>


</div>





{{-- Trade Decision --}}

<div class="col-lg-4">


<div class="ai-box">


<h6>

🤖 AI Recommendation

</h6>



<h4>


@if($tradeAnalysis['status']=="Surplus")


<span class="text-success">

Trade Opportunity

</span>


@elseif($tradeAnalysis['status']=="Deficit")


<span class="text-warning">

Monitor Trade

</span>


@else


<span>

Analyze Market

</span>


@endif


</h4>


<p>

Based on export, import and economic indicators.

</p>


</div>


</div>



</div>



</div>


</div>

    {{-- ================= REALTIME OVERVIEW ================= --}}

<div class="row g-4 mb-4">

    {{-- Temperature --}}
<div class="col-lg-3 col-md-6">


<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between">


<small class="text-muted">

🌡 Climate Condition

</small>


<span class="badge bg-info">

LIVE

</span>


</div>



<h2 class="mt-3">

{{ $weather['current']['temperature_2m'] ?? '-' }}°C

</h2>



<p class="text-muted mb-2">

Wind

{{ $weather['current']['wind_speed_10m'] ?? '-' }}

km/h

</p>



<span class="badge bg-success">

Weather Stable

</span>


</div>


</div>


</div>



    {{-- GDP --}}
    <div class="col-lg-3 col-md-6">


<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<div>

<small class="text-muted">

💰 Economic Power

</small>


<h2 class="fw-bold mt-3">


@php

$gdpValue = $economy[1][0]['value'] ?? 0;

@endphp


${{ number_format($gdpValue/1000000000,2) }} B


</h2>


</div>



<span class="icon-box bg-success">

📈

</span>


</div>



<p class="text-muted">

{{ $country }} GDP Performance

</p>



<div class="progress mt-3">


<div class="progress-bar bg-success"

style="width:85%">

</div>


</div>



<div class="mt-3">


<span class="badge bg-success">

Strong Economic Indicator

</span>


</div>


</div>


</div>


</div>

    {{-- Currency --}}
    <div class="col-lg-3 col-md-6">


<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between">


<small class="text-muted">

💱 Currency

</small>


<span class="badge bg-primary">

FX

</span>


</div>



<h2 class="mt-3">

{{ $currency['currency'] ?? '-' }}

</h2>



<p>

1 USD =

<strong>

{{ number_format($currency['rate'] ?? 0,2) }}

</strong>

</p>



<span class="badge bg-{{ $currency['color'] ?? 'secondary' }}">

{{ $currency['status'] ?? 'Unknown' }}

</span>



</div>


</div>


</div>



    {{-- Risk --}}
  <div class="col-lg-3 col-md-6">


<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between">


<small class="text-muted">

⚠ AI Risk Engine

</small>


<span class="badge bg-danger">

AI

</span>


</div>



<h2 class="text-{{ $risk['color'] }} mt-3">

{{ $risk['status'] }}

</h2>



<div class="progress mt-3">


<div class="progress-bar bg-{{ $risk['color'] }}"

style="width:{{ $risk['score'] }}%">

</div>


</div>



<p class="mt-2">

Risk Score:

<strong>

{{ $risk['score'] }}/100

</strong>


</p>


</div>


</div>


</div>

</div>



{{-- ================= COUNTRY ECONOMIC INTELLIGENCE ================= --}}

<div class="row g-4 mb-4">


{{-- Inflation --}}

<div class="col-lg-3 col-md-6">

<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between">


<span class="text-muted">

📈 Inflation

</span>


<span class="badge bg-danger">

Economy

</span>


</div>



<h2 class="mt-3 fw-bold">

{{ number_format($statistics['inflation'] ?? 0,2) }}%

</h2>



<p class="text-muted">

Price stability indicator

</p>



@if(($statistics['inflation'] ?? 0) > 5)

<span class="badge bg-danger">

High Pressure

</span>

@else

<span class="badge bg-success">

Stable

</span>

@endif


</div>

</div>

</div>





{{-- Population --}}

<div class="col-lg-3 col-md-6">


<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between">


<span class="text-muted">

👥 Population

</span>


<span class="badge bg-primary">

Market

</span>


</div>



<h2 class="mt-3 fw-bold">


{{ number_format($statistics['population'] ?? 0) }}


</h2>



<p class="text-muted">

Consumer market potential

</p>


<span class="badge bg-primary">

Demand Indicator

</span>


</div>

</div>


</div>







{{-- Export --}}

<div class="col-lg-3 col-md-6">


<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between">


<span class="text-muted">

📦 Export

</span>


<span class="badge bg-success">

Trade

</span>


</div>



<h2 class="mt-3 fw-bold">


${{ number_format(($statistics['export'] ?? 0)/1000000000,2) }} B


</h2>



<p class="text-muted">

International trade strength

</p>


<span class="badge bg-success">

Export Capability

</span>


</div>

</div>


</div>






{{-- Import --}}

<div class="col-lg-3 col-md-6">


<div class="card intelligence-card shadow border-0 h-100">


<div class="card-body">


<div class="d-flex justify-content-between">


<span class="text-muted">

📥 Import

</span>


<span class="badge bg-warning text-dark">

Demand

</span>


</div>



<h2 class="mt-3 fw-bold">


${{ number_format(($statistics['import'] ?? 0)/1000000000,2) }} B


</h2>



<p class="text-muted">

Import dependency level

</p>


<span class="badge bg-warning text-dark">

Market Demand

</span>


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

                <h4 class="fw-bold">

📰 Latest News Intelligence

</h4>


<p class="text-muted">

AI monitoring news impact for {{ $country }}

</p>


<hr>



@forelse(($news['articles'] ?? []) as $article)


<div class="news-card mb-3">


<div class="d-flex justify-content-between">


<div>


<h6 class="fw-bold">

{{ $article['title'] }}

</h6>


<small class="text-muted">

{{ $article['source']['name'] ?? 'Global News' }}

•

{{ $article['publishedAt'] ?? '' }}

</small>


</div>


<span class="badge bg-primary">

AI Scan

</span>


</div>



<p class="mt-2 text-muted small">

Supply chain impact analysis generated from latest information.

</p>



<a

href="{{ $article['url'] }}"

target="_blank"

class="btn btn-sm btn-outline-primary">


Read News


</a>


</div>



@empty


<div class="text-center text-muted py-5">

No news available for this country.

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

<h4 class="fw-bold">

🤖 AI Trade Recommendation

</h4>


<hr>


<div class="text-center">


<h2 class="text-{{ $recommendation['color'] }}">

{{ $recommendation['title'] }}

</h2>



<p class="text-muted">

AI decision based on:

</p>


<div class="d-flex justify-content-center gap-2 flex-wrap">


<span class="badge bg-primary">

Economic

</span>


<span class="badge bg-success">

Logistics

</span>


<span class="badge bg-warning text-dark">

Trade

</span>


<span class="badge bg-info">

Market

</span>


</div>


</div>



<hr>



<h6>

Recommended Action:

</h6>


<ul>


@forelse(($recommendation['reasons'] ?? []) as $reason)

<li>

{{ $reason }}

</li>


@empty

<li>

No recommendation available.

</li>

@endforelse


</ul>

</div>

</div>

</div>



<div class="col-lg-6">

<div class="card shadow border-0 h-100">

<div class="card-body">

<h4 class="fw-bold">

📦 Trade Intelligence

</h4>


<p class="text-muted">

AI analysis for {{ $country }} international trade condition

</p>


<hr>



<div class="row g-3">



{{-- Trade Status --}}

<div class="col-md-6">


<div class="trade-box">


<small class="text-muted">

Current Status

</small>


<h3 class="text-{{ $tradeAnalysis['color'] }} mt-2">


{{ $tradeAnalysis['status'] }}


</h3>


</div>


</div>




{{-- Trade Balance --}}

<div class="col-md-6">


<div class="trade-box">


<small class="text-muted">

Trade Balance

</small>


<h3 class="mt-2">


${{ number_format(($tradeAnalysis['balance'] ?? 0)/1000000000,2) }} B


</h3>


</div>


</div>




{{-- Export --}}

<div class="col-md-6">


<div class="trade-box">


<small class="text-muted">

📦 Export Strength

</small>


<h3 class="text-success mt-2">


${{ number_format(($tradeAnalysis['export'] ?? 0)/1000000000,2) }} B


</h3>


</div>


</div>





{{-- Import --}}

<div class="col-md-6">


<div class="trade-box">


<small class="text-muted">

📥 Import Dependency

</small>


<h3 class="text-warning mt-2">


${{ number_format(($tradeAnalysis['import'] ?? 0)/1000000000,2) }} B


</h3>


</div>


</div>



</div>



<hr>



<h6 class="fw-bold">

🤖 AI Action Plan

</h6>



<ul class="mt-3">


@if($tradeAnalysis['status']=="Surplus")


<li>

Increase export partnership opportunity

</li>


<li>

Explore new international buyers

</li>


<li>

Optimize logistics routes

</li>



@elseif($tradeAnalysis['status']=="Deficit")


<li>

Review import dependency

</li>


<li>

Search alternative suppliers

</li>


<li>

Monitor currency fluctuation

</li>



@else


<li>

Analyze market potential

</li>


<li>

Monitor trade condition

</li>


<li>

Evaluate business risk

</li>


@endif


</ul>

</div>

</div>

</div>

</div>

{{-- ================= PORT INTELLIGENCE ================= --}}

<div class="row g-4 mb-4">

    <div class="col-lg-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <h4 class="fw-bold">

⚓ Port Intelligence

</h4>


<p class="text-muted">

Major logistics gateway for {{ $country }}

</p>


<hr>



@forelse($ports as $port)


<div class="port-card mb-3">


<div class="d-flex justify-content-between align-items-center">


<div>


<h6 class="fw-bold mb-1">

{{ $port->name }}

</h6>


<small class="text-muted">

📍 {{ $port->city }}

</small>


</div>



<div>


@php

$status = $port->current_status ?? 'Normal';

@endphp



@if($status=="Normal")

<span class="badge bg-success">

🟢 Normal

</span>


@elseif($status=="Delay")


<span class="badge bg-warning text-dark">

🟡 Delay

</span>


@else


<span class="badge bg-danger">

🔴 Congested

</span>


@endif


</div>


</div>



<div class="mt-3">


<small class="text-muted">

Capacity

</small>


<div class="progress">


<div class="progress-bar bg-primary"

style="width:{{ min(($port->capacity ?? 0)/10000000*100,100) }}%">


</div>


</div>


</div>



</div>


@empty


<div class="text-center text-muted py-5">

No port information available

</div>


@endforelse

            </div>

        </div>

    </div>



    <div class="col-lg-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <h4 class="fw-bold">

🚢 Port Performance Analysis

</h4>


<hr>



<div class="text-center mb-4">


<h1 class="text-primary">


{{ count($ports) }}

</h1>


<p class="text-muted">

Active Port Monitoring

</p>


</div>



<div class="port-stat">


<span>

⚓ Total Capacity

</span>


<strong>

{{ number_format($portSummary['capacity'] ?? 0) }}

TEU

</strong>


</div>



<div class="port-stat">


<span>

🚦 Current Status

</span>


<strong>

{{ $portSummary['status'] ?? '-' }}

</strong>


</div>




<div class="port-stat">


<span>

🚧 Congestion Level

</span>


<strong>

{{ $portSummary['congestion'] ?? 0 }}%

</strong>


</div>

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

<style>

.score-card{

border-radius:20px;

transition:.3s;

}


.score-card:hover{

transform:translateY(-8px);

}


.progress{

height:8px;

border-radius:20px;

}


.progress-bar{

border-radius:20px;

}

.ai-box{

background:#f8fafc;

padding:20px;

border-radius:18px;

height:100%;

border-left:5px solid #0d6efd;

}


.ai-box h6{

font-weight:700;

margin-bottom:15px;

}


.ai-box p{

color:#64748b;

font-size:14px;

}


.ai-box li{

margin-bottom:5px;

}

.intelligence-card{

border-radius:22px;

transition:.3s;

}


intelligence-card:hover{

transform:translateY(-6px);

}


.intelligence-card h2{

font-weight:800;

}


.progress{

height:8px;

border-radius:20px;

}

.icon-box{

width:45px;

height:45px;

border-radius:15px;

display:flex;

align-items:center;

justify-content:center;

font-size:22px;

}

.intelligence-card{

border-radius:22px;

transition:.3s;

}


.intelligence-card:hover{

transform:translateY(-6px);

}


.intelligence-card h2{

font-weight:800;

}

.news-card{

background:#f8fafc;

padding:18px;

border-radius:18px;

border-left:5px solid #0d6efd;

transition:.3s;

}


.news-card:hover{

transform:translateX(5px);

box-shadow:0 10px 25px rgba(0,0,0,.08);

}


.news-card h6{

line-height:1.5;

}

.trade-box{

background:#f8fafc;

padding:18px;

border-radius:18px;

height:120px;

border-left:5px solid #0d6efd;

transition:.3s;

}


.trade-box:hover{

transform:translateY(-5px);

box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.port-card{

background:#f8fafc;

padding:18px;

border-radius:18px;

border-left:5px solid #0d6efd;

transition:.3s;

}


.port-card:hover{

transform:translateX(5px);

}



.port-stat{

display:flex;

justify-content:space-between;

padding:15px;

margin-bottom:10px;

background:#f8fafc;

border-radius:15px;

}


.port-stat span{

color:#64748b;

}

</style>