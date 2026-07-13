@extends('layouts.app')

@section('content')

{{-- ================= NEWS TICKER ================= --}}

@include('global.partials.news-ticker')


{{-- ================= HEADER ================= --}}

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            🌍 Global Supply Chain Intelligence

        </h2>

        <p class="text-muted mb-0">

            Real-time Monitoring for Global Trade, Logistics, Economy, Weather, News and AI Risk

        </p>

    </div>

    <div>

        <span class="badge bg-success fs-6 px-3 py-2">

            ● LIVE

        </span>

    </div>

</div>


{{-- ================= SEARCH ================= --}}

@include('global.partials.search')


{{-- ================= COUNTRY PREVIEW ================= --}}

@include('global.partials.country-preview')


{{-- ================= SUMMARY ================= --}}

@include('global.partials.summary')


{{-- ================= MAP ================= --}}

@include('global.partials.map', [
    'vessels'=>$vessels
])


{{-- ================= WEATHER & NEWS ================= --}}

<div class="row g-4 mt-1">

    <div class="col-lg-6">

        @include('global.partials.weather')

    </div>

    <div class="col-lg-6">

        @include('global.partials.news')

    </div>

</div>


{{-- ================= CHART & TOP RISK ================= --}}

<div class="row g-4 mt-1">

    <div class="col-lg-8">

        @include('global.partials.charts')

    </div>

    <div class="col-lg-4">

        @include('global.partials.top-risk')

    </div>

</div>


{{-- ================= RECENT ACTIVITY & AI ================= --}}

<div class="row g-4 mt-1">

    <div class="col-lg-6">

        @include('global.partials.recent-activity')

    </div>

    <div class="col-lg-6">

        @include('global.partials.ai-summary')

    </div>

</div>


{{-- ================= API STATUS ================= --}}

<div class="row mt-4">

    <div class="col-12">

        @include('global.partials.api-status')

    </div>

</div>

@endsection