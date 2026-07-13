@extends('layouts.app')


@section('content')


<div class="container-fluid">


{{-- HEADER --}}

<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h2 class="fw-bold">

⚓ Port Intelligence

</h2>


<p class="text-muted mb-0">

Global Port Monitoring & Logistics Decision System

</p>


</div>



<span class="badge bg-success px-4 py-2">

● LIVE MONITORING

</span>


</div>




{{-- SUMMARY --}}


<div class="row g-4 mb-4">


<div class="col-md-3">

<div class="card port-card">

<h6>
Total Ports
</h6>

<h1 class="text-primary">

{{$totalPorts}}

</h1>

</div>

</div>



<div class="col-md-3">

<div class="card port-card">

<h6>
Normal
</h6>

<h1 class="text-success">

{{$activePorts}}

</h1>

</div>

</div>



<div class="col-md-3">

<div class="card port-card">

<h6>
Delay
</h6>

<h1 class="text-warning">

{{$delayPorts}}

</h1>

</div>

</div>



<div class="col-md-3">

<div class="card port-card">

<h6>
Critical
</h6>

<h1 class="text-danger">

{{$criticalPorts}}

</h1>

</div>

</div>



</div>





{{-- FILTER --}}


<div class="card shadow-sm border-0 p-4 mb-4">


<form method="GET">


<div class="row g-3">


<div class="col-md-4">


<input

type="text"

name="search"

class="form-control"

placeholder="Search port..."

value="{{request('search')}}"


>


</div>




<div class="col-md-3">


<select

name="country"

class="form-select">


<option value="">

All Countries

</option>



@foreach($countries as $country)


<option

value="{{$country}}"

{{request('country')==$country?'selected':''}}

>

{{$country}}

</option>


@endforeach



</select>


</div>




<div class="col-md-3">


<select

name="status"

class="form-select">


<option value="">

All Status

</option>


<option value="Normal">

Normal

</option>


<option value="Delay">

Delay

</option>


<option value="Critical">

Critical

</option>


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






<div class="row g-4">



{{-- MAP --}}


<div class="col-lg-8">


<div class="card shadow-sm border-0 p-4">


<div class="d-flex justify-content-between">


<h4>

🌍 Global Port Map

</h4>


<span class="badge bg-primary">

{{count($mapPorts)}} Ports

</span>


</div>


<hr>


<div id="portMap"></div>


</div>


</div>





{{-- AI --}}


<div class="col-lg-4">


<div class="card shadow-sm border-0 p-4 mb-4">


<h4>

🤖 AI Port Analysis

</h4>


<hr>


@if($criticalPorts > 0)


<div class="alert alert-danger">

<b>
Critical congestion detected
</b>

<br>

AI recommends alternative shipping routes.

</div>


@elseif($delayPorts > 0)


<div class="alert alert-warning">


<b>
Port delay detected
</b>

<br>

Monitor vessel schedule.

</div>


@else


<div class="alert alert-success">


All ports operating normally.


</div>


@endif


</div>





<div class="card shadow-sm border-0 p-4">


<h4>

📊 Capacity Ranking

</h4>


<hr>


<canvas id="capacityChart"></canvas>


</div>


</div>


</div>








{{-- TABLE --}}



<div class="card shadow-sm border-0 p-4 mt-4">


<h4>

⚓ Port Status Monitoring

</h4>


<hr>


<div class="table-responsive">


<table class="table table-hover">


<thead>


<tr>

<th>
Port
</th>

<th>
Country
</th>

<th>
Status
</th>

<th>
Congestion
</th>

<th>
Risk Score
</th>

<th>
Capacity
</th>


</tr>


</thead>



<tbody>


@foreach($ports as $port)



<tr>


<td>


<b>

{{$port->name}}

</b>


<br>


<small class="text-muted">

{{$port->city}}

</small>


</td>



<td>

{{$port->country->name ?? '-'}}

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




<td width="200">


<div class="progress">


<div class="progress-bar"

style="width:{{$port->congestion}}%">


{{$port->congestion}}%


</div>


</div>


</td>



<td>


<span class="badge bg-danger">

{{$port->risk_score}}

</span>


</td>



<td>


{{number_format($port->capacity)}}


</td>


</tr>


@endforeach



</tbody>


</table>


</div>


{{$ports->links()}}


</div>






</div>

@push('scripts')


<script>

window.onload = function(){



/* =========================
   PORT MAP
========================= */


let map = L.map('portMap')
.setView(
    [20,0],
    2
);



L.tileLayer(

'https://tile.openstreetmap.org/{z}/{x}/{y}.png',

{

maxZoom:18,

attribution:'OpenStreetMap'

}

).addTo(map);



let ports = @json($mapPorts);



ports.forEach(function(port){



let color="#22c55e";


if(port.status=="Delay"){

color="#facc15";

}


if(port.status=="Critical"){

color="#ef4444";

}



let marker = L.circleMarker(

[

Number(port.latitude),

Number(port.longitude)

],

{

radius:8,

fillColor:color,

color:"#ffffff",

weight:2,

fillOpacity:1

}

)

.addTo(map);



marker.bindPopup(`


<b>⚓ ${port.name}</b>

<br>

🌍 ${port.country}

<br>

🏙 ${port.city}

<br>

Status : ${port.status}

<br>

Congestion : ${port.congestion}%

<br>

Risk Score : ${port.risk_score}


`);



});




setTimeout(function(){

map.invalidateSize();

},500);





/* =========================
   CAPACITY CHART
========================= */


let chart = document.getElementById(
'capacityChart'
);



if(chart){


new Chart(chart,{


type:'bar',


data:{


labels:@json($capacityChart->pluck('name')),


datasets:[{


label:'Capacity',


data:@json($capacityChart->pluck('capacity')),


borderWidth:1


}]


},


options:{


responsive:true,


plugins:{


legend:{


display:false


}


}


}


});


}



}

</script>


@endpush

@endsection



<style>


#portMap{

height:600px;

width:100%;

display:block;

border-radius:25px;

position:relative;

z-index:10;

}



.port-card{

padding:25px;

border-radius:20px;

border:0;

box-shadow:
0 10px 30px rgba(0,0,0,.08);

}


.port-card h1{

font-weight:800;

}



</style>