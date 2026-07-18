<div class="card card-custom shadow-sm">


<div class="card-header bg-white">

<h4 class="fw-bold mb-0">

🚢 Logistics Intelligence

</h4>

<small class="text-muted">

Country Supply Chain Performance

</small>

</div>



<div class="card-body">


@if($focusCountry)


<div class="row text-center g-4">


<div class="col-lg-3 col-md-6">


<div class="p-3">


<i class="bi bi-truck fs-1 text-success"></i>


<h6 class="mt-2 text-muted">

Active Ports

</h6>


<h2 class="fw-bold text-success">

{{ $ports->count() }}

</h2>


</div>

</div>





<div class="col-lg-3 col-md-6">


<div class="p-3">


<i class="bi bi-water fs-1 text-info"></i>


<h6 class="mt-2 text-muted">

Tracked Vessel

</h6>


<h2 class="fw-bold text-info">

{{ $vessels->count() }}

</h2>


</div>

</div>





<div class="col-lg-3 col-md-6">


<div class="p-3">


<i class="bi bi-bar-chart-fill fs-1 text-warning"></i>


<h6 class="mt-2 text-muted">

Congestion

</h6>


<h4 class="fw-bold">


@if($ports->avg('congestion') > 70)

<span class="text-danger">

High

</span>


@elseif($ports->avg('congestion') > 40)

<span class="text-warning">

Medium

</span>


@else

<span class="text-success">

Low

</span>


@endif


</h4>


</div>

</div>





<div class="col-lg-3 col-md-6">


<div class="p-3">


<i class="bi bi-shield-check fs-1 text-primary"></i>


<h6 class="mt-2 text-muted">

Shipping Status

</h6>


<h4 class="fw-bold text-success">

Stable

</h4>


</div>

</div>


</div>



<hr>



<h5 class="fw-bold">

Logistics Performance Score

</h5>



@php

$congestion = $ports->avg('congestion') ?? 0;


$score = 100 - $congestion;


@endphp



<div class="progress mt-3"

style="height:30px">


<div class="progress-bar bg-success"

style="width:{{$score}}%">


{{$score}}%


</div>


</div>



<div class="alert alert-info mt-4">


🤖 AI Logistics Insight:


<br>


@if($score >= 80)

Supply chain logistics condition is excellent. 
Current ports and vessels operate normally.


@elseif($score >=50)

Logistics condition is moderate.
Monitor congestion and shipping delays.


@else

High logistics pressure detected.
Consider alternative routes.


@endif


</div>



@else


<div class="text-center p-4">


<h5>

🌍 Select country to view logistics intelligence

</h5>


</div>


@endif



</div>


</div>