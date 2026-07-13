<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vessel;
use App\Models\Country;
use Carbon\Carbon;

class VesselSeeder extends Seeder
{
    public function run(): void
    {

        Vessel::truncate();


        $routes = [

            // ASIA - EUROPE

            [
                "start"=>[6,100],
                "destination"=>"Rotterdam",
                "country"=>"Singapore",
                "heading"=>300
            ],

            [
                "start"=>[15,115],
                "destination"=>"Hamburg",
                "country"=>"China",
                "heading"=>300
            ],

            [
                "start"=>[20,125],
                "destination"=>"Europe",
                "country"=>"Japan",
                "heading"=>310
            ],


            // ASIA - AMERICA

            [
                "start"=>[25,-150],
                "destination"=>"Los Angeles",
                "country"=>"United States",
                "heading"=>90
            ],


            [
                "start"=>[30,-160],
                "destination"=>"Shanghai",
                "country"=>"China",
                "heading"=>270
            ],


            // EUROPE - ASIA

            [
                "start"=>[45,10],
                "destination"=>"Singapore",
                "country"=>"Germany",
                "heading"=>120
            ],


            [
                "start"=>[35,20],
                "destination"=>"Shanghai",
                "country"=>"France",
                "heading"=>100
            ],


            // MIDDLE EAST

            [
                "start"=>[15,60],
                "destination"=>"Singapore",
                "country"=>"India",
                "heading"=>110
            ],


            // AUSTRALIA

            [
                "start"=>[-20,140],
                "destination"=>"China",
                "country"=>"Australia",
                "heading"=>320
            ],


            // ATLANTIC

            [
                "start"=>[35,-40],
                "destination"=>"Rotterdam",
                "country"=>"United States",
                "heading"=>70
            ],


        ];



        $countries=[

            "Singapore",
            "China",
            "Japan",
            "South Korea",
            "France",
            "Germany",
            "Netherlands",
            "United States",
            "Australia",
            "India"

        ];



        $cargo=[

            "Container",
            "Electronics",
            "Vehicle",
            "Oil",
            "Machinery"

        ];




        $counter=1;



        /*
        |--------------------------------------------------------------------------
        | CREATE 40 VESSELS
        |--------------------------------------------------------------------------
        */


        for($i=1;$i<=40;$i++){



            $route=$routes[array_rand($routes)];



            $countryName=$route['country'];



            $country=Country::where(
                'name',
                $countryName
            )->first();



            if(!$country){

                $country=Country::first();

            }



            $lat=$route['start'][0];

            $lng=$route['start'][1];



            /*
            |--------------------------------------------------------------------------
            | Random position kecil agar kapal tidak menumpuk
            |--------------------------------------------------------------------------
            */


            $lat += rand(-15,15)/10;
            $lng += rand(-20,20)/10;



            Vessel::create([


                "imo"=>"98200".$i,


                "name"=>"Global Vessel ".$i,



                "country_id"=>$country->id,


                "latitude"=>$lat,


                "longitude"=>$lng,


                "destination"=>$route['destination'],


                "current_port"=>$countryName." Sea",



                "status"=>[

                    "Sailing",
                    "Sailing",
                    "Sailing",
                    "Loading",
                    "Delayed"

                ][array_rand([

                    "Sailing",
                    "Sailing",
                    "Sailing",
                    "Loading",
                    "Delayed"

                ])],



                "speed"=>rand(15,28),



                "heading"=>$route['heading'],



                "cargo"=>$cargo[array_rand($cargo)],



                "capacity"=>rand(
                    12000,
                    24000
                ),



                "eta"=>Carbon::now()
                    ->addDays(
                        rand(3,20)
                    ),



                "risk_score"=>rand(
                    10,
                    70
                )


            ]);



        }



        $this->command->info(
            "40 Realistic Ocean Vessels Imported Successfully"
        );


    }
}