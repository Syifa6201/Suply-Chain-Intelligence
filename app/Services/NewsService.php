<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsService
{
    /*
    |--------------------------------------------------------------------------
    | Global News
    |--------------------------------------------------------------------------
    */

    public function getGlobalNews()
    {
        $apiKey = env('NEWS_API_KEY');

        try{

            $response = Http::timeout(20)->get(

                'https://newsapi.org/v2/everything',

                [

                    'q' => '(supply chain OR logistics OR shipping OR economy OR geopolitics)',

                    'language' => 'en',

                    'sortBy' => 'publishedAt',

                    'pageSize' => 10,

                    'apiKey' => $apiKey

                ]

            );

            $data = $response->json();

            return $this->formatArticles(
                $data['articles'] ?? []
            );

        }catch(\Exception $e){

            return [];

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Country News
    |--------------------------------------------------------------------------
    */

    public function getCountryNews($country)
    {
        $apiKey = env('NEWS_API_KEY');

        try{

            $response = Http::timeout(20)->get(

                'https://newsapi.org/v2/everything',

                [

                    'q' => $country .
                        ' AND (economy OR trade OR export OR import OR logistics OR "supply chain")',

                    'language' => 'en',

                    'sortBy' => 'publishedAt',

                    'pageSize' => 10,

                    'apiKey' => $apiKey

                ]

            );

            $data = $response->json();

            return $this->formatArticles(
                $data['articles'] ?? []
            );

        }catch(\Exception $e){

            return [];

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Format Article
    |--------------------------------------------------------------------------
    */

    private function formatArticles(array $articles)
    {
        $positiveWords = [

            'growth',
            'improve',
            'profit',
            'stable',
            'increase',
            'recovery',
            'expand',
            'record'

        ];

        $negativeWords = [

            'war',
            'crisis',
            'delay',
            'storm',
            'inflation',
            'conflict',
            'strike',
            'collapse'

        ];

        $results = [];

        foreach($articles as $article){

            $title = strtolower(
                $article['title'] ?? ''
            );

            $positive = 0;
            $negative = 0;

            foreach($positiveWords as $word){

                if(str_contains($title,$word))
                    $positive++;

            }

            foreach($negativeWords as $word){

                if(str_contains($title,$word))
                    $negative++;

            }

            if($positive > $negative){

                $sentiment='Positive';

            }elseif($negative > $positive){

                $sentiment='Negative';

            }else{

                $sentiment='Neutral';

            }

            $results[] = [

                'title' => $article['title'] ?? '-',

                'url' => $article['url'] ?? '#',

                'source' =>

                    $article['source']['name']

                    ?? 'Unknown',

                'publishedAt' =>

                    $article['publishedAt']

                    ?? null,

                'sentiment' => $sentiment

            ];

        }

        return $results;
    }
}