@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    <i class="bi bi-globe-americas"></i>
    Global Monitor
</h2>

@include('global.partials.stats')

@include('global.partials.map')

@include('global.partials.weather')

@include('global.partials.news')

@endsection