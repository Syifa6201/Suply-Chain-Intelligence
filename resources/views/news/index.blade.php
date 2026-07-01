@extends('layouts.app')

@section('content')

<div class="row g-4 mb-4">

    <div class="col-lg-4 col-md-6">
        <div class="card card-custom p-4 text-center">
            <h6 class="text-success">Positive News</h6>
            <h1 class="text-success">{{ $positivePercent }}%</h1>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card card-custom p-4 text-center">
            <h6 class="text-warning">Neutral News</h6>
            <h1 class="text-warning">{{ $neutralPercent }}%</h1>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card card-custom p-4 text-center">
            <h6 class="text-danger">Negative News</h6>
            <h1 class="text-danger">{{ $negativePercent }}%</h1>
        </div>
    </div>

</div>

<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Live News Intelligence</h3>
        <span class="badge bg-primary px-3 py-2 me-3">Realtime</span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th width="45%">News</th>
                    <th>Source</th>
                    <th>Date</th>
                    <th>Sentiment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $news)
                <tr>
                    <td class="news-title">{{ $news['title'] }}</td>
                    <td>{{ $news['source'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($news['date'])->format('d M Y H:i') }}</td>
                    <td>
                        @if($news['sentiment'] == 'Positive')
                            <span class="badge bg-success">Positive</span>
                        @elseif($news['sentiment'] == 'Negative')
                            <span class="badge bg-danger">Negative</span>
                        @else
                            <span class="badge bg-warning text-dark">Neutral</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection