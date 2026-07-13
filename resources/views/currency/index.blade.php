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

Risk Status

</h6>


<h2>

{{$currencyData['status']}}

</h2>


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


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="currency-card">


<div class="currency-symbol">

🇪🇺

</div>


<h6>

USD → EUR

</h6>


<h2>

0.88

</h2>


<span class="text-success">

Stable

</span>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="currency-card">


<div class="currency-symbol">

🇨🇳

</div>


<h6>

USD → CNY

</h6>


<h2>

6.78

</h2>


<span class="text-warning">

Monitoring

</span>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="currency-card danger">


<div class="currency-symbol">

⚠️

</div>


<h6>

Currency Risk

</h6>


<h2>

High

</h2>


<span>

Trade Cost Warning

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



<div class="insight warning">

<strong>

USD Strengthening

</strong>

<br>

Import cost may increase.

</div>



<div class="insight success">

<strong>

EUR Stable

</strong>

<br>

European trade route safe.

</div>



<div class="insight danger">

<strong>

CNY Volatility

</strong>

<br>

Monitor China suppliers.

</div>



</div>



</div>



</div>









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



<tr>

<td>

USD / IDR

</td>

<td>

18,071

</td>

<td>

<span class="badge bg-success">

Stable

</span>

</td>

<td>

Low

</td>


</tr>




<tr>

<td>

USD / EUR

</td>

<td>

0.88

</td>

<td>

<span class="badge bg-success">

Stable

</span>

</td>


<td>

Safe

</td>

</tr>





<tr>

<td>

USD / CNY

</td>

<td>

6.78

</td>

<td>

<span class="badge bg-warning">

Warning

</span>

</td>


<td>

Medium

</td>


</tr>



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


label:'USD/IDR',


data:[

15500,
15800,
16000,
16700,
17200,
18071

],


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


height:210px;


box-shadow:

0 15px 35px rgba(15,23,42,.08);


transition:.3s;


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



</style>