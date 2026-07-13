@extends('layouts.app')


@section('content')


<div class="container-fluid">


{{-- ================= HEADER ================= --}}

<div class="news-header mb-4">


<div>

<h1 class="fw-bold">

📰 News Intelligence

</h1>


<p class="text-muted">

Global Supply Chain News Monitoring & AI Sentiment Analysis

</p>


</div>



<div class="news-actions">


<form method="GET" action="/news">


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

$selectedCountry==$country->name

?'selected'

:''

}}

>

🌍 {{ $country->name }}

</option>


@endforeach



</select>


</div>


</form>



<span class="live-badge">

● LIVE NEWS

</span>



</div>



</div>








{{-- ================= SENTIMENT KPI ================= --}}


<div class="row g-4 mb-4">



<div class="col-xl-3 col-md-6">


<div class="news-card positive">


<div class="news-icon">

😊

</div>


<h6>

Positive

</h6>


<h1>

{{ $positivePercent }}%

</h1>


<p>

Market Optimistic

</p>


</div>


</div>






<div class="col-xl-3 col-md-6">


<div class="news-card neutral">


<div class="news-icon">

😐

</div>


<h6>

Neutral

</h6>


<h1>

{{ $neutralPercent }}%

</h1>


<p>

Normal Condition

</p>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="news-card negative">


<div class="news-icon">

⚠️

</div>


<h6>

Negative

</h6>


<h1>

{{ $negativePercent }}%

</h1>


<p>

Risk Monitoring

</p>


</div>


</div>







<div class="col-xl-3 col-md-6">


<div class="news-card total">


<div class="news-icon">

📰

</div>


<h6>

Total News

</h6>


<h1>

{{ $totalNews }}

</h1>


<p>

Articles Detected

</p>


</div>


</div>



</div>









{{-- ================= CHART + AI ================= --}}


<div class="row g-4 mb-4">



<div class="col-lg-8">


<div class="card-custom p-4">


<div class="d-flex justify-content-between">


<h4>

📊 Sentiment Analysis

</h4>


<span class="live-badge">

LIVE

</span>


</div>


<hr>


<div style="height:350px">

<canvas id="sentimentChart"></canvas>

</div>



</div>


</div>







<div class="col-lg-4">


<div class="card-custom p-4">


<h4>

🤖 AI News Analysis

</h4>


<hr>



<div class="ai-panel">


<h6>

Overall Sentiment

</h6>



<h3>

{{ $overallSentiment }}

</h3>



</div>





@if($overallSentiment=="Positive")


<div class="alert alert-success mt-3">


Market condition positive.

Trade activities can continue normally.


</div>


@elseif($overallSentiment=="Negative")


<div class="alert alert-danger mt-3">


Negative events detected.

Monitor logistics risk.


</div>



@else


<div class="alert alert-warning mt-3">


Market condition neutral.

Continue monitoring.


</div>



@endif



</div>


</div>



</div>









{{-- ================= BREAKING NEWS ================= --}}



@if($breakingNews)


<div class="breaking-card mb-4">


<div class="d-flex justify-content-between">


<h3>

🚨 Breaking News

</h3>


<span class="badge bg-danger">

URGENT

</span>


</div>



<hr>


<h5>

{{ $breakingNews['title'] }}

</h5>



<p>

{{ $breakingNews['description'] }}

</p>



<a

href="{{ $breakingNews['url'] }}"

target="_blank"

class="btn btn-danger rounded-pill">

Read Full News

</a>


</div>


@endif







{{-- ================= NEWS LIST ================= --}}


<div class="card-custom p-4">


<div class="d-flex justify-content-between mb-3">


<h3>

🌐 Latest Intelligence News

</h3>


<span class="live-badge">

{{ $totalNews }} Articles

</span>


</div>



<hr>




@forelse($results as $news)

<div class="news-item">

<div class="row align-items-center">


<div class="col-lg-2">


@if(!empty($news['image']))

<img
src="{{ $news['image'] }}"
class="news-image">


@else

<img
src="https://placehold.co/300x200?text=News"
class="news-image">


@endif


</div>




<div class="col-lg-8">


<h5>

{{ $news['title'] ?? 'No Title' }}

</h5>



<p class="text-muted">

{{ $news['description'] ?? '-' }}

</p>




<small>


{{ $news['source'] ?? 'Unknown Source' }}


@if(!empty($news['date']))

•

{{ \Carbon\Carbon::parse($news['date'])->format('d M Y H:i') }}

@endif


</small>


</div>





<div class="col-lg-2 text-end">


@if(isset($news['badge']))


<span class="badge bg-{{ $news['badge'] }}">

{{ $news['sentiment'] }}

</span>


@endif



<br><br>



@if(!empty($news['url']))


<a

href="{{ $news['url'] }}"

target="_blank"

class="btn btn-outline-primary btn-sm rounded-pill">

Read

</a>


@endif



</div>



</div>


</div>



@empty


<div class="alert alert-warning">

No news available.

</div>



@endforelse


</div>



</div>


@endsection







@push('scripts')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


new Chart(

document.getElementById('sentimentChart'),

{


type:'doughnut',


data:{


labels:[

'Positive',
'Neutral',
'Negative'

],


datasets:[{


data:[

{{$positivePercent}},

{{$neutralPercent}},

{{$negativePercent}}

]


}]


},



options:{


responsive:true,


maintainAspectRatio:false,


plugins:{


legend:{


position:'bottom'


}


}


}


}


);


</script>


@endpush








<style>


.news-header{


display:flex;


justify-content:space-between;


align-items:center;


}



.news-actions{


display:flex;


gap:15px;


align-items:center;


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




.live-badge{


background:#dcfce7;


color:#15803d;


padding:10px 20px;


border-radius:50px;


font-weight:700;


}





.news-card{


background:white;


padding:30px;


border-radius:25px;


height:210px;


box-shadow:

0 15px 35px rgba(15,23,42,.08);


}



.news-icon{


font-size:35px;

}



.news-card h1{


font-size:42px;

font-weight:800;


}



.positive{

border-left:6px solid #16a34a;

}


.neutral{

border-left:6px solid #eab308;

}


.negative{

border-left:6px solid #dc2626;

}


.total{

border-left:6px solid #2563eb;

}





.breaking-card{


background:white;


padding:30px;


border-radius:25px;


border-left:8px solid #dc2626;


box-shadow:

0 15px 35px rgba(0,0,0,.08);


}




.news-item{


padding:20px 0;


border-bottom:1px solid #e2e8f0;


}



.news-image{


width:100%;


height:120px;


object-fit:cover;


border-radius:15px;


}




.ai-panel{


background:#eff6ff;


padding:20px;


border-radius:20px;


}


</style>