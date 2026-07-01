<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $apiKey = env('NEWS_API_KEY');

        $response = Http::get('https://newsapi.org/v2/everything', [
            'q' => 'economy OR logistics OR supply chain OR geopolitics',
            'language' => 'en',
            'sortBy' => 'publishedAt',
            'pageSize' => 10,
            'apiKey' => $apiKey
        ]);

        $data = $response->json();

        $articles = $data['articles'] ?? [];

        $positiveWords = ['growth', 'improve', 'profit', 'stable', 'increase', 'recovery'];
        $negativeWords = ['war', 'crisis', 'delay', 'storm', 'inflation', 'conflict'];

        $results = [];
        $positiveCount = 0;
        $negativeCount = 0;
        $neutralCount = 0;

        foreach ($articles as $article) {
            $title = $article['title'] ?? '';
            $text = strtolower($title);

            $positiveScore = 0;
            $negativeScore = 0;

            foreach ($positiveWords as $word) {
                if (str_contains($text, $word)) $positiveScore++;
            }

            foreach ($negativeWords as $word) {
                if (str_contains($text, $word)) $negativeScore++;
            }

            if ($positiveScore > $negativeScore) {
                $sentiment = "Positive";
                $positiveCount++;
            } elseif ($negativeScore > $positiveScore) {
                $sentiment = "Negative";
                $negativeCount++;
            } else {
                $sentiment = "Neutral";
                $neutralCount++;
            }

            $results[] = [
                'title' => $title,
                'source' => $article['source']['name'] ?? '-',
                'date' => $article['publishedAt'] ?? '-',
                'sentiment' => $sentiment
            ];
        }

        $total = max(count($results), 1);

        $positivePercent = round(($positiveCount / $total) * 100);
        $negativePercent = round(($negativeCount / $total) * 100);
        $neutralPercent = round(($neutralCount / $total) * 100);

        return view('news.index', compact(
            'results',
            'positivePercent',
            'negativePercent',
            'neutralPercent'
        ));
    }
}