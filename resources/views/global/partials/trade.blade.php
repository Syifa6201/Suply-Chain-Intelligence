<div class="card card-custom shadow-sm h-100">


<div class="card-header bg-white">

<h4 class="fw-bold mb-0">

📦 Trade Intelligence

</h4>

</div>


<div class="card-body">


@if($focusCountry)


<div class="row text-center g-3">


<div class="col-6">

<h6 class="text-muted">

Export Value

</h6>


<h3 class="fw-bold text-success">

${{ number_format(($trade['export'] ?? 0)/1000000000,2) }} B

</h3>


</div>




<div class="col-6">

<h6 class="text-muted">

Import Value

</h6>


<h3 class="fw-bold text-primary">

${{ number_format(($trade['import'] ?? 0)/1000000000,2) }} B

</h3>


</div>




<div class="col-12">


<hr>


<h6 class="text-muted">

Trade Balance

</h6>


<h2 class="fw-bold

@if(($trade['balance'] ?? 0)>=0)

text-success

@else

text-danger

@endif

">


${{ number_format(($trade['balance'] ?? 0)/1000000000,2) }} B


</h2>


<span class="badge bg-info">

{{ $trade['status'] }}

</span>


</div>


</div>


@else


<div class="text-center p-4">


<h5>

🌍 No Country Selected

</h5>


<p class="text-muted">

Select country to view trade intelligence

</p>


</div>


@endif


</div>


</div>