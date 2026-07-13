<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TradeRisk;
use App\Models\ShippingLane;
use App\Models\Vessel;
use App\Services\TradeRiskService;


class TradeRiskSeeder extends Seeder
{

    public function run(): void
    {


        TradeRisk::truncate();


        $service = new TradeRiskService();



        $lanes = ShippingLane::all();



        foreach($lanes as $lane)
        {


            /*
            |--------------------------------------------------------------------------
            | Vessel Risk
            |--------------------------------------------------------------------------
            */


            $vesselRisk = Vessel::avg(
                'risk_score'
            );


            if(!$vesselRisk)
            {

                $vesselRisk = 20;

            }





            /*
            |--------------------------------------------------------------------------
            | Port Risk
            |--------------------------------------------------------------------------
            */

            /*
            Ambil congestion port
            */


            $portRisk = rand(10,70);





            /*
            |--------------------------------------------------------------------------
            | Weather Risk
            |--------------------------------------------------------------------------
            */


            $weatherRisk = rand(5,60);





            /*
            |--------------------------------------------------------------------------
            | Currency Risk
            |--------------------------------------------------------------------------
            */


            $currencyRisk = rand(10,50);






            /*
            |--------------------------------------------------------------------------
            | AI Calculation
            |--------------------------------------------------------------------------
            */


            $result=$service->calculate(

                $vesselRisk,

                $portRisk,

                $weatherRisk,

                $currencyRisk

            );






            /*
            |--------------------------------------------------------------------------
            | AI Explanation
            |--------------------------------------------------------------------------
            */


            $analysis="";


            if($portRisk > 50)
            {

                $analysis .= 
                "High port congestion detected. ";

            }


            if($weatherRisk > 40)
            {

                $analysis .=
                "Weather disruption possible. ";

            }


            if($currencyRisk > 40)
            {

                $analysis .=
                "Currency volatility increasing. ";

            }



            if($analysis=="")
            {

                $analysis=
                "Trade condition is stable.";

            }





            /*
            |--------------------------------------------------------------------------
            | Recommendation Engine
            |--------------------------------------------------------------------------
            */


            if($result['level']=="LOW")
            {

                $recommendation=
                "Continue normal shipping operation.";


            }
            elseif($result['level']=="MEDIUM")
            {

                $recommendation=
                "Monitor route condition and prepare alternative schedule.";

            }
            elseif($result['level']=="HIGH")
            {

                $recommendation=
                "Consider alternative port or delay shipment.";

            }
            else
            {

                $recommendation=
                "Avoid route temporarily and use alternative trade corridor.";

            }






            TradeRisk::create([


                'shipping_lane_id'=>$lane->id,


                'risk_score'=>$result['score'],


                'risk_level'=>$result['level'],


                'vessel_risk'=>round($vesselRisk),


                'port_risk'=>$portRisk,


                'weather_risk'=>$weatherRisk,


                'currency_risk'=>$currencyRisk,


                'analysis'=>$analysis,


                'recommendation'=>$recommendation


            ]);



        }


        $this->command->info(
            "AI Trade Risk Generated Successfully"
        );


    }

}