<?php

namespace App\Services;


use App\Models\Country;
use App\Models\EconomicData;
use App\Models\CurrencyRate;
use App\Models\WeatherData;
use App\Models\NewsCache;
use App\Models\Port;
use App\Models\RiskScore;

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

    public function calculateTradeScore($country)
{

    /*
    |--------------------------------------------------------------------------
    | ECONOMY
    |--------------------------------------------------------------------------
    */

    $economy = 70;

    if($country->statistic){

        if($country->statistic->gdp){

            $economy = min(
                100,
                max(
                    50,
                    $country->statistic->gdp / 100000
                )
            );

        }

    }



    /*
    |--------------------------------------------------------------------------
    | CURRENCY
    |--------------------------------------------------------------------------
    */

    $currency = 75;


    /*
    |--------------------------------------------------------------------------
    | WEATHER
    |--------------------------------------------------------------------------
    */

    $weather = 80;


    /*
    |--------------------------------------------------------------------------
    | NEWS
    |--------------------------------------------------------------------------
    */

    $news = 75;



    /*
    |--------------------------------------------------------------------------
    | PORT
    |--------------------------------------------------------------------------
    */

    $portScore = 60;


    $ports = $country->ports;


    if($ports->count()){


        $avgCongestion = $ports->avg(
            'congestion'
        );


        $portScore = max(

            40,

            100 - $avgCongestion

        );


    }



    /*
    |--------------------------------------------------------------------------
    | RISK
    |--------------------------------------------------------------------------
    */

    $risk = 75;



    if($country->risk_score){

        $risk = 100 - $country->risk_score;

    }



    /*
    |--------------------------------------------------------------------------
    | FINAL SCORE
    |--------------------------------------------------------------------------
    */


    $score =

        ($economy * 0.25)

        +

        ($currency * 0.20)

        +

        ($weather * 0.15)

        +

        ($news * 0.10)

        +

        ($portScore * 0.20)

        +

        ($risk * 0.10);



    $score = round($score,1);



    /*
    |--------------------------------------------------------------------------
    | RECOMMENDATION
    |--------------------------------------------------------------------------
    */


    if($score >= 90){

        $recommendation =
        "Expand Export";

        $badge =
        "success";


    }elseif($score >=80){


        $recommendation =
        "Recommended";

        $badge =
        "primary";


    }elseif($score >=65){


        $recommendation =
        "Monitor";

        $badge =
        "warning";


    }else{


        $recommendation =
        "High Risk";

        $badge =
        "danger";


    }




    /*
    |--------------------------------------------------------------------------
    | CONFIDENCE
    |--------------------------------------------------------------------------
    */


    $confidence = min(

        100,

        round(
            80 + ($score/5)
        )

    );




    /*
    |--------------------------------------------------------------------------
    | AI REASON
    |--------------------------------------------------------------------------
    */


    $reason=[];


    if($economy>=80){

        $reason[]="Strong Economy";

    }


    if($currency>=80){

        $reason[]="Stable Currency";

    }


    if($weather>=80){

        $reason[]="Good Weather";

    }


    if($portScore>=80){

        $reason[]="Efficient Port";

    }


    if($risk>=80){

        $reason[]="Low Risk";

    }



    return [

'economy'=>round($economy),

'currency'=>round($currency),

'weather'=>round($weather),

'news'=>round($news),

'port'=>round($portScore),

'risk'=>round($risk),

'score'=>$score,

'confidence'=>$confidence,

'badge'=>$badge,

'recommendation'=>$recommendation,

'reason'=>implode(', ', $reason),

'explanation'=>$this->generateExplanation(

    $country,

    $recommendation,

    $score,

    $reason

)

];

}

private function generateExplanation(

    $country,

    $recommendation,

    $score,

    $reason

){

    $text = "";


    $text .= $country->name;


    $text .= " mendapatkan rekomendasi ";


    $text .= $recommendation;


    $text .= " dengan Trade Score ";


    $text .= $score;


    $text .= ". ";



    if(count($reason)>0){


        $text .= "Faktor pendukung utama: ";


        $text .= implode(
            ', ',
            $reason
        );


        $text .= ".";


    }



    if($score >= 85){


        $text .= 
        " Negara ini memiliki kondisi perdagangan yang mendukung ekspansi bisnis.";


    }


    elseif($score >=65){


        $text .=
        " Negara ini masih dapat dipertimbangkan dengan monitoring berkala.";


    }


    else{


        $text .=
        " Perlu kehati-hatian sebelum melakukan aktivitas perdagangan.";


    }



    return $text;

}
}