<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShippingRoute;
use App\Models\Port;


class ShippingRouteSeeder extends Seeder
{

    public function run(): void
    {


        $routes = [


            [
                'origin'=>'Singapore',
                'destination'=>'Rotterdam',
                'name'=>'Asia Europe Container Route',
                'distance'=>15900,
                'days'=>25,
                'type'=>'Container'
            ],


            [
                'origin'=>'Shanghai',
                'destination'=>'Los Angeles',
                'name'=>'Pacific Container Route',
                'distance'=>10400,
                'days'=>18,
                'type'=>'Container'
            ],


            [
                'origin'=>'Busan',
                'destination'=>'Hamburg',
                'name'=>'Asia Germany Route',
                'distance'=>17000,
                'days'=>28,
                'type'=>'Container'
            ],


            [
                'origin'=>'Dubai',
                'destination'=>'Mumbai',
                'name'=>'Middle East Trade Route',
                'distance'=>2000,
                'days'=>5,
                'type'=>'Energy'
            ]

        ];




        foreach($routes as $route)
        {


            $origin = Port::where(
                'name',
                'LIKE',
                '%'.$route['origin'].'%'
            )->first();



            $destination = Port::where(
                'name',
                'LIKE',
                '%'.$route['destination'].'%'
            )->first();



            if(
                $origin &&
                $destination
            )
            {


                ShippingRoute::updateOrCreate(

                    [

                    'origin_port_id'=>$origin->id,

                    'destination_port_id'=>$destination->id

                    ],

                    [

                    'route_name'=>$route['name'],

                    'distance'=>$route['distance'],

                    'estimated_days'=>$route['days'],

                    'trade_type'=>$route['type']

                    ]

                );


            }


        }


    }

}