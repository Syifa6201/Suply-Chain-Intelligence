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

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h4 class="fw-bold mb-1">

                    🌍 Global Live Vessel Map

                </h4>

                <small class="text-muted">

                    Real-time Global Shipping Monitoring

                </small>

            </div>

            <span class="badge bg-success px-3 py-2">

                ● LIVE

            </span>

        </div>

    </div>

    <div class="card-body">

        {{-- Legend --}}

        <div class="row mb-3">

            <div class="col-md-8">

                <span class="badge bg-primary me-2">

                    🚢 Sailing

                </span>

                <span class="badge bg-warning text-dark me-2">

                    📦 Loading

                </span>

                <span class="badge bg-success me-2">

                    ⚓ Arrived

                </span>

                <span class="badge bg-danger">

                    🚨 Delayed

                </span>

            </div>

            <div class="col-md-4 text-end">

                <small class="text-muted">

                    Updated :

                    {{ now()->format('d M Y H:i:s') }}

                </small>

            </div>

        </div>

        <div id="vesselMap"></div>

    </div>

</div>



<style>

#vesselMap{

    width:100%;

    height:700px;

    border-radius:18px;

    overflow:hidden;

    border:1px solid #dbe4ef;

}


/* ==========================
    SHIP ICON
========================== */

.ship-icon{

    font-size:30px;

    transition:.4s;

    filter:drop-shadow(0 2px 5px rgba(0,0,0,.35));

}

.ship-sailing{

    color:#0d6efd;

}

.ship-loading{

    color:#ffc107;

}

.ship-arrived{

    color:#198754;

}

.ship-delayed{

    color:#dc3545;

}


/* ==========================
    PORT ICON
========================== */

.port-icon{

    font-size:24px;

}


/* ==========================
    POPUP
========================== */

.popup-title{

    font-size:18px;

    font-weight:bold;

}

.popup-table td{

    padding:4px;

}


/* ==========================
    MAP
========================== */

.leaflet-popup-content{

    min-width:250px;

}

.leaflet-container{

    font-family:Arial, sans-serif;

}

</style>

@push('scripts')

<script>

let vessels=[];

let vesselMap;

let vesselMarkers = {};

let routeLines = {};

const ports = [

    {
        name:"Singapore",
        lat:1.290,
        lng:103.851
    },

    {
        name:"Rotterdam",
        lat:51.948,
        lng:4.142
    },

    {
        name:"Shanghai",
        lat:31.230,
        lng:121.490
    },

    {
        name:"Busan",
        lat:35.103,
        lng:129.040
    },

    {
        name:"Los Angeles",
        lat:33.740,
        lng:-118.270
    }

];

window.onload=function(){

    vesselMap=L.map("vesselMap",{

        zoomControl:true,

        worldCopyJump:true

    }).setView([20,0],2);

    L.tileLayer(

        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

        {

            attribution:"© OpenStreetMap",

            maxZoom:18

        }

    ).addTo(vesselMap);

    loadPorts();

    loadRealtime();

};

function shipIcon(status){

    let cls="ship-sailing";

    let emoji="🚢";

    switch(status){

        case "Loading":

            cls="ship-loading";

            emoji="📦";

            break;

        case "Arrived":

            cls="ship-arrived";

            emoji="⚓";

            break;

        case "Delayed":

            cls="ship-delayed";

            emoji="🚨";

            break;

    }

    return L.divIcon({

        className:"",

        html:`<div class="ship-icon ${cls}">
                ${emoji}
              </div>`,

        iconSize:[34,34],

        iconAnchor:[17,17]

    });

}

function loadPorts(){

    ports.forEach(function(port){

        L.marker(

            [

                port.lat,

                port.lng

            ],

            {

                icon:L.divIcon({

                    className:"",

                    html:"<div class='port-icon'>⚓</div>",

                    iconSize:[24,24]

                })

            }

        )

        .addTo(vesselMap)

        .bindPopup(

            "<b>"+port.name+"</b><br>International Port"

        );

    });

}

function loadVessels(){

    vessels.forEach(function(ship){

        if(vesselMarkers[ship.id]){

            return;

        }

        const marker=L.marker(

            [

                ship.lat,

                ship.lng

            ],

            {

                icon:shipIcon(ship.status)

            }

        ).addTo(vesselMap);

        marker.bindPopup(

        `

        <b>${ship.name}</b>

        <hr>

        Status : ${ship.status}<br>

        Speed : ${ship.speed} Knot<br>

        Destination : ${ship.destination}

        `

        );

        vesselMarkers[ship.id]=marker;

        drawRoute(ship);

    });

}

function drawRoute(ship){

    if(routeLines[ship.id]){

        vesselMap.removeLayer(routeLines[ship.id]);

    }

    routeLines[ship.id]=L.polyline(

        [

            [

                ship.lat,

                ship.lng

            ],

            [

                ship.lat+1.5,

                ship.lng+3

            ]

        ],

        {

            color:"#0d6efd",

            weight:2,

            opacity:.6,

            dashArray:"8"

        }

    ).addTo(vesselMap);

}

async function loadRealtime(){

    const response=await fetch("/api/vessels");

    const data=await response.json();

    if(Object.keys(vesselMarkers).length===0){

        vessels=data;

        loadVessels();

    }

    else{

        vessels=data;

        updateVessels();

    }

}

function updateVessels(){

    vessels.forEach(function(ship){

        if(vesselMarkers[ship.id]){

            vesselMarkers[ship.id].setLatLng([

                ship.lat,

                ship.lng

            ]);

        }

    });

}

setInterval(function(){

    loadRealtime();

},5000);

</script>

@endpush