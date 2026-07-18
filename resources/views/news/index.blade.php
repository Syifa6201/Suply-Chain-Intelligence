@extends('layouts.app')

@section('content')

@php
use Illuminate\Support\Str;
@endphp

<div class="container-fluid">

    <!-- ========================= HEADER ========================= -->

    <div class="news-header">

        <div>

            <h1>
                🌍 Global News Intelligence
            </h1>

            <p>
                Real-time Supply Chain Monitoring & Expert Trade Analysis
            </p>

        </div>

        <div class="header-right">

            <form method="GET" action="{{ route('news.index') }}">

                <div class="country-box">

                    <i class="bi bi-search"></i>

                    <select
                        name="country"
                        class="form-select"
                        onchange="this.form.submit()">

                        <option value="">
                            Search Country...
                        </option>

                        @foreach($countries as $country)

                            <option
                                value="{{ $country->name }}"
                                {{ $selectedCountry==$country->name ? 'selected' : '' }}>

                                🌍 {{ $country->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </form>

            <span class="live-news">
                ● LIVE NEWS
            </span>

        </div>

    </div>



    <!-- ========================= KPI ========================= -->

    <div class="row g-4">

        <div class="col-xl-3 col-md-6">

            <div class="kpi-card positive">

                <div>

                    <h6>Positive News</h6>

                    <h2>{{ $positivePercent }}%</h2>

                    <p>Market Optimistic</p>

                </div>

                <div class="emoji">

                    😊

                </div>

            </div>

        </div>



        <div class="col-xl-3 col-md-6">

            <div class="kpi-card neutral">

                <div>

                    <h6>Neutral</h6>

                    <h2>{{ $neutralPercent }}%</h2>

                    <p>Normal Activity</p>

                </div>

                <div class="emoji">

                    😐

                </div>

            </div>

        </div>



        <div class="col-xl-3 col-md-6">

            <div class="kpi-card negative">

                <div>

                    <h6>Negative</h6>

                    <h2>{{ $negativePercent }}%</h2>

                    <p>Potential Risk</p>

                </div>

                <div class="emoji">

                    ⚠️

                </div>

            </div>

        </div>



        <div class="col-xl-3 col-md-6">

            <div class="kpi-card total">

                <div>

                    <h6>Total News</h6>

                    <h2>{{ $totalNews }}</h2>

                    <p>Articles Today</p>

                </div>

                <div class="emoji">

                    📰

                </div>

            </div>

        </div>

    </div>



    <!-- ========================= AI & CHART ========================= -->

    <div class="row mt-4 g-4">

        <div class="col-lg-8">

            <div class="intel-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4>

                            📊 News Sentiment Analysis

                        </h4>

                        <small class="text-muted">

                            AI sentiment distribution

                        </small>

                    </div>

                    <span class="badge bg-success">

                        LIVE

                    </span>

                </div>

                <hr>

                <div style="height:360px">

                    <canvas id="sentimentChart"></canvas>

                </div>

            </div>

        </div>



        <div class="col-lg-4">

            <div class="intel-card">

                <h4>

                    🤖 AI Trade Analysis

                </h4>

                <hr>

                <div class="ai-result">

                    <h6>

                        Overall Sentiment

                    </h6>

                    <h2>

                        {{ $overallSentiment }}

                    </h2>

                </div>

                @if($overallSentiment=='Positive')

                    <div class="alert alert-success mt-4">

                        <b>Recommendation</b>

                        <br>

                        Market conditions are favorable.
                        Export and import activities can continue normally.

                    </div>

                @elseif($overallSentiment=='Negative')

                    <div class="alert alert-danger mt-4">

                        <b>Recommendation</b>

                        <br>

                        Multiple negative events detected.
                        Monitor shipping routes and logistics risk.

                    </div>

                @else

                    <div class="alert alert-warning mt-4">

                        <b>Recommendation</b>

                        <br>

                        Market remains stable.
                        Continue monitoring supply chain updates.

                    </div>

                @endif

                <div class="mt-4">

                    <h6>

                        AI Confidence

                    </h6>

                    <div class="progress">

                        <div
                            class="progress-bar bg-primary"
                            style="width:92%">

                            92%

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

        <!-- ========================= BREAKING NEWS ========================= -->

    @if($breakingNews)

    <div class="breaking-news mt-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3>

                    🚨 Breaking News

                </h3>

                <small class="text-muted">

                    High Priority Global Supply Chain Intelligence

                </small>

            </div>

            <span class="badge bg-danger">

                URGENT

            </span>

        </div>

        <hr>

        <h4>

            {{ $breakingNews['title'] }}

        </h4>

        <p>

            {{ $breakingNews['description'] }}

        </p>

        @if(!empty($breakingNews['url']))

        <a
            href="{{ $breakingNews['url'] }}"
            target="_blank"
            class="btn btn-danger rounded-pill">

            Read Full Article

        </a>

        @endif

    </div>

    @endif





    <!-- ========================= LATEST NEWS ========================= -->

    <div class="intel-card mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold">

                    🌐 Latest Intelligence News

                </h3>

                <small class="text-muted">

                    Real-time news collected from international sources

                </small>

            </div>

            <span class="badge bg-primary">

                {{ $totalNews }} Articles

            </span>

        </div>


        @forelse($results as $news)

        <div class="news-row">

            <div class="row align-items-center">


                <div class="col-lg-3">

                    @if(!empty($news['image']))

                        <img
                            src="{{ $news['image'] }}"
                            class="news-thumb">

                    @else

                        <img
                            src="https://placehold.co/600x400?text=Supply+Chain"
                            class="news-thumb">

                    @endif

                </div>




                <div class="col-lg-7">


                    <span class="badge bg-secondary">

                        {{ $news['source'] ?? 'Unknown Source' }}

                    </span>


                    @if(!empty($news['date']))

                    <small class="text-muted ms-2">

                        {{ \Carbon\Carbon::parse($news['date'])->format('d M Y H:i') }}

                    </small>

                    @endif


                    <h4 class="mt-3">

                        {{ $news['title'] }}

                    </h4>


                    <p class="text-muted">

                        {{ $news['description'] }}

                    </p>

                </div>





                <div class="col-lg-2 text-end">

                    @if(isset($news['badge']))

                    <span class="badge bg-{{ $news['badge'] }} mb-3">

                        {{ $news['sentiment'] }}

                    </span>

                    @endif

                    <br>

                    @if(!empty($news['url']))

                    <a
                        href="{{ $news['url'] }}"
                        target="_blank"
                        class="btn btn-outline-primary rounded-pill">

                        Read

                    </a>

                    @endif

                </div>

            </div>

        </div>

        @empty

        <div class="alert alert-warning">

            No news available.

        </div>

        @endforelse

    </div>




    <!-- ========================= EXPERT ANALYSIS ========================= -->

    <div class="intel-card mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold">

                    🧠 Expert Trade Analysis

                </h3>

                <small class="text-muted">

                    Articles published by SupplyChain AI Analysts

                </small>

            </div>

            <span class="badge bg-success">

                {{ $expertArticles->count() }}

                Articles

            </span>

        </div>


        <div class="row">

            @forelse($expertArticles as $article)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="analysis-card h-100">

                    @if($article->image)

                    <img
                        src="{{ asset('storage/'.$article->image) }}"
                        class="analysis-image">

                    @else

                    <img
                        src="https://placehold.co/600x400?text=SupplyChain+AI"
                        class="analysis-image">

                    @endif


                    <div class="analysis-body">

                        <div class="d-flex justify-content-between">

                            <span class="badge bg-primary">

                                {{ $article->category }}

                            </span>

                            <span class="badge bg-success">

                                {{ $article->status }}

                            </span>

                        </div>


                        <h4 class="mt-3">

                            {{ $article->title }}

                        </h4>


                        <p>

                            {{ Str::limit(strip_tags($article->content),150) }}

                        </p>


                        <div class="d-flex justify-content-between mt-4">

                            <small>

                                👤

                                {{ optional($article->author)->name ?? 'Administrator' }}

                            </small>

                            <small>

                                {{ $article->created_at->format('d M Y') }}

                            </small>

                        </div>


                        <a
                            href="{{ route('articles.show',$article) }}"
                            class="btn btn-primary rounded-pill w-100 mt-4">

                            Read Analysis

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-info">

                    No expert analysis available.

                </div>

            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection

<style>

/* ===========================================
GENERAL
=========================================== */

body{

    background:#f8fafc;

    font-family:'Inter',sans-serif;

}

.container-fluid{

    padding:30px;

}

/* ===========================================
HEADER
=========================================== */

.news-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:wrap;

    gap:25px;

    margin-bottom:35px;

}

.news-header h1{

    font-size:38px;

    font-weight:800;

    color:#0f172a;

}

.news-header p{

    color:#64748b;

    margin-top:6px;

}

.header-right{

    display:flex;

    align-items:center;

    gap:15px;

    flex-wrap:wrap;

}

/* ===========================================
SEARCH
=========================================== */

.country-box{

    display:flex;

    align-items:center;

    background:#fff;

    padding:10px 18px;

    border-radius:50px;

    box-shadow:0 10px 30px rgba(15,23,42,.08);

}

.country-box i{

    color:#2563eb;

    margin-right:12px;

}

.country-box select{

    border:none;

    width:260px;

    box-shadow:none;

}

.country-box select:focus{

    box-shadow:none;

}

/* ===========================================
LIVE BADGE
=========================================== */

.live-news{

    background:#dcfce7;

    color:#15803d;

    padding:10px 20px;

    border-radius:50px;

    font-weight:700;

}

/* ===========================================
INTEL CARD
=========================================== */

.intel-card{

    background:white;

    border-radius:24px;

    padding:30px;

    box-shadow:0 15px 35px rgba(15,23,42,.08);

}

/* ===========================================
KPI
=========================================== */

.kpi-card{

    background:white;

    border-radius:24px;

    padding:30px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    min-height:180px;

    box-shadow:0 15px 35px rgba(15,23,42,.08);

    transition:.35s;

}

.kpi-card:hover{

    transform:translateY(-6px);

}

.kpi-card h6{

    color:#64748b;

}

.kpi-card h2{

    font-size:42px;

    font-weight:800;

}

.kpi-card p{

    color:#94a3b8;

}

.emoji{

    font-size:48px;

}

.positive{

    border-left:6px solid #16a34a;

}

.neutral{

    border-left:6px solid #eab308;

}

.negative{

    border-left:6px solid #dc2626;

}

.total{

    border-left:6px solid #2563eb;

}

/* ===========================================
AI PANEL
=========================================== */

.ai-result{

    background:linear-gradient(135deg,#eff6ff,#dbeafe);

    border-radius:20px;

    padding:25px;

    text-align:center;

}

.ai-result h2{

    font-size:36px;

    font-weight:800;

    color:#0284c7;

}

.progress{

    height:12px;

    border-radius:30px;

}

.progress-bar{

    font-size:11px;

    font-weight:700;

}

/* ===========================================
BREAKING
=========================================== */

.breaking-news{

    background:white;

    border-left:8px solid #dc2626;

    border-radius:24px;

    padding:30px;

    box-shadow:0 15px 35px rgba(15,23,42,.08);

}

.breaking-news h3{

    color:#dc2626;

    font-weight:800;

}

.breaking-news h4{

    margin-top:20px;

    font-weight:700;

}

/* ===========================================
LATEST NEWS
=========================================== */

.news-row{

    padding:25px 0;

    border-bottom:1px solid #e2e8f0;

}

.news-row:last-child{

    border-bottom:none;

}

.news-thumb{

    width:100%;

    height:180px;

    object-fit:cover;

    border-radius:18px;

    transition:.3s;

}

.news-thumb:hover{

    transform:scale(1.03);

}

.news-row h4{

    margin-top:15px;

    font-size:22px;

    font-weight:700;

}

.news-row p{

    color:#64748b;

    line-height:1.7;

}

/* ===========================================
ARTICLE
=========================================== */

.analysis-card{

    background:white;

    border-radius:24px;

    overflow:hidden;

    box-shadow:0 15px 35px rgba(15,23,42,.08);

    transition:.35s;

}

.analysis-card:hover{

    transform:translateY(-8px);

    box-shadow:0 25px 50px rgba(2,132,199,.15);

}

.analysis-image{

    width:100%;

    height:230px;

    object-fit:cover;

}

.analysis-body{

    padding:25px;

}

.analysis-body h4{

    font-size:22px;

    font-weight:700;

}

.analysis-body p{

    color:#64748b;

    line-height:1.8;

}

/* ===========================================
RESPONSIVE
=========================================== */

@media(max-width:992px){

.news-header{

flex-direction:column;

align-items:flex-start;

}

.header-right{

width:100%;

}

.country-box{

width:100%;

}

.country-box select{

width:100%;

}

.news-thumb{

height:220px;

}

}

@media(max-width:768px){

.container-fluid{

padding:15px;

}

.kpi-card{

margin-bottom:20px;

}

.intel-card{

padding:20px;

}

.news-row h4{

font-size:18px;

}

.analysis-image{

height:200px;

}

}

</style>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('sentimentChart');

    if(ctx){

        new Chart(ctx,{

            type:'doughnut',

            data:{

                labels:[

                    'Positive',

                    'Neutral',

                    'Negative'

                ],

                datasets:[{

                    data:[

                        {{ $positivePercent }},

                        {{ $neutralPercent }},

                        {{ $negativePercent }}

                    ],

                    backgroundColor:[

                        '#22c55e',

                        '#eab308',

                        '#ef4444'

                    ],

                    borderColor:[

                        '#ffffff',

                        '#ffffff',

                        '#ffffff'

                    ],

                    borderWidth:3,

                    hoverOffset:18

                }]

            },

            options:{

                responsive:true,

                maintainAspectRatio:false,

                cutout:'68%',

                animation:{

                    animateRotate:true,

                    animateScale:true,

                    duration:1800

                },

                plugins:{

                    legend:{

                        position:'bottom',

                        labels:{

                            usePointStyle:true,

                            pointStyle:'circle',

                            padding:25,

                            font:{

                                size:14,

                                weight:'bold'

                            }

                        }

                    },

                    tooltip:{

                        backgroundColor:'#0f172a',

                        titleColor:'#ffffff',

                        bodyColor:'#ffffff',

                        cornerRadius:12,

                        padding:14,

                        callbacks:{

                            label:function(context){

                                return context.label+' : '+context.raw+'%';

                            }

                        }

                    }

                }

            }

        });

    }

});

</script>

@endpush