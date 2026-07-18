@extends('layouts.app')


@section('content')


<div class="container-fluid">



{{-- ================= HEADER ================= --}}


<div class="currency-header mb-4">


<div>

<h1 class="fw-bold">

💱 Currency Intelligence

</h1>


<p class="text-muted">

Global Foreign Exchange Monitoring For Supply Chain Decision

</p>


</div>




<div class="currency-tools">



<form method="GET" action="/currency">


<div class="country-search-box">


<i class="bi bi-search"></i>



<select

name="country"

id="countrySelect"

class="form-select"

onchange="this.form.submit()">



<option value="">

Search Country Currency...

</option>




@foreach($countries as $country)



<option

value="{{ $country->id }}"


@if(
$selectedCountry &&
$selectedCountry->id==$country->id
)

selected

@endif


>

🌍 {{ $country->name }}


</option>



@endforeach



</select>


</div>



</form>




<span class="alert-pill">

🔔 3 Alerts

</span>



</div>



</div>










{{-- ================= SELECTED COUNTRY ================= --}}


@if($currencyData)



<div class="row g-4 mb-4">



<div class="col-xl-3 col-md-6">


<div class="currency-result-card">


<div class="currency-icon blue">

🌎

</div>


<h6>

Country

</h6>


<h3>

{{ $currencyData['name'] }}

</h3>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="currency-result-card">


<div class="currency-icon green">

💱

</div>


<h6>

Currency

</h6>


<h2>

{{ $currencyData['currency'] }}

</h2>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="currency-result-card">


<div class="currency-icon orange">

💵

</div>


<h6>

USD Rate

</h6>


<h2>

{{number_format($currencyData['rate'])}}

</h2>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="currency-result-card risk">


<div class="currency-icon red">

⚠️

</div>


<h6>

Currency Risk Score

</h6>



<h2>


@if($currencyData)


@if($currencyData['status']=="High")

80 / 100


@elseif($currencyData['status']=="Medium")

50 / 100


@else

25 / 100


@endif


@else

-

@endif


</h2>



@if($currencyData)


@if($currencyData['status']=="High")

<span class="badge bg-danger">

Critical Risk

</span>


@elseif($currencyData['status']=="Medium")

<span class="badge bg-warning">

Warning

</span>


@else

<span class="badge bg-success">

Stable

</span>


@endif



<div class="mt-3">


<small class="text-muted">

Risk Level

</small>


<div class="risk-progress mt-2">


<div 

class="risk-progress-bar"


style="width:

@if($currencyData['status']=="High")

80%

@elseif($currencyData['status']=="Medium")

50%

@else

25%

@endif

">

</div>


</div>


</div>


@endif


</div>


</div>




</div>



@endif


{{-- ================= GLOBAL CURRENCY SUMMARY ================= --}}


<div class="row g-4">


<div class="col-xl-3 col-md-6">

<div class="currency-card">


<div class="currency-symbol">

💵

</div>


<h6>

USD → IDR

</h6>


<h2>

{{number_format($usd_idr ?? 18071,2)}}

</h2>


<span class="text-success">

▲ Stable

</span>


<p class="text-muted mt-2">

Indonesia Trading Reference

</p>


</div>

</div>





<div class="col-xl-3 col-md-6">

<div class="currency-card">


<div class="currency-symbol">

🌍

</div>


<h6>

Selected Currency

</h6>


<h2>

@if($currencyData)

{{$currencyData['currency']}}

@else

-

@endif

</h2>


<span class="text-primary">

Market Monitoring

</span>


<p class="text-muted mt-2">

Current selected country currency

</p>


</div>

</div>






<div class="col-xl-3 col-md-6">

<div class="currency-card">


<div class="currency-symbol">

📈

</div>


<h6>

Exchange Trend

</h6>


<h2>

@if($currencyData)

@if($currencyData['status']=="High")

Volatile

@else

Stable

@endif


@else

Normal

@endif

</h2>


<span class="text-warning">

Monitoring

</span>


<p class="text-muted mt-2">

Currency movement analysis

</p>


</div>

</div>







<div class="col-xl-3 col-md-6">

<div class="currency-card danger">


<div class="currency-symbol">

⚠️

</div>


<h6>

Trade Impact

</h6>


<h2>

@if($currencyData)

