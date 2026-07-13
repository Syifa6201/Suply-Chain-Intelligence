<div class="card card-custom border-0 shadow-sm mb-4 overflow-hidden">

    <div class="card-body py-2">

        <div class="d-flex align-items-center">

            {{-- LABEL --}}
            <div class="me-3">

                <span class="badge bg-danger px-3 py-2">

                    🔴 LIVE NEWS

                </span>

            </div>

            {{-- NEWS TICKER --}}
            <div class="ticker-wrapper flex-grow-1">

                <div class="ticker">

                    @forelse($news as $item)

                        @php

                            /*
                            |--------------------------------------------------------------------------
                            | Sentiment (Default Neutral)
                            |--------------------------------------------------------------------------
                            */

                            $sentiment = $item['sentiment'] ?? 'Neutral';

                            switch($sentiment){

                                case 'Positive':

                                    $color = 'success';
                                    $icon = '🟢';

                                    break;

                                case 'Negative':

                                    $color = 'danger';
                                    $icon = '🔴';

                                    break;

                                default:

                                    $color = 'warning';
                                    $icon = '🟡';

                            }

                            /*
                            |--------------------------------------------------------------------------
                            | NewsAPI Format
                            |--------------------------------------------------------------------------
                            */

                            $title = $item['title'] ?? 'No Title';

                            $url = $item['url'] ?? '#';

                            $source = $item['source']['name'] ?? 'Unknown Source';

                            $date = '-';

                            if(!empty($item['publishedAt'])){

                                try{

                                    $date = \Carbon\Carbon::parse(
                                        $item['publishedAt']
                                    )->format('d M Y H:i');

                                }catch(\Exception $e){

                                    $date = '-';

                                }

                            }

                        @endphp


                        <a
                            href="{{ $url }}"
                            target="_blank"
                            class="text-decoration-none me-5">

                            <span class="badge bg-{{ $color }}">

                                {{ $icon }}

                                {{ $sentiment }}

                            </span>

                            <strong class="ms-2">

                                {{ $title }}

                            </strong>

                            <small class="text-muted ms-2">

                                (

                                {{ $source }}

                                •

                                {{ $date }}

                                )

                            </small>

                        </a>

                    @empty

                        <span class="text-muted">

                            No latest news available.

                        </span>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>


<style>

.ticker-wrapper{

    overflow:hidden;

    width:100%;

}

.ticker{

    display:inline-flex;

    align-items:center;

    white-space:nowrap;

    animation:tickerMove 45s linear infinite;

}

.ticker:hover{

    animation-play-state:paused;

}

.ticker a{

    color:inherit;

}

.ticker a:hover{

    color:#0d6efd;

}

@keyframes tickerMove{

    0%{

        transform:translateX(100%);

    }

    100%{

        transform:translateX(-100%);

    }

}

</style>