<div class="card card-custom shadow-sm">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <div>

            <h4 class="fw-bold mb-1">
                🌍 Global Monitoring Map
            </h4>

            <small class="text-muted">
                Real-time Country, Port & Vessel Monitoring
            </small>

        </div>

        <div class="d-flex gap-2">

            <span class="badge bg-success">
                LIVE
            </span>

            <span class="badge bg-primary">
                {{ $selectedCountry ?? 'Global' }}
            </span>

        </div>

        <button 
id="resetMap"
class="btn btn-primary btn-sm">

🌍 World View

</button>

    </div>

    <div class="card-body p-0 position-relative">

        <div id="globalMap"></div>

        <div class="map-legend shadow">

            <h6 class="fw-bold mb-3">
                Legend
            </h6>

            <div class="legend-item">
                <span class="legend-circle bg-primary"></span>
                Country
            </div>

            <div class="legend-item">
                ⚓ Port
            </div>

            <div class="legend-item">
                🚢 Vessel
            </div>

        </div>

    </div>

</div>

<style>

#globalMap{

    width:100%;

    height:700px;

    border-radius:0 0 20px 20px;

}

.map-legend{

    position:absolute;

    right:20px;

    bottom:20px;

    background:#fff;

    border-radius:15px;

    padding:15px;

    min-width:180px;

    z-index:1000;

}

.legend-item{

    display:flex;

    align-items:center;

    gap:10px;

    margin-bottom:10px;

    font-size:14px;

}

.legend-circle{

    width:14px;

    height:14px;

    border-radius:50%;

    display:inline-block;

}

.leaflet-popup-content{

    min-width:220px;

}


    .country-marker{

background:none;

border:none;

font-size:28px;

}


.port-marker{

background:none;

border:none;

font-size:25px;

}


.vessel-marker{

background:none;

border:none;

font-size:25px;

}

.port-marker{

background:white;

border-radius:50%;

width:35px;

height:35px;

display:flex;

align-items:center;

justify-content:center;

font-size:22px;

box-shadow:
0 5px 15px rgba(0,0,0,.25);

}

</style>

@push('scripts')

<script>

document.addEventListener("DOMContentLoaded",function(){

    const map = L.map('globalMap',{
    zoomControl:true
}).setView(
[
    20,
    0
],
2
);



    L.tileLayer(

        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

        {

            maxZoom:19,

            attribution:'© OpenStreetMap'

        }

    ).addTo(map);



    const countryLayer = L.layerGroup().addTo(map);

    const portLayer = L.layerGroup().addTo(map);

    const vesselLayer = L.layerGroup().addTo(map);

 // ICON MARKER

const countryIcon = L.divIcon({

    html:'📍',

    className:'country-marker',

    iconSize:[30,30]

});


const portIcon = L.divIcon({

    html:'⚓',

    className:'port-marker',

    iconSize:[30,30]

});


const vesselIcon = L.divIcon({

    html:'🚢',

    className:'vessel-marker',

    iconSize:[30,30]

});


    @if(isset($focusCountry))


const countryMarker = L.marker(

[
    {{ $focusCountry->latitude }},
    {{ $focusCountry->longitude }}
],

{
    icon:countryIcon
}

)

.addTo(countryLayer);



countryMarker.bindPopup(`

<div>

<h5>

🌍 {{ $focusCountry->name }}

</h5>


Capital:

{{ $focusCountry->capital ?? '-' }}


<br>


Currency:

{{ $focusCountry->currency ?? '-' }}


</div>

`);



map.flyTo(

[
    {{ $focusCountry->latitude }},
    {{ $focusCountry->longitude }}
],

6,

{

animate:true,

duration:2

}

);



@endif

// ==========================
// Port Marker
// ==========================

@foreach($ports as $port)

@if($port->latitude && $port->longitude)

L.marker([
    {{ $port->latitude }},
    {{ $port->longitude }}
], {
    icon: portIcon
})
.addTo(portLayer)
.bindPopup(`
    <div>
        <h6>⚓ {{ $port->name }}</h6>

        <hr>

        <strong>Country :</strong>

        {{ $port->country->name ?? '-' }}

        <br>

        <strong>Status :</strong>

        Operational

    </div>
`);

@endif

@endforeach

    const overlays={

        "Countries":countryLayer,

        "Ports":portLayer,

        "Vessels":vesselLayer

    };

// =============================
// PORT MARKER
// =============================


@foreach($ports as $port)


@if($port->latitude && $port->longitude)


L.marker(

[

{{ $port->latitude }},

{{ $port->longitude }}

],

{

icon:portIcon

}

)

.addTo(portLayer)

.bindPopup(`

<div>

<h6 class="fw-bold">

⚓ {{ $port->name }}

</h6>


<hr>


<b>Country:</b>

{{ $port->country->name ?? '-' }}

<br>


<b>Terminal:</b>

{{ $port->terminal ?? '-' }}

<br>


<b>Type:</b>

{{ $port->type ?? '-' }}

<br>


<b>Status:</b>

{{ $port->status ?? 'Normal' }}

<br>


<b>Capacity:</b>

{{ number_format($port->capacity ?? 0) }}

<br>


<b>Risk Score:</b>

{{ $port->risk_score ?? 0 }}

</div>

`);


@endif


@endforeach

    L.control.layers(null,overlays,{

        collapsed:false

    }).addTo(map);

    L.control.scale({
    metric: true,
    imperial: false
}).addTo(map);

});


document
.getElementById('resetMap')
.onclick=function(){

map.flyTo(
[
20,
0
],
2
);

};
</script>

@endpush

