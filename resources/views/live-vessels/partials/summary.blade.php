<div class="row g-4">

    <div class="col-xl-2 col-md-4">

        <div class="card card-custom shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">

                    Total Vessel

                </small>

                <div class="d-flex justify-content-between align-items-center">

                    <h2>

                        {{ $totalVessels }}

                    </h2>

                    <i class="bi bi-ship fs-1 text-primary"></i>

                </div>

                <div class="progress mt-2">

                    <div

                        class="progress-bar bg-primary"

                        style="width:100%">

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="col-xl-2 col-md-4">

        <div class="card card-custom shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">

                    Sailing

                </small>

                <div class="d-flex justify-content-between">

                    <h2 class="text-primary">

                        {{ $sailing }}

                    </h2>

                    <i class="bi bi-compass fs-1 text-primary"></i>

                </div>

                <div class="progress mt-2">

                    <div

                        class="progress-bar bg-primary"

                        style="width:{{ $totalVessels ? ($sailing/$totalVessels)*100 : 0 }}%">

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="col-xl-2 col-md-4">

        <div class="card card-custom shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">

                    Loading

                </small>

                <div class="d-flex justify-content-between">

                    <h2 class="text-warning">

                        {{ $loading }}

                    </h2>

                    <i class="bi bi-box-seam fs-1 text-warning"></i>

                </div>

                <div class="progress mt-2">

                    <div

                        class="progress-bar bg-warning"

                        style="width:{{ $totalVessels ? ($loading/$totalVessels)*100 : 0 }}%">

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="col-xl-2 col-md-4">

        <div class="card card-custom shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">

                    Arrived

                </small>

                <div class="d-flex justify-content-between">

                    <h2 class="text-success">

                        {{ $arrived }}

                    </h2>

                    <i class="bi bi-check-circle fs-1 text-success"></i>

                </div>

                <div class="progress mt-2">

                    <div

                        class="progress-bar bg-success"

                        style="width:{{ $totalVessels ? ($arrived/$totalVessels)*100 : 0 }}%">

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="col-xl-2 col-md-4">

        <div class="card card-custom shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">

                    Delayed

                </small>

                <div class="d-flex justify-content-between">

                    <h2 class="text-danger">

                        {{ $delayed }}

                    </h2>

                    <i class="bi bi-exclamation-triangle fs-1 text-danger"></i>

                </div>

                <div class="progress mt-2">

                    <div

                        class="progress-bar bg-danger"

                        style="width:{{ $totalVessels ? ($delayed/$totalVessels)*100 : 0 }}%">

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="col-xl-2 col-md-4">

        <div class="card card-custom shadow-sm border-0">

            <div class="card-body">

                <small class="text-muted">

                    Avg Speed

                </small>

                <div class="d-flex justify-content-between">

                    <div>

                        <h2 class="text-info">

                            {{ $averageSpeed }}

                        </h2>

                        <small>

                            Knot

                        </small>

                    </div>

                    <i class="bi bi-speedometer2 fs-1 text-info"></i>

                </div>

            </div>

        </div>

    </div>

</div>