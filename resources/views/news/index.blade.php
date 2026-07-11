@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            📰 News Intelligence
        </h2>

        <small class="text-muted">
            Global Supply Chain News Monitoring
        </small>

    </div>

    <span class="badge bg-success fs-6">
        LIVE
    </span>

</div>


<form method="GET" class="mb-4">

    <div class="row">

        <div class="col-lg-4">

            <label class="form-label fw-semibold">

                Select Country

            </label>

            <select
                name="country"
                class="form-select"
                onchange="this.form.submit()">

                @foreach($countries as $country)

                    <option
                        value="{{ $country->name }}"
                        {{ $selectedCountry==$country->name ? 'selected' : '' }}>

                        {{ $country->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

</form>


<div class="row g-4 mb-4">

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6 class="text-success">

                Positive

            </h6>

            <h1 class="text-success">

                {{ $positivePercent }}%

            </h1>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6 class="text-warning">

                Neutral

            </h6>

            <h1 class="text-warning">

                {{ $neutralPercent }}%

            </h1>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6 class="text-danger">

                Negative

            </h6>

            <h1 class="text-danger">

                {{ $negativePercent }}%

            </h1>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6>

                Total News

            </h6>

            <h1 class="text-primary">

                {{ $totalNews }}

            </h1>

        </div>

    </div>

</div>



<div class="row mb-4">

    <div class="col-lg-8">

        <div class="card card-custom p-4 h-100">

            <div class="d-flex justify-content-between">

                <h4>

                    📊 News Sentiment

                </h4>

                <span class="badge bg-primary">

                    LIVE

                </span>

            </div>

            <hr>

            <canvas id="sentimentChart" height="120"></canvas>

        </div>

    </div>



    <div class="col-lg-4">

        <div class="card card-custom p-4 h-100">

            <h4>

                🤖 AI Analysis

            </h4>

            <hr>

            <h5>

                Overall

            </h5>

            @if($overallSentiment=="Positive")

                <div class="alert alert-success">

                    Market condition is relatively positive.

                    Export activities can continue normally.

                </div>

            @elseif($overallSentiment=="Negative")

                <div class="alert alert-danger">

                    Many negative events detected.

                    Monitor logistics carefully.

                </div>

            @else

                <div class="alert alert-warning">

                    Market condition is neutral.

                    Continue monitoring.

                </div>

            @endif

        </div>

    </div>

</div>



@if($breakingNews)

<div class="card card-custom p-4 mb-4 border-start border-danger border-5">

    <div class="d-flex justify-content-between">

        <h3>

            🚨 Breaking News

        </h3>

        <span class="badge bg-danger">

            BREAKING

        </span>

    </div>

    <hr>

    <h5>

        {{ $breakingNews['title'] }}

    </h5>

    <p>

        {{ $breakingNews['description'] }}

    </p>

    <a
        href="{{ $breakingNews['url'] }}"
        target="_blank"
        class="btn btn-danger">

        Read Full News

    </a>

</div>

@endif



<div class="card card-custom p-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>

            📰 Latest News

        </h3>

        <span class="badge bg-primary">

            {{ $totalNews }} Articles

        </span>

    </div>

    <hr>

    @forelse($results as $news)

    <div class="row align-items-center mb-4">

        <div class="col-lg-2">

            @if($news['image'])

                <img
                    src="{{ $news['image'] }}"
                    class="img-fluid rounded">

            @else

                <img
                    src="https://placehold.co/300x200?text=News"
                    class="img-fluid rounded">

            @endif

        </div>

        <div class="col-lg-8">

            <h5>

                {{ $news['title'] }}

            </h5>

            <p class="text-muted">

                {{ $news['description'] }}

            </p>

            <small>

                {{ $news['source'] }}

                •

                {{ \Carbon\Carbon::parse($news['date'])->format('d M Y H:i') }}

            </small>

        </div>

        <div class="col-lg-2 text-end">

            <span class="badge bg-{{ $news['badge'] }}">

                {{ $news['sentiment'] }}

            </span>

            <br><br>

            <a
                href="{{ $news['url'] }}"
                target="_blank"
                class="btn btn-outline-primary btn-sm">

                Read

            </a>

        </div>

    </div>

    <hr>

    @empty

        <div class="alert alert-warning">

            No news available.

        </div>

    @endforelse

</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('sentimentChart'),{

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

            ]

        }]

    },

    options:{

        responsive:true,

        plugins:{

            legend:{

                position:'bottom'

            }

        }

    }

});

</script>

@endsection