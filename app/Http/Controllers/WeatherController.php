<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Country;

class WeatherController extends Controller
{
    public function index()
    {
        $selectedCountry = request('country','Indonesia');

        $country = Country::where('name',$selectedCountry)->firstOrFail();

        $latitude = $country->latitude;
        $longitude = $country->longitude;

        $response = Http::get(
            "https://api.open-meteo.com/v1/forecast",
            [
                'latitude' => $latitude,
                'longitude' => $longitude,

                'current' => [
                    'temperature_2m',
                    'wind_speed_10m',
                    'rain'
                ],

                'daily' => [
                    'temperature_2m_max',
                    'temperature_2m_min'
                ],

                'forecast_days' => 7,

                'timezone' => 'auto'
            ]
        );

        $weather = $response->json();

        $current = $weather['current'] ?? [];

        $temperature = $current['temperature_2m'] ?? 0;
        $wind = $current['wind_speed_10m'] ?? 0;
        $rain = $current['rain'] ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Storm Risk
        |--------------------------------------------------------------------------
        */

        if ($wind >= 40 || $rain >= 20) {

            $stormRisk = "HIGH";

        }
        elseif ($wind >= 20 || $rain >= 10) {

            $stormRisk = "MEDIUM";

        }
        else {

            $stormRisk = "LOW";

        }

        /*
        |--------------------------------------------------------------------------
        | Forecast
        |--------------------------------------------------------------------------
        */

        $forecast = $weather['daily'] ?? [];

        $countries = Country::orderBy('name')->get();

        return view('weather.index', [

            'temperature' => $temperature,
            'wind' => $wind,
            'rain' => $rain,
            'stormRisk' => $stormRisk,

            'forecast' => $forecast,

            'latitude' => $latitude,
            'longitude' => $longitude,

            'countries'=>$countries,
            'selectedCountry'=>$selectedCountry,

        ]);
    }
}