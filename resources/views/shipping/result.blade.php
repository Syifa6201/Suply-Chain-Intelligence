@extends('layouts.dashboard')

@section('title','Shipping Result')

@section('content')

<div class="container-fluid">

<div class="row">

<div class="col-lg-12">

<div class="card shadow">

<div class="card-header">

<h4>

Shipping Plan

</h4>

</div>

<div class="card-body">

<table class="table">

<tr>

<th>Origin Country</th>

<td>{{ $result['origin_country']->name }}</td>

</tr>

<tr>

<th>Destination Country</th>

<td>{{ $result['destination_country']->name }}</td>

</tr>

<tr>

<th>Origin Port</th>

<td>{{ $result['origin_port']->port_name }}</td>

</tr>

<tr>

<th>Destination Port</th>

<td>{{ $result['destination_port']->port_name }}</td>

</tr>

<tr>

<th>Estimated Distance</th>

<td>{{ $result['distance'] }} km</td>

</tr>

<tr>

<th>Estimated Time</th>

<td>{{ $result['estimated_days'] }} Days</td>

</tr>

<tr>

<th>Estimated Cost</th>

<td>USD {{ number_format($result['estimated_cost'],2) }}</td>

</tr>

<tr>

<th>Shipping Score</th>

<td>

{{ $result['shipping_score'] }}/100

</td>

</tr>

</table>

</div>

</div>

</div>

</div>

</div>

@endsection