<div class="card card-custom shadow-sm">


<div class="card-header bg-white">

<h4 class="fw-bold mb-0">

🌍 Country Risk Overview

</h4>

</div>


<div class="card-body">


@if($focusCountry)


<div class="row text-center g-4">


<div class="col-md-3">

<h6 class="text-muted">
Risk Score
</h6>

<h2 class="fw-bold text-danger">

{{ $risk['score'] ?? 0 }}/100

</h2>

</div>



<div class="col-md-3">

<h6 class="text-muted">
Economy
</h6>

<h4 class="text-success">

@if(!empty($economy))

Stable

@else

-

@endif

</h4>

</div>




<div class="col-md-3">

<h6 class="text-muted">
Weather Impact
</h6>

<h4 class="text-info">

@if(!empty($weather))

Low

@else

-

@endif

</h4>

</div>




<div class="col-md-3">

<h6 class="text-muted">
News Sentiment
</h6>


<h4>

@if(count($news)>0)

Monitoring

@else

-

@endif

</h4>

</div>


</div>


<hr>


<div class="text-center">


<h5>

Supply Chain Status

</h5>


@if(($risk['level'] ?? '')=='HIGH')


<span class="badge bg-danger fs-5">
Critical
</span>


@elseif(($risk['level'] ?? '')=='MEDIUM')


<span class="badge bg-warning fs-5">
Monitor
</span>


@else


<span class="badge bg-success fs-5">
Stable
</span>


@endif


</div>


@else


<div class="text-center">

<h5>
No Country Selected
</h5>

</div>


@endif


</div>


</div>