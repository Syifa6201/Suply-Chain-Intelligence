<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use App\Services\EconomyService;
use App\Services\CurrencyService;
use App\Services\NewsService;


class GlobalController extends Controller
{

    public function index(
        WeatherService $weatherService,
        EconomyService $economyService,
        CurrencyService $currencyService,
        NewsService $newsService
    )
    {

        // Indonesia sementara sebagai contoh
        $weather = $weatherService
            ->getCurrentWeather(
                -6.2,
                106.8
            );


        $economy = $economyService
            ->getCountryEconomy('IDN');


        $currency = $currencyService
            ->getRate();


        $news = $newsService
            ->getNews();


        return view('global.index', compact(
            'weather',
            'economy',
            'currency',
            'news'
        ));

    }

}