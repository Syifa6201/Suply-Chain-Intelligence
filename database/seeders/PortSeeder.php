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

            ],

           [
    'country' => 'Japan',

    'ports' => [

        [
            'name'=>'Tokyo Port',
            'city'=>'Tokyo',
            'lat'=>35.616,
            'lon'=>139.790,
            'status'=>'Normal',
            'congestion'=>20,
            'capacity'=>4700000
        ],

        [
            'name'=>'Yokohama Port',
            'city'=>'Yokohama',
            'lat'=>35.443,
            'lon'=>139.638,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>3200000
        ],

        [
            'name'=>'Nagoya Port',
            'city'=>'Nagoya',
            'lat'=>35.080,
            'lon'=>136.885,
            'status'=>'Normal',
            'congestion'=>22,
            'capacity'=>2900000
        ],

        [
            'name'=>'Kobe Port',
            'city'=>'Kobe',
            'lat'=>34.690,
            'lon'=>135.195,
            'status'=>'Delay',
            'congestion'=>41,
            'capacity'=>2500000
        ],

        [
            'name'=>'Osaka Port',
            'city'=>'Osaka',
            'lat'=>34.638,
            'lon'=>135.433,
            'status'=>'Normal',
            'congestion'=>19,
            'capacity'=>2300000
        ],

    ]

],

[
    'country'=>'Malaysia',

    'ports'=>[

        [
            'name'=>'Port Klang',
            'city'=>'Klang',
            'lat'=>3.000,
            'lon'=>101.400,
            'status'=>'Normal',
            'congestion'=>21,
            'capacity'=>13000000
        ],

        [
            'name'=>'Tanjung Pelepas',
            'city'=>'Johor',
            'lat'=>1.365,
            'lon'=>103.540,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>11000000
        ],

        [
            'name'=>'Penang Port',
            'city'=>'Penang',
            'lat'=>5.414,
            'lon'=>100.345,
            'status'=>'Delay',
            'congestion'=>42,
            'capacity'=>1800000
        ],

        [
            'name'=>'Bintulu Port',
            'city'=>'Bintulu',
            'lat'=>3.172,
            'lon'=>113.043,
            'status'=>'Normal',
            'congestion'=>16,
            'capacity'=>2500000
        ],

        [
            'name'=>'Kuantan Port',
            'city'=>'Kuantan',
            'lat'=>3.985,
            'lon'=>103.430,
            'status'=>'Normal',
            'congestion'=>20,
            'capacity'=>1700000
        ],

    ]

],

[
    'country'=>'Thailand',

    'ports'=>[

        [
            'name'=>'Laem Chabang',
            'city'=>'Chonburi',
            'lat'=>13.082,
            'lon'=>100.883,
            'status'=>'Normal',
            'congestion'=>24,
            'capacity'=>9000000
        ],

        [
            'name'=>'Bangkok Port',
            'city'=>'Bangkok',
            'lat'=>13.702,
            'lon'=>100.561,
            'status'=>'Delay',
            'congestion'=>45,
            'capacity'=>1600000
        ],

        [
            'name'=>'Map Ta Phut',
            'city'=>'Rayong',
            'lat'=>12.671,
            'lon'=>101.171,
            'status'=>'Normal',
            'congestion'=>28,
            'capacity'=>3200000
        ],

        [
            'name'=>'Songkhla Port',
            'city'=>'Songkhla',
            'lat'=>7.198,
            'lon'=>100.595,
            'status'=>'Normal',
            'congestion'=>17,
            'capacity'=>1200000
        ],

        [
            'name'=>'Sattahip Port',
            'city'=>'Chonburi',
            'lat'=>12.666,
            'lon'=>100.900,
            'status'=>'Normal',
            'congestion'=>19,
            'capacity'=>1100000
        ],

    ]

],

[
    'country'=>'Vietnam',

    'ports'=>[

        [
            'name'=>'Hai Phong',
            'city'=>'Hai Phong',
            'lat'=>20.864,
            'lon'=>106.683,
            'status'=>'Normal',
            'congestion'=>26,
            'capacity'=>5600000
        ],

        [
            'name'=>'Cat Lai',
            'city'=>'Ho Chi Minh',
            'lat'=>10.770,
            'lon'=>106.790,
            'status'=>'Delay',
            'congestion'=>49,
            'capacity'=>6200000
        ],

        [
            'name'=>'Da Nang Port',
            'city'=>'Da Nang',
            'lat'=>16.078,
            'lon'=>108.224,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>1500000
        ],

        [
            'name'=>'Cai Mep',
            'city'=>'Ba Ria',
            'lat'=>10.555,
            'lon'=>107.017,
            'status'=>'Normal',
            'congestion'=>22,
            'capacity'=>8000000
        ],

        [
            'name'=>'Quy Nhon',
            'city'=>'Quy Nhon',
            'lat'=>13.771,
            'lon'=>109.224,
            'status'=>'Normal',
            'congestion'=>15,
            'capacity'=>900000
        ],

    ]

],

