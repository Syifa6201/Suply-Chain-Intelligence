@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">

            ⚓ Port Intelligence

        </h2>

        <small class="text-muted">

            Global Port Monitoring & Logistics Dashboard

        </small>

    </div>

    <span class="badge bg-success fs-6">

        LIVE

    </span>

</div>


{{-- SUMMARY CARD --}}

<div class="row g-4 mb-4">

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6 class="text-muted">

                Total Ports

            </h6>

            <h2 class="text-primary">

                {{ $totalPorts }}

            </h2>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6 class="text-muted">

                Active

            </h6>

            <h2 class="text-success">

                {{ $activePorts }}

            </h2>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6 class="text-muted">

                Delay

            </h6>

            <h2 class="text-warning">

                {{ $delayPorts }}

            </h2>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6 class="text-muted">

                Critical

            </h6>

            <h2 class="text-danger">

                {{ $criticalPorts }}

            </h2>

        </div>

    </div>

</div>


{{-- SEARCH --}}

<div class="card card-custom p-3 mb-4">

    <form method="GET">

        <div class="row">

            <div class="col-md-5">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    value="{{ request('search') }}"
                    placeholder="Search Port...">

            </div>

            <div class="col-md-5">

                <select
                    name="country"
                    class="form-select">

                    <option value="">

                        All Countries

                    </option>

                    @foreach($countries as $country)

                        <option
                            value="{{ $country }}"
                            {{ request('country')==$country?'selected':'' }}>

                            {{ $country }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary w-100">

                    Search

                </button>

            </div>

        </div>

    </form>

</div>


<div class="row">

    {{-- MAP --}}

    <div class="col-lg-7">

        <div class="card card-custom p-4 mb-4">

            <div class="d-flex justify-content-between">

                <h4>

                    🌍 Global Port Map

                </h4>

                <span class="badge bg-primary">

                    LIVE

                </span>

            </div>

            <hr>

            <div
                id="portMap"
                style="height:450px;border-radius:18px;">
            </div>

        </div>

    </div>


    {{-- AI --}}

    <div class="col-lg-5">

        <div class="card card-custom p-4 mb-4">

            <h4>

                AI Recommendation

            </h4>

            <hr>

            @if($criticalPorts>0)

                <div class="alert alert-danger">

                    Some ports have critical congestion.
                    Consider rerouting shipments.

                </div>

            @elseif($delayPorts>0)

                <div class="alert alert-warning">

                    Minor congestion detected.
                    Monitor logistics continuously.

                </div>

            @else

                <div class="alert alert-success">

                    All major ports are operating normally.

                </div>

            @endif

        </div>

        <div class="card card-custom p-4">

            <h4>

                Capacity Distribution

            </h4>

            <hr>

            <canvas
                id="capacityChart"
                height="260">
            </canvas>

        </div>

    </div>

</div>


{{-- TABLE --}}

<div class="card card-custom p-4">

    <h4 class="mb-3">

        Port Status

    </h4>

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>Port</th>

                    <th>Country</th>

                    <th>Status</th>

                    <th width="220">

                        Congestion

                    </th>

                    <th>Capacity</th>

                </tr>

            </thead>

            <tbody>

            @foreach($ports as $port)

                @php

                    if($port->congestion>=80){

                        $color='danger';

                    }elseif($port->congestion>=50){

                        $color='warning';

                    }else{

                        $color='success';

                    }

                @endphp

                <tr>

                    <td>

                        <strong>

                            {{ $port->name }}

                        </strong>

                    </td>

                    <td>

                        {{ $port->country->name }}

                    </td>

                    <td>

                        @if($port->status=="Normal")

                            <span class="badge bg-success">

                                Normal

                            </span>

                        @elseif($port->status=="Delay")

                            <span class="badge bg-warning text-dark">

                                Delay

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Critical

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="progress">

                            <div
                                class="progress-bar bg-{{ $color }}"
                                style="width:{{ $port->congestion }}%">

                                {{ $port->congestion }}%

                            </div>

                        </div>

                    </td>

                    <td>

                        {{ number_format($port->capacity) }}

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-4 d-flex justify-content-center">

        {{ $ports->links() }}

    </div>

</div>


<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css">

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded",function(){

    var map=L.map('portMap').setView([20,110],2);

    L.tileLayer(

        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

    ).addTo(map);

    @foreach($ports as $port)

        @if($port->country)

        L.marker([

            {{ $port->country->latitude }},

            {{ $port->country->longitude }}

        ])

        .addTo(map)

        .bindPopup(

            "<b>{{ $port->name }}</b><br>{{ $port->country->name }}"

        );

        @endif

    @endforeach

});

document.addEventListener("DOMContentLoaded",function(){

    new Chart(

        document.getElementById('capacityChart'),

        {

            type:'bar',

            data:{

                labels:[
                    @foreach($ports->take(8) as $port)
                        "{{ $port->name }}",
                    @endforeach
                ],

                datasets:[{

                    data:[

                        @foreach($ports->take(8) as $port)

                            {{ $port->capacity }},

                        @endforeach

                    ]

                }]

            },

            options:{

                plugins:{

                    legend:{

                        display:false

                    }

                }

            }

        }

    );

});

</script>

@endsection