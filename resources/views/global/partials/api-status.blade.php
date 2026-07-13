<div class="card card-custom shadow-sm border-0">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                🔌 Live API Status

            </h4>

            <span class="badge bg-success">

                Connected

            </span>

        </div>

    </div>

    <div class="card-body">

        <div class="row text-center">

            <div class="col-lg-2 col-md-4 col-6 mb-3">

                <i class="bi bi-cloud-sun-fill text-primary fs-2"></i>

                <h6 class="mt-2">

                    Weather API

                </h6>

                <span class="badge bg-success">

                    Online

                </span>

            </div>

            <div class="col-lg-2 col-md-4 col-6 mb-3">

                <i class="bi bi-bank text-warning fs-2"></i>

                <h6 class="mt-2">

                    World Bank

                </h6>

                <span class="badge bg-success">

                    Online

                </span>

            </div>

            <div class="col-lg-2 col-md-4 col-6 mb-3">

                <i class="bi bi-currency-exchange text-success fs-2"></i>

                <h6 class="mt-2">

                    Currency API

                </h6>

                <span class="badge bg-success">

                    Online

                </span>

            </div>

            <div class="col-lg-2 col-md-4 col-6 mb-3">

                <i class="bi bi-newspaper text-danger fs-2"></i>

                <h6 class="mt-2">

                    News API

                </h6>

                <span class="badge bg-success">

                    Online

                </span>

            </div>

            <div class="col-lg-2 col-md-4 col-6 mb-3">

                <i class="bi bi-cpu-fill text-dark fs-2"></i>

                <h6 class="mt-2">

                    AI Engine

                </h6>

                <span class="badge bg-success">

                    Running

                </span>

            </div>

            <div class="col-lg-2 col-md-4 col-6 mb-3">

                <i class="bi bi-database-fill text-info fs-2"></i>

                <h6 class="mt-2">

                    Database

                </h6>

                <span class="badge bg-success">

                    Connected

                </span>

            </div>

        </div>

        <hr>

        <div class="d-flex justify-content-between">

            <small class="text-muted">

                Last Synchronization

            </small>

            <small class="fw-bold text-success">

                {{ now()->format('d M Y H:i:s') }}

            </small>

        </div>

    </div>

</div>