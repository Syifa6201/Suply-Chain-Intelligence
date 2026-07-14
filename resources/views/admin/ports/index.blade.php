@extends('layouts.app')


@section('content')


<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h1 class="fw-bold">

⚓ Port Dataset Management

</h1>


<p class="text-muted">

Kelola data pelabuhan global SupplyChain AI

</p>


</div>



<a href="{{route('ports.create')}}"
class="btn btn-primary">


+ Add Port


</a>


</div>





@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif






<div class="card shadow-sm border-0 p-4">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead>


<tr>


<th>
Port
</th>


<th>
Country
</th>


<th>
Type
</th>


<th>
Capacity
</th>


<th>
Congestion
</th>


<th>
Status
</th>


<th>
Risk
</th>


<th>
Action
</th>


</tr>


</thead>




<tbody>


@foreach($ports as $port)


<tr>


<td>

<b>

{{$port->name}}

</b>


<br>


<small class="text-muted">

{{$port->terminal ?? '-'}}

</small>


</td>



<td>

{{$port->country->name ?? '-'}}

</td>




<td>

{{$port->type ?? '-'}}

</td>




<td>

{{number_format($port->capacity)}}

</td>




<td width="180">


<div class="progress">


<div class="progress-bar"

style="width:{{$port->congestion}}%">


{{$port->congestion}}%


</div>


</div>


</td>




<td>


@if($port->status=="Normal")


<span class="badge bg-success">

Normal

</span>


@elseif($port->status=="Delay")


<span class="badge bg-warning text-dark">

Delay

</span>


@else


<span class="badge bg-danger">

Critical

</span>


@endif


</td>




<td>


<span class="badge bg-danger">

{{$port->risk_score}}

</span>


</td>





<td>


<a href="{{route('ports.edit',$port)}}"

class="btn btn-warning btn-sm">

Edit

</a>




<form action="{{route('ports.destroy',$port)}}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')


<button

class="btn btn-danger btn-sm"

onclick="return confirm('Hapus port ini?')"

>

Delete

</button>


</form>


</td>



</tr>


@endforeach



</tbody>


</table>


</div>


</div>


</div>


@endsection