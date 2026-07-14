@extends('layouts.app')


@section('content')


<div class="container">


<h2 class="fw-bold mb-4">

Tambah Port Dataset

</h2>



<div class="card p-4 shadow-sm">


<form method="POST"

action="{{route('ports.store')}}">


@csrf



<div class="row g-3">


<div class="col-md-6">

<label>

Port Name

</label>

<input

name="name"

class="form-control"

required>

</div>



<div class="col-md-6">


<label>

Country

</label>


<select

name="country_id"

class="form-select"

required>


<option value="">

Select Country

</option>



@foreach($countries as $country)


<option value="{{$country->id}}">

{{$country->name}}

</option>


@endforeach


</select>


</div>





<div class="col-md-6">


<label>

Latitude

</label>


<input

name="latitude"

class="form-control"

required>


</div>



<div class="col-md-6">


<label>

Longitude

</label>


<input

name="longitude"

class="form-control"

required>


</div>





<div class="col-md-6">


<label>

Terminal

</label>


<input

name="terminal"

class="form-control">


</div>



<div class="col-md-6">


<label>

Type

</label>


<input

name="type"

class="form-control"

placeholder="Container / Cargo">


</div>





<div class="col-md-6">


<label>

Capacity

</label>


<input

type="number"

name="capacity"

class="form-control">

</div>




<div class="col-md-6">


<label>

Congestion (%)

</label>


<input

type="number"

name="congestion"

class="form-control">


</div>




<div class="col-md-6">


<label>

Status

</label>


<select

name="status"

class="form-select">


<option value="Normal">

Normal

</option>


<option value="Delay">

Delay

</option>


<option value="Critical">

Critical

</option>


</select>


</div>




<div class="col-md-6">


<label>

Risk Score

</label>


<input

type="number"

name="risk_score"

class="form-control">


</div>



</div>



<button class="btn btn-primary mt-4">

Save Port

</button>


</form>


</div>


</div>


@endsection