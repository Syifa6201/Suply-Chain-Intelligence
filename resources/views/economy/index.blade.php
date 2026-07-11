@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            📈 Global Economy Intelligence

            <form method="GET" class="mb-4">

                <div class="row">

                <div class="col-md-4">

                <select
                name="country"
                class="form-select"
                onchange="this.form.submit()">

                @foreach($countries as $country)

                <option
                value="{{ $country->name }}"
                {{ $selectedCountry==$country->name?'selected':'' }}>

                {{ $country->name }}

                </option>

                @endforeach

                </select>

                </div>

                </div>

                </form>
        </h2>

        <small class="text-muted">
            Real-time Economic Indicators Monitoring
        </small>

    </div>

    <span class="badge bg-success fs-6">
        LIVE
    </span>

</div>


<div class="row g-4">

    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        GDP
                    </h6>

                    <h3>

                        ${{ number_format($gdpValue,0,',','.') }}

                    </h3>

                    <small class="text-success">

                        Gross Domestic Product

                    </small>

                </div>

                <i class="bi bi-graph-up-arrow text-success fs-1"></i>

            </div>

        </div>

    </div>


    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">

                        Inflation

                    </h6>

                    <h3>

                        {{ round($inflationValue,2) }} %

                    </h3>

                    <small class="text-warning">

                        Consumer Price Index

                    </small>

                </div>

                <i class="bi bi-currency-dollar text-warning fs-1"></i>

            </div>

        </div>

    </div>


    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">

                        Population

                    </h6>

                    <h3>

                        {{ number_format($populationValue,0,',','.') }}

                    </h3>

                    <small class="text-primary">

                        Total Population

                    </small>

                </div>

                <i class="bi bi-people-fill text-primary fs-1"></i>

            </div>

        </div>

    </div>

</div>



<div class="row g-4 mt-1">

    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">

                        Export

                    </h6>

                    <h3>

                        ${{ number_format($exportValue,0,',','.') }}

                    </h3>

                    <small class="text-success">

                        Export Value

                    </small>

                </div>

                <i class="bi bi-box-arrow-up-right text-success fs-1"></i>

            </div>

        </div>

    </div>


    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">

                        Import

                    </h6>

                    <h3>

                        ${{ number_format($importValue,0,',','.') }}

                    </h3>

                    <small class="text-danger">

                        Import Value

                    </small>

                </div>

                <i class="bi bi-box-arrow-in-down text-danger fs-1"></i>

            </div>

        </div>

    </div>

</div>



<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-custom p-4">

            <h4>

                📊 Economic Indicators

            </h4>

            <hr>

            <div style="height:350px">

                <canvas id="economyChart"></canvas>

            </div>

        </div>

    </div>


    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <h4>

                📋 Economic Summary

            </h4>

            <hr>

            <table class="table table-borderless">

                <tr>

                    <td>GDP</td>

                    <td>

                        <b>${{ number_format($gdpValue,0,',','.') }}</b>

                    </td>

                </tr>

                <tr>

                    <td>Inflation</td>

                    <td>

                        <span class="badge bg-warning">

                            {{ round($inflationValue,2) }}%

                        </span>

                    </td>

                </tr>

                <tr>

                    <td>Population</td>

                    <td>

                        {{ number_format($populationValue) }}

                    </td>

                </tr>

                <tr>

                    <td>Trade Balance</td>

                    <td>

                        @if($exportValue>$importValue)

                            <span class="badge bg-success">

                                Surplus

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Deficit

                            </span>

                        @endif

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>



<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <h4>

                📦 Trade Analysis

            </h4>

            <hr>

            @if($exportValue>$importValue)

                <div class="alert alert-success">

                    <b>Trade Surplus</b>

                    <br>

                    Export value exceeds import value.

                </div>

            @else

                <div class="alert alert-warning">

                    <b>Trade Deficit</b>

                    <br>

                    Import value exceeds export value.

                </div>

            @endif

        </div>

    </div>



    <div class="col-lg-6">

        <div class="card card-custom p-4 h-100">

            <h4>

                🤖 AI Economic Recommendation

            </h4>

            <hr>

            @if($inflationValue>8)

                <div class="alert alert-danger">

                    Inflation is high. Monitor investment and trade risks.

                </div>

            @elseif($inflationValue>4)

                <div class="alert alert-warning">

                    Moderate inflation. Monitor market conditions.

                </div>

            @else

                <div class="alert alert-success">

                    Economic indicators remain stable.

                </div>

            @endif

        </div>

    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(

document.getElementById("economyChart"),

{

type:"bar",

data:{

labels:[

"GDP",

"Inflation",

"Population",

"Export",

"Import"

],

datasets:[{

label:"Economic Indicators",

data:[

{{ $gdpValue/1000000000000 }},

{{ round($inflationValue,2) }},

{{ $populationValue/1000000 }},

{{ $exportValue/1000000000 }},

{{ $importValue/1000000000 }}

],

borderWidth:1

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

plugins:{

legend:{

display:false

}

}

}

}

);

</script>

@endsection