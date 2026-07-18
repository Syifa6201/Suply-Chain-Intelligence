{{-- ==========================================
    LIVE VESSEL MAP
========================================== --}}

@php

$vesselJson = $vessels->map(function($v){

    return [

        'id'          => $v->id,
        'name'        => $v->name,
        'imo'         => $v->imo,
        'country'     => optional($v->country)->name,
        'lat'         => (float)$v->latitude,
        'lng'         => (float)$v->longitude,
        'status'      => $v->status,
        'speed'       => $v->speed,
        'heading'     => $v->heading,
        'cargo'       => $v->cargo,
        'destination' => $v->destination,
        'risk'        => $v->risk_score,
        'eta'         => optional($v->eta)->format('d M Y H:i')

    ];

});

@endphp

<div class="card card-custom shadow-sm border-0 mt-4">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1">

                    🌍 Global Live Vessel Monitoring

                </h3>

                <small class="text-muted">

                    Real-Time Vessel Tracking & Maritime Intelligence

                </small>

            </div>

            <div class="d-flex gap-2">

                <span class="badge bg-success px-3 py-2">

                    ● LIVE

                </span>

                <button
                    id="resetMap"
                    class="btn btn-outline-primary btn-sm">

                    <i class="bi bi-arrow-clockwise"></i>

                    Reset Map

                </button>

            </div>

        </div>

    </div>

    <div class="card-body">

        <div class="row g-3 mb-4">

            <div class="col-lg-3">

                <div class="kpi-mini">

                    <h6>Total Vessel</h6>

                    <h3 id="totalVessel">

                        {{ $vessels->count() }}

                    </h3>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="kpi-mini">

                    <h6>Sailing</h6>

                    <h3 class="text-primary" id="sailingCount">

                        0

                    </h3>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="kpi-mini">

                    <h6>Loading</h6>

                    <h3 class="text-warning" id="loadingCount">

                        0

                    </h3>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="kpi-mini">

                    <h6>Delayed</h6>

                    <h3 class="text-danger" id="delayCount">

                        0

                    </h3>

                </div>

            </div>

        </div>

        <div class="row mb-4">

            <div class="col-lg-4">

                <input

                    id="searchShip"

                    class="form-control"

                    placeholder="Search Vessel..."

                >

            </div>

            <div class="col-lg-3">

                <select

                    id="statusFilter"

                    class="form-select">

                    <option value="">

                        All Status

                    </option>

                    <option value="Sailing">

                        Sailing

                    </option>

                    <option value="Loading">

                        Loading

                    </option>

                    <option value="Arrived">

                        Arrived

                    </option>

                    <option value="Delayed">

                        Delayed

                    </option>

                </select>

            </div>

            <div class="col-lg-5 text-end">

                <small class="text-muted">

                    Last Update

                </small>

                <div

                    class="fw-bold"

                    id="updateTime">

                    {{ now()->format('d M Y H:i:s') }}

                </div>

            </div>

        </div>

        <div id="vesselMap"></div>

    </div>

</div>


<style>

#vesselMap{

width:100%;
height:720px;
border-radius:22px;
border:1px solid #dbeafe;
overflow:hidden;
box-shadow:0 15px 35px rgba(15,23,42,.08);

}

/* ================= KPI ================= */

.kpi-mini{

background:#fff;
border-radius:18px;
padding:22px;
text-align:center;
border:1px solid #e2e8f0;
box-shadow:0 10px 25px rgba(15,23,42,.06);
transition:.3s;

}

.kpi-mini:hover{

transform:translateY(-5px);

}

.kpi-mini h6{

font-size:14px;
color:#64748b;
margin-bottom:10px;

}

.kpi-mini h3{

font-size:32px;
font-weight:800;
margin:0;

}

/* ================= SEARCH ================= */

#searchShip{

height:48px;
border-radius:14px;

}

#statusFilter{

height:48px;
border-radius:14px;

}

/* ================= SHIP ================= */

.ship-icon{

font-size:30px;
transition:.4s;
filter:drop-shadow(0 5px 10px rgba(0,0,0,.35));

}

.ship-sailing{

color:#0d6efd;

}

.ship-loading{

color:#f59e0b;

}

.ship-arrived{

color:#10b981;

}

.ship-delayed{

color:#ef4444;

}

/* ================= PORT ================= */

.port-icon{

font-size:24px;

}

