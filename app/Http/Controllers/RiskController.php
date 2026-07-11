<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\RiskService;
use App\Services\WeatherService;
use App\Services\CountryStatisticService;
use App\Services\CurrencyService;
use App\Services\NewsService;

class RiskController extends Controller
{
    public function index(
        RiskService $riskService,
        WeatherService $weatherService,
        CountryStatisticService $statisticService,
        CurrencyService $currencyService,
        NewsService $newsService
    )
    {

        /*
        |--------------------------------------------------------------------------
        | Selected Country
        |--------------------------------------------------------------------------
        */

        $selectedCountry = request('country','Indonesia');

        $country = Country::where('name',$selectedCountry)->firstOrFail();

        $countries = Country::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | WEATHER
        |--------------------------------------------------------------------------
        */

        $weather = $weatherService->getCurrentWeather(

            $country->latitude,

            $country->longitude

        );

        $temperature = $weather['current']['temperature_2m'] ?? 0;

        $wind = $weather['current']['wind_speed_10m'] ?? 0;

        $rain = $weather['current']['rain'] ?? 0;

        $weatherScore = 0;

        if($temperature >= 35) $weatherScore += 15;

        if($wind >= 30) $weatherScore += 15;

        if($rain >= 10) $weatherScore += 20;

        /*
        |--------------------------------------------------------------------------
        | ECONOMY
        |--------------------------------------------------------------------------
        */

        $statistics = $statisticService->getStatistics(

            $country->iso3

        );

        $inflation = $statistics['inflation'] ?? 0;

        $economyScore = 10;

        if($inflation >= 8){

            $economyScore = 80;

        }elseif($inflation >=5){

            $economyScore = 60;

        }elseif($inflation >=2){

            $economyScore = 35;

        }

        /*
        |--------------------------------------------------------------------------
        | CURRENCY
        |--------------------------------------------------------------------------
        */

        $currency = $currencyService->getRate(

            $country->currency

        );

        $currencyScore = 25;

        if(isset($currency['change'])){

            $change = abs($currency['change']);

            $currencyScore = min(100,$change*10);

        }

        /*
        |--------------------------------------------------------------------------
        | NEWS
        |--------------------------------------------------------------------------
        */

        $news = $newsService->getCountryNews(

            $country->name

        );

        $negative = 0;

        $keywords=[

            'war',
            'conflict',
            'strike',
            'storm',
            'earthquake',
            'flood',
            'inflation',
            'sanction'

        ];

        foreach($news['articles'] ?? [] as $article){

            $text = strtolower(

                ($article['title'] ?? '').

                ($article['description'] ?? '')

            );

            foreach($keywords as $keyword){

                if(str_contains($text,$keyword)){

                    $negative++;

                    break;

                }

            }

        }

        $newsScore=min(100,$negative*15);

        /*
        |--------------------------------------------------------------------------
        | FINAL SCORE
        |--------------------------------------------------------------------------
        */

        $score=$riskService->calculate(

            $weatherScore,

            $currencyScore,

            $newsScore,

            $economyScore

        );

        $level=$riskService->level($score);

        $recommendation=$riskService->recommendation($level);

        return view(

            'risk.index',

            compact(

                'countries',

                'selectedCountry',

                'score',

                'level',

                'recommendation',

                'weatherScore',

                'currencyScore',

                'newsScore',

                'economyScore'

            )

        );

    }
}