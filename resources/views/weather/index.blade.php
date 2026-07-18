@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <div class="d-flex justify-content-between align-items-center">


<div>

<h4 class="fw-bold">

🌧 Rainfall & Weather Map

</h4>

<p class="text-muted mb-0">

Weather monitoring for

<strong>{{ $selectedCountry }}</strong>

showing rainfall intensity and logistics location.

</p>

</div>


<form method="GET">

<div class="d-flex gap-2">


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

</form>


</div>

        <small class="text-muted">
            Real-time Global Weather Monitoring
        </small>

    </div>

    <span class="badge bg-success fs-6">
        LIVE
    </span>

</div>

<div class="card card-custom p-4 mb-4">


<div class="row text-center">


<div class="col-md-3">

<h6>

🌍 Country

</h6>

<h4>

{{ $selectedCountry }}

</h4>

</div>



<div class="col-md-3">

<h6>

📍 Latitude

</h6>

<h4>

{{ $latitude }}

</h4>

</div>



<div class="col-md-3">

<h6>

📍 Longitude

</h6>

<h4>

{{ $longitude }}

</h4>

</div>



<div class="col-md-3">

<h6>

🛰 Monitoring

</h6>

<span class="badge bg-success">

LIVE

</span>

</div>


</div>


</div>

<div class="row g-4">

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Temperature
                    </h6>

                    <h2>
                        {{ $temperature }} °C
                    </h2>

                </div>

                <i class="bi bi-thermometer-half text-danger fs-1"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Rainfall
                    </h6>

                    <h2>
                        {{ $rain }} mm
                    </h2>

                </div>

                <i class="bi bi-cloud-rain text-primary fs-1"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Wind Speed
                    </h6>

                    <h2>
                        {{ $wind }} km/h
                    </h2>

                </div>

                <i class="bi bi-wind text-info fs-1"></i>

            </div>

        </div>

    </div>

    

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Storm Risk
                    </h6>

                    <h2>
                        {{ $stormRisk }}
                    </h2>

                </div>

                <i class="bi bi-cloud-lightning-fill text-warning fs-1"></i>

            </div>

            @php

                $progress = match($stormRisk){
                    'HIGH' => 90,
                    'MEDIUM' => 60,
                    default => 25,
                };

                $color = match($stormRisk){
                    'HIGH' => 'danger',
                    'MEDIUM' => 'warning',
                    default => 'success',
                };

            @endphp

            <div class="progress mt-3">

                <div class="progress-bar bg-{{ $color }}"
                     style="width: {{ $progress }}%">

                    {{ $progress }}%

                </div>

            </div>

        </div>

    </div>

</div>



<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between">

                <h4>

                    🌍 Global Weather Map

                </h4>

                <span class="badge bg-primary">

                    LIVE

                </span>

            </div>

            <hr>

            <div class="d-flex gap-3 mb-3">

<span class="badge bg-success">

🟢 Low Rain

</span>

<span class="badge bg-warning text-dark">

🟡 Moderate Rain

</span>

<span class="badge bg-danger">

🔴 Heavy Rain

</span>

</div>

            <div id="weatherMap"
     style="width:100%; height:500px; border-radius:20px;">
