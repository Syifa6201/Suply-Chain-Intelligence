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

class GlobalController extends Controller
{
    public function index(
        WeatherService $weatherService,
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

        $selectedCountry = request(
            'country',
            'Indonesia'
        );


        $focusCountry = Country::where(
            'name',
            $selectedCountry
        )->first();



        if(!$focusCountry){

            $focusCountry = Country::first();

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

        try{

            $weather = $weatherService->getCurrentWeather(

                $focusCountry->latitude,

                $focusCountry->longitude

            );


        }catch(\Exception $e){

            $weather = [];

        }




        /*
        |--------------------------------------------------------------------------
        | ECONOMY
        |--------------------------------------------------------------------------
        */

        try{


            $economy = $economyService->getCountryEconomy(

                $focusCountry->iso3

            );


        }catch(\Exception $e){

            $economy = [];

        }




        /*
        |--------------------------------------------------------------------------
        | CURRENCY
        |--------------------------------------------------------------------------
        */

        try{


            $currency = $currencyService->getRate(

                $focusCountry->currency

            );


        }catch(\Exception $e){

            $currency = [];

        }




        /*
        |--------------------------------------------------------------------------
        | NEWS
        |--------------------------------------------------------------------------
        */

        try{


            $news = $newsService->getGlobalNews();


        }catch(\Exception $e){


            $news = [];


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
| VESSEL BASED ON SELECTED COUNTRY
|--------------------------------------------------------------------------
*/


$vessels = Vessel::with('country')

    ->where(
        'country_id',
        $focusCountry->id
    )

    ->whereNotNull('latitude')

    ->whereNotNull('longitude')

    ->get();

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
        | PORT INTELLIGENCE
        |--------------------------------------------------------------------------
        */


        $topPorts = Port::with('country')

            ->orderByDesc('congestion')

            ->take(8)

            ->get();




        $recentPorts = Port::with('country')

            ->latest()

            ->take(5)

            ->get();





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

            )

        );


    }
}