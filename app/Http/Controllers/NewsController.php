<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Country;

class NewsController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Selected Country
        |--------------------------------------------------------------------------
        */

        $selectedCountry = request('country', 'Indonesia');

        $countries = Country::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | News API
        |--------------------------------------------------------------------------
        */

        $apiKey = env('NEWS_API_KEY');

        $articles = [];

        try {

            $response = Http::timeout(20)->get(

                'https://newsapi.org/v2/everything',

                [

                    'q' => $selectedCountry .
                        ' economy OR logistics OR supply chain OR export OR import OR port',

                    'language' => 'en',

                    'sortBy' => 'publishedAt',

                    'pageSize' => 15,

                    'apiKey' => $apiKey

                ]

            );

            if ($response->successful()) {

                $data = $response->json();

                $articles = $data['articles'] ?? [];

            }

        } catch (\Exception $e) {

            $articles = [];

        }

        /*
        |--------------------------------------------------------------------------
        | Sentiment Dictionary
        |--------------------------------------------------------------------------
        */

        $positiveWords = [

            'growth',
            'improve',
            'profit',
            'stable',
            'increase',
            'recovery',
            'expansion',
            'investment',
            'agreement',
            'success',
            'development'

        ];

        $negativeWords = [

            'war',
            'crisis',
            'delay',
            'storm',
            'inflation',
            'conflict',
            'earthquake',
            'flood',
            'strike',
            'sanction',
            'closure',
            'recession'

        ];

        /*
        |--------------------------------------------------------------------------
        | Sentiment Analysis
        |--------------------------------------------------------------------------
        */

        $results = [];

        $positiveCount = 0;
        $negativeCount = 0;
        $neutralCount = 0;

        foreach ($articles as $article) {

            $title = $article['title'] ?? '';

            $description = $article['description'] ?? '';

            $text = strtolower($title . ' ' . $description);

            $positiveScore = 0;

            $negativeScore = 0;

            foreach ($positiveWords as $word) {

                if (str_contains($text, $word)) {

                    $positiveScore++;

                }

            }

            foreach ($negativeWords as $word) {

                if (str_contains($text, $word)) {

                    $negativeScore++;

                }

            }

            if ($positiveScore > $negativeScore) {

                $sentiment = 'Positive';

                $badge = 'success';

                $positiveCount++;

            }

            elseif ($negativeScore > $positiveScore) {

                $sentiment = 'Negative';

                $badge = 'danger';

                $negativeCount++;

            }

            else {

                $sentiment = 'Neutral';

                $badge = 'warning';

                $neutralCount++;

            }

            $results[] = [

                'title' => $title,

                'description' => $description,

                'source' => $article['source']['name'] ?? '-',

                'date' => $article['publishedAt'] ?? '-',

                'url' => $article['url'] ?? '#',

                'image' => $article['urlToImage'] ?? null,

                'sentiment' => $sentiment,

                'badge' => $badge

            ];

        }

        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        $totalNews = count($results);

        $divider = max($totalNews, 1);

        $positivePercent = round(($positiveCount / $divider) * 100);

        $negativePercent = round(($negativeCount / $divider) * 100);

        $neutralPercent = round(($neutralCount / $divider) * 100);

        /*
        |--------------------------------------------------------------------------
        | Breaking News
        |--------------------------------------------------------------------------
        */

        $breakingNews = $results[0] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Overall Sentiment
        |--------------------------------------------------------------------------
        */

        if ($positivePercent >= $negativePercent && $positivePercent >= $neutralPercent) {

            $overallSentiment = 'Positive';

        }

        elseif ($negativePercent >= $positivePercent && $negativePercent >= $neutralPercent) {

            $overallSentiment = 'Negative';

        }

        else {

            $overallSentiment = 'Neutral';

        }

        return view(

            'news.index',

            compact(

                'countries',

                'selectedCountry',

                'results',

                'totalNews',

                'positivePercent',

                'negativePercent',

                'neutralPercent',

                'breakingNews',

                'overallSentiment'

            )

        );
    }
}