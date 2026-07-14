@extends('layouts.app')


@section('content')


<div class="container-fluid">


{{-- HERO --}}

<div class="prediction-hero mb-5">


<div>

<h1>

🔮 Trade Prediction Intelligence

</h1>


<p>

AI-powered forecasting system untuk memprediksi
peluang dan risiko perdagangan global.

</p>


<button class="btn btn-light mt-3">

Run AI Forecast

</button>


</div>


<div class="forecast-icon">

📈

</div>


</div>





{{-- KPI --}}


<div class="row g-4 mb-5">


<div class="col-lg-3 col-md-6">


<div class="prediction-card">


<div class="icon">

🌍

</div>


<h6>

Countries Analyzed

</h6>


<h2>

{{ $totalCountries }}

</h2>


<p>

Global Market Coverage

</p>


</div>


</div>



<div class="col-lg-3 col-md-6">


<div class="prediction-card">


<div class="icon">

🚀

</div>


<h6>

Growing Markets

</h6>


<h2 class="text-success">

{{ $growing }}

</h2>


<p>

Positive Trade Outlook

</p>


</div>


</div>



<div class="col-lg-3 col-md-6">


<div class="prediction-card">


<div class="icon">

⚖️

</div>


<h6>

Stable Markets

</h6>


<h2 class="text-primary">

{{ $stable }}

</h2>


<p>

Low Volatility

</p>


</div>


</div>



<div class="col-lg-3 col-md-6">


<div class="prediction-card">


<div class="icon">

⚠️

</div>


<h6>

Risk Markets

</h6>


<h2 class="text-danger">

{{ $declining }}

</h2>


<p>

Need Monitoring

</p>


</div>


</div>



</div>






<div class="row g-4">



{{-- AI FORECAST --}}


<div class="col-lg-8">


<div class="section-card">


<div class="d-flex justify-content-between">


<h3>

🤖 AI Forecast Summary

</h3>


<span class="badge bg-success">

LIVE AI

</span>


</div>


<hr>


<div class="forecast-box">


<h4>

Global Trade Outlook:

<span class="text-success">

Positive

</span>

</h4>


<p>

AI predicts increasing trade opportunities
driven by economic stability, port performance,
currency conditions, and market demand.

</p>


</div>



<div class="row mt-4">


<div class="col-md-4">


<div class="mini-stat">

📈

<br>

Growth Trend

<br>

<b>

+12%

</b>

</div>


</div>



<div class="col-md-4">


<div class="mini-stat">

🎯

<br>

Prediction Accuracy

<br>

<b>

94%

</b>

</div>


</div>



<div class="col-md-4">


<div class="mini-stat">

🌐

<br>

Markets Evaluated

<br>

<b>

216

</b>

</div>


</div>


</div>


</div>


</div>







{{-- TREND --}}


<div class="col-lg-4">


<div class="section-card">


<h3>

📊 Prediction Trend

</h3>


<hr>


<div class="trend-item growth">


<span>

⬆

</span>


<div>

<h5>

Growing

</h5>

<p>

85 Countries

</p>

</div>


</div>




<div class="trend-item stable">


<span>

➖

</span>


<div>

<h5>

Stable

</h5>

<p>

96 Countries

</p>

</div>


</div>




<div class="trend-item danger">


<span>

⬇

</span>


<div>

<h5>

Declining

</h5>

<p>

35 Countries

</p>

</div>


</div>



</div>


</div>


</div>



{{-- PREDICTION CHART --}}

<div class="section-card mt-5">


<h3>

📈 Future Trade Forecast

</h3>


<hr>


<canvas id="predictionChart"></canvas>


</div>


{{-- MARKET OPPORTUNITY --}}


<div class="section-card mt-5">


<h3>

🌟 Future Market Opportunity

</h3>


<hr>


<div class="table-responsive">


<table class="table table-hover">


<thead>

<tr>

<th>

Country

</th>

<th>

Current Score

</th>


<th>

Prediction

</th>


<th>

Trend

</th>


<th>

Confidence

</th>


</tr>

</thead>


<tbody>


@php

$topPredictions = collect($predictions)->take(10);

@endphp


@foreach($topPredictions as $item)


<tr>


<td>

🌍 {{ $item['country']->name }}

</td>


<td>

{{ $item['current'] }}

</td>


<td>

{{ $item['future'] }}

</td>


<td>


@if($item['trend']=="Increasing")

<span class="badge bg-success">

⬆ Increasing

</span>


@elseif($item['trend']=="Stable")

<span class="badge bg-primary">

➖ Stable

</span>


@else

<span class="badge bg-danger">

⬇ Decreasing

</span>


@endif


</td>


<td>

{{ $item['confidence'] }}%

</td>


</tr>





<tr>


<td>

🌍

{{ $item['country']->name }}

</td>



<td>

{{ $item['current'] }}

</td>



<td>

{{ $item['future'] }}

</td>



<td>


@if($item['trend']=="Increasing")


<span class="badge bg-success">

⬆ Increasing

</span>


@elseif($item['trend']=="Stable")


<span class="badge bg-primary">

➖ Stable

</span>


@else


<span class="badge bg-danger">

⬇ Decreasing

</span>


@endif



</td>



<td>

{{ $item['confidence'] }}%

</td>


</tr>



@endforeach


</tbody>


</table>


</div>


</div>





</div>


@endsection

@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


const predictionData = @json(
    collect($predictions)
    ->take(10)
);



new Chart(

document.getElementById('predictionChart'),

{


type:'bar',


data:{


labels:

predictionData.map(
item => item.country.name
),



datasets:[

{

label:'Current Score',

data:

predictionData.map(
item => item.current
)

},


{

label:'Future Prediction',

data:

predictionData.map(
item => item.future
)

}


]


},



options:{


responsive:true,


plugins:{


legend:{


position:'top'


}


},



scales:{


y:{


beginAtZero:true,


max:100


}


}


}



}

);


</script>


@endpush



<style>


.prediction-hero{


background:

linear-gradient(
135deg,
#0284c7,
#22d3ee
);


padding:50px;

border-radius:35px;

color:white;

display:flex;

justify-content:space-between;

align-items:center;


}



.prediction-hero h1{


font-size:48px;

font-weight:900;


}



.forecast-icon{


font-size:120px;

}





.prediction-card{


background:white;

padding:30px;

border-radius:25px;

box-shadow:

0 15px 35px rgba(0,0,0,.08);


}



.prediction-card .icon{


font-size:35px;


}



.prediction-card h2{


font-size:45px;

font-weight:900;


}




.section-card{


background:white;

padding:35px;

border-radius:30px;

box-shadow:

0 15px 35px rgba(0,0,0,.08);


}




.forecast-box{


background:#eff6ff;

padding:25px;

border-radius:20px;


}



.mini-stat{


background:#f8fafc;

padding:20px;

border-radius:20px;

text-align:center;

font-size:18px;


}




.trend-item{


display:flex;

gap:20px;

padding:20px;

border-radius:20px;

margin-bottom:15px;


}



.trend-item span{


font-size:35px;


}



.growth{

background:#dcfce7;

}



.stable{

background:#dbeafe;

}



.danger{

background:#fee2e2;

}

#predictionChart{

max-height:400px;

}


</style>