/* ================= POPUP ================= */

.popup-card{

min-width:280px;

}

.popup-card h5{

font-weight:700;
margin-bottom:15px;
color:#0284c7;

}

.popup-table{

margin-bottom:0;

}

.popup-table td{

padding:6px;
font-size:13px;

}

.popup-table td:first-child{

font-weight:600;
width:90px;

}

/* ================= MAP ================= */

.leaflet-popup-content{

min-width:280px;

}

.leaflet-container{

font-family:Inter,sans-serif;

}

.leaflet-control-zoom{

border-radius:12px;
overflow:hidden;

}

.leaflet-control-zoom a{

width:34px;
height:34px;
line-height:34px;

}

/* ================= BADGE ================= */

.badge{

font-size:13px;
padding:10px 14px;

}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

#vesselMap{

height:500px;

}

.kpi-mini{

margin-bottom:15px;

}

}

</style>

@push('scripts')

<script>

let vesselMap;

let vessels=[];

let vesselMarkers={};

let routeLines={};

let markerGroup=L.layerGroup();

const ports=[

{ name:"Singapore",lat:1.290,lng:103.851 },

{ name:"Rotterdam",lat:51.948,lng:4.142 },

{ name:"Shanghai",lat:31.230,lng:121.490 },

{ name:"Busan",lat:35.103,lng:129.040 },

{ name:"Los Angeles",lat:33.740,lng:-118.270 }

];

document.addEventListener("DOMContentLoaded",()=>{

    vesselMap=L.map("vesselMap",{

        center:[20,0],

        zoom:2,

        worldCopyJump:true,

        zoomControl:true

    });

    L.tileLayer(

        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

        {

            attribution:"© OpenStreetMap"

        }

    ).addTo(vesselMap);

    loadPorts();

    loadRealtime();

    setInterval(loadRealtime,5000);

    setInterval(updateClock,1000);

});

function updateClock(){

    document.getElementById("updateTime").innerHTML=

        new Date().toLocaleString();

}

function shipIcon(status){

    let emoji="🚢";

    let cls="ship-sailing";

    if(status=="Loading"){

        emoji="📦";

        cls="ship-loading";

    }

    if(status=="Arrived"){

        emoji="⚓";

        cls="ship-arrived";

    }

    if(status=="Delayed"){

        emoji="🚨";

        cls="ship-delayed";

    }

    return L.divIcon({

        className:"",

        html:`

        <div class="ship-icon ${cls}">

        ${emoji}

        </div>

        `,

        iconSize:[34,34],

        iconAnchor:[17,17]

    });

}

function createPopup(ship){

return `

<div class="popup-card">

<h5>

🚢 ${ship.name}

</h5>

<table class="table table-sm popup-table">

<tr><td>IMO</td><td>${ship.imo}</td></tr>

<tr><td>Country</td><td>${ship.country}</td></tr>

<tr><td>Status</td><td>${ship.status}</td></tr>

<tr><td>Speed</td><td>${ship.speed} Knot</td></tr>

<tr><td>Heading</td><td>${ship.heading}°</td></tr>

<tr><td>Cargo</td><td>${ship.cargo}</td></tr>

<tr><td>Destination</td><td>${ship.destination}</td></tr>

<tr><td>Risk</td><td>${ship.risk}</td></tr>

<tr><td>ETA</td><td>${ship.eta}</td></tr>

</table>

`;

}

function loadPorts(){

    ports.forEach(port=>{

        L.marker(

            [port.lat,port.lng],

            {

                icon:L.divIcon({

                    className:"",

                    html:"<div class='port-icon'>⚓</div>"

                })

            }

        )

        .addTo(vesselMap)

        .bindPopup("<b>"+port.name+"</b>");

    });

}

async function loadRealtime(){

    try{

        const response=await fetch("/api/vessels/live");

        const result=await response.json();

        vessels=result.data;

        if(Object.keys(vesselMarkers).length==0){

            loadVessels();

        }else{

            updateVessels();

        }

    }

    catch(e){

        console.log(e);

    }

}

