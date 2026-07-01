<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        // Indonesia (lat, long)
        $latitude = -6.2;
        $longitude = 106.8;

        $url = "https://api.open-meteo.com/v1/forecast?latitude=$latitude&longitude=$longitude&current=temperature_2m,wind_speed_10m,rain";

        $response = Http::get($url);

        $data = $response->json();

        $current = $data['current'] ?? [];

        $temperature = $current['temperature_2m'] ?? 0;
        $wind = $current['wind_speed_10m'] ?? 0;
        $rain = $current['rain'] ?? 0;

        $stormRisk = "Low";

        if ($wind > 40 || $rain > 20) {
            $stormRisk = "High";
        } elseif ($wind > 20 || $rain > 10) {
            $stormRisk = "Medium";
        }

        return view('weather.index', compact(
            'temperature',
            'wind',
            'rain',
            'stormRisk'
        ));
    }
}