[
    'country'=>'South Korea',

    'ports'=>[

        [
            'name'=>'Busan Port',
            'city'=>'Busan',
            'lat'=>35.102,
            'lon'=>129.040,
            'status'=>'Normal',
            'congestion'=>27,
            'capacity'=>23000000
        ],

        [
            'name'=>'Incheon Port',
            'city'=>'Incheon',
            'lat'=>37.456,
            'lon'=>126.705,
            'status'=>'Delay',
            'congestion'=>43,
            'capacity'=>3200000
        ],

        [
            'name'=>'Ulsan Port',
            'city'=>'Ulsan',
            'lat'=>35.501,
            'lon'=>129.389,
            'status'=>'Normal',
            'congestion'=>19,
            'capacity'=>4500000
        ],

        [
            'name'=>'Gwangyang Port',
            'city'=>'Gwangyang',
            'lat'=>34.940,
            'lon'=>127.695,
            'status'=>'Normal',
            'congestion'=>21,
            'capacity'=>2800000
        ],

        [
            'name'=>'Pyeongtaek Port',
            'city'=>'Pyeongtaek',
            'lat'=>36.961,
            'lon'=>126.822,
            'status'=>'Normal',
            'congestion'=>16,
            'capacity'=>1500000
        ],

    ]

],

[
    'country'=>'India',

    'ports'=>[

        [
            'name'=>'Nhava Sheva',
            'city'=>'Mumbai',
            'lat'=>18.949,
            'lon'=>72.952,
            'status'=>'Congested',
            'congestion'=>74,
            'capacity'=>7200000
        ],

        [
            'name'=>'Chennai Port',
            'city'=>'Chennai',
            'lat'=>13.087,
            'lon'=>80.291,
            'status'=>'Normal',
            'congestion'=>30,
            'capacity'=>2800000
        ],

        [
            'name'=>'Mundra Port',
            'city'=>'Gujarat',
            'lat'=>22.839,
            'lon'=>69.719,
            'status'=>'Normal',
            'congestion'=>22,
            'capacity'=>7600000
        ],

        [
            'name'=>'Kolkata Port',
            'city'=>'Kolkata',
            'lat'=>22.540,
            'lon'=>88.308,
            'status'=>'Delay',
            'congestion'=>48,
            'capacity'=>1900000
        ],

        [
            'name'=>'Visakhapatnam Port',
            'city'=>'Visakhapatnam',
            'lat'=>17.686,
            'lon'=>83.218,
            'status'=>'Normal',
            'congestion'=>24,
            'capacity'=>2100000
        ],

    ]

],

[
    'country'=>'Australia',

    'ports'=>[

        [
            'name'=>'Port Botany',
            'city'=>'Sydney',
            'lat'=>-33.966,
            'lon'=>151.226,
            'status'=>'Normal',
            'congestion'=>23,
            'capacity'=>2600000
        ],

        [
            'name'=>'Port of Melbourne',
            'city'=>'Melbourne',
            'lat'=>-37.842,
            'lon'=>144.918,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>3200000
        ],

        [
            'name'=>'Port of Brisbane',
            'city'=>'Brisbane',
            'lat'=>-27.370,
            'lon'=>153.169,
            'status'=>'Delay',
            'congestion'=>44,
            'capacity'=>1700000
        ],

        [
            'name'=>'Fremantle Port',
            'city'=>'Perth',
            'lat'=>-32.056,
            'lon'=>115.744,
            'status'=>'Normal',
            'congestion'=>19,
            'capacity'=>1100000
        ],

        [
            'name'=>'Port Adelaide',
            'city'=>'Adelaide',
            'lat'=>-34.843,
            'lon'=>138.507,
            'status'=>'Normal',
            'congestion'=>17,
            'capacity'=>900000
        ],

    ]

],

