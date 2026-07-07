@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">

            🌍 {{ $country }} Intelligence Dashboard

        </h2>

        <small class="text-muted">

            Global Supply Chain Monitoring

        </small>

    </div>

    <div>

        <span class="badge bg-success fs-6">

            LIVE

        </span>

    </div>

</div>

<div class="row g-4">

    <div class="col-lg-3">

        <div class="card card-custom p-4">

            <h6>Temperature</h6>

            <h2>
                {{ $weather['current']['temperature_2m'] ?? '-' }}°C
            </h2>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4">

            @php

                $gdp = $economy[1][0]['value'] ?? null;

            @endphp

            <h6>GDP</h6>

            <h2>

                @if($gdp)

                    ${{ number_format($gdp/1000000000000,2) }} T

                @else

                    -

                @endif

            </h2>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4">

            <h6>Currency</h6>

            <h2>

                {{ $info['currency'] }}

            </h2>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4">

            <h6>Risk</h6>

            @php

            $temp = $weather['current']['temperature_2m'] ?? 0;

            $wind = $weather['current']['wind_speed_10m'] ?? 0;

            $gdp = $economy[1][0]['value'] ?? 0;

            $score = 0;

            /*
            Weather
            */

            if($temp>35)
            {
                $score +=40;
            }
            elseif($temp>30)
            {
                $score +=20;
            }

            if($wind>40)
            {
                $score +=40;
            }
            elseif($wind>20)
            {
                $score +=20;
            }

            /*
            Economy
            */

            if($gdp>3000000000000)
            {
                $score -=20;
            }
            elseif($gdp<500000000000)
            {
                $score +=20;
            }

            $score=max(0,min(100,$score));

            $status="LOW";
            $color="success";

            if($score>=70)
            {
                $status="HIGH";
                $color="danger";
            }
            elseif($score>=40)
            {
                $status="MEDIUM";
                $color="warning";
            }

            @endphp

            <h2 class="text-{{ $color }}">
                {{ $status }}
            </h2>

            <p>

            Risk Score

            <b>{{ $score }}/100</b>

            </p>

        </div>

    </div>

</div>

<div class="row g-4 mt-1">

    <div class="col-lg-3">
        <div class="card card-custom p-4">
            <h6>📈 Inflation</h6>

            <h2>
            {{ number_format($statistics['inflation'] ?? 0,2) }}%
            </h2>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card card-custom p-4">
            <h6>👥 Population</h6>

            <h2>
            {{ number_format($statistics['population'] ?? 0) }}
            </h2>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card card-custom p-4">
            <h6>📦 Export</h6>

            <h2>
            ${{ number_format(($statistics['export'] ?? 0)/1000000000,2) }} B
            </h2>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card card-custom p-4">
            <h6>📥 Import</h6>

            <h2>
            ${{ number_format(($statistics['import'] ?? 0)/1000000000,2) }} B
            </h2>
        </div>
    </div>

</div>

