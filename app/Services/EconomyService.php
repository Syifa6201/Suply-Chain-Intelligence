<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EconomyService
{

    public function getCountryEconomy($country)
    {

        try {


            $response = Http::timeout(10)
                ->retry(2,1000)
                ->get(
                    "https://api.worldbank.org/v2/country/$country/indicator/NY.GDP.MKTP.CD",
                    [
                        'format'=>'json',
                        'per_page'=>1
                    ]
                );


            if($response->successful())
            {

                return $response->json();

            }


        } catch(\Exception $e)
        {


            return [
                'error'=>true,
                'message'=>$e->getMessage()
            ];

        }


        return null;

    }

}