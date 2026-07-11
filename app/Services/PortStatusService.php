<?php

namespace App\Services;

class PortStatusService
{
    public function calculate($port, $weather, $risk, $news)
    {
        $score = 0;

        /*
        |--------------------------------------------------------------------------
        | WEATHER
        |--------------------------------------------------------------------------
        */

        $wind = $weather['current']['wind_speed_10m'] ?? 0;
        $rain = $weather['current']['rain'] ?? 0;

        if ($wind >= 40) {

            $score += 30;

        } elseif ($wind >= 25) {

            $score += 15;

        }

        if ($rain >= 20) {

            $score += 30;

        } elseif ($rain >= 10) {

            $score += 15;

        }

        /*
        |--------------------------------------------------------------------------
        | RISK SCORE
        |--------------------------------------------------------------------------
        */

        $score += ($risk['score'] * 0.4);

        /*
        |--------------------------------------------------------------------------
        | NEWS
        |--------------------------------------------------------------------------
        */

        foreach($news['articles'] ?? [] as $article){

            $text = strtolower(

                ($article['title'] ?? '') . ' ' .

                ($article['description'] ?? '')

            );

            if(

                str_contains($text,'port') ||

                str_contains($text,'shipping') ||

                str_contains($text,'storm') ||

                str_contains($text,'strike') ||

                str_contains($text,'flood')

            ){

                $score += 20;

                break;

            }

        }

        $score = min(100,$score);

        if($score>=70){

            $status='Congested';

        }
        elseif($score>=40){

            $status='Delay';

        }
        else{

            $status='Normal';

        }

        return [

            'status'=>$status,

            'congestion'=>round($score),

            'capacity'=>$port->capacity

        ];

    }
}