@if($currencyData['status']=="High")

High Risk

@else

Low Risk

@endif

@else

Medium

@endif

</h2>


<span>

Import Cost Evaluation

</span>


</div>

</div>



</div>










{{-- ================= ANALYSIS ================= --}}



<div class="row mt-4 g-4">



<div class="col-lg-8">


<div class="card-custom p-4">


<h4>

📈 Exchange Rate Monitoring

</h4>



<p class="text-muted">

Currency fluctuation impact on import/export cost

</p>



<div style="height:350px">


<canvas id="currencyChart"></canvas>


</div>



</div>



</div>





<div class="col-lg-4">


<div class="card-custom p-4">


<h4>

🤖 AI Currency Insight

</h4>


<hr>



@if($currencyData)



<div class="insight warning">


<strong>

💱 {{$currencyData['currency']}} Movement

</strong>


<br>


@if($currencyData['status']=="High")

Currency volatility detected.
Import cost may increase.

@else

Currency condition is relatively stable.
Trade cost is manageable.

@endif


</div>





<div class="insight success">


<strong>

📦 Supply Chain Impact

</strong>


<br>


@if($currencyData['status']=="High")

Consider reviewing supplier contracts and payment timing.

@else

Current currency supports stable international transactions.

@endif


</div>





<div class="insight">


<strong>

🤖 AI Recommendation

</strong>


<br>


@if($currencyData['status']=="High")

Delay long-term contract negotiation
until currency becomes stable.

@else

Suitable for continuing import/export activities.

@endif


</div>




@else



<div class="insight success">


<strong>

🌎 Global Currency Monitoring

</strong>


<br>

Select a country to generate AI currency analysis.


</div>



@endif




</div>


</div>



</div>



{{-- ================= BUSINESS IMPACT ================= --}}

@if($currencyData)

<div class="row g-4 mb-4">


<div class="col-lg-8">

<div class="card-custom p-4">


<h4 class="fw-bold">

📊 Currency Business Impact

</h4>


<p class="text-muted">

Impact analysis for international trade decision

</p>



<div class="row g-3 mt-3">


<div class="col-md-6">


<div class="impact-box">

<h6>
💰 Import Cost Impact
</h6>


<h4 class="text-warning">

@if($currencyData['status']=="High")

Increase Risk

@else

Stable Cost

@endif

</h4>


<p>
Currency movement affects purchasing cost from 
{{ $currencyData['name'] }} suppliers.
</p>


</div>


</div>





<div class="col-md-6">


<div class="impact-box">


<h6>
🚢 Export Competitiveness
</h6>


<h4 class="text-success">

Positive

</h4>


<p>

Exchange rate condition may support export pricing strategy.

</p>


</div>


</div>






<div class="col-md-6">


<div class="impact-box">


<h6>
📦 Supply Chain Decision
</h6>


<h4>

@if($currencyData['status']=="High")

Review Supplier

@else

Continue Trade

@endif

</h4>


<p>

Recommendation based on currency stability.

</p>


</div>


</div>






<div class="col-md-6">


<div class="impact-box">


<h6>
🤖 AI Recommendation
</h6>


<h4>

Monitor Currency

</h4>


<p>

Keep monitoring exchange fluctuation before contract agreement.

</p>


</div>


</div>



</div>



</div>


</div>





<div class="col-lg-4">


<div class="card-custom p-4">


<h4 class="fw-bold">

🌐 Currency Profile

</h4>


<hr>



<div class="summary-row">

<span>

Country

</span>


<strong>

{{$currencyData['name']}}

</strong>


</div>




<div class="summary-row">

<span>

Currency

</span>


<strong>

{{$currencyData['currency']}}

</strong>


</div>




<div class="summary-row">

<span>

USD Exchange

</span>


<strong>

{{number_format($currencyData['rate'],4)}}

</strong>


</div>





<div class="summary-row">

<span>

Market Status

</span>


<strong>

{{$currencyData['status']}}

</strong>


</div>



</div>


</div>



</div>

@endif





{{-- ================= TABLE ================= --}}


<div class="card-custom mt-4 p-4">


<h4>

🌎 Currency Watchlist

</h4>


<hr>



<table class="table">


<thead>

<tr>

<th>

Currency

</th>


<th>

Rate

</th>


<th>

Status

</th>


<th>

