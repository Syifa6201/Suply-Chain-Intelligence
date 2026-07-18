@extends('layouts.app')


@section('content')


<div class="container-fluid">



{{-- ================= HEADER ================= --}}

<div class="economy-header mb-4">


    <div>

        <h1 class="fw-bold">

            📈 Global Economy Intelligence

        </h1>


        <p class="text-muted">

            Real-time Economic Indicators Monitoring

        </p>


    </div>




    <div class="economy-actions">


        <form method="GET" action="/economy">


            <div class="country-search-box">


                <i class="bi bi-search"></i>


                <select
                    id="countrySelect"
                    name="country"
                    class="form-select"
                    onchange="this.form.submit()">



                    <option value="">

                        Search Country...

                    </option>



                    @foreach($countries as $country)


                    <option

                    value="{{ $country->name }}"

                    {{ 
                    $selectedCountry == $country->name
                    ? 'selected'
                    : ''
                    }}

                    >

                    🌍 {{ $country->name }}

                    </option>


                    @endforeach



                </select>


            </div>



        </form>



        <span class="live-badge">

            ● LIVE DATA

        </span>


    </div>



</div>






{{-- ================= KPI ================= --}}


<div class="row g-4">



<div class="col-xl-3 col-md-6">


<div class="economy-card">


<div class="economy-icon blue">

<i class="bi bi-graph-up-arrow"></i>

</div>


<h6>

GDP

</h6>


<h2>

${{number_format($gdpValue,0,',','.') }}

</h2>


<p>

Gross Domestic Product

</p>


</div>


</div>





<div class="col-xl-3 col-md-6">


<div class="economy-card">


<div class="economy-icon orange">

<i class="bi bi-currency-exchange"></i>

</div>


<h6>

Inflation

</h6>


<h2>

{{round($inflationValue,2)}}%

</h2>


<p>

Consumer Price Index

</p>


</div>


</div>






<div class="col-xl-3 col-md-6">


<div class="economy-card">


<div class="economy-icon green">

<i class="bi bi-people"></i>

</div>


<h6>

Population

</h6>


<h2>

{{number_format($populationValue)}}

</h2>


<p>

Total Population

</p>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="economy-card">


<div class="economy-icon purple">

<i class="bi bi-box-seam"></i>

</div>


<h6>

Trade Balance

</h6>



<h2>


@if($exportValue > $importValue)

Surplus

@else

Deficit

@endif


</h2>



<p>

Export vs Import

</p>


</div>


</div>



</div>








{{-- ================= CHART ================= --}}



<div class="row mt-4 g-4">



<div class="col-lg-8">


<div class="card-custom p-4">


<h4>

📊 Economic Indicators

</h4>


<p class="text-muted">

Economic performance analysis

</p>



<div style="height:350px">

<canvas id="economyChart"></canvas>

</div>


</div>


</div>







<div class="col-lg-4">


<div class="card-custom p-4">

<h4 class="fw-bold mb-1">
    📋 Economic Summary
</h4>

<p class="text-muted mb-4">
    {{ $selectedCountry }}
</p>

<div class="summary-row">
    <span>
        <i class="bi bi-graph-up-arrow text-primary me-2"></i>
        GDP
    </span>

    <strong>
        ${{ number_format($gdpValue) }}
    </strong>
</div>

<div class="summary-row">
    <span>
        <i class="bi bi-currency-exchange text-warning me-2"></i>
        Inflation
    </span>

    <strong>
        {{ number_format($inflationValue,2) }}%
    </strong>
</div>

<div class="summary-row">
    <span>
        <i class="bi bi-people text-success me-2"></i>
        Population
    </span>

    <strong>
        {{ number_format($populationValue) }}
    </strong>
</div>

<div class="summary-row">
    <span>
        <i class="bi bi-box-seam text-info me-2"></i>
        Trade Balance
    </span>

    @if($exportValue > $importValue)

        <span class="badge bg-success">
            Surplus
        </span>

    @else

        <span class="badge bg-danger">
            Deficit
        </span>

    @endif
</div>

<div class="summary-row">
    <span>
        <i class="bi bi-arrow-up-right-circle text-success me-2"></i>
        Export
    </span>

    <strong>
        ${{ number_format($exportValue) }}
    </strong>
</div>

