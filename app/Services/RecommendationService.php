<?php

namespace App\Services;

class RecommendationService
{
    public function generate($risk, $weather, $news)
    {
        $title = '';
        $color = 'success';
        $reasons = [];

        $temperature = $weather['current']['temperature_2m'] ?? 0;
        $wind = $weather['current']['wind_speed_10m'] ?? 0;
        $rain = $weather['current']['rain'] ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Risk Analysis
        |--------------------------------------------------------------------------
        */

        if ($risk['score'] >= 70) {

            $title = 'Delay Shipment';
            $color = 'danger';

            $reasons[] = 'High logistics risk detected.';
            $reasons[] = 'Shipment delay is recommended until conditions improve.';

        } elseif ($risk['score'] >= 40) {

            $title = 'Use Alternative Port';
            $color = 'warning';

            $reasons[] = 'Medium logistics risk detected.';
            $reasons[] = 'Alternative ports should be considered.';

        } else {

            $title = 'Suitable for Export';
            $color = 'success';

            $reasons[] = 'Current logistics conditions are favorable.';
            $reasons[] = 'Export activities can proceed normally.';
        }

        /*
        |--------------------------------------------------------------------------
        | Weather Analysis
        |--------------------------------------------------------------------------
        */

        if ($temperature >= 38) {
            $reasons[] = 'Extreme temperature may affect logistics.';
        }

        if ($wind >= 40) {
            $reasons[] = 'Strong winds may disrupt shipping schedules.';
        }

        if ($rain >= 20) {
            $reasons[] = 'Heavy rainfall may slow port operations.';
        }

        /*
        |--------------------------------------------------------------------------
        | News Analysis
        |--------------------------------------------------------------------------
        */

        foreach ($news['articles'] ?? [] as $article) {

            $text = strtolower(
                ($article['title'] ?? '') . ' ' .
                ($article['description'] ?? '')
            );

            if (
                str_contains($text, 'strike') ||
                str_contains($text, 'storm') ||
                str_contains($text, 'typhoon') ||
                str_contains($text, 'earthquake') ||
                str_contains($text, 'war') ||
                str_contains($text, 'conflict') ||
                str_contains($text, 'flood') ||
                str_contains($text, 'closure')
            ) {

                $reasons[] = 'Recent news indicates possible supply chain disruption.';
                break;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Remove Duplicate Reasons
        |--------------------------------------------------------------------------
        */

        $reasons = array_values(array_unique($reasons));

        return [

            'title' => $title,

            'color' => $color,

            'reasons' => $reasons

        ];
    }
}