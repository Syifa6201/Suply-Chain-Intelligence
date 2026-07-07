<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\CountryStatistic;

class CountryStatisticSeeder extends Seeder
{

    public function run(): void
    {

        $data = [

            [
                'country'=>'Indonesia',
                'inflation'=>2.8,
                'population'=>283000000,
                'export_value'=>292,
                'import_value'=>240
            ],

            [
                'country'=>'China',
                'inflation'=>0.7,
                'population'=>1410000000,
                'export_value'=>3590,
                'import_value'=>2720
            ],

            [
                'country'=>'Germany',
                'inflation'=>2.1,
                'population'=>84000000,
                'export_value'=>1780,
                'import_value'=>1600
            ],

            [
                'country'=>'Japan',
                'inflation'=>2.4,
                'population'=>123000000,
                'export_value'=>746,
                'import_value'=>891
            ],

            [
                'country'=>'United States',
                'inflation'=>3.1,
                'population'=>340000000,
                'export_value'=>2100,
                'import_value'=>3200
            ]

        ];


        foreach($data as $item)
        {

            $country = Country::where(
                'name',
                $item['country']
            )->first();


            if($country)
            {

                CountryStatistic::create([

                    'country_id'=>$country->id,

                    'inflation'=>$item['inflation'],

                    'population'=>$item['population'],

                    'export_value'=>$item['export_value'],

                    'import_value'=>$item['import_value']

                ]);

            }

        }

    }
}