<div class="summary-row border-0">
    <span>
        <i class="bi bi-arrow-down-right-circle text-danger me-2"></i>
        Import
    </span>

    <strong>
        ${{ number_format($importValue) }}
    </strong>
</div>


</div>




</div>


</div>


</div>

<div class="row mt-4 g-4">

    {{-- Economy Analysis --}}
    <div class="col-lg-8">

        <div class="card-custom p-4 h-100">

            <h4 class="fw-bold mb-4">
                📈 Business Impact
            </h4>

            <div class="row">

    {{-- Investment Climate --}}
    <div class="col-md-6 mb-4">
        <div class="analysis-box">

            <div class="analysis-icon bg-success">
                <i class="bi bi-cash-stack"></i>
            </div>

            <h5 class="fw-bold mb-2">
                Investment Climate
            </h5>

            @if($inflationValue < 3)

                <span class="badge bg-success mb-3">
                    Excellent
                </span>

                <p class="text-muted mb-0">
                    {{ $selectedCountry }} has very stable inflation, creating
                    a favorable environment for long-term investment and
                    business expansion.
                </p>

            @elseif($inflationValue < 7)

                <span class="badge bg-warning text-dark mb-3">
                    Moderate
                </span>

                <p class="text-muted mb-0">
                    Inflation remains manageable, but investors should monitor
                    market conditions before expanding.
                </p>

            @else

                <span class="badge bg-danger mb-3">
                    High Risk
                </span>

                <p class="text-muted mb-0">
                    High inflation may reduce investment attractiveness and
                    increase operational costs.
                </p>

            @endif

        </div>
    </div>

    {{-- Consumer Market --}}
    <div class="col-md-6 mb-4">
        <div class="analysis-box">

            <div class="analysis-icon bg-primary">
                <i class="bi bi-people-fill"></i>
            </div>

            <h5 class="fw-bold mb-2">
                Consumer Market
            </h5>

            @if($populationValue > 100000000)

                <span class="badge bg-primary mb-3">
                    Very Large Market
                </span>

                <p class="text-muted mb-0">
                    {{ $selectedCountry }} has a very large domestic market,
                    offering strong opportunities for retail and consumer
                    businesses.
                </p>

            @elseif($populationValue > 30000000)

                <span class="badge bg-info mb-3">
                    Growing Market
                </span>

                <p class="text-muted mb-0">
                    Domestic demand continues to grow and provides good
                    opportunities for business expansion.
                </p>

            @else

                <span class="badge bg-secondary mb-3">
                    Small Market
                </span>

                <p class="text-muted mb-0">
                    Domestic demand is relatively limited, making export
                    strategies more important.
                </p>

            @endif

        </div>
    </div>

    {{-- Export Potential --}}
    <div class="col-md-6">
        <div class="analysis-box">

            <div class="analysis-icon bg-warning">
                <i class="bi bi-globe-americas"></i>
            </div>

            <h5 class="fw-bold mb-2">
                Export Potential
            </h5>

            @if($exportValue > $importValue)

                <span class="badge bg-success mb-3">
                    Strong
                </span>

                <p class="text-muted mb-0">
                    Exports exceed imports, indicating strong international
                    competitiveness and export opportunities.
                </p>

            @else

                <span class="badge bg-warning text-dark mb-3">
                    Moderate
                </span>

                <p class="text-muted mb-0">
                    Export performance can still be improved to strengthen the
                    country's trade position.
                </p>

            @endif

        </div>
    </div>

    {{-- Supply Chain --}}
    <div class="col-md-6">
        <div class="analysis-box">

            <div class="analysis-icon bg-danger">
                <i class="bi bi-truck"></i>
            </div>

            <h5 class="fw-bold mb-2">
                Supply Chain Impact
            </h5>

            @if($exportValue > $importValue && $inflationValue < 5)

                <span class="badge bg-success mb-3">
                    Low Risk
                </span>

                <p class="text-muted mb-0">
                    Supply chains are expected to remain efficient with stable
                    logistics and procurement costs.
                </p>

            @elseif($inflationValue < 8)

                <span class="badge bg-warning text-dark mb-3">
                    Medium Risk
                </span>

                <p class="text-muted mb-0">
                    Businesses should monitor logistics expenses and inventory
                    planning carefully.
                </p>

            @else

                <span class="badge bg-danger mb-3">
                    High Risk
                </span>

                <p class="text-muted mb-0">
                    Rising inflation may significantly increase transportation,
                    warehousing, and procurement costs.
                </p>

            @endif

        </div>
    </div>

