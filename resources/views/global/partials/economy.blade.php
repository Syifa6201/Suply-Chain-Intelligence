<div class="col-lg-4">

    <div class="card card-custom p-4 h-100">

        @php

            $data = $economy[1][0] ?? null;

            $gdp = $data['value'] ?? null;

            $year = $data['date'] ?? '-';

        @endphp

        <h5>

            <i class="bi bi-graph-up"></i>

            Economy

        </h5>

        <hr>

        <h2>

            @if($gdp)

                ${{ number_format($gdp/1000000000000,2) }} T

            @else

                -

            @endif

        </h2>

        <small>

            {{ $year }}

        </small>

    </div>

</div>