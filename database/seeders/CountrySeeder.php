<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {

        $countries = [

            [
                'name' => 'Indonesia',
                'code' => 'ID',
                'currency' => 'IDR',
                'region' => 'Asia',
                'language' => 'Indonesian',
            ],

            [
                'name' => 'United States',
                'code' => 'US',
                'currency' => 'USD',
                'region' => 'North America',
                'language' => 'English',
            ],

            [
                'name' => 'China',
                'code' => 'CN',
                'currency' => 'CNY',
                'region' => 'Asia',
                'language' => 'Chinese',
            ],

            [
                'name' => 'Japan',
                'code' => 'JP',
                'currency' => 'JPY',
                'region' => 'Asia',
                'language' => 'Japanese',
            ],

            [
                'name' => 'Germany',
                'code' => 'DE',
                'currency' => 'EUR',
                'region' => 'Europe',
                'language' => 'German',
            ],

        ];


        foreach($countries as $country)
        {

            Country::updateOrCreate(
                [
                    'code' => $country['code']
                ],
                $country
            );

        }

    }
}