</div>

        </div>

    </div>

    {{-- Quick Notes --}}
    <div class="col-lg-4">

        <div class="card-custom p-4 h-100">

            <h4 class="fw-bold">
                📝 Quick Notes
            </h4>

            <p class="text-muted mb-4">
                Key economic observations
            </p>

            <div class="quick-note mb-3">
    <div class="d-flex align-items-start">
        <div class="note-icon bg-primary">
            <i class="bi bi-globe2"></i>
        </div>
        <div class="ms-3">
            <h6 class="fw-bold mb-1">Country</h6>
            <small class="text-muted">
                <strong>{{ $selectedCountry }}</strong> has a population of
                <strong>{{ number_format($populationValue) }}</strong> people.
            </small>
        </div>
    </div>
</div>

<div class="quick-note mb-3">
    <div class="d-flex align-items-start">
        <div class="note-icon bg-success">
            <i class="bi bi-graph-up-arrow"></i>
        </div>
        <div class="ms-3">
            <h6 class="fw-bold mb-1">Economic Growth</h6>

            @if($gdpValue >= 1000000000000)
                <small class="text-success">
                    GDP reached
                    <strong>${{ number_format($gdpValue) }}</strong>.
                    The economy is classified as very strong.
                </small>
            @elseif($gdpValue >= 300000000000)
                <small class="text-warning">
                    GDP reached
                    <strong>${{ number_format($gdpValue) }}</strong>.
                    The economy continues to grow steadily.
                </small>
            @else
                <small class="text-muted">
                    GDP reached
                    <strong>${{ number_format($gdpValue) }}</strong>.
                    There is still room for economic expansion.
                </small>
            @endif

        </div>
    </div>
</div>

<div class="quick-note mb-3">
    <div class="d-flex align-items-start">
        <div class="note-icon bg-warning">
            <i class="bi bi-currency-exchange"></i>
        </div>
        <div class="ms-3">
            <h6 class="fw-bold mb-1">Inflation</h6>

            @if($inflationValue < 3)
                <small class="text-success">
                    Inflation is
                    <strong>{{ number_format($inflationValue,2) }}%</strong>.
                    Prices remain stable.
                </small>
            @elseif($inflationValue < 7)
                <small class="text-warning">
                    Inflation is
                    <strong>{{ number_format($inflationValue,2) }}%</strong>.
                    Moderate inflation requires monitoring.
                </small>
            @else
                <small class="text-danger">
                    Inflation is
                    <strong>{{ number_format($inflationValue,2) }}%</strong>.
                    High inflation may reduce purchasing power.
                </small>
            @endif

        </div>
    </div>
</div>

<div class="quick-note">
    <div class="d-flex align-items-start">
        <div class="note-icon bg-info">
            <i class="bi bi-box-seam"></i>
        </div>
        <div class="ms-3">
            <h6 class="fw-bold mb-1">Trade Balance</h6>

            @if($exportValue > $importValue)
                <small class="text-success">
                    Exports exceed imports, creating a
                    <strong>trade surplus</strong> that supports economic growth.
                </small>
            @else
                <small class="text-danger">
                    Imports exceed exports, resulting in a
                    <strong>trade deficit</strong> that should be monitored.
                </small>
            @endif

        </div>
    </div>
</div>

        </div>

    </div>

</div>



<div class="row mt-4">

<div class="col-lg-12">

<div class="card-custom p-4">

<h4 class="fw-bold mb-4">

📈 Economy Analysis

</h4>

<div class="row">

<div class="col-md-3">

<div class="analysis-box">

<div class="analysis-icon bg-success">

<i class="bi bi-graph-up-arrow"></i>

</div>

<h6>Economic Growth</h6>

@if($gdpValue > 1000000000000)

<span class="badge bg-success">

Strong Economy

</span>

@elseif($gdpValue > 300000000000)

<span class="badge bg-warning text-dark">

Growing

</span>

@else

<span class="badge bg-secondary">

Developing

</span>

@endif

<p class="mt-3 text-muted">

GDP indicates the country's production capacity.

