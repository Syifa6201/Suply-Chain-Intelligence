<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getCurrentWeather($latitude, $longitude)
    {
        try {

            $response = Http::timeout(30)
                ->retry(2, 1000)
                ->get(
                    'https://api.open-meteo.com/v1/forecast',
                    [
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                        'current' => 'temperature_2m,rain,wind_speed_10m'
                    ]
                );

            if ($response->successful()) {
                return $response->json();
            }

        } catch (\Exception $e) {
            // abaikan, gunakan fallback
        }

        return [
            'current' => [
                'temperature_2m' => null,
                'wind_speed_10m' => null,
                'rain' => null
            ]
        ];
    }
}