<div class="row g-4 mb-4">


{{-- ================= COUNTRY ================= --}}

<div class="col-lg-2 col-md-4">

<div class="card card-custom shadow-sm border-0 h-100">

<div class="card-body text-center">


<i class="bi bi-globe2 fs-1 text-primary"></i>


<h6 class="mt-3 text-muted">

Country

</h6>


<h4 class="fw-bold text-primary">

{{ $focusCountry->name ?? '-' }}

</h4>


<small class="text-muted">

{{ $focusCountry->region ?? 'Global Market' }}

</small>


</div>

</div>

</div>





{{-- ================= PORT ================= --}}

<div class="col-lg-2 col-md-4">

<div class="card card-custom shadow-sm border-0 h-100">

<div class="card-body text-center">


<i class="bi bi-anchor-fill fs-1 text-success"></i>


<h6 class="mt-3 text-muted">

Ports

</h6>


<h2 class="fw-bold text-success">

{{ $ports->count() }}

</h2>


<small>

Active Port

</small>


</div>

</div>

</div>






{{-- ================= VESSEL ================= --}}

<div class="col-lg-2 col-md-4">

<div class="card card-custom shadow-sm border-0 h-100">

<div class="card-body text-center">


<i class="bi bi-water fs-1 text-info"></i>


<h6 class="mt-3 text-muted">

Vessel

</h6>


<h2 class="fw-bold text-info">

{{ $vessels->count() }}

</h2>


<small>

Tracked Ships

</small>


</div>

</div>

</div>






{{-- ================= RISK ================= --}}

<div class="col-lg-2 col-md-4">

<div class="card card-custom shadow-sm border-0 h-100">

<div class="card-body text-center">


<i class="bi bi-shield-exclamation fs-1 text-danger"></i>


<h6 class="mt-3 text-muted">

Risk Score

</h6>



<h2 class="fw-bold 
@if(($risk['score'] ?? 0) > 70)
text-danger
@elseif(($risk['score'] ?? 0) > 40)
text-warning
@else
text-success
@endif
">

{{ $risk['score'] ?? 0 }}/100

</h2>


<small>

{{ $risk['level'] ?? 'LOW' }}

</small>


</div>

</div>

</div>






{{-- ================= WEATHER ================= --}}

<div class="col-lg-2 col-md-4">

<div class="card card-custom shadow-sm border-0 h-100">

<div class="card-body text-center">


<i class="bi bi-cloud-sun-fill fs-1 text-warning"></i>


<h6 class="mt-3 text-muted">

Weather

</h6>



<h2 class="fw-bold text-warning">

@if(isset($weather['current']))

LIVE

@else

-

@endif

</h2>


<small>

{{ $focusCountry->name ?? '-' }}

</small>


</div>

</div>

</div>







{{-- ================= AI ================= --}}

<div class="col-lg-2 col-md-4">

<div class="card card-custom shadow-sm border-0 h-100">

<div class="card-body text-center">


<i class="bi bi-cpu-fill fs-1 text-secondary"></i>


<h6 class="mt-3 text-muted">

AI Engine

</h6>


<h2 class="fw-bold text-success">

ACTIVE

</h2>


<small>

Risk Intelligence

</small>


</div>

</div>

</div>


</div>