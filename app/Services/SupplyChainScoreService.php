<?php

namespace App\Services;

class SupplyChainScoreService
{
    public function calculate(
        array $statistics,
        array $risk,
        array $trade
    )
    {

        $economic = 100;

        $inflation = $statistics['inflation'] ?? 0;

        if($inflation > 8){

            $economic -= 35;

        }elseif($inflation >5){

            $economic -=20;

        }elseif($inflation >3){

            $economic -=10;

        }

        $economic=max(0,min(100,$economic));



        $logistics = 100 - $risk['score'];



        $market = 50;

        if($trade['balance']>0){

            $market +=30;

        }else{

            $market -=10;

        }

        $market=max(0,min(100,$market));



        $overall = round(

            ($economic+$logistics+$market)/3

        );



        return [

            'overall'=>$overall,

            'economic'=>$economic,

            'logistics'=>$logistics,

            'market'=>$market

        ];

    }

}