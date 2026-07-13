<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-header bg-white">

                <div class="d-flex justify-content-between">

                    <h4>

                        🤖 AI Fleet Recommendation

                    </h4>

                    <span class="badge bg-success">

                        AI ENGINE

                    </span>

                </div>

            </div>

            <div class="card-body">

                @php

                    $level="LOW";

                    $color="success";

                    if($averageRisk>=70){

                        $level="HIGH";

                        $color="danger";

                    }

                    elseif($averageRisk>=40){

                        $level="MEDIUM";

                        $color="warning";

                    }

                @endphp

                <div class="text-center mb-4">

                    <h1 class="display-4 text-{{ $color }}">

                        {{ $level }}

                    </h1>

                    <small>

                        Fleet Risk Level

                    </small>

                </div>

                <hr>

                @if($level=="HIGH")

                    <div class="alert alert-danger">

                        High disruption detected.

                        Consider rerouting vessels.

                    </div>

                @elseif($level=="MEDIUM")

                    <div class="alert alert-warning">

                        Moderate risk.

                        Continue monitoring weather and ports.

                    </div>

                @else

                    <div class="alert alert-success">

                        Fleet is operating normally.

                    </div>

                @endif

                <table class="table">

                    <tr>

                        <td>Average Risk</td>

                        <td>

                            {{ $averageRisk }}

                        </td>

                    </tr>

                    <tr>

                        <td>Average Speed</td>

                        <td>

                            {{ $averageSpeed }} Knot

                        </td>

                    </tr>

                    <tr>

                        <td>Delayed Vessel</td>

                        <td>

                            {{ $delayed }}

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

        <div class="col-lg-4">

        <div class="card card-custom shadow-sm border-0 h-100">

            <div class="card-header bg-white">

                <h5>

                    Suggested Hub

                </h5>

            </div>

            <div class="card-body">

                <div class="d-grid gap-2">

                    <span class="badge bg-primary p-3">

                        🇸🇬 Singapore

                    </span>

                    <span class="badge bg-success p-3">

                        🇳🇱 Rotterdam

                    </span>

                    <span class="badge bg-warning text-dark p-3">

                        🇦🇪 Dubai

                    </span>

                    <span class="badge bg-info text-dark p-3">

                        🇰🇷 Busan

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>