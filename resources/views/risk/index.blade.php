@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            🤖 AI Risk Analysis
        </h2>

        <small class="text-muted">
            AI-Based Supply Chain Risk Monitoring
        </small>

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

        <div class="card card-custom p-4 text-center">

            <h6>

                Overall Risk

            </h6>

            <h1 class="fw-bold">

                {{ round($score) }}/100

            </h1>

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6>

                Risk Level

            </h6>

            @php

                $color='success';

                if($level=='MEDIUM') $color='warning';

                if($level=='HIGH') $color='danger';

            @endphp

            <h1 class="text-{{ $color }}">

                {{ $level }}

            </h1>

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6>

                Supply Chain

            </h6>

            @if($level=="HIGH")

                <h3 class="text-danger">

                    Critical

                </h3>

            @elseif($level=="MEDIUM")

                <h3 class="text-warning">

                    Monitor

                </h3>

            @else

                <h3 class="text-success">

                    Stable

                </h3>

            @endif

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6>

                AI Status

            </h6>

            <h3 class="text-primary">

                Active

            </h3>

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



<div class="row g-4 mb-4">

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <i class="bi bi-cloud-lightning fs-1 text-primary"></i>

            <h5 class="mt-3">

                Weather

            </h5>

            <h2>

                {{ $weatherScore }}

            </h2>

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <i class="bi bi-currency-exchange fs-1 text-success"></i>

            <h5 class="mt-3">

                Currency

            </h5>

            <h2>

                {{ $currencyScore }}

            </h2>

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <i class="bi bi-newspaper fs-1 text-danger"></i>

            <h5 class="mt-3">

                News

            </h5>

            <h2>

                {{ $newsScore }}

            </h2>

        </div>

    </div>



    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <i class="bi bi-graph-up fs-1 text-warning"></i>

            <h5 class="mt-3">

                Economy

            </h5>

            <h2>

                {{ $economyScore }}

            </h2>

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

            <div style="height:380px">

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

            label:'Risk Score',

            data:[

                {{ $weatherScore }},

                {{ $currencyScore }},

                {{ $newsScore }},

                {{ $economyScore }}

            ],

            borderWidth:2,

            fill:true

        }]

    },

    options:{

        responsive:true,

        maintainAspectRatio:false,

        scales:{

            r:{

                suggestedMin:0,

                suggestedMax:100

            }

        }

    }

});

</script>

@endsection