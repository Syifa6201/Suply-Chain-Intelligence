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


<h4>

📋 Economic Summary

</h4>


<hr>




<div class="summary-row">

<span>
GDP
</span>


<strong>

${{number_format($gdpValue)}}

</strong>


</div>




<div class="summary-row">

<span>

Inflation

</span>


<strong>

{{round($inflationValue,2)}} %

</strong>


</div>




<div class="summary-row">

<span>

Population

</span>


<strong>

{{number_format($populationValue)}}

</strong>


</div>





<div class="summary-row">

<span>

Trade

</span>


@if($exportValue>$importValue)

<span class="badge bg-success">

Surplus

</span>


@else

<span class="badge bg-danger">

Deficit

</span>

@endif



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



</style>