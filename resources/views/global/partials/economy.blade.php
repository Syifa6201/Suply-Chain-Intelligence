<div class="card card-custom shadow-sm border-0 h-100">

    <div class="card-header bg-white">

        <h4 class="mb-0">

            📈 Economy Intelligence

        </h4>

    </div>

    <div class="card-body">

        @php

            $data = $economy[1][0] ?? null;

            $gdp = $data['value'] ?? 0;

            $year = $data['date'] ?? '-';

            $status = 'Stable';
            $color = 'success';

            if($gdp <= 0){

                $status = 'Unavailable';
                $color = 'secondary';

            }

        @endphp


        <div class="text-center mb-4">

            <h2 class="fw-bold">

                @if($gdp>0)

                    ${{ number_format($gdp/1000000000000,2) }} T

                @else

                    -

                @endif

            </h2>

            <span class="badge bg-{{ $color }}">

                {{ $status }}

            </span>

        </div>


        <hr>


        <table class="table table-borderless table-sm">

            <tr>

                <td>

                    Year

                </td>

                <td class="text-end">

                    <strong>

                        {{ $year }}

                    </strong>

                </td>

            </tr>

            <tr>

                <td>

                    GDP

                </td>

                <td class="text-end">

                    @if($gdp>0)

                        {{ number_format($gdp,0,'.',',') }}

                    @else

                        -

                    @endif

                </td>

            </tr>

            <tr>

                <td>

                    Status

                </td>

                <td class="text-end">

                    <span class="badge bg-{{ $color }}">

                        {{ $status }}

                    </span>

                </td>

            </tr>

        </table>

    </div>

</div>