</p>

</div>

</div>

<div class="col-md-3">

<div class="analysis-box">

<div class="analysis-icon bg-warning">

<i class="bi bi-fire"></i>

</div>

<h6>Inflation</h6>

@if($inflationValue < 3)

<span class="badge bg-success">

Stable

</span>

@elseif($inflationValue < 7)

<span class="badge bg-warning text-dark">

Moderate

</span>

@else

<span class="badge bg-danger">

High

</span>

@endif

<p class="mt-3 text-muted">

Inflation reflects purchasing power and price stability.

</p>

</div>

</div>

<div class="col-md-3">

<div class="analysis-box">

<div class="analysis-icon bg-primary">

<i class="bi bi-globe2"></i>

</div>

<h6>Market Size</h6>

@if($populationValue > 100000000)

<span class="badge bg-primary">

Large Market

</span>

@elseif($populationValue > 30000000)

<span class="badge bg-info">

Medium Market

</span>

@else

<span class="badge bg-secondary">

Small Market

</span>

@endif

<p class="mt-3 text-muted">

Population determines potential consumer demand.

</p>

</div>

</div>

<div class="col-md-3">

<div class="analysis-box">

<div class="analysis-icon bg-info">

<i class="bi bi-box-seam"></i>

</div>

<h6>Trade Condition</h6>

@if($exportValue > $importValue)

<span class="badge bg-success">

Export Oriented

</span>

@else

<span class="badge bg-danger">

Import Dependent

</span>

@endif

<p class="mt-3 text-muted">

Comparison between export and import performance.

</p>

</div>

</div>

</div>

</div>

</div>

</div>

<div class="row mt-4">

    <div class="col-lg-12">

        <div class="card-custom p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h4 class="fw-bold mb-1">
                        💼 Business Recommendation
                    </h4>

                    <small class="text-muted">
                        Recommended business sectors based on the current economic condition
                    </small>

                </div>

            </div>

            <div class="row g-4">

                {{-- Recommended --}}
                <div class="col-md-4">

                    <div class="recommend-card success">

                        <h5 class="text-success mb-3">

                            ✅ Recommended

                        </h5>

                        @if($exportValue > $importValue)

                            <div class="recommend-item">
                                <i class="bi bi-cpu"></i>
                                Electronics Industry
                            </div>

                            <div class="recommend-item">
                                <i class="bi bi-box-seam"></i>
                                Logistics & Supply Chain
                            </div>

                            <div class="recommend-item">
                                <i class="bi bi-gear"></i>
                                Manufacturing
                            </div>

                            <div class="recommend-item">
                                <i class="bi bi-tree"></i>
                                Agriculture
                            </div>

                        @else

                            <div class="recommend-item">
                                <i class="bi bi-shop"></i>
                                Retail Business
                            </div>

                            <div class="recommend-item">
                                <i class="bi bi-cart"></i>
                                Distribution
                            </div>

                        @endif

                    </div>

                </div>

                {{-- Monitor --}}
                <div class="col-md-4">

                    <div class="recommend-card warning">

                        <h5 class="text-warning mb-3">

                            ⚠ Monitor Carefully

                        </h5>

                        <div class="recommend-item">

                            <i class="bi bi-building"></i>

                            Construction

                        </div>

                        <div class="recommend-item">

                            <i class="bi bi-car-front"></i>

                            Automotive

                        </div>

                        <div class="recommend-item">

                            <i class="bi bi-cash-stack"></i>

                            Banking

                        </div>

                    </div>

                </div>

                {{-- Avoid --}}
                <div class="col-md-4">

                    <div class="recommend-card danger">

                        <h5 class="text-danger mb-3">

                            ❌ High Risk

                        </h5>

                        @if($inflationValue >= 7)

                            <div class="recommend-item">

                                <i class="bi bi-gem"></i>

                                Luxury Goods

                            </div>

                            <div class="recommend-item">

                                <i class="bi bi-house"></i>

                                Property Investment

                            </div>

                        @else

                            <div class="recommend-item">

                                <i class="bi bi-check-circle text-success"></i>

                                No Significant Risk

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- ================= AI ANALYSIS ================= --}}



<div class="row mt-4 g-4">



<div class="col-lg-6">


<div class="card-custom p-4">


<h4>

📦 Trade Analysis

