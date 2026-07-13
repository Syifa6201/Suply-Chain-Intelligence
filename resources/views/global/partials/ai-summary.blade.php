<div class="card card-custom shadow-sm border-0 h-100">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                🤖 AI Global Recommendation

            </h4>

            <span class="badge bg-success">

                AI Engine

            </span>

        </div>

    </div>

    <div class="card-body">

        @php

            $overall = "LOW";
            $color = "success";

            if($highRisk >= 5){

                $overall = "HIGH";
                $color = "danger";

            }
            elseif($mediumRisk >= 5){

                $overall = "MEDIUM";
                $color = "warning";

            }

        @endphp


        <div class="text-center mb-4">

            <h6 class="text-muted">

                Overall Global Risk

            </h6>

            <h1 class="text-{{ $color }}">

                {{ $overall }}

            </h1>

        </div>


        <hr>


        <h5>

            AI Summary

        </h5>

        <ul class="mt-3">

            @if($overall=="HIGH")

                <li>

                    High logistics disruption detected.

                </li>

                <li>

                    Monitor critical ports continuously.

                </li>

                <li>

                    Consider rerouting shipments.

                </li>

                <li>

                    Watch geopolitical developments.

                </li>

            @elseif($overall=="MEDIUM")

                <li>

                    Moderate logistics risk detected.

                </li>

                <li>

                    Monitor weather changes.

                </li>

                <li>

                    Monitor currency volatility.

                </li>

                <li>

                    Prepare contingency plans.

                </li>

            @else

                <li>

                    Global logistics conditions remain stable.

                </li>

                <li>

                    Continue normal shipping activities.

                </li>

                <li>

                    Continue monitoring weather and ports.

                </li>

                <li>

                    No major disruptions detected.

                </li>

            @endif

        </ul>


        <hr>


        <h5>

            Suggested Trade Hubs

        </h5>

        <div class="mt-3">

            <span class="badge bg-primary me-2 mb-2">

                Singapore

            </span>

            <span class="badge bg-success me-2 mb-2">

                Rotterdam

            </span>

            <span class="badge bg-warning text-dark me-2 mb-2">

                Dubai

            </span>

            <span class="badge bg-info text-dark me-2 mb-2">

                Busan

            </span>

        </div>


        <hr>


        <div class="text-end">

            <small class="text-muted">

                Last Updated

                <br>

                {{ now()->format('d M Y H:i') }}

            </small>

        </div>

    </div>

</div>