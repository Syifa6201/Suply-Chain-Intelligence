<div class="card card-custom shadow-sm border-0 risk-port-card">


<div class="card-header bg-white">


<div class="d-flex justify-content-between align-items-center">


<div>

<h4 class="fw-bold mb-1">

🚨 

@if($focusCountry)

Top Risk Ports - {{ $focusCountry->name }}

@else

Global Port Risk Monitoring

@endif


</h4>


<small class="text-muted">

Port congestion & logistics risk monitoring

</small>


</div>



<div class="text-end">


<span class="badge bg-danger">

● LIVE

</span>


<br>


<span class="badge bg-primary mt-2">

{{ $topPorts->count() }} Ports

</span>


</div>


</div>


</div>





<div class="card-body risk-port-container">



@forelse($topPorts as $port)



@php


if($port->congestion >= 80){

    $color='danger';

    $status='High Risk';

    $icon='bi-exclamation-octagon-fill';

}

elseif($port->congestion >=50){

    $color='warning';

    $status='Medium Risk';

    $icon='bi-exclamation-triangle-fill';

}

else{

    $color='success';

    $status='Low Risk';

    $icon='bi-check-circle-fill';

}



@endphp





<div class="port-risk-item mb-4">


<div class="d-flex justify-content-between align-items-start">



<div class="d-flex gap-3">


<div class="port-icon">

<i class="bi bi-anchor-fill"></i>

</div>



<div>


<h6 class="fw-bold mb-1">

{{ $port->name }}

</h6>



<small class="text-muted">

🌍 {{ $port->country->name }}

</small>


</div>


</div>





<span class="badge bg-{{ $color }}">

<i class="bi {{ $icon }}"></i>

{{ $status }}

</span>



</div>





<div class="mt-3">


<div class="d-flex justify-content-between">


<small class="text-muted">

Congestion Level

</small>


<strong>

{{ $port->congestion }}%

</strong>


</div>



<div class="progress mt-2"

style="height:10px;">


<div

class="progress-bar bg-{{ $color }}"

style="width:{{ $port->congestion }}%">


</div>


</div>



</div>






<div class="row mt-3 text-center">


<div class="col-6">


<small class="text-muted">

Status

</small>


<br>


<strong>

{{ $port->status ?? 'Monitoring' }}

</strong>


</div>




<div class="col-6">


<small class="text-muted">

Risk Score

</small>


<br>


<strong class="text-{{ $color }}">

{{ $port->risk_score ?? $port->congestion }}

</strong>


</div>


</div>



</div>



@if(!$loop->last)

<hr>

@endif



@empty


<div class="text-center p-4">


<i class="bi bi-globe2 fs-1 text-primary"></i>


<h5 class="mt-3 fw-bold">

Select Country First

</h5>


<p class="text-muted">

Choose a monitoring country to display
specific port risk analysis.

</p>


</div>


@endforelse



</div>


</div>




<style>


.risk-port-card{

border-radius:25px;

overflow:hidden;

}



.risk-port-container{

max-height:650px;

overflow-y:auto;

}




.port-risk-item{


padding:18px;

border-radius:18px;

transition:.3s;


}



.port-risk-item:hover{


background:#f8fafc;

transform:translateX(5px);


}




.port-icon{


width:45px;

height:45px;

border-radius:50%;

display:flex;

align-items:center;

justify-content:center;

background:#e0f2fe;

color:#0284c7;

font-size:22px;


}



.progress{


background:#e2e8f0;

border-radius:20px;


}



.risk-port-container::-webkit-scrollbar{

width:6px;

}


.risk-port-container::-webkit-scrollbar-thumb{


background:#cbd5e1;

border-radius:10px;


}


</style>