@extends('layouts.app')


@section('content')


<div class="container-fluid">


<h1 class="fw-bold mb-2">

⚙️ Admin Dashboard

</h1>


<p class="text-muted">

SupplyChain AI Management Center

</p>




<div class="row g-4 mt-4">


<div class="col-md-4">

<div class="kpi-card">


<h6>
👥 Total Users
</h6>


<h1>

{{$totalUsers}}

</h1>


</div>

</div>




<div class="col-md-4">

<div class="kpi-card">


<h6>
⚓ Total Ports
</h6>


<h1>

{{$totalPorts}}

</h1>


</div>

</div>





<div class="col-md-4">

<div class="kpi-card">


<h6>
🌍 Total Countries
</h6>


<h1>

{{$totalCountries}}

</h1>


</div>

</div>


</div>




<div class="row g-4 mt-5">


<div class="col-md-4">


<a href="{{route('users.index')}}" class="dashboard-menu">


👥

User Management


</a>


</div>



<div class="col-md-4">


<a href="#" class="dashboard-menu">


⚓

Port Dataset


</a>


</div>




<div class="col-md-4">


<a href="#" class="dashboard-menu">


📰

Article Analysis


</a>


</div>



</div>



</div>


@endsection