Trade Impact

</th>


</tr>


</thead>



<tbody>


@if($currencyData)


<tr>

<td>

USD / {{$currencyData['currency']}}

</td>


<td>

{{number_format($currencyData['rate'],4)}}

</td>


<td>


@if($currencyData['status']=="High")

<span class="badge bg-danger">

High Risk

</span>


@else


<span class="badge bg-success">

Stable

</span>


@endif


</td>



<td>


@if($currencyData['status']=="High")

High Cost Impact

@else

Low Cost Impact

@endif


</td>


</tr>




<tr>

<td>

{{$currencyData['currency']}} Market

</td>


<td>

Monitoring

</td>


<td>


<span class="badge bg-warning">

Watch

</span>


</td>


<td>

Exchange Movement

</td>


</tr>



@else



<tr>

<td colspan="4" class="text-center text-muted">

Select country to view currency monitoring

</td>

</tr>



@endif



</tbody>



</table>



</div>




</div>



@endsection






@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


new Chart(

document.getElementById('currencyChart'),

{


type:'line',


data:{


labels:[

'Jan',
'Feb',
'Mar',
'Apr',
'May',
'Jun'

],


datasets:[{

label:

@if($currencyData)

'USD / {{$currencyData["currency"]}}'

@else

'USD / IDR'

@endif



,


data:


@if($currencyData)


@if($currencyData['currency']=="EUR")

[
0.91,
0.90,
0.89,
0.88,
0.87,
0.88
]


@elseif($currencyData['currency']=="CNY")


[
6.92,
6.85,
6.80,
6.75,
6.78,
6.78
]


@elseif($currencyData['currency']=="JPY")


[
145,
148,
150,
152,
151,
149
]


@elseif($currencyData['currency']=="IDR")


[
15500,
15800,
16000,
16700,
17200,
18071
]


@else


[
1,
1.02,
1.04,
1.03,
1.05,
1.06
]


@endif



@else


[
15500,
15800,
16000,
16700,
17200,
18071
]


@endif



,


borderWidth:3


}]


},


options:{


responsive:true,


maintainAspectRatio:false


}


}


);



</script>


@endpush






<style>


.currency-header{


display:flex;

justify-content:space-between;

align-items:center;


}



.currency-tools{


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


}



.country-search-box i{


color:#0284c7;

margin-right:10px;


}



.country-search-box select{


border:none;


width:280px;


}



.alert-pill{


background:#fee2e2;


color:#dc2626;


padding:12px 25px;


border-radius:50px;


font-weight:700;


}




.currency-result-card,


.currency-card{


background:white;


padding:28px;


border-radius:25px;


min-height:230px;


height:auto;


display:flex;


flex-direction:column;


justify-content:flex-start;


box-shadow:

0 15px 35px rgba(15,23,42,.08);


transition:.3s;


}

.currency-result-card h6,
.currency-card h6{

font-weight:700;

margin-bottom:15px;

}


.currency-result-card h2,
.currency-card h2{

margin-bottom:10px;

}


.currency-result-card span,
.currency-card span{

margin-top:auto;

}



.currency-result-card:hover,

.currency-card:hover{


transform:translateY(-7px);


}





.currency-icon,

.currency-symbol{


font-size:35px;

margin-bottom:15px;


}



.currency-card h2,

.currency-result-card h2{


font-weight:800;


}



.risk,

.danger{


border-left:

6px solid #ef4444;


}



.insight{


padding:18px;

border-radius:18px;

margin-bottom:15px;


}



.warning{


background:#fef3c7;

}



.success{


background:#dcfce7;

}



.danger{


background:#fee2e2;

}

.impact-box{

background:#f8fafc;

padding:20px;

border-radius:20px;

height:170px;

border-left:5px solid #0284c7;

}


.impact-box h6{

font-weight:700;

}



.impact-box p{

font-size:14px;

color:#64748b;

}



.summary-row{

display:flex;

justify-content:space-between;

padding:14px 0;

border-bottom:1px solid #eee;

}



.summary-row span{

color:#64748b;

}

.risk-progress{

    width:100%;

    height:12px;

    background:#e5e7eb;

    border-radius:20px;

    overflow:hidden;

}



.risk-progress-bar{

    height:100%;

    border-radius:20px;

    background:#22c55e;

}

</style>