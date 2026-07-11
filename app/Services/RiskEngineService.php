<?php

namespace App\Services;

class RiskEngineService
{
    public function calculate(
        array $weather,
        array $statistics,
        array $news
    ) {

        $score = 0;
        $reasons = [];

        /*
        |--------------------------------------------------------------------------
        | WEATHER
        |--------------------------------------------------------------------------
        */

        $temperature = $weather['current']['temperature_2m'] ?? 0;
        $wind = $weather['current']['wind_speed_10m'] ?? 0;
        $rain = $weather['current']['rain'] ?? 0;

        if ($temperature >= 35) {
            $score += 15;
            $reasons[] = 'Extreme temperature';
        }
        elseif ($temperature >= 30) {
            $score += 8;
            $reasons[] = 'Hot weather';
        }
        elseif ($temperature <= 5) {
            $score += 5;
            $reasons[] = 'Cold weather';
        }

        if ($wind >= 50) {

            $score += 20;
            $reasons[] = 'Strong wind';

        }
        elseif ($wind >= 30) {

            $score += 12;
            $reasons[] = 'Moderate wind';

        }
        elseif ($wind >= 15) {

            $score += 5;
            $reasons[] = 'Windy';

        }

        if ($rain >= 20) {

            $score += 15;
            $reasons[] = 'Heavy rain';

        }
        elseif ($rain >= 5) {

            $score += 5;
            $reasons[] = 'Rainfall';

        }

        /*
        |--------------------------------------------------------------------------
        | ECONOMY
        |--------------------------------------------------------------------------
        */
        $inflation = (float) ($statistics['inflation'] ?? 0);

        $export = (float) ($statistics['export'] ?? 0);

        $import = (float) ($statistics['import'] ?? 0);

        if ($inflation >= 8) {

            $score += 15;
            $reasons[] = 'High inflation';

        }
        elseif ($inflation >= 5) {

            $score += 10;
            $reasons[] = 'Moderate inflation';

        }
        elseif ($inflation >= 2) {

            $score += 3;
            $reasons[] = 'Inflation observed';

        }

        if ($export < $import) {

            $score += 8;
            $reasons[] = 'Trade deficit';

        }
        else {

            $score += 2;
            $reasons[] = 'Trade surplus';

        }

        /*
        |--------------------------------------------------------------------------
        | NEWS
        |--------------------------------------------------------------------------
        */

        $keywords = [

            'war',
            'conflict',
            'strike',
            'earthquake',
            'flood',
            'storm',
            'cyclone',
            'typhoon',
            'tsunami',
            'eruption',
            'sanction',
            'port closure',
            'shipping disruption'

        ];

        foreach ($news['articles'] ?? [] as $article) {

            $text = strtolower(

                ($article['title'] ?? '') . ' ' .
                ($article['description'] ?? '')

            );

            foreach ($keywords as $keyword) {

                if (str_contains($text, $keyword)) {

                    $score += 5;
                    $reasons[] = ucfirst($keyword) . ' detected';

                    break;

                }

            }

        }

        /*
        |--------------------------------------------------------------------------
        | LIMIT
        |--------------------------------------------------------------------------
        */

        $score = min($score,100);

        if ($score >= 70) {

            $status = 'HIGH';
            $color = 'danger';

        } elseif ($score >= 40) {

            $status = 'MEDIUM';
            $color = 'warning';

        } else {

            $status = 'LOW';
            $color = 'success';

        }

        return [

            'score' => $score,

            'status' => $status,

            'color' => $color,

            'reasons' => array_unique($reasons)

        ];

    }
}