[
    'country'=>'Canada',

    'ports'=>[

        [
            'name'=>'Port of Vancouver',
            'city'=>'Vancouver',
            'lat'=>49.312,
            'lon'=>-123.080,
            'status'=>'Normal',
            'congestion'=>21,
            'capacity'=>3900000
        ],

        [
            'name'=>'Port of Montreal',
            'city'=>'Montreal',
            'lat'=>45.501,
            'lon'=>-73.545,
            'status'=>'Normal',
            'congestion'=>19,
            'capacity'=>1800000
        ],

        [
            'name'=>'Prince Rupert',
            'city'=>'Prince Rupert',
            'lat'=>54.315,
            'lon'=>-130.320,
            'status'=>'Normal',
            'congestion'=>16,
            'capacity'=>1400000
        ],

        [
            'name'=>'Port of Halifax',
            'city'=>'Halifax',
            'lat'=>44.648,
            'lon'=>-63.575,
            'status'=>'Delay',
            'congestion'=>46,
            'capacity'=>900000
        ],

        [
            'name'=>'Port of Saint John',
            'city'=>'Saint John',
            'lat'=>45.273,
            'lon'=>-66.063,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>700000
        ],

    ]

],

[
    'country'=>'Brazil',

    'ports'=>[

        [
            'name'=>'Port of Santos',
            'city'=>'Santos',
            'lat'=>-23.960,
            'lon'=>-46.333,
            'status'=>'Congested',
            'congestion'=>71,
            'capacity'=>5200000
        ],

        [
            'name'=>'Port of Rio de Janeiro',
            'city'=>'Rio de Janeiro',
            'lat'=>-22.897,
            'lon'=>-43.174,
            'status'=>'Normal',
            'congestion'=>27,
            'capacity'=>1800000
        ],

        [
            'name'=>'Port of Paranagua',
            'city'=>'Parana',
            'lat'=>-25.516,
            'lon'=>-48.509,
            'status'=>'Normal',
            'congestion'=>25,
            'capacity'=>2200000
        ],

        [
            'name'=>'Port of Itajai',
            'city'=>'Santa Catarina',
            'lat'=>-26.905,
            'lon'=>-48.655,
            'status'=>'Delay',
            'congestion'=>49,
            'capacity'=>1500000
        ],

        [
            'name'=>'Port of Suape',
            'city'=>'Recife',
            'lat'=>-8.393,
            'lon'=>-34.952,
            'status'=>'Normal',
            'congestion'=>22,
            'capacity'=>1700000
        ],

    ]

],

[
    'country'=>'Mexico',

    'ports'=>[

        [
            'name'=>'Port of Manzanillo',
            'city'=>'Colima',
            'lat'=>19.051,
            'lon'=>-104.315,
            'status'=>'Normal',
            'congestion'=>24,
            'capacity'=>3400000
        ],

        [
            'name'=>'Port of Veracruz',
            'city'=>'Veracruz',
            'lat'=>19.200,
            'lon'=>-96.134,
            'status'=>'Normal',
            'congestion'=>20,
            'capacity'=>1800000
        ],

        [
            'name'=>'Port of Lazaro Cardenas',
            'city'=>'Michoacan',
            'lat'=>17.956,
            'lon'=>-102.193,
            'status'=>'Delay',
            'congestion'=>43,
            'capacity'=>2600000
        ],

        [
            'name'=>'Port of Altamira',
            'city'=>'Tamaulipas',
            'lat'=>22.403,
            'lon'=>-97.870,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>1500000
        ],

        [
            'name'=>'Port of Progreso',
            'city'=>'Yucatan',
            'lat'=>21.284,
            'lon'=>-89.665,
            'status'=>'Normal',
            'congestion'=>16,
            'capacity'=>800000
        ],

    ]

],

[
    'country'=>'France',

    'ports'=>[

        [
            'name'=>'Port of Le Havre',
            'city'=>'Le Havre',
            'lat'=>49.494,
            'lon'=>0.107,
            'status'=>'Normal',
            'congestion'=>22,
            'capacity'=>2900000
        ],

        [
            'name'=>'Port of Marseille',
            'city'=>'Marseille',
            'lat'=>43.296,
            'lon'=>5.369,
            'status'=>'Normal',
            'congestion'=>20,
            'capacity'=>1800000
        ],

        [
            'name'=>'Port of Dunkirk',
            'city'=>'Dunkirk',
            'lat'=>51.034,
            'lon'=>2.376,
            'status'=>'Delay',
            'congestion'=>45,
            'capacity'=>950000
        ],

        [
            'name'=>'Port of Nantes',
            'city'=>'Nantes',
            'lat'=>47.218,
            'lon'=>-1.553,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>850000
        ],

        [
            'name'=>'Port of Rouen',
            'city'=>'Rouen',
            'lat'=>49.443,
            'lon'=>1.099,
            'status'=>'Normal',
            'congestion'=>19,
            'capacity'=>760000
        ],

    ]

],

