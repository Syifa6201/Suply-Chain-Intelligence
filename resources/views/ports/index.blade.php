@extends('layouts.app')

@section('content')

<h2 class="mb-4">

    ⚓ Port Intelligence

</h2>

<div class="card card-custom p-4">

<table class="table table-hover align-middle">

<thead>

<tr>

<th>Port</th>

<th>Country</th>

<th>Status</th>

<th>Congestion</th>

<th>Capacity</th>

</tr>

</thead>

<tbody>

@foreach($ports as $port)

<tr>

<td>

{{ $port->name }}

</td>

<td>

{{ $port->country->name }}

</td>

<td>

@if($port->status=='Normal')

<span class="badge bg-success">

Normal

</span>

@elseif($port->status=='Delay')

<span class="badge bg-warning text-dark">

Delay

</span>

@else

<span class="badge bg-danger">

Congested

</span>

@endif

</td>

<td>

{{ $port->congestion }}%

</td>

<td>

{{ number_format($port->capacity) }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection