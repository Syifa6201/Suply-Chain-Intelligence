<div class="card card-custom shadow-sm border-0 h-100">


    <div class="card-header bg-white">

        <h4 class="mb-0">

            🌦 Weather Intelligence

        </h4>

    </div>



    <div class="card-body">


        @php

            $temperature =
                $weather['current']['temperature_2m'] ?? null;


            $wind =
                $weather['current']['wind_speed_10m'] ?? null;


            $rain =
                $weather['current']['rain'] ?? 0;



            if($wind > 40 || $rain > 20){

                $weatherStatus = "High Risk";

                $statusColor = "danger";

            }

            elseif($wind > 20 || $rain > 10){

                $weatherStatus = "Monitor";

                $statusColor = "warning";

            }

            else{

                $weatherStatus = "Stable";

                $statusColor = "success";

            }

        @endphp



        <div class="text-center mb-4">


            <h1 class="fw-bold">

                {{ $temperature ?? '-' }}°C

            </h1>


            <span class="badge bg-{{ $statusColor }}">

                {{ $weatherStatus }}

            </span>


        </div>



        <hr>



        <div class="row text-center">


            <div class="col-6">


                <i class="bi bi-wind fs-2 text-primary"></i>


                <h6 class="mt-2">

                    Wind

                </h6>


                <strong>

                    {{ $wind ?? '-' }} km/h

                </strong>


            </div>



            <div class="col-6">


                <i class="bi bi-cloud-rain fs-2 text-info"></i>


                <h6 class="mt-2">

                    Rain

                </h6>


                <strong>

                    {{ $rain }} mm

                </strong>


            </div>


        </div>


    </div>


</div>