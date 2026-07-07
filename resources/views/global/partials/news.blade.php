<div class="row mt-4">

    <div class="col-12">

        <div class="card card-custom p-4">

            <h4>

                <i class="bi bi-newspaper"></i>

                Latest Global News

            </h4>

            <hr>

            @foreach(($news['articles'] ?? []) as $article)

                @break($loop->index==5)

                <div class="mb-3">

                    <a href="{{ $article['url'] }}"
                       target="_blank"
                       class="fw-bold text-decoration-none">

                        {{ $article['title'] }}

                    </a>

                    <br>

                    <small class="text-muted">

                        {{ $article['source']['name'] }}

                    </small>

                </div>

            @endforeach

        </div>

    </div>

</div>