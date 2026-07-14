<?php

namespace App\Http\Controllers;


use App\Models\Country;
use App\Services\RecommendationService;


class TradePredictionController extends Controller
{


    public function index(
        RecommendationService $ai
    )
    {


        $countries = Country::with('ports')
            ->get();



        $predictions = [];



        foreach($countries as $country){


            $analysis = $ai->calculateTradeScore($country);



            $futureScore =
                $analysis['score']
                +
                rand(-5,10);



            if($futureScore > $analysis['score']){


                $trend = "Increasing";


            }
            elseif($futureScore < $analysis['score']){


                $trend = "Decreasing";


            }
            else{


                $trend = "Stable";


            }



            $predictions[] = [


                'country'=>$country,


                'current'=>round(
                    $analysis['score']
                ),


                'future'=>round(
                    $futureScore
                ),


                'trend'=>$trend,


                'confidence'=>$analysis['confidence']



            ];



        }





        // RANKING FUTURE SCORE

        usort(
            $predictions,
            function($a,$b){

                return $b['future']
                <=>
                $a['future'];

            }
        );





        // STATISTICS


        $totalCountries =
            count($predictions);



        $growing =
            collect($predictions)
            ->where(
                'trend',
                'Increasing'
            )
            ->count();



        $stable =
            collect($predictions)
            ->where(
                'trend',
                'Stable'
            )
            ->count();



        $declining =
            collect($predictions)
            ->where(
                'trend',
                'Decreasing'
            )
            ->count();




        return view(

            'trade_prediction.index',

            compact(

                'predictions',

                'totalCountries',

                'growing',

                'stable',

                'declining'

            )

        );



    }


}