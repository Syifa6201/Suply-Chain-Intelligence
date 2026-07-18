<div class="card card-custom shadow-sm border-0 news-card">


    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">


            <div>

                <h4 class="fw-bold mb-1">

                    📰 Latest Country News

                </h4>


                <small class="text-muted">

                    Supply Chain, Trade & Economic Intelligence

                </small>


            </div>



            <div class="text-end">

                <span class="badge bg-success">

                    ● LIVE

                </span>


                <br>


                <span class="badge bg-primary mt-2">

                    {{ count($news) }} Articles

                </span>


            </div>


        </div>


    </div>



    <div class="card-body news-container">



        @forelse($news as $article)



        @php

            $sentiment = $article['sentiment'] ?? 'Neutral';


            if($sentiment=='Positive'){

                $badge='success';

                $icon='bi-arrow-up-circle-fill';

            }

            elseif($sentiment=='Negative'){

                $badge='danger';

                $icon='bi-exclamation-triangle-fill';

            }

            else{

                $badge='secondary';

                $icon='bi-dash-circle-fill';

            }


        @endphp




        <div class="news-item mb-4">



            <div class="d-flex justify-content-between align-items-start">


                <span class="badge bg-{{ $badge }}">

                    <i class="bi {{ $icon }}"></i>

                    {{ $sentiment }}

                </span>


                <small class="text-muted">

                    {{ isset($article['publishedAt'])

                        ? \Carbon\Carbon::parse($article['publishedAt'])->format('d M Y H:i')

                        : '-'
                    }}

                </small>


            </div>



            <a
                href="{{ $article['url'] ?? '#' }}"
                target="_blank"
                class="news-title">


                {{ $article['title'] ?? '-' }}


            </a>




            <div class="news-source">


                <i class="bi bi-newspaper"></i>


                {{ $article['source']['name'] ?? 'Unknown Source' }}


            </div>



        </div>




        @if(!$loop->last)

            <hr>

        @endif



        @empty


        <div class="text-center p-4">


            <i class="bi bi-newspaper fs-1 text-muted"></i>


            <h5 class="mt-3">

                No News Available

            </h5>


            <p class="text-muted">

                Select a country to view intelligence news

            </p>


        </div>


        @endforelse



    </div>


</div>



<style>


.news-card{

    border-radius:25px;

    overflow:hidden;

}



.news-container{


    max-height:520px;

    overflow-y:auto;


}



.news-item{


    padding:15px;

    border-radius:15px;

    transition:.3s;

}



.news-item:hover{


    background:#f1f5f9;

    transform:translateX(5px);


}



.news-title{


    display:block;

    margin-top:12px;

    font-size:16px;

    font-weight:700;

    line-height:1.5;

    color:#0f172a;

    text-decoration:none;


}



.news-title:hover{


    color:#0284c7;


}



.news-source{


    margin-top:10px;

    color:#64748b;

    font-size:14px;


}



.news-container::-webkit-scrollbar{

    width:6px;

}



.news-container::-webkit-scrollbar-thumb{


    background:#cbd5e1;

    border-radius:10px;


}


</style>