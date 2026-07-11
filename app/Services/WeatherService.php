<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getCurrentWeather($lat, $lon)
    {
        try {

            $response = Http::timeout(30)
                ->retry(2, 1000)
                ->get(
                    "https://api.open-meteo.com/v1/forecast",
                    [

                        'latitude' => $lat,

                        'longitude' => $lon,

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

            if (!$response->successful()) {
                throw new \Exception('Weather API unavailable');
            }

            return $response->json();

        } catch (\Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | Fallback Data
            |--------------------------------------------------------------------------
            */

            return [

                'current' => [

                    'temperature_2m' => 0,

                    'wind_speed_10m' => 0,

                    'rain' => 0

                ],

                'daily' => [

                    'time' => [],

                    'temperature_2m_max' => [],

                    'temperature_2m_min' => []

                ],

                'error' => true,

                'message' => $e->getMessage()

            ];

        }
    }
}