</h4>


<hr>



@if($exportValue>$importValue)


<div class="analysis-success">


<h5>

Trade Surplus

</h5>


<p>

Export value exceeds import dependency.

</p>


</div>



@else


<div class="analysis-warning">


<h5>

Trade Deficit

</h5>


<p>

Import dependency is higher.

</p>


</div>



@endif



</div>


</div>








<div class="col-lg-6">


<div class="card-custom p-4">


<h4>

🤖 AI Economic Recommendation

</h4>


<hr>



@if($inflationValue>8)


<div class="alert alert-danger">

High inflation detected.
Monitor trade risk.

</div>


@elseif($inflationValue>4)


<div class="alert alert-warning">

Moderate inflation.
Monitor market condition.

</div>


@else


<div class="alert alert-success">

Economic condition stable.

</div>


@endif



</div>


</div>



</div>






</div>

@endsection






@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


new Chart(

document.getElementById('economyChart'),

{


type:'bar',


data:{


labels:[

'GDP',
'Inflation',
'Population',
'Export',
'Import'

],



datasets:[{


label:'Economic Indicators',


data:[


{{$gdpValue/1000000000000}},


{{round($inflationValue,2)}},


{{$populationValue/1000000}},


{{$exportValue/1000000000}},


{{$importValue/1000000000}}


],


borderWidth:2


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


@endpush







<style>



.economy-header{


display:flex;

justify-content:space-between;

align-items:center;

gap:30px;


}



.economy-actions{


display:flex;

align-items:center;

gap:15px;


}





.country-search-box{


display:flex;

align-items:center;


background:white;


padding:8px 15px;


border-radius:18px;


box-shadow:

0 10px 25px rgba(15,23,42,.08);


border:1px solid #e2e8f0;


}



.country-search-box i{


color:#0284c7;

font-size:20px;

}



.country-search-box select{


border:none;

width:280px;


}



.country-search-box select:focus{


box-shadow:none;


}




.live-badge{


background:#dcfce7;


color:#15803d;


padding:12px 22px;


border-radius:50px;


font-weight:700;


}




.economy-card{


background:white;


padding:28px;


border-radius:25px;


height:220px;


box-shadow:

0 15px 35px rgba(15,23,42,.08);


transition:.3s;


}



.economy-card:hover{


transform:translateY(-7px);


}





.economy-icon{


width:55px;

height:55px;


border-radius:18px;


display:flex;

align-items:center;

justify-content:center;


font-size:25px;


margin-bottom:20px;


}



.blue{

background:#dbeafe;

color:#2563eb;

}


.orange{

background:#ffedd5;

color:#ea580c;

}


.green{

background:#dcfce7;

color:#16a34a;

}


.purple{

background:#ede9fe;

color:#7c3aed;

}





.summary-row{


display:flex;

justify-content:space-between;


padding:15px 0;


border-bottom:1px solid #e2e8f0;


}




.analysis-success{


background:#dcfce7;


padding:20px;


border-radius:20px;


}



.analysis-warning{


background:#fef3c7;


padding:20px;


border-radius:20px;


}

.analysis-box{

background:#fff;

border:1px solid #eef2f7;

border-radius:20px;

padding:25px;

height:100%;

transition:.3s;

}

.analysis-box:hover{

transform:translateY(-6px);

box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.analysis-icon{

width:60px;

height:60px;

border-radius:18px;

display:flex;

align-items:center;

justify-content:center;

font-size:26px;

color:white;

margin-bottom:20px;

}

.recommend-card{

    background:#fff;

    border:1px solid #edf2f7;

    border-radius:20px;

    padding:25px;

    height:100%;

    transition:.3s;

}

.recommend-card:hover{

    transform:translateY(-5px);

    box-shadow:0 15px 30px rgba(0,0,0,.08);

}

.recommend-item{

    display:flex;

    align-items:center;

    gap:12px;

    padding:12px 0;

    border-bottom:1px solid #f1f5f9;

    font-weight:500;

}

.recommend-item:last-child{

    border-bottom:none;

}

.recommend-item i{

    font-size:20px;

    color:#2563eb;

}

.success{

    border-left:5px solid #22c55e;

}

.warning{

    border-left:5px solid #f59e0b;

}

.danger{

    border-left:5px solid #ef4444;

}

</style>