<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShippingLane;


class ShippingLaneSeeder extends Seeder
{


public function run(): void
{


ShippingLane::truncate();



$lanes=[



[
'name'=>'Asia - Europe Trade Corridor',

'region'=>'Asia Europe',

'risk_level'=>20,

'active_vessel'=>18,


'coordinates'=>[


[31.230,121.490],
[20,120],
[1.280,103.840],
[6,80],
[12,45],
[30,32],
[51.948,4.142]


]

],




[
'name'=>'Asia - America Pacific Route',

'region'=>'Asia America',

'risk_level'=>35,

'active_vessel'=>12,


'coordinates'=>[


[31.230,121.490],
[35.450,139.650],
[30,170],
[33.740,-118.270]


]

],





[
'name'=>'Middle East Energy Corridor',

'region'=>'Middle East',

'risk_level'=>45,

'active_vessel'=>7,


'coordinates'=>[


[25.200,55.270],
[12,60],
[5,75],
[1.280,103.840]


]

],





[
'name'=>'Australia Asia Route',

'region'=>'Oceania',

'risk_level'=>25,

'active_vessel'=>5,


'coordinates'=>[


[-33.868,151.209],
[-10,130],
[1.280,103.840]


]

]


];



foreach($lanes as $lane){


ShippingLane::create($lane);


}


$this->command->info(
"Shipping Lane Imported"
);


}


}