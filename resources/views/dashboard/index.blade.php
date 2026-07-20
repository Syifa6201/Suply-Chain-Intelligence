@extends('layouts.app')


@section('content')


<!-- HERO -->

<div class="hero-section">


<div>


<h1>

Global Supply Chain

<span>
Intelligence
</span>

Platform

</h1>


<p>

Monitor worldwide vessel movement,
trade routes, economic conditions,
currency fluctuation and supply chain risks
using AI-powered analytics.

</p>


<a href="/global"
class="btn btn-primary-custom">

Explore Intelligence

</a>


</div>


</div>




<!-- KPI -->

<div class="row g-4 mt-4">



<div class="col-md-3">


<div class="kpi-card">


<h2>

{{ $countries }}

</h2>


<p>

🌍 Countries Monitored

</p>


</div>


</div>





<div class="col-md-3">


<div class="kpi-card">


<h2>

{{ $ports }}

</h2>


<p>

⚓ Global Ports

</p>


</div>


</div>





<div class="col-md-3">


<div class="kpi-card">


<h2>

{{ $vessels }}

</h2>


<p>

🚢 Connected Vessel

</p>


</div>


</div>





<div class="col-md-3">


<div class="kpi-card">


<h2>

{{ $activeVessel }}

</h2>


<p>

🌊 Sailing Vessel

</p>


</div>


</div>



</div>




<div class="row mt-5 g-4">


<div class="col-md-4">

<div class="card-custom p-4">


<h4>
🛡 AI RISK ANALYSIS
</h4>


<a href="/risk"
class="dashboard-menu">

<i class="bi bi-shield-exclamation"></i>

AI Risk Analysis

</a>


<a href="/ports"
class="dashboard-menu">

<i class="bi bi-geo-alt"></i>

Ports Intelligence

</a>



<a href="/live-vessels"
class="dashboard-menu">

<i class="bi bi-truck"></i>

Live Vessels

</a>


<a href="/trade-intelligence"
class="dashboard-menu">

<i class="bi bi-box-seam"></i>

Trade Intelligence

</a>



</div>

</div>





<div class="col-md-4">


<div class="card-custom p-4">


<h4>
🤖 AI ENGINE
</h4>


<a href="{{ route('recommendation.index') }}" class="dashboard-menu">

    <i class="bi bi-lightning-charge"></i>

    Recommendation Engine

</a>



<a href="{{ route('trade.prediction') }}" class="dashboard-menu">
<i class="bi bi-stars"></i>

Trade Prediction

</a>

<a href="{{ route('shipping.index') }}"
class="dashboard-menu">

    <i class="bi bi-box2"></i>

    Shipping Planner

</a>

<a href="{{ route('watchlist.index') }}" class="dashboard-menu">

    <i class="bi bi-star-fill"></i>

    Watchlist

</a>



</div>

</div>






<div class="col-md-4">


<div class="card-custom p-4">


<h4>
⚙ SYSTEM
</h4>


<a href="{{ route('settings.index') }}" class="dashboard-menu">

    <i class="bi bi-gear"></i>

    Settings

</a>



</div>


</div>



</div>


<!-- INTELLIGENCE -->

<div class="row mt-5 g-4">



<div class="col-md-8">


<div class="card-custom p-4">


<h3>

🤖 AI Supply Chain Insight

</h3>


<p class="text-light">

System analyzing global trade condition.

</p>



<div class="alert alert-success">

🚢

{{ $activeVessel }}

vessels currently sailing worldwide.

</div>



<div class="alert alert-warning">

⚠

{{ $delayedVessel }}

shipments require monitoring.

</div>



<div class="alert alert-info">

🌍

{{ $countries }}

countries connected to intelligence network.

</div>



</div>


</div>





<div class="col-md-4">


<div class="card-custom p-4">


<h3>

⚡ Platform Module

</h3>



<ul class="list-group">


<li class="list-group-item">

🌍 Global Monitor

</li>


<li class="list-group-item">

🚢 Vessel Tracking

</li>

<li class="list-group-item">

⚓ Port Intelligence

</li>


<li class="list-group-item">

🤖 AI Risk Engine

</li>


<li class="list-group-item">

📦 Trade Intelligence

</li>


</ul>


</div>


</div>




</div>





@endsection