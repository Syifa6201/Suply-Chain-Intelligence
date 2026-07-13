@extends('layouts.app')

@section('content')


@include('live-vessels.partials.header')

@include('live-vessels.partials.summary')

@include('live-vessels.partials.map')

@include('live-vessels.partials.statistics')

@include('live-vessels.partials.table')

@include('live-vessels.partials.ai-summary')

@endsection