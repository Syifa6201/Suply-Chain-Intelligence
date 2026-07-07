<div class="row mt-4">

    <div class="col-12">

        <div class="card card-custom p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h4>

                        <i class="bi bi-map"></i>

                        World Intelligence Map

                    </h4>

                    <small class="text-muted">

                        Global Monitoring using OpenStreetMap

                    </small>

                </div>

                <span class="badge bg-success">

                    LIVE

                </span>

            </div>

            <div class="mt-3 mb-3">

                <span class="badge bg-success">

                    🟢 Low

                </span>

                <span class="badge bg-warning text-dark">

                    🟡 Medium

                </span>

                <span class="badge bg-danger">

                    🔴 High

                </span>

            </div>

            <div id="worldMap"
                 style="height:600px;border-radius:15px;">
            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded",function(){

    let map=L.map('worldMap').setView([20,0],2);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom:19
        }
    ).addTo(map);

    const countries=[

        {
            name:"Indonesia",
            lat:-2.5,
            lng:118,
            risk:"LOW",
            color:"green"
        },

        {
            name:"China",
            lat:35,
            lng:103,
            risk:"HIGH",
            color:"red"
        },

        {
            name:"United States",
            lat:39,
            lng:-98,
            risk:"MEDIUM",
            color:"orange"
        },

        {
            name:"Germany",
            lat:51,
            lng:10,
            risk:"LOW",
            color:"green"
        },

        {
            name:"Russia",
            lat:61,
            lng:105,
            risk:"HIGH",
            color:"red"
        },

        {
            name:"Singapore",
            lat:1.35,
            lng:103.8,
            risk:"LOW",
            color:"green"
        }

    ];

    countries.forEach(country=>{

        L.circleMarker(
            [country.lat,country.lng],
            {
                radius:8,
                color:country.color,
                fillColor:country.color,
                fillOpacity:0.8
            }
        )
        .addTo(map)
        .bindPopup(`
            <div style="width:220px">
                <h5>🌍 ${country.name}</h5>
                <hr>
                <p><b>Risk :</b> ${country.risk}</p>

                <a href="/country/${country.name}"
                   class="btn btn-primary btn-sm w-100">
                    View Intelligence
                </a>
            </div>
        `);

    });

});

</script>