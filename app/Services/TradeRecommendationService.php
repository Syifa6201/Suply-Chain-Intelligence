<?php

namespace App\Services;


class TradeRecommendationService
{


public function analyze(
    $weather,
    $economy,
    $currency,
    $news,
    $ports,
    $risk
)
{


$riskScore = $risk['score'] ?? 0;



/*
|--------------------------------------------------------------------------
| PORT ANALYSIS
|--------------------------------------------------------------------------
*/


$avgCongestion = 0;


if($ports->count()>0){

    $avgCongestion = $ports->avg('congestion');

}




/*
|--------------------------------------------------------------------------
| NEWS SENTIMENT
|--------------------------------------------------------------------------
*/


$negativeNews = 0;


foreach($news as $item){


    if(
        isset($item['sentiment']) &&
        $item['sentiment']=="Negative"
    ){

        $negativeNews++;

    }


}





/*
|--------------------------------------------------------------------------
| TRADE DECISION
|--------------------------------------------------------------------------
*/


if(
    $riskScore < 35 &&
    $avgCongestion < 50 &&
    $negativeNews < 3
){


    $decision = "RECOMMENDED";

    $opportunity="HIGH";

    $color="success";


    $actions=[

        "Maintain current trade route",

        "Increase shipment confidence",

        "Consider expanding supplier network"

    ];


    $portAdvice =
    "Current port condition supports normal operation.";



}



elseif(
    $riskScore < 65
){


    $decision="MONITOR";

    $opportunity="MEDIUM";

    $color="warning";


    $actions=[

        "Monitor port congestion",

        "Review currency fluctuation",

        "Prepare alternative logistics route"

    ];


    $portAdvice =
    "Trade is possible but requires monitoring.";

}



else{


    $decision="CAUTION";

    $opportunity="LOW";

    $color="danger";


    $actions=[

        "Delay non-critical shipment",

        "Find alternative suppliers",

        "Avoid high risk routes"

    ];


    $portAdvice =
    "High supply chain uncertainty detected.";

}





return [


    "decision"=>$decision,


    "opportunity"=>$opportunity,


    "color"=>$color,


    "actions"=>$actions,


    "portAdvice"=>$portAdvice,


    "riskScore"=>$riskScore,


    "congestion"=>$avgCongestion,


    "negativeNews"=>$negativeNews



];


}



}