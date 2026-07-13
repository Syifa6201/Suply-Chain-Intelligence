<div class="row g-4 mb-4">

    <div class="col-lg-2 col-md-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-body text-center">

                <i class="bi bi-globe-americas fs-1 text-primary"></i>

                <h6 class="mt-3 text-muted">

                    Countries

                </h6>

                <h2 class="fw-bold text-primary">

                    {{ $totalCountries }}

                </h2>

            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-body text-center">

                <i class="bi bi-truck fs-1 text-success"></i>

                <h6 class="mt-3 text-muted">

                    Ports

                </h6>

                <h2 class="fw-bold text-success">

                    {{ $totalPorts }}

                </h2>

            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-body text-center">

                <i class="bi bi-exclamation-triangle-fill fs-1 text-danger"></i>

                <h6 class="mt-3 text-muted">

                    High Risk

                </h6>

                <h2 class="fw-bold text-danger">

                    {{ $highRisk }}

                </h2>

            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-body text-center">

                <i class="bi bi-bell-fill fs-1 text-warning"></i>

                <h6 class="mt-3 text-muted">

                    Alerts

                </h6>

                <h2 class="fw-bold text-warning">

                    {{ $alerts }}

                </h2>

            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-body text-center">

                <i class="bi bi-cloud-sun-fill fs-1 text-info"></i>

                <h6 class="mt-3 text-muted">

                    Weather

                </h6>

                <h2 class="fw-bold text-info">

                    {{ isset($weather['current']) ? 'LIVE' : '-' }}

                </h2>

            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-body text-center">

                <i class="bi bi-cpu-fill fs-1 text-secondary"></i>

                <h6 class="mt-3 text-muted">

                    AI Status

                </h6>

                <h2 class="fw-bold text-success">

                    Active

                </h2>

            </div>

        </div>

    </div>

</div>