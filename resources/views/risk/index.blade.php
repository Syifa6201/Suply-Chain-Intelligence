@extends('layouts.app')

@section('content')

@php

    $color = 'success';

    if($level == 'MEDIUM'){
        $color = 'warning';
    }

    if($level == 'HIGH'){
        $color = 'danger';
    }

@endphp

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">

🤖 AI Supply Chain Risk Intelligence

</h2>


<p class="text-muted mb-0">

Real-time AI assessment for {{ $selectedCountry }}

based on weather, currency, news and economy factors.

</p>

    </div>

    <span class="badge bg-success fs-6">
        LIVE
    </span>

</div>


<form method="GET" class="mb-4">

    <div class="row">

        <div class="col-lg-4">

            <label class="form-label fw-semibold">

                Select Country

            </label>

            <select
                name="country"
                class="form-select"
                onchange="this.form.submit()">

                @foreach($countries as $country)

                    <option
                        value="{{ $country->name }}"
                        {{ $selectedCountry==$country->name?'selected':'' }}>

                        {{ $country->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

</form>



<div class="row g-4 mb-4">

    <div class="col-lg-3">


<div class="card risk-card shadow border-0 p-4 h-100">


<div class="d-flex justify-content-between">


<h6 class="text-muted">

⚠ Overall Risk

</h6>


<span class="badge bg-{{ $color }}">

AI Score

</span>


</div>



<h1 class="fw-bold mt-3">

{{ round($score) }}

<span class="fs-5">

/100

</span>


</h1>



<div class="progress mt-3">


<div 

class="progress-bar bg-{{ $color }}"

style="width:{{ $score }}%">


</div>


</div>



<p class="text-muted mt-3 mb-0">

Overall supply chain exposure level

</p>


</div>


</div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <div class="d-flex justify-content-between">


<h6 class="text-muted">

🚦 Risk Classification

</h6>


<span class="badge bg-{{ $color }}">

AI

</span>


</div>



<h2 class="text-{{ $color }} mt-3">

{{ $level }}

</h2>



<p class="text-muted">

@if($level=="HIGH")

High disruption probability detected.

@elseif($level=="MEDIUM")

Risk requires continuous monitoring.

@else

Supply chain condition is stable.

@endif

</p>

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <div class="d-flex justify-content-between">


<h6 class="text-muted">

🚢 Supply Chain Impact

</h6>


<span>

📦

</span>


</div>



@if($level=="HIGH")


<h3 class="text-danger mt-3">

Critical

</h3>


<p class="text-muted">

Shipment disruption possible.

</p>



@elseif($level=="MEDIUM")


<h3 class="text-warning mt-3">

Monitor

</h3>


<p class="text-muted">

Operational risk detected.

</p>



@else


<h3 class="text-success mt-3">

Stable

</h3>


<p class="text-muted">

Normal supply chain condition.

</p>



@endif

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <div class="d-flex justify-content-between">


<h6 class="text-muted">

🤖 AI Engine

</h6>


<span class="badge bg-primary">

LIVE

</span>


</div>



<h3 class="text-primary mt-3">

Active

</h3>



<p class="text-muted">

Continuous risk monitoring enabled.

</p>


<small>

Last analysis: Real-time

</small>

        </div>

    </div>

</div>



<div class="card card-custom p-4 mb-4">

    <div class="d-flex justify-content-between">

        <h4>

            Risk Progress

        </h4>

        <strong>

            {{ round($score) }}%

        </strong>

    </div>

    <div class="progress mt-3" style="height:25px">

        <div

            class="progress-bar bg-{{ $color }}"

            style="width:{{ $score }}%">

            {{ round($score) }}%

        </div>

    </div>

</div>



<div class="row g-4 mb-5 mt-3">


{{-- WEATHER --}}

<div class="col-lg-3 col-md-6">


<div class="card factor-card shadow border-0 p-4 h-100">


<div class="factor-icon bg-primary">

🌦

</div>



<h5 class="mt-3 fw-bold">

Weather Risk

</h5>



<h2>

{{ $weatherScore }}/100

</h2>



<p class="text-muted">

Climate disruption exposure

</p>



@if($weatherScore > 70)

<span class="badge bg-danger">

High Weather Risk

</span>

@elseif($weatherScore > 40)

<span class="badge bg-warning text-dark">

Moderate Risk

</span>

@else

<span class="badge bg-success">

Stable

</span>

@endif



</div>


</div>





{{-- CURRENCY --}}

<div class="col-lg-3 col-md-6">


<div class="card factor-card shadow border-0 p-4 h-100">


<div class="factor-icon bg-success">

💱

</div>



<h5 class="mt-3 fw-bold">

Currency Risk

</h5>



<h2>

{{ $currencyScore }}/100

</h2>



<p class="text-muted">

Exchange rate volatility

</p>



@if($currencyScore > 70)

<span class="badge bg-danger">

High FX Risk

</span>

@elseif($currencyScore > 40)

<span class="badge bg-warning text-dark">

Monitor FX

</span>

@else

<span class="badge bg-success">

Stable Currency

</span>

@endif



</div>


</div>





{{-- NEWS --}}

<div class="col-lg-3 col-md-6">


<div class="card factor-card shadow border-0 p-4 h-100">


<div class="factor-icon bg-danger">

📰

</div>



<h5 class="mt-3 fw-bold">

News Risk

</h5>



<h2>

{{ $newsScore }}/100

</h2>



<p class="text-muted">

Political & market disruption

</p>



@if($newsScore > 70)

<span class="badge bg-danger">

Critical News

</span>

@elseif($newsScore > 40)

<span class="badge bg-warning text-dark">

Monitor News

</span>

@else

<span class="badge bg-success">

Low Impact

</span>

@endif



</div>


</div>





{{-- ECONOMY --}}

<div class="col-lg-3 col-md-6">


<div class="card factor-card shadow border-0 p-4 h-100">


<div class="factor-icon bg-warning">

📈

</div>



<h5 class="mt-3 fw-bold">

Economy Risk

</h5>



<h2>

{{ $economyScore }}/100

</h2>



<p class="text-muted">

Economic stability factor

</p>



@if($economyScore > 70)

<span class="badge bg-success">

Strong Economy

</span>

@elseif($economyScore > 40)

<span class="badge bg-warning text-dark">

Moderate

</span>

@else

<span class="badge bg-danger">

Economic Risk

</span>

@endif



</div>


</div>


</div>

<div class="card card-custom p-4 mb-4">


<h4 class="fw-bold">

🧠 AI Risk Explanation

</h4>


<hr>



<div class="row g-4">


<div class="col-lg-4">


<div class="ai-risk-box">


<h6>

⚠ Main Risk Factor

</h6>



@php

$maxRisk=max(
$weatherScore,
$currencyScore,
$newsScore,
$economyScore
);


@endphp



<h4 class="text-danger mt-3">


@if($maxRisk==$weatherScore)

🌦 Weather

@elseif($maxRisk==$currencyScore)

💱 Currency

@elseif($maxRisk==$newsScore)

📰 News

@else

📈 Economy

@endif


</h4>



<p>

Highest contributor to current supply chain risk.

</p>


</div>


</div>





<div class="col-lg-4">


<div class="ai-risk-box">


<h6>

📦 Supply Chain Impact

</h6>


<p class="mt-3">


@if($level=="HIGH")


Potential shipment disruption,
higher operational cost,
and supplier uncertainty.


@elseif($level=="MEDIUM")


Requires monitoring on logistics,
currency and market condition.


@else


Current condition supports
stable supply chain operation.


@endif


</p>


</div>


</div>





<div class="col-lg-4">


<div class="ai-risk-box">


<h6>

🤖 AI Recommendation

</h6>


<p class="mt-3">

{{ $recommendation }}

</p>


</div>


</div>



</div>


</div>

<div class="row">

    <div class="col-lg-8">

        <div class="card card-custom p-4">

            <h4>

                📊 Risk Factor Analysis

            </h4>

            <hr>

            <div class="chart-container">

    <canvas id="riskChart"></canvas>

</div>

        </div>

    </div>



    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <h4>

                🤖 AI Recommendation

            </h4>

            <hr>

            @if($level=="HIGH")

                <div class="alert alert-danger">

                    {{ $recommendation }}

                    <hr>

                    • Delay shipment

                    <br>

                    • Monitor geopolitical news

                    <br>

                    • Prepare alternative routes

                </div>

            @elseif($level=="MEDIUM")

                <div class="alert alert-warning">

                    {{ $recommendation }}

                    <hr>

                    • Monitor market daily

                    <br>

                    • Watch inflation

                    <br>

                    • Check logistics schedule

                </div>

            @else

                <div class="alert alert-success">

                    {{ $recommendation }}

                    <hr>

                    • Continue export

                    <br>

                    • Normal monitoring

                    <br>

                    • Supply chain is stable

                </div>

            @endif

        </div>

    </div>

</div>

<div class="card card-custom p-4 mt-4">


<div class="d-flex justify-content-between align-items-center">


<div>

<h4 class="fw-bold">

📈 Risk Trend Monitoring

</h4>


<p class="text-muted mb-0">

Historical AI risk movement for {{ $selectedCountry }}

</p>


</div>


<span class="badge bg-primary">

AI History

</span>


</div>



<hr>



<div style="height:320px">


<canvas id="riskHistoryChart"></canvas>


</div>



</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('riskChart'),{

    type:'radar',

    data:{

        labels:[

            'Weather',

            'Currency',

            'News',

            'Economy'

        ],

        datasets:[{

            label:'Supply Chain Risk Level',

            data:[

                {{ $weatherScore }},

                {{ $currencyScore }},

                {{ $newsScore }},

                {{ $economyScore }}

            ],

            borderWidth:2,

            fill:true,
tension:0.3

        }]

    },

    options:{

        responsive:true,

        maintainAspectRatio:false,

        scales:{

            r:{

                suggestedMin:0,

                suggestedMax:100,
pointLabels:{
    font:{
        size:14,
        weight:'bold'
    }
}
            }

        }

    }

});

</script>

<script>


new Chart(

document.getElementById('riskHistoryChart'),

{


type:'line',


data:{


labels:[

'Jan',

'Feb',

'Mar',

'Apr',

'May',

'Jun'

],



datasets:[{


label:'Risk Score',



data:[

65,

70,

62,

75,

80,

{{ round($score) }}

],



borderWidth:3,

fill:true


}]


},


options:{


responsive:true,


maintainAspectRatio:false,


scales:{


y:{


beginAtZero:true,


max:100


}


}



}


}


);



</script>

@endsection

<style>

.risk-card{

border-radius:22px;

transition:.3s;

}


.risk-card:hover{

transform:translateY(-6px);

}


.risk-card h1,
.risk-card h2,
.risk-card h3{

font-weight:800;

}

.factor-card{

border-radius:22px;

transition:.3s;

}


.factor-card:hover{

transform:translateY(-6px);

}



.factor-icon{

width:55px;

height:55px;

border-radius:18px;

display:flex;

align-items:center;

justify-content:center;

font-size:28px;

}


.factor-card h2{

font-weight:800;

margin-top:15px;

}

.ai-risk-box{

background:#f8fafc;

padding:22px;

border-radius:20px;

height:160px;

border-left:5px solid #0d6efd;

}


.ai-risk-box h6{

font-weight:700;

}


.ai-risk-box p{

color:#64748b;

font-size:14px;

}

.trend-card{

border-radius:22px;

}


.trend-card h4{

font-weight:800;

}

.chart-container{

    position:relative;

    height:380px;

    width:100%;

}

</style>