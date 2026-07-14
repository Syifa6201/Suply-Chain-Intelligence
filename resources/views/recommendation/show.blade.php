@extends('layouts.app')

@section('content')

<div class="container-fluid">


{{-- HEADER --}}

<div class="recommend-detail-header mb-4">


<h1>

🌍 {{ $country->name }}

</h1>


<p>

AI Trade Intelligence Analysis

</p>


</div>



<div class="row g-4">


{{-- SCORE --}}

<div class="col-lg-4">


<div class="detail-card text-center">


<h6>

Trade Score

</h6>


<h1 class="score">

{{ $analysis['score'] }}

</h1>


<span class="badge bg-{{ $analysis['badge'] }}">

{{ $analysis['recommendation'] }}

</span>


</div>


</div>




{{-- CONFIDENCE --}}

<div class="col-lg-4">


<div class="detail-card text-center">


<h6>

AI Confidence

</h6>


<div class="circle">


{{ $analysis['confidence'] }}%

</div>


</div>


</div>




{{-- COUNTRY --}}

<div class="col-lg-4">


<div class="detail-card">


<h6>

Country Information

</h6>


<hr>


<p>

🌐

{{ $country->region ?? '-' }}

</p>


<p>

💱

{{ $country->currency ?? '-' }}

</p>


<p>

📍

{{ $country->capital ?? '-' }}

</p>


</div>


</div>


</div>





{{-- SCORE BREAKDOWN --}}


<div class="row mt-5 g-4">


<div class="col-lg-7">


<div class="detail-card">


<h3>

📊 AI Score Breakdown

</h3>


<hr>


<canvas id="scoreChart"></canvas>


</div>


</div>



<div class="col-lg-5">


<div class="detail-card">


<h3>

🤖 AI Analysis

</h3>

<div class="alert alert-info">

{{ $analysis['explanation'] }}

</div>

<div class="detail-card mt-4">


<h3>

📈 Recommendation History

</h3>


<hr>


@php

$historyData = $country->recommendationHistories
    ->sortByDesc('created_at')
    ->take(5);

@endphp


@foreach($historyData as $history)

<div class="border-bottom pb-3 mb-3">


<h5>

{{ $history->created_at->format('d M Y H:i') }}

</h5>


<p>

Trade Score :

<b>

{{ $history->score }}

</b>

</p>


<p>

Recommendation :

<span class="badge bg-primary">

{{ $history->recommendation }}

</span>

</p>


<p>

{{ $history->reason }}

</p>


</div>


@endforeach


<div class="border-bottom pb-3 mb-3">


<h5>

{{ $history->created_at->format('d M Y H:i') }}

</h5>


<p>

Trade Score :

<b>

{{ $history->score }}

</b>

</p>


<p>

Recommendation :

<span class="badge bg-primary">

{{ $history->recommendation }}

</span>

</p>


</div>





</div>

<hr>


<div class="alert alert-info">


{{ $country->name }}

{{ $analysis['recommendation'] }}

</div>


<ul>


@foreach(explode(',',$analysis['reason']) as $reason)


<li>

✅ {{ $reason }}

</li>


@endforeach


</ul>


</div>


</div>


</div>




</div>


@endsection




@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


new Chart(

document.getElementById('scoreChart'),

{


type:'radar',


data:{


labels:[

'Economy',

'Currency',

'Weather',

'News',

'Port',

'Risk'

],


datasets:[{


label:'AI Score',


data:[


{{ $analysis['economy'] }},

{{ $analysis['currency'] }},

{{ $analysis['weather'] }},

{{ $analysis['news'] }},

{{ $analysis['port'] }},

{{ $analysis['risk'] }}


]


}]


},


options:{


responsive:true


}



}

);


</script>


@endpush




<style>


.recommend-detail-header{


background:

linear-gradient(

135deg,

#2563eb,

#38bdf8

);


padding:45px;

border-radius:30px;

color:white;


}


.recommend-detail-header h1{


font-size:48px;

font-weight:800;


}



.detail-card{


background:white;

border-radius:25px;

padding:35px;

box-shadow:

0 15px 35px rgba(0,0,0,.08);


height:100%;


}



.score{


font-size:70px;

font-weight:900;

color:#2563eb;


}



.circle{


width:150px;

height:150px;

border-radius:50%;

margin:auto;


display:flex;

align-items:center;

justify-content:center;


font-size:40px;

font-weight:800;


background:#dbeafe;

color:#2563eb;


}



</style>