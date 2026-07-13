<div class="card card-custom shadow-sm border-0 h-100">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                📰 Latest Global News

            </h4>

            <span class="badge bg-primary">

                {{ count($news) }}

            </span>

        </div>

    </div>

    <div class="card-body">

        @forelse($news as $article)

            <div class="mb-4">

                <a
                    href="{{ $article['url'] ?? '#' }}"
                    target="_blank"
                    class="fw-bold text-decoration-none">

                    {{ $article['title'] ?? '-' }}

                </a>

                <br>

                <small class="text-muted">

                    {{ $article['source']['name'] ?? 'Unknown Source' }}

                </small>

                <br>

                <small class="text-secondary">

                    {{ isset($article['publishedAt'])
                        ? \Carbon\Carbon::parse($article['publishedAt'])->format('d M Y H:i')
                        : '-'
                    }}

                </small>

            </div>

            @if(!$loop->last)

                <hr>

            @endif

        @empty

            <div class="alert alert-warning mb-0">

                No news available.

            </div>

        @endforelse

    </div>

</div>