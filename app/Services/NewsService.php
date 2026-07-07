<?php

namespace App\Services;


use Illuminate\Support\Facades\Http;


class NewsService
{

    public function getNews()
    {

        $key = env('NEWS_API_KEY');


        $response = Http::get(
            'https://newsapi.org/v2/everything',
            [
                'q'=>'supply chain OR logistics OR economy',
                'sortBy'=>'publishedAt',
                'language'=>'en',
                'apiKey'=>$key
            ]
        );


        return $response->json();

    }

    public function getCountryNews($country)
    {
        $apiKey = env('NEWS_API_KEY');

        try {

            $response = Http::timeout(20)->get(
                'https://newsapi.org/v2/everything',
                [

                    'q' => $country.' AND (economy OR trade OR export OR import OR logistics OR "supply chain")',

                    'language' => 'en',

                    'sortBy' => 'publishedAt',

                    'pageSize' => 5,

                    'apiKey' => $apiKey

                ]
            );

            return $response->json();

        } catch (\Exception $e){

            return [

                'articles' => []

            ];

        }
    }

}

