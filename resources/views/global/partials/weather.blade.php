<div class="row mt-4 g-4">

    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <h5>

                <i class="bi bi-cloud-sun"></i>

                Weather

            </h5>

            <hr>

            <h2>

                {{ $weather['current']['temperature_2m'] ?? '-' }}°C

            </h2>

            <p>

                Wind

                {{ $weather['current']['wind_speed_10m'] ?? '-' }}

                km/h

            </p>

        </div>

    </div>

    @include('global.partials.economy')

    @include('global.partials.currency')

</div>