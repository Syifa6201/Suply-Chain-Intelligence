@extends('layouts.app')

@section('content')

<div class="row g-4">
    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>Total Countries</h6>
            <h2>195</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>High Risk</h6>
            <h2 class="text-danger">12</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>Active Ports</h6>
            <h2>340</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-custom p-4">
            <h6>News Alerts</h6>
            <h2 class="text-warning">27</h2>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <h5>Risk Trend</h5>
            <canvas id="riskChart"></canvas>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom p-4">
            <h5>Top Risk Countries</h5>
            <ul>
                <li>China</li>
                <li>Russia</li>
                <li>Ukraine</li>
            </ul>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('riskChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [{
                    label: 'Risk',
                    data: [20, 45, 33, 70, 55],
                    borderWidth: 3,
                    tension: 0.4,
                    fill: false
                }]
            }
        });
    }
});
</script>

<div class="row mt-4">
    <div class="col-12">
        <div class="card card-custom p-4">
            <h5>Global Risk Map</h5>
            <div id="map" style="height:500px;border-radius:20px;"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var map = L.map('map').setView([20, 0], 2);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    L.marker([51.5074, -0.1278]).addTo(map)
        .bindPopup('UK - Medium Risk');

    L.marker([35.8617, 104.1954]).addTo(map)
        .bindPopup('China - High Risk');

    L.marker([-2.5489, 118.0149]).addTo(map)
        .bindPopup('Indonesia - Low Risk');
});
</script>

@endsection