[
    'country'=>'Netherlands',

    'ports'=>[

        [
            'name'=>'Port of Rotterdam',
            'city'=>'Rotterdam',
            'lat'=>51.924,
            'lon'=>4.479,
            'status'=>'Normal',
            'congestion'=>24,
            'capacity'=>14500000
        ],

        [
            'name'=>'Port of Amsterdam',
            'city'=>'Amsterdam',
            'lat'=>52.370,
            'lon'=>4.895,
            'status'=>'Normal',
            'congestion'=>17,
            'capacity'=>2500000
        ],

        [
            'name'=>'Port of Moerdijk',
            'city'=>'Moerdijk',
            'lat'=>51.700,
            'lon'=>4.630,
            'status'=>'Delay',
            'congestion'=>42,
            'capacity'=>1200000
        ],

        [
            'name'=>'Port of Vlissingen',
            'city'=>'Vlissingen',
            'lat'=>51.442,
            'lon'=>3.573,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>950000
        ],

        [
            'name'=>'Port of Groningen',
            'city'=>'Groningen',
            'lat'=>53.219,
            'lon'=>6.566,
            'status'=>'Normal',
            'congestion'=>15,
            'capacity'=>700000
        ],

    ]

],

[
    'country'=>'United Kingdom',

    'ports'=>[

        [
            'name'=>'Port of Felixstowe',
            'city'=>'Felixstowe',
            'lat'=>51.963,
            'lon'=>1.351,
            'status'=>'Normal',
            'congestion'=>21,
            'capacity'=>4100000
        ],

        [
            'name'=>'Port of Southampton',
            'city'=>'Southampton',
            'lat'=>50.909,
            'lon'=>-1.404,
            'status'=>'Normal',
            'congestion'=>19,
            'capacity'=>2300000
        ],

        [
            'name'=>'Port of Liverpool',
            'city'=>'Liverpool',
            'lat'=>53.408,
            'lon'=>-2.991,
            'status'=>'Delay',
            'congestion'=>44,
            'capacity'=>1200000
        ],

        [
            'name'=>'Port of London',
            'city'=>'London',
            'lat'=>51.507,
            'lon'=>-0.127,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>900000
        ],

        [
            'name'=>'Port of Bristol',
            'city'=>'Bristol',
            'lat'=>51.454,
            'lon'=>-2.587,
            'status'=>'Normal',
            'congestion'=>16,
            'capacity'=>850000
        ],

    ]

],

[
    'country'=>'Italy',

    'ports'=>[

        [
            'name'=>'Port of Genoa',
            'city'=>'Genoa',
            'lat'=>44.405,
            'lon'=>8.946,
            'status'=>'Normal',
            'congestion'=>20,
            'capacity'=>2700000
        ],

        [
            'name'=>'Port of Trieste',
            'city'=>'Trieste',
            'lat'=>45.649,
            'lon'=>13.777,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>1900000
        ],

        [
            'name'=>'Port of Venice',
            'city'=>'Venice',
            'lat'=>45.440,
            'lon'=>12.315,
            'status'=>'Delay',
            'congestion'=>43,
            'capacity'=>1100000
        ],

        [
            'name'=>'Port of Naples',
            'city'=>'Naples',
            'lat'=>40.851,
            'lon'=>14.268,
            'status'=>'Normal',
            'congestion'=>21,
            'capacity'=>980000
        ],

        [
            'name'=>'Port of Livorno',
            'city'=>'Livorno',
            'lat'=>43.548,
            'lon'=>10.310,
            'status'=>'Normal',
            'congestion'=>17,
            'capacity'=>900000
        ],

    ]

],

[
    'country'=>'Russia',

    'ports'=>[

        [
            'name'=>'Port of Novorossiysk',
            'city'=>'Novorossiysk',
            'lat'=>44.723,
            'lon'=>37.768,
            'status'=>'Normal',
            'congestion'=>23,
            'capacity'=>3900000
        ],

        [
            'name'=>'Port of Saint Petersburg',
            'city'=>'Saint Petersburg',
            'lat'=>59.934,
            'lon'=>30.335,
            'status'=>'Delay',
            'congestion'=>46,
            'capacity'=>3200000
        ],

        [
            'name'=>'Port of Vladivostok',
            'city'=>'Vladivostok',
            'lat'=>43.115,
            'lon'=>131.885,
            'status'=>'Normal',
            'congestion'=>20,
            'capacity'=>1800000
        ],

        [
            'name'=>'Port of Murmansk',
            'city'=>'Murmansk',
            'lat'=>68.958,
            'lon'=>33.082,
            'status'=>'Normal',
            'congestion'=>15,
            'capacity'=>1300000
        ],

        [
            'name'=>'Port of Kaliningrad',
            'city'=>'Kaliningrad',
            'lat'=>54.710,
            'lon'=>20.452,
            'status'=>'Normal',
            'congestion'=>18,
            'capacity'=>950000
        ],

    ]

],

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