function loadVessels(){

    markerGroup.clearLayers();

    vesselMarkers={};

    let bounds=[];

    let sailing=0;
    let loading=0;
    let delayed=0;

    vessels.forEach(ship=>{

        bounds.push([ship.lat,ship.lng]);

        if(ship.status==="Sailing") sailing++;
        if(ship.status==="Loading") loading++;
        if(ship.status==="Delayed") delayed++;

        const marker=L.marker(

            [ship.lat,ship.lng],

            {

                icon:shipIcon(ship.status)

            }

        );

        marker.bindPopup(createPopup(ship));

        marker.addTo(markerGroup);

        vesselMarkers[ship.id]=marker;

        drawRoute(ship);

    });

    markerGroup.addTo(vesselMap);

    document.getElementById("totalVessel").innerHTML=vessels.length;

    document.getElementById("sailingCount").innerHTML=sailing;

    document.getElementById("loadingCount").innerHTML=loading;

    document.getElementById("delayCount").innerHTML=delayed;

    if(bounds.length){

        vesselMap.fitBounds(bounds,{

            padding:[40,40]

        });

    }

}

function updateVessels(){

    let sailing=0;
    let loading=0;
    let delayed=0;

    vessels.forEach(ship=>{

        if(ship.status==="Sailing") sailing++;
        if(ship.status==="Loading") loading++;
        if(ship.status==="Delayed") delayed++;

        if(vesselMarkers[ship.id]){

            let marker=vesselMarkers[ship.id];

            let current=marker.getLatLng();

            let lat=current.lat+(ship.lat-current.lat)*0.2;

            let lng=current.lng+(ship.lng-current.lng)*0.2;

            marker.setLatLng([lat,lng]);

            marker.setPopupContent(

                createPopup(ship)

            );

            marker.setIcon(

                shipIcon(ship.status)

            );

            drawRoute(ship);

        }

    });

    document.getElementById("totalVessel").innerHTML=vessels.length;

    document.getElementById("sailingCount").innerHTML=sailing;

    document.getElementById("loadingCount").innerHTML=loading;

    document.getElementById("delayCount").innerHTML=delayed;

updateChart();



}

function drawRoute(ship){

    if(routeLines[ship.id]){

        vesselMap.removeLayer(routeLines[ship.id]);

    }

    let port=ports.find(

        p=>p.name===ship.destination

    );

    if(!port){

        return;

    }

    routeLines[ship.id]=L.polyline(

        [

            [ship.lat,ship.lng],

            [port.lat,port.lng]

        ],

        {

            color:"#2563eb",

            weight:2,

            opacity:.7,

            dashArray:"8"

        }

    ).addTo(vesselMap);

}

/* ==========================================
SEARCH
========================================== */

document.getElementById("searchShip").addEventListener("keyup",function(){

    let keyword=this.value.toLowerCase();

    Object.values(vesselMarkers).forEach(marker=>{

        markerGroup.removeLayer(marker);

    });

    vessels.forEach(ship=>{

        if(

            ship.name.toLowerCase().includes(keyword) ||

            ship.country.toLowerCase().includes(keyword) ||

            ship.destination.toLowerCase().includes(keyword)

        ){

            markerGroup.addLayer(

                vesselMarkers[ship.id]

            );

        }

    });

});


/* ==========================================
FILTER
========================================== */

document.getElementById("statusFilter").addEventListener("change",function(){

    let status=this.value;

    Object.values(vesselMarkers).forEach(marker=>{

        markerGroup.removeLayer(marker);

    });

    vessels.forEach(ship=>{

        if(

            status=="" ||

            ship.status==status

        ){

            markerGroup.addLayer(

                vesselMarkers[ship.id]

            );

        }

    });

});


/* ==========================================
RESET MAP
========================================== */

document.getElementById("resetMap").addEventListener("click",function(){

    let bounds=[];

    vessels.forEach(ship=>{

        bounds.push([

            ship.lat,

            ship.lng

        ]);

    });

    if(bounds.length){

        vesselMap.fitBounds(

            bounds,

            {

                padding:[40,40]

            }

        );

    }

});


/* ==========================================
CLICK TO FOCUS
========================================== */

Object.values(vesselMarkers).forEach(marker=>{

    marker.on("click",function(){

        vesselMap.setView(

            marker.getLatLng(),

            6,

            {

                animate:true

            }

        );

    });

});


const marker=L.marker(

    [ship.lat,ship.lng],

    {

        icon:shipIcon(ship.status)

    }

);

targetPosition[ship.id]={

    lat:ship.lat,

    lng:ship.lng

};

marker.bindPopup(createPopup(ship));

</script>

@endpush