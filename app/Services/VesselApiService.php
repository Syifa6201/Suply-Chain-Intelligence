<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class VesselApiService
{


    public function getVessels(
        $latitude,
        $longitude
    )
    {


        try{


            /*
            |--------------------------------------------------------------------------
            | TEMP API STRUCTURE
            |--------------------------------------------------------------------------
            |
            | Nanti URL diganti API AIS asli
            |
            */


            $response = Http::timeout(10)->get(

                env('VESSEL_API_URL'),

                [

                    'lat'=>$latitude,

                    'lng'=>$longitude,

                    'radius'=>200

                ]

            );



            if($response->successful()){


                return $response->json();


            }



            return [];



        }catch(\Exception $e){


            return [];


        }


    }


}