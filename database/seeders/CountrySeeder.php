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
                'name'=>'Indonesia',
                'code'=>'ID',
                'iso2'=>'ID',
                'iso3'=>'IDN',
                'currency'=>'IDR',
                'region'=>'Asia',
                'language'=>'Indonesian',
                'capital'=>'Jakarta',
                'latitude'=>-6.2088,
                'longitude'=>106.8456,
                'flag'=>'https://flagcdn.com/w320/id.png',
            ],

            [
                'name'=>'Singapore',
                'code'=>'SG',
                'iso2'=>'SG',
                'iso3'=>'SGP',
                'currency'=>'SGD',
                'region'=>'Asia',
                'language'=>'English',
                'capital'=>'Singapore',
                'latitude'=>1.3521,
                'longitude'=>103.8198,
                'flag'=>'https://flagcdn.com/w320/sg.png',
            ],

            [
                'name'=>'China',
                'code'=>'CN',
                'iso2'=>'CN',
                'iso3'=>'CHN',
                'currency'=>'CNY',
                'region'=>'Asia',
                'language'=>'Chinese',
                'capital'=>'Beijing',
                'latitude'=>39.9042,
                'longitude'=>116.4074,
                'flag'=>'https://flagcdn.com/w320/cn.png',
            ],

            [
                'name'=>'Japan',
                'code'=>'JP',
                'iso2'=>'JP',
                'iso3'=>'JPN',
                'currency'=>'JPY',
                'region'=>'Asia',
                'language'=>'Japanese',
                'capital'=>'Tokyo',
                'latitude'=>35.6762,
                'longitude'=>139.6503,
                'flag'=>'https://flagcdn.com/w320/jp.png',
            ],

            [
                'name'=>'South Korea',
                'code'=>'KR',
                'iso2'=>'KR',
                'iso3'=>'KOR',
                'currency'=>'KRW',
                'region'=>'Asia',
                'language'=>'Korean',
                'capital'=>'Seoul',
                'latitude'=>37.5665,
                'longitude'=>126.9780,
                'flag'=>'https://flagcdn.com/w320/kr.png',
            ],

            [
                'name'=>'United States',
                'code'=>'US',
                'iso2'=>'US',
                'iso3'=>'USA',
                'currency'=>'USD',
                'region'=>'North America',
                'language'=>'English',
                'capital'=>'Washington D.C.',
                'latitude'=>38.9072,
                'longitude'=>-77.0369,
                'flag'=>'https://flagcdn.com/w320/us.png',
            ],

            [
                'name'=>'Germany',
                'code'=>'DE',
                'iso2'=>'DE',
                'iso3'=>'DEU',
                'currency'=>'EUR',
                'region'=>'Europe',
                'language'=>'German',
                'capital'=>'Berlin',
                'latitude'=>52.5200,
                'longitude'=>13.4050,
                'flag'=>'https://flagcdn.com/w320/de.png',
            ],

            [
                'name'=>'Netherlands',
                'code'=>'NL',
                'iso2'=>'NL',
                'iso3'=>'NLD',
                'currency'=>'EUR',
                'region'=>'Europe',
                'language'=>'Dutch',
                'capital'=>'Amsterdam',
                'latitude'=>52.3676,
                'longitude'=>4.9041,
                'flag'=>'https://flagcdn.com/w320/nl.png',
            ],

            [
                'name'=>'United Arab Emirates',
                'code'=>'AE',
                'iso2'=>'AE',
                'iso3'=>'ARE',
                'currency'=>'AED',
                'region'=>'Asia',
                'language'=>'Arabic',
                'capital'=>'Abu Dhabi',
                'latitude'=>24.4539,
                'longitude'=>54.3773,
                'flag'=>'https://flagcdn.com/w320/ae.png',
            ],

            [
                'name'=>'Australia',
                'code'=>'AU',
                'iso2'=>'AU',
                'iso3'=>'AUS',
                'currency'=>'AUD',
                'region'=>'Oceania',
                'language'=>'English',
                'capital'=>'Canberra',
                'latitude'=>-35.2809,
                'longitude'=>149.1300,
                'flag'=>'https://flagcdn.com/w320/au.png',
            ],

            [
                'name'=>'India',
                'code'=>'IN',
                'iso2'=>'IN',
                'iso3'=>'IND',
                'currency'=>'INR',
                'region'=>'Asia',
                'language'=>'Hindi, English',
                'capital'=>'New Delhi',
                'latitude'=>28.6139,
                'longitude'=>77.2090,
                'flag'=>'https://flagcdn.com/w320/in.png',
            ],

            [
                'name'=>'United Kingdom',
                'code'=>'GB',
                'iso2'=>'GB',
                'iso3'=>'GBR',
                'currency'=>'GBP',
                'region'=>'Europe',
                'language'=>'English',
                'capital'=>'London',
                'latitude'=>51.5074,
                'longitude'=>-0.1278,
                'flag'=>'https://flagcdn.com/w320/gb.png',
            ],

            [
                'name'=>'France',
                'code'=>'FR',
                'iso2'=>'FR',
                'iso3'=>'FRA',
                'currency'=>'EUR',
                'region'=>'Europe',
                'language'=>'French',
                'capital'=>'Paris',
                'latitude'=>48.8566,
                'longitude'=>2.3522,
                'flag'=>'https://flagcdn.com/w320/fr.png',
            ],

            [
                'name'=>'Italy',
                'code'=>'IT',
                'iso2'=>'IT',
                'iso3'=>'ITA',
                'currency'=>'EUR',
                'region'=>'Europe',
                'language'=>'Italian',
                'capital'=>'Rome',
                'latitude'=>41.9028,
                'longitude'=>12.4964,
                'flag'=>'https://flagcdn.com/w320/it.png',
            ],

            [
                'name'=>'Canada',
                'code'=>'CA',
                'iso2'=>'CA',
                'iso3'=>'CAN',
                'currency'=>'CAD',
                'region'=>'North America',
                'language'=>'English, French',
                'capital'=>'Ottawa',
                'latitude'=>45.4215,
                'longitude'=>-75.6972,
                'flag'=>'https://flagcdn.com/w320/ca.png',
            ],

            [
                'name'=>'Brazil',
                'code'=>'BR',
                'iso2'=>'BR',
                'iso3'=>'BRA',
                'currency'=>'BRL',
                'region'=>'South America',
                'language'=>'Portuguese',
                'capital'=>'Brasília',
                'latitude'=>-15.7939,
                'longitude'=>-47.8828,
                'flag'=>'https://flagcdn.com/w320/br.png',
            ],

            [
                'name'=>'Mexico',
                'code'=>'MX',
                'iso2'=>'MX',
                'iso3'=>'MEX',
                'currency'=>'MXN',
                'region'=>'North America',
                'language'=>'Spanish',
                'capital'=>'Mexico City',
                'latitude'=>19.4326,
                'longitude'=>-99.1332,
                'flag'=>'https://flagcdn.com/w320/mx.png',
            ],

            [
                'name'=>'Saudi Arabia',
                'code'=>'SA',
                'iso2'=>'SA',
                'iso3'=>'SAU',
                'currency'=>'SAR',
                'region'=>'Asia',
                'language'=>'Arabic',
                'capital'=>'Riyadh',
                'latitude'=>24.7136,
                'longitude'=>46.6753,
                'flag'=>'https://flagcdn.com/w320/sa.png',
            ],

            [
                'name'=>'Malaysia',
                'code'=>'MY',
                'iso2'=>'MY',
                'iso3'=>'MYS',
                'currency'=>'MYR',
                'region'=>'Asia',
                'language'=>'Malay',
                'capital'=>'Kuala Lumpur',
                'latitude'=>3.1390,
                'longitude'=>101.6869,
                'flag'=>'https://flagcdn.com/w320/my.png',
            ],

            [
                'name'=>'Thailand',
                'code'=>'TH',
                'iso2'=>'TH',
                'iso3'=>'THA',
                'currency'=>'THB',
                'region'=>'Asia',
                'language'=>'Thai',
                'capital'=>'Bangkok',
                'latitude'=>13.7563,
                'longitude'=>100.5018,
                'flag'=>'https://flagcdn.com/w320/th.png',
            ],

        ];

        foreach($countries as $country){

            Country::updateOrCreate(

                ['code'=>$country['code']],

                $country

            );

        }

        $this->command->info('10 Countries Imported Successfully');

    }
}