</div>

        </div>

    </div>



    <div class="col-lg-4">

        <div class="card card-custom p-4 mb-4">

            <h4>

                <i class="bi bi-exclamation-triangle-fill text-warning"></i>

                Weather Alert

            </h4>

            <hr>

            <ul class="mb-0">

                @if($stormRisk=="HIGH")

                    <li>Severe weather detected.</li>

                    <li>Shipping delay possible.</li>

                    <li>Monitor logistics carefully.</li>

                @elseif($stormRisk=="MEDIUM")

                    <li>Moderate weather condition.</li>

                    <li>Prepare contingency plan.</li>

                @else

                    <li>No severe weather detected.</li>

                    <li>Transportation conditions are stable.</li>

                @endif

            </ul>

        </div>



        <div class="card card-custom p-4">

            <h4>

                Today's Summary

            </h4>

            <hr>

            <table class="table table-borderless">

                <tr>

                    <td>Temperature</td>

                    <td>

                        <b>{{ $temperature }} °C</b>

                    </td>

                </tr>

                <tr>

                    <td>Rainfall</td>

                    <td>

                        <b>{{ $rain }} mm</b>

                    </td>

                </tr>

                <tr>

                    <td>Wind Speed</td>

                    <td>

                        <b>{{ $wind }} km/h</b>

                    </td>

                </tr>

                <tr>

                    <td>Overall</td>

                    <td>

                        <span class="badge bg-{{ $color }}">

                            {{ $stormRisk }}

                        </span>

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-custom p-4">

            <h4>

                📈 Temperature Trend

            </h4>

            <hr>

            <div style="height:350px">

                <canvas id="temperatureChart"></canvas>

            </div>

        </div>

    </div>


    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <h4>

                AI Weather Analysis

            </h4>

            <hr>

            @if($stormRisk=="HIGH")

                <div class="alert alert-danger">

                    Severe weather conditions may disrupt logistics and transportation.

                </div>

            @elseif($stormRisk=="MEDIUM")

                <div class="alert alert-warning">

                    Weather conditions require continuous monitoring.

                </div>

            @else

                <div class="alert alert-success">

                    Weather conditions are stable for transportation activities.

                </div>

            @endif

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-custom p-4">

            <h4>

                📅 7-Day Weather Forecast

            </h4>

            <hr>

            <div class="row text-center">

                @foreach($forecast['time'] ?? [] as $i => $day)

                    <div class="col">

                        <h6>

                            {{ \Carbon\Carbon::parse($day)->format('D') }}

                        </h6>

                        <h3 class="text-primary">

                            {{ $forecast['temperature_2m_max'][$i] }}°

                        </h3>

                        <small class="text-muted">

                            Min {{ $forecast['temperature_2m_min'][$i] }}°

                        </small>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <h4>

                🚚 Logistics Impact

            </h4>

            <hr>

            @if($stormRisk=="HIGH")

                <div class="alert alert-danger">

                    <b>High Risk</b><br>

                    Sea freight and air freight may experience delays.

                </div>

            @elseif($stormRisk=="MEDIUM")

                <div class="alert alert-warning">

                    <b>Moderate Risk</b><br>

                    Monitor shipment schedules and prepare contingency plans.

                </div>

            @else

                <div class="alert alert-success">

                    <b>Low Risk</b><br>

                    Weather conditions are favorable for logistics operations.

                </div>

            @endif

        </div>

    </div>

    <div class="card card-custom p-4 mt-4">


<h4>

🚢 Shipping Recommendation

</h4>


<hr>



@if($stormRisk=="HIGH")

<div class="alert alert-danger">

Delay shipment if possible.

Sea freight may experience significant disruption.

</div>

@elseif($stormRisk=="MEDIUM")

<div class="alert alert-warning">

Monitor weather every 6 hours before dispatch.

</div>

@else

<div class="alert alert-success">

Weather is suitable for shipping.

Recommended to continue logistics operations.

</div>

@endif


</div>

Sea Transport

92%

Road Transport

81%

Air Freight

95%

Port Operation

88%

</div>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const map = L.map('weatherMap').setView([
        {{ $latitude }},
        {{ $longitude }}
    ], 5);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        }
    ).addTo(map);

    L.marker([
        {{ $latitude }},
        {{ $longitude }}
    ])
    .addTo(map)
    .bindPopup(`
        <b>{{ $selectedCountry }}</b><br>
        🌡 {{ $temperature }} °C<br>
        🌧 Rain: {{ $rain }} mm<br>
        💨 Wind: {{ $wind }} km/h
    `)
    .openPopup();

    // penting jika map berada di dalam card bootstrap
    setTimeout(function () {
        map.invalidateSize();
    }, 300);

});
</script>

<script>

document.addEventListener("DOMContentLoaded",function(){

    const ctx = document.getElementById("temperatureChart");

    if(!ctx) return;

    new Chart(ctx,{

        type:'line',

        data:{

            labels:[
                '6 AM',
                '9 AM',
                '12 PM',
                '3 PM',
                '6 PM',
                '9 PM'
            ],

            datasets:[{

                label:'Temperature',

                data:[
                    {{ max($temperature-3,0) }},
                    {{ max($temperature-2,0) }},
                    {{ max($temperature-1,0) }},
                    {{ $temperature }},
                    {{ max($temperature-2,0) }},
                    {{ max($temperature-4,0) }}
                ],

                borderColor:'#0d6efd',

                backgroundColor:'rgba(13,110,253,.1)',

                tension:.4,

                fill:true

            }]

        },

        options:{

            responsive:true,

            maintainAspectRatio:false,

            plugins:{

                legend:{

                    display:false

                }

            }

        }

    });

});

</script>

<div class="row mt-4">

    <div class="col-lg-12">

        <div class="card card-custom p-4">

            <h4>

                📊 Weather Statistics

            </h4>

            <hr>

            <div class="row text-center">

                <div class="col-md-4">

                    <h6>Average Temperature</h6>

                    <h2 class="text-danger">

                        {{ $temperature }} °C

                    </h2>

                </div>

                <div class="col-md-4">

                    <h6>Wind Speed</h6>

                    <h2 class="text-info">

                        {{ $wind }} km/h

                    </h2>

                </div>

                <div class="col-md-4">

                    <h6>Rainfall</h6>

                    <h2 class="text-primary">

                        {{ $rain }} mm

                    </h2>

                </div>

            </div>

        </div>

    </div>

</div>


@endsection

<style>

#weatherMap{
    width:100%;
    height:500px;
}

</style>