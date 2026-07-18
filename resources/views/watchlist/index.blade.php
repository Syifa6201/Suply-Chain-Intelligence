@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- ========================================= --}}
    {{-- HEADER --}}
    {{-- ========================================= --}}

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h1 class="fw-bold mb-1">

                ⭐ My Watchlist

            </h1>

            <p class="text-muted mb-0">

                Monitor your favorite countries and receive real-time supply chain intelligence.

            </p>

        </div>

        <a href="{{ url('/countries') }}"
           class="btn btn-primary rounded-pill px-4">

            <i class="bi bi-plus-circle me-2"></i>

            Add Country

        </a>

    </div>



    {{-- ========================================= --}}
    {{-- KPI --}}
    {{-- ========================================= --}}

    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">

            <div class="watch-kpi">

                <div class="watch-icon bg-primary">

                    <i class="bi bi-globe2"></i>

                </div>

                <div>

                    <small>Total Countries</small>

                    <h2>

                        {{ $watchlists->count() }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="watch-kpi">

                <div class="watch-icon bg-success">

                    <i class="bi bi-geo-alt-fill"></i>

                </div>

                <div>

                    <small>Total Ports</small>

                    <h2>

                        {{ $totalPorts }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="watch-kpi">

                <div class="watch-icon bg-warning">

                    <i class="bi bi-map-fill"></i>

                </div>

                <div>

                    <small>Regions</small>

                    <h2>

                        {{ $regions->count() }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="watch-kpi">

                <div class="watch-icon bg-danger">

                    <i class="bi bi-star-fill"></i>

                </div>

                <div>

                    <small>Monitoring</small>

                    <h2>

                        Active

                    </h2>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================= --}}
    {{-- SEARCH --}}
    {{-- ========================================= --}}

    <div class="card card-custom mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3">

                    <div class="col-lg-5">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search country...">

                    </div>

                    <div class="col-lg-5">

                        <select
                            name="region"
                            class="form-select">

                            <option value="">

                                All Region

                            </option>

                            @foreach($regions as $region)

                                <option
                                    value="{{ $region }}"
                                    {{ request('region')==$region?'selected':'' }}>

                                    {{ $region }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-lg-2">

                        <button
                            class="btn btn-primary w-100">

                            <i class="bi bi-search me-2"></i>

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>



    {{-- ========================================= --}}
    {{-- ALERT --}}
    {{-- ========================================= --}}

    @if(session('success'))

        <div class="alert alert-success">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif



    @if(session('warning'))

        <div class="alert alert-warning">

            <i class="bi bi-exclamation-circle-fill me-2"></i>

            {{ session('warning') }}

        </div>

    @endif

    {{-- ========================================= --}}
{{-- WATCHLIST CARD --}}
{{-- ========================================= --}}

@if($watchlists->count())

<div class="row g-4">

@foreach($watchlists as $watchlist)

<div class="col-xl-4 col-lg-6">

<div class="watch-card">

<div class="d-flex justify-content-between align-items-start mb-4">

<div class="d-flex align-items-center">

@if($watchlist->country->flag)

<img
src="{{ $watchlist->country->flag }}"
class="country-flag">

@else

<div class="flag-placeholder">

🌍

</div>

@endif

<div class="ms-3">

<h4 class="fw-bold mb-1">

{{ $watchlist->country->name }}

</h4>

<div class="d-flex gap-2">

<span class="badge bg-primary">

{{ $watchlist->country->code }}

</span>

<span class="badge bg-success">

{{ $watchlist->country->region }}

</span>

</div>

</div>

</div>

<div>

<i class="bi bi-star-fill text-warning fs-2"></i>

</div>

</div>



<div class="row g-3">

<div class="col-6">

<div class="info-card">

<small>Capital</small>

<h6>

{{ $watchlist->country->capital ?: '-' }}

</h6>

</div>

</div>



<div class="col-6">

<div class="info-card">

<small>Currency</small>

<h6>

{{ $watchlist->country->currency ?: '-' }}

</h6>

</div>

</div>



<div class="col-6">

<div class="info-card">

<small>Language</small>

<h6>

{{ $watchlist->country->language ?: '-' }}

</h6>

</div>

</div>



<div class="col-6">

<div class="info-card">

<small>Ports</small>

<h6>

{{ $watchlist->country->ports->count() }}

</h6>

</div>

</div>



<div class="col-6">

<div class="info-card">

<small>Latitude</small>

<h6>

{{ $watchlist->country->latitude }}

</h6>

</div>

</div>



<div class="col-6">

<div class="info-card">

<small>Longitude</small>

<h6>

{{ $watchlist->country->longitude }}

</h6>

</div>

</div>

</div>



<hr>



<div class="d-flex justify-content-between align-items-center mb-3">

<div>

<small class="text-muted">

Added

</small>

<div class="fw-semibold">

{{ $watchlist->created_at->format('d M Y') }}

</div>

</div>

<div>

<span class="badge bg-warning text-dark">

Watching

</span>

</div>

</div>



<div class="d-grid gap-2">

<a
href="{{ route('country.show',$watchlist->country->code) }}"
class="btn btn-primary">

<i class="bi bi-bar-chart-line-fill me-2"></i>

View Intelligence

</a>



<form
method="POST"
action="{{ route('watchlist.destroy',$watchlist) }}">

@csrf

@method('DELETE')

<button
class="btn btn-outline-danger w-100"
onclick="return confirm('Remove {{ $watchlist->country->name }}?')">

<i class="bi bi-trash3 me-2"></i>

Remove Watchlist

</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

@else

<div class="empty-watchlist">

<div class="mb-4">

<i class="bi bi-star display-1 text-warning"></i>

</div>

<h2 class="fw-bold">

No Country in Watchlist

</h2>

<p class="text-muted">

You haven't added any country yet.

Start monitoring countries to receive logistics, economy,
currency, weather and risk information.

</p>

<a
href="{{ url('/countries') }}"
class="btn btn-primary rounded-pill px-4">

<i class="bi bi-globe2 me-2"></i>

Explore Countries

</a>

</div>

@endif

<style>

/* =====================================================
WATCHLIST HEADER
===================================================== */

.watch-header{

display:flex;

justify-content:space-between;

align-items:center;

flex-wrap:wrap;

gap:20px;

margin-bottom:25px;

}


/* =====================================================
KPI
===================================================== */

.watch-kpi{

background:#fff;

border-radius:22px;

padding:25px;

display:flex;

align-items:center;

gap:18px;

box-shadow:0 15px 35px rgba(15,23,42,.08);

transition:.35s;

height:100%;

border:1px solid #edf2f7;

}

.watch-kpi:hover{

transform:translateY(-8px);

box-shadow:0 25px 45px rgba(14,165,233,.18);

}

.watch-icon{

width:70px;

height:70px;

border-radius:18px;

display:flex;

align-items:center;

justify-content:center;

color:#fff;

font-size:28px;

}

.watch-kpi h2{

margin:0;

font-size:30px;

font-weight:800;

color:#0f172a;

}

.watch-kpi small{

color:#64748b;

}


/* =====================================================
CARD
===================================================== */

.watch-card{

background:white;

border-radius:24px;

padding:24px;

border:1px solid #e5e7eb;

box-shadow:0 15px 35px rgba(15,23,42,.08);

transition:.35s;

height:100%;

}

.watch-card:hover{

transform:translateY(-10px);

border-color:#38bdf8;

box-shadow:0 25px 55px rgba(14,165,233,.18);

}


/* =====================================================
FLAG
===================================================== */

.country-flag{

width:72px;

height:52px;

object-fit:cover;

border-radius:12px;

box-shadow:0 10px 20px rgba(0,0,0,.15);

}

.flag-placeholder{

width:72px;

height:52px;

display:flex;

align-items:center;

justify-content:center;

border-radius:12px;

background:#f1f5f9;

font-size:30px;

}


/* =====================================================
INFO
===================================================== */

.info-card{

background:#f8fafc;

border-radius:16px;

padding:14px;

text-align:center;

height:100%;

border:1px solid #e2e8f0;

}

.info-card small{

color:#64748b;

display:block;

margin-bottom:5px;

}

.info-card h6{

margin:0;

font-weight:700;

color:#0f172a;

}


/* =====================================================
BUTTON
===================================================== */

.watch-card .btn{

border-radius:14px;

padding:11px;

font-weight:600;

}


/* =====================================================
BADGE
===================================================== */

.badge{

border-radius:40px;

padding:8px 14px;

font-weight:600;

}


/* =====================================================
EMPTY
===================================================== */

.empty-watchlist{

background:#fff;

padding:90px;

border-radius:24px;

text-align:center;

box-shadow:0 15px 35px rgba(15,23,42,.08);

border:1px solid #e2e8f0;

}

.empty-watchlist h2{

font-weight:800;

margin-bottom:15px;

}

.empty-watchlist p{

max-width:600px;

margin:auto;

margin-bottom:25px;

}


/* =====================================================
ANIMATION
===================================================== */

.watch-card,
.watch-kpi{

animation:fadeUp .4s ease;

}

@keyframes fadeUp{

from{

opacity:0;

transform:translateY(20px);

}

to{

opacity:1;

transform:none;

}

}


/* =====================================================
RESPONSIVE
===================================================== */

@media(max-width:992px){

.watch-header{

flex-direction:column;

align-items:flex-start;

}

}

@media(max-width:768px){

.country-flag{

width:60px;

height:45px;

}

.watch-kpi{

padding:18px;

}

.watch-card{

padding:18px;

}

.empty-watchlist{

padding:45px 25px;

}

}

</style>

@endsection