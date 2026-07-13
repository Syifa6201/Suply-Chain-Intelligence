{{-- ================= LIVE VESSEL MAP ================= --}}

<div class="card card-custom shadow-sm border-0 mt-4">

<div class="card-header bg-white">

<div class="d-flex justify-content-between align-items-center">

Monitoring Country:
{{ $focusCountry->name }}

<div>

<h4 class="mb-1">
🌍 Global Vessel Intelligence Map
</h4>

<small class="text-muted">
Real-time Global Shipping Monitoring
</small>

</div>


<div>

<span class="badge bg-success px-3 py-2">

● LIVE TRACKING

</span>

</div>


</div>

</div>




<div class="card-body">


<div class="d-flex flex-wrap gap-2 mb-3">

<span class="badge bg-primary">
🚢 Sailing
</span>

<span class="badge bg-warning text-dark">
📦 Loading
</span>

<span class="badge bg-success">
⚓ Arrived
</span>

<span class="badge bg-danger">
⚠ Delayed
</span>


</div>



<div id="vesselMap"></div>



</div>


</div>




@php


$vesselData = $vessels->map(function($v){

return [

'id'=>$v->id,

'name'=>$v->name,

'imo'=>$v->imo,

'country'=>optional($v->country)->name,

'latitude'=>(float)$v->latitude,

'longitude'=>(float)$v->longitude,

'destination'=>$v->destination,

'cargo'=>$v->cargo,

'speed'=>$v->speed,

'risk'=>$v->risk_score,

'status'=>$v->status,

'heading'=>$v->heading,

'eta'=>optional($v->eta)?->format('d M Y')

];


});


@endphp






<script>

document.addEventListener(
"DOMContentLoaded",
function(){



if(typeof L === "undefined"){

console.error("Leaflet belum aktif");

return;

}




if(window.liveVesselMap){

window.liveVesselMap.remove();

}




const map=L.map(
"vesselMap",
{
worldCopyJump:true
}
);



window.liveVesselMap=map;



map.setView(
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






let vessels=@json($vesselData);


let markers={};

let trails={};






function vesselIcon(status,heading){


let emoji="🚢";


if(status=="Loading"){

emoji="📦";

}


if(status=="Arrived"){

emoji="⚓";

}


if(status=="Delayed"){

emoji="🚨";

}





return L.divIcon({

className:"",

html:`

<div class="ship"

style="
transform:rotate(${heading}deg)
">

${emoji}

</div>

`,

iconSize:[40,40],

iconAnchor:[20,20]


});


}






function popup(v){


return `

<div style="width:260px">

<h5>

🚢 ${v.name}

</h5>

<hr>


<b>IMO:</b>
${v.imo}

<br>


<b>Country:</b>
${v.country ?? '-'}

<br>


<b>Status:</b>
${v.status}

<br>


<b>Speed:</b>
${v.speed} Knot

<br>


<b>Cargo:</b>
${v.cargo}

<br>


<b>Destination:</b>
${v.destination}

<br>


<b>Risk:</b>
${v.risk}

<br>


<b>ETA:</b>
${v.eta ?? '-'}


</div>

`;

}






function loadVessel(){


fetch(
'/api/vessels/live?country={{ $focusCountry->id }}'
)

.then(res=>res.json())

.then(result=>{


if(!result.success){

return;

}



result.data.forEach(v=>{



let pos=[

Number(v.latitude),

Number(v.longitude)

];





if(markers[v.id]){


markers[v.id]
.setLatLng(pos);



markers[v.id]
.setIcon(
vesselIcon(
v.status,
v.heading
)
);


markers[v.id]
.setPopupContent(
popup(v)
);



trails[v.id]
.addLatLng(pos);



}

else{



let marker=L.marker(

pos,

{

icon:vesselIcon(
v.status,
v.heading
)

}

)

.addTo(map);



marker.bindPopup(
popup(v)
);



markers[v.id]=marker;





trails[v.id]=L.polyline(

[pos],

{

color:"#2563eb",

weight:2,

opacity:.6

}

)

.addTo(map);



}



});



});


}







// initial data


loadVessel();



// update setiap 5 detik


setInterval(

loadVessel,

5000

);





// zoom aman

setTimeout(()=>{

map.invalidateSize();

},500);



});

</script>






<style>


#vesselMap{

height:600px;

border-radius:20px;

overflow:hidden;

}





.ship{

font-size:30px;

animation:
floatShip 1.5s infinite;


filter:
drop-shadow(
0 3px 6px rgba(0,0,0,.35)
);


}





@keyframes floatShip{


0%{

transform:translateY(0);

}


50%{

transform:translateY(-6px);

}


100%{

transform:translateY(0);

}



}





.leaflet-popup-content{

font-size:14px;

}




.card-custom{

border-radius:22px;

}



</style>