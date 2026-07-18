<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Port;
use App\Services\WeatherService;
use App\Services\EconomyService;
use App\Services\CurrencyService;
use App\Services\NewsService;
use App\Services\RiskEngineService;
use App\Models\Vessel;

use App\Services\TradeRecommendationService;

class GlobalController extends Controller
{
    public function index(
    WeatherService $weatherService,
    TradeRecommendationService $tradeEngine,
        EconomyService $economyService,
        CurrencyService $currencyService,
        NewsService $newsService,
        RiskEngineService $riskEngine
    ) {


        /*
        |--------------------------------------------------------------------------
        | COUNTRY LIST
        |--------------------------------------------------------------------------
        */

        $countries = Country::orderBy('name')->get();



        /*
|--------------------------------------------------------------------------
| SELECT COUNTRY
|--------------------------------------------------------------------------
*/

$selectedCountry = request('country');


$focusCountry = null;


if($selectedCountry){

    $focusCountry = Country::where(
        'name',
        $selectedCountry
    )->first();


    if($focusCountry){


        if (
            empty($focusCountry->latitude) ||
            empty($focusCountry->longitude)
        ) {


            $firstVessel = Vessel::where(
                    'country_id',
                    $focusCountry->id
                )

                ->whereNotNull('latitude')

                ->whereNotNull('longitude')

                ->first();



            if($firstVessel){

                $focusCountry->latitude =
                    $firstVessel->latitude;


                $focusCountry->longitude =
                    $firstVessel->longitude;

            }

        }

    }

}
        /*
        |--------------------------------------------------------------------------
        | WORLD MAP MARKERS
        |--------------------------------------------------------------------------
        */

        $markers = [];


        foreach(
            Country::all() 
            as $country
        ){

            $markers[] = [

                'name'=>$country->name,

                'lat'=>$country->latitude,

                'lng'=>$country->longitude,

                'risk'=>'LOW',

                'score'=>rand(20,80)

            ];

        }



/*
|--------------------------------------------------------------------------
| WEATHER
|--------------------------------------------------------------------------
*/

$weather = [];


if($focusCountry){

    try{

        $weather = $weatherService->getCurrentWeather(

            $focusCountry->latitude,

            $focusCountry->longitude

        );


    }catch(\Exception $e){

        $weather = [];

    }

}



        /*
        |--------------------------------------------------------------------------
        | ECONOMY
        |--------------------------------------------------------------------------
        */

        try{


            $economy = [];


if($focusCountry){

    try{


        $economy = $economyService->getCountryEconomy(

            $focusCountry->iso3

        );


    }catch(\Exception $e){

        $economy = [];

    }

}


        }catch(\Exception $e){

            $economy = [];

        }


/*
|--------------------------------------------------------------------------
| TRADE INTELLIGENCE
|--------------------------------------------------------------------------
*/


$trade = [

    'export'=>0,

    'import'=>0,

    'balance'=>0,

    'status'=>'No Data'

];


if($focusCountry && !empty($economy)){


    $export = $economy['exports'] ?? 0;

    $import = $economy['imports'] ?? 0;



    $trade = [

        'export'=>$export,

        'import'=>$import,

        'balance'=>$export-$import,

        'status'=>

            ($export-$import) >= 0

            ? 'Trade Surplus'

            : 'Trade Deficit'

    ];


}

        /*
        |--------------------------------------------------------------------------
        | CURRENCY
        |--------------------------------------------------------------------------
        */

        try{


            $currency = [];


if($focusCountry){

    try{


        $currency = $currencyService->getRate(

            $focusCountry->currency

        );


    }catch(\Exception $e){

        $currency = [];

    }

}


        }catch(\Exception $e){

            $currency = [];

        }



/*
|--------------------------------------------------------------------------
| NEWS BASED ON SELECTED COUNTRY
|--------------------------------------------------------------------------
*/

$news = [];


if($focusCountry){

    try{


        $news = $newsService->getCountryNews(

            $focusCountry->name

        );


    }catch(\Exception $e){


        $news = [];


    }

}

        /*
        |--------------------------------------------------------------------------
        | RISK ANALYSIS
        |--------------------------------------------------------------------------
        */

        try{


            $risk = $riskEngine->calculate(

                $weather,

                $economy,

                $news

            );


        }catch(\Exception $e){


            $risk = [

                'level'=>'LOW',

                'score'=>0

            ];


        }


    /*
|--------------------------------------------------------------------------
| PORT BASED ON SELECTED COUNTRY
|--------------------------------------------------------------------------
*/


$ports = collect();


if($focusCountry){

    $ports = Port::with('country')

        ->where(
            'country_id',
            $focusCountry->id
        )

        ->get();

}
/*
|--------------------------------------------------------------------------
| VESSEL BASED ON SELECTED COUNTRY
|--------------------------------------------------------------------------
*/


$vessels = collect();


if($focusCountry){

    $vessels = Vessel::with('country')

        ->where(
            'country_id',
            $focusCountry->id
        )

        ->whereNotNull('latitude')

        ->whereNotNull('longitude')

        ->get();

}

        /*
        |--------------------------------------------------------------------------
        | GLOBAL STATISTICS
        |--------------------------------------------------------------------------
        */


        $totalCountries = Country::count();


        $totalPorts = Port::count();



        $highRisk = Port::where(

            'status',

            'Critical'

        )->count();



        $mediumRisk = Port::where(

            'status',

            'Delay'

        )->count();



        $lowRisk = Port::where(

            'status',

            'Normal'

        )->count();



        $alerts =

            $highRisk +

            $mediumRisk;


       /*
|--------------------------------------------------------------------------
| AI TRADE RECOMMENDATION
|--------------------------------------------------------------------------
*/


$tradeRecommendation = [];


if($focusCountry){


    $tradeRecommendation =
        $tradeEngine->analyze(

            $weather,

            $economy,

            $currency,

            $news,

            $ports,

            $risk

        );


}

        /*
|--------------------------------------------------------------------------
| TOP RISK PORTS
|--------------------------------------------------------------------------
*/

$topPorts = collect();


if($focusCountry){


    $topPorts = Port::with('country')

        ->where(
            'country_id',
            $focusCountry->id
        )

        ->orderByDesc('congestion')

        ->take(8)

        ->get();


}

/*
|--------------------------------------------------------------------------
| RECENT PORT ACTIVITY
|--------------------------------------------------------------------------
*/


$recentPorts = collect();


if($focusCountry){


    $recentPorts = Port::with('country')

        ->where(
            'country_id',
            $focusCountry->id
        )

        ->latest()

        ->take(5)

        ->get();


}




        /*
        |--------------------------------------------------------------------------
        | API STATUS
        |--------------------------------------------------------------------------
        */

        $apiStatus = [

            'weather'=>true,

            'economy'=>true,

            'currency'=>true,

            'news'=>count($news)>0,

            'database'=>true

        ];





        return view(

            'global.index',

            compact(

                'countries',

                'selectedCountry',

                'focusCountry',

                'markers',

                'weather',

                'economy',

                'currency',

                'news',

                'risk',

                'totalCountries',

                'totalPorts',

                'highRisk',

                'mediumRisk',

                'lowRisk',

                'alerts',

                'topPorts',

                'recentPorts',

                'apiStatus',

                'vessels',

                'ports',

                'trade',

                'tradeRecommendation',
            )

        );


    }
}