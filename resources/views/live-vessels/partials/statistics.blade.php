{{-- ================= STATISTICS ================= --}}

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-header bg-white">

                <div class="d-flex justify-content-between">

                    <h4 class="mb-0">

                        📊 Fleet Status Distribution

                    </h4>

                    <span class="badge bg-primary">

                        LIVE

                    </span>

                </div>

            </div>

            <div class="card-body">

                <canvas

                    id="fleetChart"

                    height="120">

                </canvas>

            </div>

        </div>

    </div>


    <div class="col-lg-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-header bg-white">

                <h4>

                    🚢 Fleet Summary

                </h4>

            </div>

            <div class="card-body">

                @php

                    $health = 100 - ($averageRisk);

                    if($health < 0){

                        $health = 0;

                    }

                @endphp


                <div class="text-center">

                    <h1

                        class="display-4 fw-bold text-success">

                        {{ $health }}%

                    </h1>

                    <small class="text-muted">

                        Fleet Health

                    </small>

                </div>

                <hr>

                <table class="table table-borderless">

                    <tr>

                        <td>Total Vessel</td>

                        <td class="text-end">

                            <b>

                                <span id="summaryTotal">

{{ $totalVessels }}

</span>

                            </b>

                        </td>

                    </tr>

                    <tr>

                        <td>Average Speed</td>

                        <td class="text-end">

                            <b>

                                <span id="summarySpeed">

{{ $averageSpeed }}

</span>

                                Knot

                            </b>

                        </td>

                    </tr>

                    <tr>

                        <td>Average Risk</td>

                        <td class="text-end">

                            <b>

                                <span id="summaryRisk">

{{ $averageRisk }}

</span>

                            </b>

                        </td>

                    </tr>

                    <tr>

                        <td>Delayed</td>

                        <td class="text-end">

                            <span class="badge bg-danger">

                                <span id="summaryDelay">

{{ $delayed }}

</span>

                            </span>

                        </td>

                    </tr>

                </table>

                <hr>

                <h6>

                    AI Recommendation

                </h6>

                @if($averageRisk >= 70)

                    <div class="alert alert-danger mb-0">

                        Fleet risk is very high.
                        Consider rerouting vessels and monitoring ports.

                    </div>

                @elseif($averageRisk >= 40)

                    <div class="alert alert-warning mb-0">

                        Fleet is stable but requires monitoring.

                    </div>

                @else

                    <div class="alert alert-success mb-0">

                        Fleet condition is healthy.

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

let fleetChart;

document.addEventListener("DOMContentLoaded",function(){

const ctx=document.getElementById("fleetChart");

fleetChart=new Chart(ctx,{

type:"doughnut",

data:{

labels:[

"Sailing",

"Loading",

"Arrived",

"Delayed"

],

datasets:[{

data:[

{{ $sailing }},

{{ $loading }},

{{ $arrived }},

{{ $delayed }}

],

backgroundColor:[

"#2563eb",

"#f59e0b",

"#10b981",

"#ef4444"

],

borderWidth:0

}]

},

options:{

responsive:true,

cutout:"70%",

plugins:{

legend:{

position:"bottom"

}

}

}

});

});

function updateChart(){

document.getElementById("summaryTotal").innerHTML=vessels.length;

document.getElementById("summaryDelay").innerHTML=delayed;

let avgSpeed=0;

let avgRisk=0;

vessels.forEach(v=>{

avgSpeed+=Number(v.speed);

avgRisk+=Number(v.risk);

});

avgSpeed=(avgSpeed/vessels.length).toFixed(1);

avgRisk=(avgRisk/vessels.length).toFixed(1);

document.getElementById("summarySpeed").innerHTML=avgSpeed;

document.getElementById("summaryRisk").innerHTML=avgRisk;

if(!fleetChart) return;

let sailing=0;
let loading=0;
let arrived=0;
let delayed=0;

vessels.forEach(ship=>{

switch(ship.status){

case "Sailing":

sailing++;

break;

case "Loading":

loading++;

break;

case "Arrived":

arrived++;

break;

case "Delayed":

delayed++;

break;

}

});

fleetChart.data.datasets[0].data=[

sailing,

loading,

arrived,

delayed

];

fleetChart.update();

}

</script>

