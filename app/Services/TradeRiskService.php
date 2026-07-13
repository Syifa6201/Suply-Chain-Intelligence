<?php

namespace App\Services;


class TradeRiskService
{


public function calculate(
    $vesselRisk,
    $portRisk,
    $weatherRisk,
    $currencyRisk
)
{


$score = (

    $vesselRisk +
    $portRisk +
    $weatherRisk +
    $currencyRisk

) / 4;



if($score < 30)
{

    $level="LOW";

}
elseif($score < 60)
{

    $level="MEDIUM";

}
elseif($score < 80)
{

    $level="HIGH";

}
else
{

    $level="CRITICAL";

}



return [

    'score'=>round($score),

    'level'=>$level

];


}



}