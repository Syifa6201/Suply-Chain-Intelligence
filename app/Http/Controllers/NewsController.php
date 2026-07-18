<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Positive Dictionary
    |--------------------------------------------------------------------------
    */

    private array $positiveWords = [

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
        'development',
        'efficient',
        'innovation',
        'record',
        'export',
        'opportunity'

    ];


    /*
    |--------------------------------------------------------------------------
    | Negative Dictionary
    |--------------------------------------------------------------------------
    */

    private array $negativeWords = [

        'war',
        'crisis',
        'delay',
        'storm',
        'inflation',
        'conflict',
        'earthquake',
        'flood',
        'strike',
        'closure',
        'sanction',
        'recession',
        'accident',
        'collapse',
        'bankrupt',
        'congestion'

    ];

        public function index()
    {

        $selectedCountry = request(
            'country',
            'Indonesia'
        );



        $countries = Country::orderBy(
            'name'
        )->get();



        $results = Cache::remember(

            'news_'.$selectedCountry,

            now()->addMinutes(20),

            function() use ($selectedCountry){

                return $this->fetchNews(
                    $selectedCountry
                );

            }

        );



        $totalNews = count($results);



        $positiveCount = collect($results)

            ->where('sentiment','Positive')

            ->count();



        $negativeCount = collect($results)

            ->where('sentiment','Negative')

            ->count();



        $neutralCount = collect($results)

            ->where('sentiment','Neutral')

            ->count();



        $divider = max(
            $totalNews,
            1
        );



        $positivePercent = round(

            ($positiveCount/$divider)*100

        );



        $negativePercent = round(

            ($negativeCount/$divider)*100

        );



        $neutralPercent = round(

            ($neutralCount/$divider)*100

        );



        $breakingNews =

            $results[0]

            ??

            null;


                if(

            $positivePercent >=

            max(

                $negativePercent,

                $neutralPercent

            )

        ){

            $overallSentiment='Positive';

        }

        elseif(

            $negativePercent >=

            max(

                $positivePercent,

                $neutralPercent

            )

        ){

            $overallSentiment='Negative';

        }

        else{

            $overallSentiment='Neutral';

        }



        $expertArticles =

            Article::with('author')

            ->where(

                'status',

                'Published'

            )

            ->latest()

            ->take(6)

            ->get();



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

                'overallSentiment',

                'expertArticles'

            )

        );

    }

    /*
|--------------------------------------------------------------------------
| Fetch News From API
|--------------------------------------------------------------------------
*/

private function fetchNews(string $country): array
{
    $apiKey = env('NEWS_API_KEY');

    if (empty($apiKey)) {
        return [];
    }

    try {

        $response = Http::timeout(20)->get(
            'https://newsapi.org/v2/everything',
            [
                'q'        => $country.' economy OR logistics OR supply chain OR export OR import OR port',
                'language' => 'en',
                'sortBy'   => 'publishedAt',
                'pageSize' => 15,
                'apiKey'   => $apiKey,
            ]
        );

        if (!$response->successful()) {
            return [];
        }

        $articles = $response->json()['articles'] ?? [];

        $results = [];

        foreach ($articles as $article) {

            $results[] = $this->analyzeArticle($article);

        }

        return $results;

    } catch (\Throwable $e) {

        return [];

    }
}

/*
|--------------------------------------------------------------------------
| Analyze Article
|--------------------------------------------------------------------------
*/

private function analyzeArticle(array $article): array
{
    $title = $article['title'] ?? '';

    $description = $article['description'] ?? '';

    $text = strtolower($title.' '.$description);

    $positive = 0;

    $negative = 0;

    foreach ($this->positiveWords as $word) {

        if (str_contains($text, strtolower($word))) {
            $positive++;
        }

    }

    foreach ($this->negativeWords as $word) {

        if (str_contains($text, strtolower($word))) {
            $negative++;
        }

    }

    if ($positive > $negative) {

        $sentiment = 'Positive';

        $badge = 'success';

    } elseif ($negative > $positive) {

        $sentiment = 'Negative';

        $badge = 'danger';

    } else {

        $sentiment = 'Neutral';

        $badge = 'warning';

    }

    return [

        'title' => $title,

        'description' => $description,

        'source' => $article['source']['name'] ?? 'Unknown Source',

        'date' => $article['publishedAt'] ?? null,

        'url' => $article['url'] ?? '#',

        'image' => $article['urlToImage'] ?? null,

        'sentiment' => $sentiment,

        'badge' => $badge,

    ];
}

}