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

                                {{ $totalVessels }}

                            </b>

                        </td>

                    </tr>

                    <tr>

                        <td>Average Speed</td>

                        <td class="text-end">

                            <b>

                                {{ $averageSpeed }}

                                Knot

                            </b>

                        </td>

                    </tr>

                    <tr>

                        <td>Average Risk</td>

                        <td class="text-end">

                            <b>

                                {{ $averageRisk }}

                            </b>

                        </td>

                    </tr>

                    <tr>

                        <td>Delayed</td>

                        <td class="text-end">

                            <span class="badge bg-danger">

                                {{ $delayed }}

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

document.addEventListener(

"DOMContentLoaded",

function(){

const ctx=document.getElementById(

'fleetChart'

);

if(!ctx) return;

new Chart(ctx,{

type:'bar',

data:{

labels:[

'Sailing',

'Loading',

'Arrived',

'Delayed'

],

datasets:[{

label:'Number of Vessel',

data:[

{{ $sailing }},

{{ $loading }},

{{ $arrived }},

{{ $delayed }}

],

borderWidth:1

}]

},

options:{

responsive:true,

plugins:{

legend:{

display:false

}

},

scales:{

y:{

beginAtZero:true

}

}

}

});

});

</script>