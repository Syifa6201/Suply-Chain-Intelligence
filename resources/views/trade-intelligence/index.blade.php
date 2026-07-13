@extends('layouts.app')


@section('content')


<div class="container-fluid">


{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">


    <div>

        <h1 class="fw-bold">
            📦 Trade Intelligence
        </h1>

        <p class="text-muted">
            Global Trade Monitoring Based on Real Database
        </p>

    </div>


    <span class="badge bg-success px-4 py-3">

        ● LIVE DATA

    </span>


</div>





{{-- SUMMARY --}}

<div class="row g-4">


<div class="col-md-4">

<div class="card card-custom p-4">

<h6 class="text-muted">

🚢 Active Trade

</h6>


<h1 class="text-primary">

{{ $activeTrade }}

</h1>


<small>

Sailing Vessel

</small>


</div>

</div>





<div class="col-md-4">

<div class="card card-custom p-4">


<h6 class="text-muted">

⚠ Delayed Shipment

</h6>


<h1 class="text-danger">

{{ $delayedTrade }}

</h1>


<small>

Need Monitoring

</small>


</div>

</div>






<div class="col-md-4">


<div class="card card-custom p-4">


<h6 class="text-muted">

🌍 Connected Vessel

</h6>


<h1 class="text-success">

{{ $totalVessel }}

</h1>


<small>

Global Fleet

</small>


</div>


</div>


</div>







{{-- TRADE MAP --}}


<div class="card card-custom mt-4">


<div class="card-header bg-white">


<h4 class="mb-0">

🌍 Global Trade Route Map

</h4>


<small class="text-muted">

Real shipping route from database

</small>


</div>



<div class="card-body">


<div id="tradeMap"></div>


</div>


</div>


{{-- SHIPPING LANE INTELLIGENCE --}}

<div class="card card-custom mt-4">


<div class="card-header bg-white">

<h4 class="mb-0">

🌐 Shipping Lane Intelligence

</h4>


<small class="text-muted">

Global Maritime Trade Corridor Analysis

</small>


</div>



<div class="card-body">


<div class="row g-4">



@foreach($shippingLanes as $lane)


<div class="col-md-6 col-lg-3">


<div class="lane-card">


<div class="d-flex justify-content-between">


<h5>

🚢 {{ $lane->name }}

</h5>


<span>

@if($lane->risk_level < 30)

🟢

@elseif($lane->risk_level < 60)

🟡

@else

🔴

@endif


</span>


</div>




<hr>



<p>

🌍 Region

<br>

<b>

{{ $lane->region }}

</b>

</p>




<p>

🚢 Active Vessel

<br>

<b>

{{ $lane->active_vessel }}

Ships

</b>

</p>




<p>

⚠ Risk Score

<br>

<b>

{{ $lane->risk_level }}

%

</b>

</p>



<div class="progress">


<div 
class="progress-bar"

style="width:{{ $lane->risk_level }}%"
>

</div>


</div>



</div>


</div>



@endforeach



</div>


</div>


</div>



{{-- ROUTES TABLE --}}


<div class="card card-custom mt-4">


<div class="card-header bg-white">


<h4>

🌐 Trading Routes

</h4>


</div>



<div class="card-body">


<div class="table-responsive">


<table class="table">


<thead>


<tr>

<th>
Origin
</th>


<th>
Destination
</th>


<th>
Distance
</th>


<th>
ETA
</th>


<th>
Type
</th>


</tr>


</thead>



<tbody>



@forelse($tradeRoutes as $route)


<tr>


<td>

⚓

{{ $route->origin->name ?? '-' }}

</td>


<td>

⚓

{{ $route->destination->name ?? '-' }}

</td>



<td>

{{ number_format($route->distance) }}

KM

</td>



<td>

{{ $route->estimated_days }}

Days

</td>



<td>

<span class="badge bg-primary">

{{ $route->trade_type }}

</span>

</td>



</tr>



@empty


<tr>

<td colspan="5" class="text-center">

No Route Available

</td>

</tr>


@endforelse



</tbody>


</table>


</div>


</div>


</div>







{{-- CARGO --}}


<div class="card card-custom mt-4">


<div class="card-header bg-white">

<h4>

📊 Cargo Intelligence

</h4>

</div>



<div class="card-body">


<div class="row g-3">


@foreach($commodities as $item)



<div class="col-md-4">


<div class="border rounded-4 p-4">


<h5>

📦 {{ $item->cargo }}

</h5>


<h2>

{{ $item->total }}

</h2>


<p class="text-muted">

Registered Vessel

</p>


</div>


</div>



@endforeach


</div>


</div>


</div>





</div>



@endsection







@push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function(){


/*
|--------------------------------------------------------------------------
| INIT MAP
|--------------------------------------------------------------------------
*/


const map = L.map('tradeMap',{

    zoomControl:true,
    worldCopyJump:true

})
.setView(
    [20,0],
    2
);



L.tileLayer(

"https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

{

maxZoom:18,

attribution:"© OpenStreetMap"

}

).addTo(map);





/*
|--------------------------------------------------------------------------
| SHIPPING LANE DATA
|--------------------------------------------------------------------------
*/


const shippingLanes = @json($shippingLanes);


/*
|--------------------------------------------------------------------------
| DRAW SHIPPING LANES
|--------------------------------------------------------------------------
*/


shippingLanes.forEach(function(lane){


L.polyline(

lane.coordinates,

{

color:"#ff9800",

weight:3,

opacity:.8,

dashArray:"12"

}

)

.addTo(map)

.bindPopup(

`
<b>🚢 ${lane.name}</b>
<br>
Global Shipping Corridor
`

);



});






/*
|--------------------------------------------------------------------------
| VESSEL STORAGE
|--------------------------------------------------------------------------
*/


let vesselMarkers={};


let vesselTrails={};







/*
|--------------------------------------------------------------------------
| VESSEL COUNTER
|--------------------------------------------------------------------------
*/


let counter=L.control({
position:'topright'
});


counter.onAdd=function(){


let div=L.DomUtil.create('div');


div.id="vesselCounter";


div.innerHTML="🚢 Loading...";


div.style.background="white";

div.style.padding="10px 15px";

div.style.borderRadius="15px";

div.style.fontWeight="bold";

div.style.boxShadow=
"0 3px 10px rgba(0,0,0,.3)";


return div;


};



counter.addTo(map);







/*
|--------------------------------------------------------------------------
| SHIP ICON
|--------------------------------------------------------------------------
*/


function shipIcon(status,heading){



let emoji="🚢";



if(status==="Delayed"){

emoji="🚨";

}

else if(status==="Loading"){

emoji="📦";

}

else if(status==="Arrived"){

emoji="⚓";

}



return L.divIcon({


className:"",


html:

`

<div class="ship-icon"

style="

transform:rotate(${heading}deg)

">

${emoji}

</div>

`,



iconSize:[30,30],

iconAnchor:[15,15]


});



}







/*
|--------------------------------------------------------------------------
| LOAD REALTIME VESSEL
|--------------------------------------------------------------------------
*/


function loadLiveVessels(){



fetch('/api/vessels/live')

.then(response=>response.json())

.then(result=>{



if(!result.success){

return;

}



document.getElementById(
"vesselCounter"
).innerHTML=

`
🚢 Total Vessel : ${result.total}
`;





result.data.forEach(function(vessel){



let position=[

Number(vessel.latitude),

Number(vessel.longitude)

];






/*
CREATE VESSEL
*/


if(!vesselMarkers[vessel.id]){



let marker=L.marker(

position,

{

icon:

shipIcon(

vessel.status,

vessel.heading

)

}

)

.addTo(map);




marker.bindPopup(

`

<div>

<h5>
🚢 ${vessel.name}
</h5>

<hr>

<b>Status:</b>
${vessel.status}

<br>

<b>Speed:</b>
${vessel.speed} Knot

<br>

<b>Cargo:</b>
${vessel.cargo}

<br>

<b>Capacity:</b>
${vessel.capacity} TEU

<br>

<b>Destination:</b>
${vessel.destination}

<br>

<b>Risk:</b>
${vessel.risk_score}

</div>

`

);



vesselMarkers[vessel.id]=marker;





vesselTrails[vessel.id]=L.polyline(

[position],

{

color:"#2563eb",

weight:2,

opacity:.5

}

)

.addTo(map);



}

else{



/*
UPDATE POSITION
*/


vesselMarkers[vessel.id]

.setLatLng(position);



vesselMarkers[vessel.id]

.setIcon(

shipIcon(

vessel.status,

vessel.heading

)

);





vesselTrails[vessel.id]

.addLatLng(position);



}



});



});


}





/*
|--------------------------------------------------------------------------
| START
|--------------------------------------------------------------------------
*/


loadLiveVessels();



setInterval(

loadLiveVessels,

5000

);



});

</script>

@endpush


<style>


#tradeMap{

height:650px;

border-radius:20px;

overflow:hidden;

}



.ship-icon{

font-size:22px;

filter:
drop-shadow(
0 2px 4px rgba(0,0,0,.4)
);

transition:.3s;

}



.lane-label{

background:white;

padding:6px 12px;

border-radius:20px;

font-size:12px;

font-weight:bold;

box-shadow:
0 3px 8px rgba(0,0,0,.3);

}



.leaflet-popup-content{

min-width:240px;

}

.lane-card{


padding:25px;

border-radius:20px;

background:white;

box-shadow:

0 10px 25px rgba(0,0,0,.08);

height:100%;

transition:.3s;

}



.lane-card:hover{


transform:translateY(-5px);

box-shadow:

0 15px 35px rgba(0,0,0,.15);


}



.lane-card h5{

font-size:17px;

font-weight:700;

}



.progress{

height:10px;

border-radius:20px;

background:#eee;

}



.progress-bar{

background:

linear-gradient(

90deg,

#22c55e,

#facc15,

#ef4444

);

}

</style>