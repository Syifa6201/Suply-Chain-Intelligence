<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Port;
use App\Models\Country;

class PortSeeder extends Seeder
{
    public function run(): void
    {
        Port::truncate();

        $ports = [

            [
                'country' => 'Indonesia',
                'ports' => [

                    [
                        'name'=>'Tanjung Priok',
                        'city'=>'Jakarta',
                        'lat'=>-6.104,
                        'lon'=>106.886,
                        'status'=>'Normal',
                        'congestion'=>18,
                        'capacity'=>9500000
                    ],

                    [
                        'name'=>'Belawan',
                        'city'=>'Medan',
                        'lat'=>3.784,
                        'lon'=>98.683,
                        'status'=>'Delay',
                        'congestion'=>55,
                        'capacity'=>1800000
                    ],

                    [
                        'name'=>'Makassar',
                        'city'=>'Makassar',
                        'lat'=>-5.146,
                        'lon'=>119.408,
                        'status'=>'Normal',
                        'congestion'=>15,
                        'capacity'=>2000000
                    ],

                ]

            ],

            [
                'country'=>'China',

                'ports'=>[

                    [
                        'name'=>'Shanghai',
                        'city'=>'Shanghai',
                        'lat'=>31.230,
                        'lon'=>121.490,
                        'status'=>'Congested',
                        'congestion'=>91,
                        'capacity'=>47000000
                    ],

                    [
                        'name'=>'Shenzhen',
                        'city'=>'Shenzhen',
                        'lat'=>22.543,
                        'lon'=>114.057,
                        'status'=>'Delay',
                        'congestion'=>63,
                        'capacity'=>29000000
                    ]

                ]

            ],

            [
                'country'=>'Germany',

                'ports'=>[

                    [
                        'name'=>'Hamburg',
                        'city'=>'Hamburg',
                        'lat'=>53.551,
                        'lon'=>9.993,
                        'status'=>'Normal',
                        'congestion'=>20,
                        'capacity'=>8900000
                    ]

                ]

            ],

            [
                'country'=>'United States',

                'ports'=>[

                    [
                        'name'=>'Los Angeles',
                        'city'=>'Los Angeles',
                        'lat'=>33.740,
                        'lon'=>-118.270,
                        'status'=>'Congested',
                        'congestion'=>88,
                        'capacity'=>9500000
                    ]

                ]

            ],

            [
                'country'=>'Singapore',

                'ports'=>[

                    [
                        'name'=>'PSA Singapore',
                        'city'=>'Singapore',
                        'lat'=>1.264,
                        'lon'=>103.840,
                        'status'=>'Normal',
                        'congestion'=>15,
                        'capacity'=>39000000
                    ]

                ]

            ]

        ];

        foreach($ports as $countryData){

            $country = Country::where(
                'name',
                $countryData['country']
            )->first();

            if(!$country){
                continue;
            }

            foreach($countryData['ports'] as $port){

                Port::create([

                    'country_id'=>$country->id,

                    'name'=>$port['name'],

                    'city'=>$port['city'],

                    'latitude'=>$port['lat'],

                    'longitude'=>$port['lon'],

                    'status'=>$port['status'],

                    'congestion'=>$port['congestion'],

                    'capacity'=>$port['capacity']

                ]);

            }

        }

    }
}