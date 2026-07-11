@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            🌍 Global Supply Chain Intelligence
        </h2>

        <small class="text-muted">
            Real-time Global Trade Monitoring Dashboard
        </small>

    </div>

    <span class="badge bg-success fs-6">
        LIVE
    </span>

</div>

<div class="row g-4">

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Countries
                    </h6>

                    <h2>195</h2>

                    <small class="text-success">
                        Global Coverage
                    </small>

                </div>

                <i class="bi bi-globe2 fs-1 text-primary"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Active Ports
                    </h6>

                    <h2>340</h2>

                    <small class="text-primary">
                        Worldwide
                    </small>

                </div>

                <i class="bi bi-anchor fs-1 text-info"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        High Risk
                    </h6>

                    <h2 class="text-danger">
                        12
                    </h2>

                    <small class="text-danger">
                        Need Attention
                    </small>

                </div>

                <i class="bi bi-exclamation-triangle-fill fs-1 text-danger"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        News Alerts
                    </h6>

                    <h2 class="text-warning">
                        27
                    </h2>

                    <small class="text-warning">
                        Latest Updates
                    </small>

                </div>

                <i class="bi bi-newspaper fs-1 text-warning"></i>

            </div>

        </div>

    </div>

</div>



<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between">

                <h4>

                    🌍 Global Risk Map

                </h4>

                <span class="badge bg-primary">

                    LIVE

                </span>

            </div>

            <hr>

            <div id="map"
                 style="height:520px;border-radius:20px;">
            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card card-custom p-4 mb-4">

            <h4>

                🌎 Global Summary

            </h4>

            <hr>

            <table class="table table-borderless">

                <tr>

                    <td>Total Countries</td>

                    <td><b>195</b></td>

                </tr>

                <tr>

                    <td>Low Risk</td>

                    <td>

                        <span class="badge bg-success">

                            156

                        </span>

                    </td>

                </tr>

                <tr>

                    <td>Medium Risk</td>

                    <td>

                        <span class="badge bg-warning">

                            27

                        </span>

                    </td>

                </tr>

                <tr>

                    <td>High Risk</td>

                    <td>

                        <span class="badge bg-danger">

                            12

                        </span>

                    </td>

                </tr>

            </table>

        </div>



        <div class="card card-custom p-4">

            <h4>

                🚨 Top Risk Countries

            </h4>

            <hr>

            <div class="mb-3">

                <span class="badge bg-danger">

                    China

                </span>

            </div>

            <div class="mb-3">

                <span class="badge bg-danger">

                    Russia

                </span>

            </div>

            <div class="mb-3">

                <span class="badge bg-warning text-dark">

                    Ukraine

                </span>

            </div>

            <div class="mb-3">

                <span class="badge bg-warning text-dark">

                    Iran

                </span>

            </div>

            <div>

                <span class="badge bg-success">

                    Singapore

                </span>

            </div>

        </div>

    </div>

</div>



<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card card-custom p-4">

            <h4>

                📈 Global Risk Trend

            </h4>

            <hr>

            <div style="height:350px">

                <canvas id="riskChart"></canvas>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card card-custom p-4">

            <h4>

                📦 Trade Volume

            </h4>

            <hr>

            <div style="height:350px">

                <canvas id="tradeChart"></canvas>

            </div>

        </div>

    </div>

</div>



<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <h4>

                📰 Latest Global News

            </h4>

            <hr>

            <ul>

                <li>Global shipping costs remain stable.</li>

                <li>Asia export activity increases.</li>

                <li>Europe logistics recovering.</li>

                <li>Port congestion declines.</li>

                <li>Container availability improves.</li>

            </ul>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <h4>

                🤖 AI Global Recommendation

            </h4>

            <hr>

            <div class="alert alert-success">

                <b>Global Trade Status : STABLE</b>

            </div>

            <ul>

                <li>Continue international shipments.</li>

                <li>Monitor geopolitical developments.</li>

                <li>Prioritize Asia-Pacific routes.</li>

                <li>Monitor high-risk countries daily.</li>

            </ul>

        </div>

    </div>

</div>



<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded",function(){

    var map=L.map('map').setView([20,0],2);

    L.tileLayer(

        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

        {

            maxZoom:19

        }

    ).addTo(map);

    L.marker([-2.5489,118.0149])

        .addTo(map)

        .bindPopup("Indonesia - Low Risk");

    L.marker([35.8617,104.1954])

        .addTo(map)

        .bindPopup("China - High Risk");

    L.marker([51.5074,-0.1278])

        .addTo(map)

        .bindPopup("United Kingdom - Medium Risk");

    L.marker([1.3521,103.8198])

        .addTo(map)

        .bindPopup("Singapore - Low Risk");

});

</script>

<script>

new Chart(

document.getElementById("riskChart"),

{

type:"line",

data:{

labels:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],

datasets:[{

label:"Risk Score",

data:[20,35,42,55,38,48,30],

borderWidth:3,

tension:.4,

fill:false

}]

}

}

);

new Chart(

document.getElementById("tradeChart"),

{

type:"bar",

data:{

labels:["Asia","Europe","America","Africa","Oceania"],

datasets:[{

label:"Trade Volume",

data:[95,72,68,31,20]

}]

}

}

);

</script>

@endsection