@extends('layouts.app')


@section('content')


<div class="container-fluid">


<div class="d-flex justify-content-between mb-4">


<div>

<h1 class="fw-bold">

🤖 AI Trade Risk Analysis

</h1>


<p class="text-muted">

AI Powered Global Shipping Risk Monitoring

</p>

</div>


<span class="badge bg-primary px-4 py-3">

AI ENGINE ACTIVE

</span>


</div>





<div class="row g-4">


<div class="col-md-4">


<div class="card card-custom p-4">


<h6>
🌍 Total Route
</h6>


<h1 class="text-primary">

{{ $totalRoute }}

</h1>


</div>


</div>





<div class="col-md-4">


<div class="card card-custom p-4">


<h6>
🚨 High Risk Route
</h6>


<h1 class="text-danger">

{{ $highRisk }}

</h1>


</div>


</div>





<div class="col-md-4">


<div class="card card-custom p-4">


<h6>
📊 Average Risk Score
</h6>


<h1 class="text-warning">

{{ $averageRisk }}%

</h1>


</div>


</div>


</div>






<div class="card card-custom mt-4">


<div class="card-header bg-white">


<h4>

🌐 Shipping Risk Monitoring

</h4>


</div>



<div class="card-body">


<div class="row g-4">



@foreach($risks as $risk)



<div class="col-md-6">


<div class="risk-card">



<div class="d-flex justify-content-between">


<h5>

🚢

{{ $risk->shippingLane->name }}

</h5>



@if($risk->risk_level=="LOW")

<span class="badge bg-success">

LOW

</span>


@elseif($risk->risk_level=="MEDIUM")

<span class="badge bg-warning">

MEDIUM

</span>


@elseif($risk->risk_level=="HIGH")

<span class="badge bg-danger">

HIGH

</span>


@else

<span class="badge bg-dark">

CRITICAL

</span>


@endif


</div>




<hr>


<h3>

{{ $risk->risk_score }}%

</h3>



<p>

{{ $risk->analysis }}

</p>



<div class="alert alert-info">

<b>
AI Recommendation:
</b>

<br>

{{ $risk->recommendation }}

</div>



<div>


<span class="badge bg-secondary">

🚢 Vessel {{ $risk->vessel_risk }}

</span>


<span class="badge bg-secondary">

⚓ Port {{ $risk->port_risk }}

</span>


<span class="badge bg-secondary">

🌧 Weather {{ $risk->weather_risk }}

</span>


<span class="badge bg-secondary">

💱 Currency {{ $risk->currency_risk }}

</span>


</div>



</div>


</div>



@endforeach



</div>


</div>


</div>


</div>


@endsection





<style>


.risk-card{


background:white;

padding:25px;

border-radius:20px;

box-shadow:

0 8px 25px rgba(0,0,0,.08);


transition:.3s;


}



.risk-card:hover{


transform:translateY(-5px);


}



</style>