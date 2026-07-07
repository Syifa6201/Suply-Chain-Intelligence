<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use App\Services\EconomyService;
use App\Services\CurrencyService;
use App\Services\NewsService;
use App\Services\PortService;
use App\Services\CountryStatisticService;

class CountryIntelligenceController extends Controller
{
    public function show(

        $country,

        WeatherService $weatherService,

        EconomyService $economyService,

        CurrencyService $currencyService,

        NewsService $newsService,

        PortService $portService,

        CountryStatisticService $statisticService,

    ) {

        /**
         * Mapping sementara.
         * Nanti kita pindahkan ke database countries.
         */
        $locations = [

            'Indonesia'=>[
                'lat'=>-6.2,
                'lon'=>106.8,
                'code'=>'IDN',
                'currency'=>'IDR'
            ],

            'China'=>[
                'lat'=>39.9,
                'lon'=>116.4,
                'code'=>'CHN',
                'currency'=>'CNY'
            ],

            'United States'=>[
                'lat'=>38.9,
                'lon'=>-77.0,
                'code'=>'USA',
                'currency'=>'USD'
            ],

            'Germany'=>[
                'lat'=>52.5,
                'lon'=>13.4,
                'code'=>'DEU',
                'currency'=>'EUR'
            ],

            'Russia'=>[
                'lat'=>55.7,
                'lon'=>37.6,
                'code'=>'RUS',
                'currency'=>'RUB'
            ],

            'Singapore'=>[
                'lat'=>1.29,
                'lon'=>103.85,
                'code'=>'SGP',
                'currency'=>'SGD'
            ]

        ];

        if(!isset($locations[$country])){

            abort(404);

        }

        $info = $locations[$country];

        $weather = $weatherService->getCurrentWeather(
            $info['lat'],
            $info['lon']
        );

        $economy = $economyService->getCountryEconomy(
            $info['code']
        );

        $currency = $currencyService->getRate();

        $news = $newsService->getCountryNews($country);

        $ports = $portService->getPorts($country);

        $statistics = $statisticService->getStatistics(

            $info['code']

        );

        return view(
        'country.show',
        compact(

        'country',

        'weather',

        'economy',

        'currency',

        'news',

        'info',

        'ports',

        'statistics'

        )
        );

    }
}