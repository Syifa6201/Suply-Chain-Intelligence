@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">

        <a
            href="{{ route('news.index') }}"
            class="btn btn-outline-secondary rounded-pill">

            ← Back to News

        </a>

    </div>

    <div class="card shadow border-0 rounded-4 overflow-hidden">

        @if($article->image)

            <img
                src="{{ asset('storage/'.$article->image) }}"
                class="img-fluid"
                style="max-height:450px;object-fit:cover;">

        @else

            <img
                src="https://placehold.co/1200x450?text=SupplyChain+AI"
                class="img-fluid">

        @endif


        <div class="card-body p-5">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <span class="badge bg-primary fs-6">

                    {{ $article->category }}

                </span>

                <span class="badge bg-success">

                    {{ $article->status }}

                </span>

            </div>


            <h1 class="fw-bold mb-3">

                {{ $article->title }}

            </h1>


            <div class="text-muted mb-4">

                <i class="bi bi-person-circle"></i>

                {{ optional($article->author)->name ?? 'Administrator' }}

                &nbsp;&nbsp;|&nbsp;&nbsp;

                <i class="bi bi-calendar-event"></i>

                {{ $article->created_at->format('d M Y') }}

            </div>


            <hr>

            <div
                class="mt-4"
                style="font-size:17px;line-height:2;text-align:justify;">

                {!! nl2br(e($article->content)) !!}

            </div>

        </div>

    </div>

</div>

@endsection