<div class="card card-custom p-4 mt-4">

    <div class="d-flex justify-content-between">

        <h4>
            🗺 Country Map
        </h4>

        <span class="badge bg-primary">
            LIVE
        </span>

    </div>

    <hr>

    <div id="countryMap"
         style="height:500px;border-radius:20px;">
    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <h4>
                📰 Latest Country News
            </h4>

            <hr>

            @forelse(($news['articles'] ?? []) as $article)

                <div class="mb-3">

                    <a href="{{ $article['url'] }}"
                       target="_blank"
                       class="fw-bold">

                        {{ $article['title'] }}

                    </a>

                    <br>

                    <small class="text-muted">

                        {{ $article['source']['name'] ?? '' }}

                    </small>

                </div>

                <hr>

            @empty

                <p>No news available.</p>

            @endforelse

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <h4>

                📈 Trade Trend

            </h4>

            <hr>

            <canvas id="tradeChart"></canvas>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <h4>
                <i class="bi bi-robot"></i>
                AI Trade Recommendation
            </h4>

            <hr>


            @php

                $recommendation = "Suitable for Export";

                $reason = [];

                if($score <= 30)
                {
                    $reason[] = "Low Risk Condition";
                }

                if($gdp > 1000000000000)
                {
                    $reason[] = "Strong Economic Performance";
                }

                if($temp < 35)
                {
                    $reason[] = "Stable Weather";
                }


            @endphp


            <h3 class="text-success">

                {{ $recommendation }}

            </h3>


            <ul class="mt-3">

                @foreach($reason as $item)

                    <li>
                        {{ $item }}
                    </li>

                @endforeach


            </ul>


        </div>

    </div>

    <div class="col-lg-6">


        <div class="card card-custom p-4 h-100">


            <h4>

                <i class="bi bi-box-seam"></i>

                Trade Potential

            </h4>


            <hr>


            <h6>
                Recommended Export Sector
            </h6>


            <div class="mt-3">


                <span class="badge bg-primary p-2 me-2">

                    Technology

                </span>


                <span class="badge bg-primary p-2 me-2">

                    Machinery

                </span>


                <span class="badge bg-primary p-2">

                    Industrial Goods

                </span>


            </div>


            <br>


            <h6>

                Import Opportunity

            </h6>


            <div>

                <span class="badge bg-warning text-dark p-2">

                    Raw Materials

                </span>

            </div>


        </div>


    </div>


</div>

<div class="row mt-4">

<div class="col-lg-6">

<div class="card card-custom p-4">

<h4>

<i class="bi bi-geo-alt-fill"></i>

Major Ports

</h4>

<hr>

@foreach($ports as $port)

<div class="d-flex justify-content-between border-bottom py-2">

<div>

⚓ {{ $port }}

</div>

<span class="badge bg-success">

Active

</span>

</div>

@endforeach

</div>

</div>

<div class="col-lg-6">

<div class="card card-custom p-4">

<h4>

<i class="bi bi-speedometer2"></i>

Port Performance

</h4>

<hr>

<table class="table">

<tr>

<td>Status</td>

<td>

<span class="badge bg-success">

Normal

</span>

</td>

</tr>

<tr>

<td>Congestion</td>

<td>

Low

</td>

</tr>

<tr>

<td>Container Capacity</td>

<td>

9.5 Million TEU

</td>

</tr>

<tr>

<td>Efficiency</td>

<td>

★★★★☆

</td>

</tr>

</table>

</div>

</div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function(){


    var map = L.map('countryMap')
        .setView(
            [
                {{ $info['lat'] }},
                {{ $info['lon'] }}
            ],
            5
        );


    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom:19
        }
    ).addTo(map);



    L.marker(
        [
            {{ $info['lat'] }},
            {{ $info['lon'] }}
        ]
    )
    .addTo(map)
    .bindPopup(
        `
        <b>{{ $country }}</b>
        <br>
        Capital Location
        `
    )
    .openPopup();


});

</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

new Chart(

document.getElementById('tradeChart'),

{

type:'line',

data:{


labels:[

'2020',
'2021',
'2022',
'2023',
'2024',
'2025'

],


datasets:[


{

label:'Export',

data:[
{{ ($statistics['export'] ?? 0)/1000000000*0.70 }},
{{ ($statistics['export'] ?? 0)/1000000000*0.75 }},
{{ ($statistics['export'] ?? 0)/1000000000*0.82 }},
{{ ($statistics['export'] ?? 0)/1000000000*0.90 }},
{{ ($statistics['export'] ?? 0)/1000000000*0.95 }},
{{ ($statistics['export'] ?? 0)/1000000000 }}
]

},


{

label:'Import',

data:[
{{ ($statistics['import'] ?? 0)/1000000000*0.70 }},
{{ ($statistics['import'] ?? 0)/1000000000*0.75 }},
{{ ($statistics['import'] ?? 0)/1000000000*0.82 }},
{{ ($statistics['import'] ?? 0)/1000000000*0.90 }},
{{ ($statistics['import'] ?? 0)/1000000000*0.95 }},
{{ ($statistics['import'] ?? 0)/1000000000 }}
]

}


]


}


}

);


</script>

@endsection