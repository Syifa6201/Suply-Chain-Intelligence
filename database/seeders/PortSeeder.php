<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Port;
use App\Models\Country;


class PortSeeder extends Seeder
{


public function run(): void
{


Schema::disableForeignKeyConstraints();


DB::table('shipping_routes')->delete();

DB::table('ports')->delete();


Schema::enableForeignKeyConstraints();

$ports = [



/*
|--------------------------------------------------------------------------
| ASIA
|--------------------------------------------------------------------------
*/


[
'country'=>'Singapore',

'ports'=>[


[
'name'=>'Port of Singapore',
'city'=>'Singapore',
'lat'=>1.2644,
'lon'=>103.8220,
'terminal'=>'PSA Singapore',
'type'=>'Container Port',
'capacity'=>37000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Indonesia',

'ports'=>[


[
'name'=>'Tanjung Priok Port',
'city'=>'Jakarta',
'lat'=>-6.1048,
'lon'=>106.8800,
'terminal'=>'Jakarta International Container Terminal',
'type'=>'Container Port',
'capacity'=>9500000,
'congestion'=>70,
'status'=>'Delay'
],


[
'name'=>'Tanjung Perak Port',
'city'=>'Surabaya',
'lat'=>-7.2049,
'lon'=>112.7196,
'terminal'=>'Surabaya Container Terminal',
'type'=>'Container Port',
'capacity'=>3500000,
'congestion'=>45,
'status'=>'Normal'
],


]

],





[
'country'=>'China',

'ports'=>[


[
'name'=>'Shanghai Port',
'city'=>'Shanghai',
'lat'=>31.2304,
'lon'=>121.4737,
'terminal'=>'Yangshan Deep Water Port',
'type'=>'Container Port',
'capacity'=>47000000,
'congestion'=>85,
'status'=>'Critical'
],


[
'name'=>'Port of Shenzhen',
'city'=>'Shenzhen',
'lat'=>22.5431,
'lon'=>114.0579,
'terminal'=>'Yantian Terminal',
'type'=>'Container Port',
'capacity'=>33000000,
'congestion'=>65,
'status'=>'Delay'
],


[
'name'=>'Ningbo-Zhoushan Port',
'city'=>'Ningbo',
'lat'=>29.8683,
'lon'=>121.5440,
'terminal'=>'Ningbo Terminal',
'type'=>'Container Port',
'capacity'=>33000000,
'congestion'=>40,
'status'=>'Normal'
],


[
'name'=>'Guangzhou Port',
'city'=>'Guangzhou',
'lat'=>23.1291,
'lon'=>113.2644,
'terminal'=>'Guangzhou Terminal',
'type'=>'Container Port',
'capacity'=>24000000,
'congestion'=>50,
'status'=>'Delay'
],


]

],





[
'country'=>'Japan',

'ports'=>[


[
'name'=>'Port of Tokyo',
'city'=>'Tokyo',
'lat'=>35.6170,
'lon'=>139.7714,
'terminal'=>'Tokyo Bay Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>30,
'status'=>'Normal'
],


[
'name'=>'Port of Yokohama',
'city'=>'Yokohama',
'lat'=>35.4437,
'lon'=>139.6380,
'terminal'=>'Yokohama Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>25,
'status'=>'Normal'
],


]

],





[
'country'=>'South Korea',

'ports'=>[


[
'name'=>'Port of Busan',
'city'=>'Busan',
'lat'=>35.1796,
'lon'=>129.0756,
'terminal'=>'Busan New Port',
'type'=>'Container Port',
'capacity'=>22000000,
'congestion'=>40,
'status'=>'Normal'
],


]

],





[
'country'=>'Malaysia',

'ports'=>[


[
'name'=>'Port Klang',
'city'=>'Kuala Lumpur',
'lat'=>3.0000,
'lon'=>101.4000,
'terminal'=>'Westport Terminal',
'type'=>'Container Port',
'capacity'=>14000000,
'congestion'=>45,
'status'=>'Normal'
],


]

],





[
'country'=>'Thailand',

'ports'=>[


[
'name'=>'Laem Chabang Port',
'city'=>'Laem Chabang',
'lat'=>13.0827,
'lon'=>100.8833,
'terminal'=>'Laem Chabang Terminal',
'type'=>'Container Port',
'capacity'=>8000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Vietnam',

'ports'=>[


[
'name'=>'Cat Lai Port',
'city'=>'Ho Chi Minh',
'lat'=>10.8231,
'lon'=>106.6297,
'terminal'=>'Cat Lai Terminal',
'type'=>'Container Port',
'capacity'=>8000000,
'congestion'=>60,
'status'=>'Delay'
],


]

],

/*
|--------------------------------------------------------------------------
| SOUTH ASIA
|--------------------------------------------------------------------------
*/


[
'country'=>'India',

'ports'=>[


[
'name'=>'Nhava Sheva Port',
'city'=>'Mumbai',
'lat'=>18.9500,
'lon'=>72.9500,
'terminal'=>'Jawaharlal Nehru Port Terminal',
'type'=>'Container Port',
'capacity'=>5500000,
'congestion'=>75,
'status'=>'Critical'
],


[
'name'=>'Chennai Port',
'city'=>'Chennai',
'lat'=>13.0827,
'lon'=>80.2707,
'terminal'=>'Chennai Container Terminal',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>35,
'status'=>'Normal'
],


[
'name'=>'Mundra Port',
'city'=>'Gujarat',
'lat'=>22.8390,
'lon'=>69.7210,
'terminal'=>'Mundra Container Terminal',
'type'=>'Container Port',
'capacity'=>7000000,
'congestion'=>30,
'status'=>'Normal'
],


[
'name'=>'Kolkata Port',
'city'=>'Kolkata',
'lat'=>22.5726,
'lon'=>88.3639,
'terminal'=>'Kolkata Dock System',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>45,
'status'=>'Normal'
],


]

],




[
'country'=>'Philippines',

'ports'=>[


[
'name'=>'Port of Manila',
'city'=>'Manila',
'lat'=>14.5995,
'lon'=>120.9842,
'terminal'=>'Manila South Harbor',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>65,
'status'=>'Delay'
],


[
'name'=>'Port of Cebu',
'city'=>'Cebu',
'lat'=>10.3157,
'lon'=>123.8854,
'terminal'=>'Cebu International Port',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],




[
'country'=>'Taiwan',

'ports'=>[


[
'name'=>'Port of Kaohsiung',
'city'=>'Kaohsiung',
'lat'=>22.6273,
'lon'=>120.3014,
'terminal'=>'Kaohsiung Container Terminal',
'type'=>'Container Port',
'capacity'=>10000000,
'congestion'=>40,
'status'=>'Normal'
],


[
'name'=>'Port of Keelung',
'city'=>'Keelung',
'lat'=>25.1276,
'lon'=>121.7392,
'terminal'=>'Keelung Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>30,
'status'=>'Normal'
],


]

],





/*
|--------------------------------------------------------------------------
| MIDDLE EAST
|--------------------------------------------------------------------------
*/


[
'country'=>'United Arab Emirates',

'ports'=>[


[
'name'=>'Jebel Ali Port',
'city'=>'Dubai',
'lat'=>25.0115,
'lon'=>55.0615,
'terminal'=>'DP World Jebel Ali',
'type'=>'Container Port',
'capacity'=>14000000,
'congestion'=>30,
'status'=>'Normal'
],


[
'name'=>'Port of Abu Dhabi',
'city'=>'Abu Dhabi',
'lat'=>24.4539,
'lon'=>54.3773,
'terminal'=>'Khalifa Port',
'type'=>'Container Port',
'capacity'=>9000000,
'congestion'=>25,
'status'=>'Normal'
],


]

],




[
'country'=>'Qatar',

'ports'=>[


[
'name'=>'Hamad Port',
'city'=>'Doha',
'lat'=>25.2900,
'lon'=>51.5300,
'terminal'=>'Hamad Port Terminal',
'type'=>'Container Port',
'capacity'=>7500000,
'congestion'=>25,
'status'=>'Normal'
],


]

],




[
'country'=>'Saudi Arabia',

'ports'=>[


[
'name'=>'Jeddah Islamic Port',
'city'=>'Jeddah',
'lat'=>21.4858,
'lon'=>39.1925,
'terminal'=>'Jeddah Container Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>45,
'status'=>'Normal'
],


[
'name'=>'King Abdullah Port',
'city'=>'King Abdullah',
'lat'=>22.3500,
'lon'=>39.1000,
'terminal'=>'King Abdullah Container Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>30,
'status'=>'Normal'
],


]

],




[
'country'=>'Turkey',

'ports'=>[


[
'name'=>'Port of Istanbul',
'city'=>'Istanbul',
'lat'=>41.0082,
'lon'=>28.9784,
'terminal'=>'Ambarli Port',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>55,
'status'=>'Delay'
],


[
'name'=>'Port of Mersin',
'city'=>'Mersin',
'lat'=>36.8121,
'lon'=>34.6415,
'terminal'=>'Mersin International Port',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>35,
'status'=>'Normal'
],


]

],

/*
|--------------------------------------------------------------------------
| EUROPE
|--------------------------------------------------------------------------
*/


[
'country'=>'Netherlands',

'ports'=>[


[
'name'=>'Port of Rotterdam',
'city'=>'Rotterdam',
'lat'=>51.9244,
'lon'=>4.4777,
'terminal'=>'Maasvlakte Terminal',
'type'=>'Container Port',
'capacity'=>15000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Germany',

'ports'=>[


[
'name'=>'Port of Hamburg',
'city'=>'Hamburg',
'lat'=>53.5461,
'lon'=>9.9661,
'terminal'=>'Hamburg Container Terminal',
'type'=>'Container Port',
'capacity'=>9000000,
'congestion'=>60,
'status'=>'Delay'
],



[
'name'=>'Port of Bremerhaven',
'city'=>'Bremerhaven',
'lat'=>53.5396,
'lon'=>8.5809,
'terminal'=>'Bremerhaven Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>40,
'status'=>'Normal'
],


]

],





[
'country'=>'Belgium',

'ports'=>[


[
'name'=>'Port of Antwerp',
'city'=>'Antwerp',
'lat'=>51.2640,
'lon'=>4.3997,
'terminal'=>'Antwerp Gateway',
'type'=>'Container Port',
'capacity'=>12000000,
'congestion'=>45,
'status'=>'Normal'
],


]

],





[
'country'=>'Spain',

'ports'=>[


[
'name'=>'Port of Valencia',
'city'=>'Valencia',
'lat'=>39.4500,
'lon'=>-0.3167,
'terminal'=>'Valencia Terminal',
'type'=>'Container Port',
'capacity'=>6000000,
'congestion'=>40,
'status'=>'Normal'
],


[
'name'=>'Port of Barcelona',
'city'=>'Barcelona',
'lat'=>41.3500,
'lon'=>2.1600,
'terminal'=>'Barcelona Container Terminal',
'type'=>'Container Port',
'capacity'=>3500000,
'congestion'=>35,
'status'=>'Normal'
],


[
'name'=>'Port of Algeciras',
'city'=>'Algeciras',
'lat'=>36.1280,
'lon'=>-5.4410,
'terminal'=>'Algeciras Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>30,
'status'=>'Normal'
],


]

],





[
'country'=>'Italy',

'ports'=>[


[
'name'=>'Port of Genoa',
'city'=>'Genoa',
'lat'=>44.4056,
'lon'=>8.9463,
'terminal'=>'Genoa Terminal',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>55,
'status'=>'Delay'
],


[
'name'=>'Port of Trieste',
'city'=>'Trieste',
'lat'=>45.6495,
'lon'=>13.7768,
'terminal'=>'Trieste Marine Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>30,
'status'=>'Normal'
],


]

],





[
'country'=>'France',

'ports'=>[


[
'name'=>'Port of Marseille',
'city'=>'Marseille',
'lat'=>43.2965,
'lon'=>5.3698,
'terminal'=>'Marseille Fos Port',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>35,
'status'=>'Normal'
],


[
'name'=>'Port of Le Havre',
'city'=>'Le Havre',
'lat'=>49.4944,
'lon'=>0.1079,
'terminal'=>'Le Havre Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>30,
'status'=>'Normal'
],


]

],





[
'country'=>'United Kingdom',

'ports'=>[


[
'name'=>'Port of Felixstowe',
'city'=>'Felixstowe',
'lat'=>51.9540,
'lon'=>1.3510,
'terminal'=>'Felixstowe Terminal',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>65,
'status'=>'Critical'
],


[
'name'=>'Port of London Gateway',
'city'=>'London',
'lat'=>51.5074,
'lon'=>0.1278,
'terminal'=>'London Gateway Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Portugal',

'ports'=>[


[
'name'=>'Port of Lisbon',
'city'=>'Lisbon',
'lat'=>38.7223,
'lon'=>-9.1393,
'terminal'=>'Lisbon Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>30,
'status'=>'Normal'
],


]

],





[
'country'=>'Greece',

'ports'=>[


[
'name'=>'Port of Piraeus',
'city'=>'Athens',
'lat'=>37.9420,
'lon'=>23.6460,
'terminal'=>'Piraeus Container Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Poland',

'ports'=>[


[
'name'=>'Port of Gdansk',
'city'=>'Gdansk',
'lat'=>54.3520,
'lon'=>18.6466,
'terminal'=>'Baltic Hub Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>25,
'status'=>'Normal'
],


]

],





[
'country'=>'Russia',

'ports'=>[


[
'name'=>'Port of St Petersburg',
'city'=>'Saint Petersburg',
'lat'=>59.9343,
'lon'=>30.3351,
'terminal'=>'St Petersburg Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>40,
'status'=>'Normal'
],


[
'name'=>'Port of Novorossiysk',
'city'=>'Novorossiysk',
'lat'=>44.7234,
'lon'=>37.7687,
'terminal'=>'Novorossiysk Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>35,
'status'=>'Normal'
],


]

],

/*
|--------------------------------------------------------------------------
| NORTH & SOUTH AMERICA
|--------------------------------------------------------------------------
*/


[
'country'=>'United States',

'ports'=>[


[
'name'=>'Port of Los Angeles',
'city'=>'Los Angeles',
'lat'=>33.7405,
'lon'=>-118.2700,
'terminal'=>'San Pedro Bay Terminal',
'type'=>'Container Port',
'capacity'=>10000000,
'congestion'=>85,
'status'=>'Critical'
],



[
'name'=>'Port of Long Beach',
'city'=>'Long Beach',
'lat'=>33.7542,
'lon'=>-118.2165,
'terminal'=>'Long Beach Container Terminal',
'type'=>'Container Port',
'capacity'=>9000000,
'congestion'=>75,
'status'=>'Critical'
],



[
'name'=>'Port of New York and New Jersey',
'city'=>'New York',
'lat'=>40.6681,
'lon'=>-74.0451,
'terminal'=>'NY/NJ Terminal',
'type'=>'Container Port',
'capacity'=>8000000,
'congestion'=>45,
'status'=>'Normal'
],



[
'name'=>'Port of Savannah',
'city'=>'Savannah',
'lat'=>32.0809,
'lon'=>-81.0912,
'terminal'=>'Garden City Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>40,
'status'=>'Normal'
],



[
'name'=>'Port of Houston',
'city'=>'Houston',
'lat'=>29.7604,
'lon'=>-95.3698,
'terminal'=>'Houston Container Terminal',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>50,
'status'=>'Delay'
],



[
'name'=>'Port of Miami',
'city'=>'Miami',
'lat'=>25.7617,
'lon'=>-80.1918,
'terminal'=>'Miami Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>30,
'status'=>'Normal'
],



[
'name'=>'Port of Seattle',
'city'=>'Seattle',
'lat'=>47.6062,
'lon'=>-122.3321,
'terminal'=>'Seattle Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Canada',

'ports'=>[


[
'name'=>'Port of Vancouver',
'city'=>'Vancouver',
'lat'=>49.2900,
'lon'=>-123.1100,
'terminal'=>'Vancouver Fraser Port',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>45,
'status'=>'Normal'
],



[
'name'=>'Port of Montreal',
'city'=>'Montreal',
'lat'=>45.5017,
'lon'=>-73.5673,
'terminal'=>'Montreal Gateway Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>35,
'status'=>'Normal'
],



[
'name'=>'Port of Halifax',
'city'=>'Halifax',
'lat'=>44.6488,
'lon'=>-63.5752,
'terminal'=>'Halifax Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>25,
'status'=>'Normal'
],


]

],





[
'country'=>'Mexico',

'ports'=>[


[
'name'=>'Port of Manzanillo',
'city'=>'Manzanillo',
'lat'=>19.1138,
'lon'=>-104.3385,
'terminal'=>'Manzanillo Container Terminal',
'type'=>'Container Port',
'capacity'=>3500000,
'congestion'=>55,
'status'=>'Delay'
],



[
'name'=>'Port of Veracruz',
'city'=>'Veracruz',
'lat'=>19.1738,
'lon'=>-96.1342,
'terminal'=>'Veracruz Container Terminal',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Brazil',

'ports'=>[


[
'name'=>'Port of Santos',
'city'=>'Santos',
'lat'=>-23.9608,
'lon'=>-46.3336,
'terminal'=>'Santos Container Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>70,
'status'=>'Critical'
],



[
'name'=>'Port of Rio Grande',
'city'=>'Rio Grande',
'lat'=>-32.0350,
'lon'=>-52.0986,
'terminal'=>'Rio Grande Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>40,
'status'=>'Normal'
],



[
'name'=>'Port of Paranagua',
'city'=>'Paranagua',
'lat'=>-25.5163,
'lon'=>-48.5225,
'terminal'=>'Paranagua Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>45,
'status'=>'Normal'
],


]

],





[
'country'=>'Chile',

'ports'=>[


[
'name'=>'Port of Valparaiso',
'city'=>'Valparaiso',
'lat'=>-33.0472,
'lon'=>-71.6127,
'terminal'=>'Valparaiso Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>35,
'status'=>'Normal'
],


[
'name'=>'Port of San Antonio',
'city'=>'San Antonio',
'lat'=>-33.5800,
'lon'=>-71.6100,
'terminal'=>'San Antonio Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>40,
'status'=>'Normal'
],


]

],





[
'country'=>'Panama',

'ports'=>[


[
'name'=>'Port of Balboa',
'city'=>'Panama City',
'lat'=>8.9518,
'lon'=>-79.5550,
'terminal'=>'Balboa Container Terminal',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>30,
'status'=>'Normal'
],



[
'name'=>'Port of Colon',
'city'=>'Colon',
'lat'=>9.3592,
'lon'=>-79.9014,
'terminal'=>'Colon Container Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Colombia',

'ports'=>[


[
'name'=>'Port of Cartagena',
'city'=>'Cartagena',
'lat'=>10.3910,
'lon'=>-75.4794,
'terminal'=>'Cartagena Container Terminal',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>35,
'status'=>'Normal'
],


]

],

/*
|--------------------------------------------------------------------------
| AFRICA
|--------------------------------------------------------------------------
*/


[
'country'=>'Egypt',

'ports'=>[


[
'name'=>'Port Said',
'city'=>'Port Said',
'lat'=>31.2653,
'lon'=>32.3019,
'terminal'=>'Suez Canal Container Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>35,
'status'=>'Normal'
],


[
'name'=>'Alexandria Port',
'city'=>'Alexandria',
'lat'=>31.2001,
'lon'=>29.9187,
'terminal'=>'Alexandria Container Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>45,
'status'=>'Normal'
],


]

],





[
'country'=>'South Africa',

'ports'=>[


[
'name'=>'Port of Durban',
'city'=>'Durban',
'lat'=>-29.8719,
'lon'=>31.0469,
'terminal'=>'Durban Container Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>70,
'status'=>'Critical'
],


[
'name'=>'Port of Cape Town',
'city'=>'Cape Town',
'lat'=>-33.9249,
'lon'=>18.4241,
'terminal'=>'Cape Town Container Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>40,
'status'=>'Normal'
],


[
'name'=>'Port Elizabeth',
'city'=>'Gqeberha',
'lat'=>-33.9608,
'lon'=>25.6022,
'terminal'=>'Ngqura Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>35,
'status'=>'Normal'
],


]

],





[
'country'=>'Morocco',

'ports'=>[


[
'name'=>'Tanger Med Port',
'city'=>'Tangier',
'lat'=>35.8880,
'lon'=>-5.5030,
'terminal'=>'Tanger Med Container Terminal',
'type'=>'Container Port',
'capacity'=>9000000,
'congestion'=>30,
'status'=>'Normal'
],


]

],





[
'country'=>'Nigeria',

'ports'=>[


[
'name'=>'Lagos Port',
'city'=>'Lagos',
'lat'=>6.5244,
'lon'=>3.3792,
'terminal'=>'Apapa Container Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>65,
'status'=>'Delay'
],


]

],





[
'country'=>'Kenya',

'ports'=>[


[
'name'=>'Port of Mombasa',
'city'=>'Mombasa',
'lat'=>-4.0435,
'lon'=>39.6682,
'terminal'=>'Mombasa Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>40,
'status'=>'Normal'
],


]

],





[
'country'=>'Djibouti',

'ports'=>[


[
'name'=>'Port of Djibouti',
'city'=>'Djibouti',
'lat'=>11.5721,
'lon'=>43.1456,
'terminal'=>'Djibouti Container Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>30,
'status'=>'Normal'
],


]

],





/*
|--------------------------------------------------------------------------
| OCEANIA
|--------------------------------------------------------------------------
*/


[
'country'=>'Australia',

'ports'=>[


[
'name'=>'Port of Sydney',
'city'=>'Sydney',
'lat'=>-33.8568,
'lon'=>151.2153,
'terminal'=>'Sydney Container Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>35,
'status'=>'Normal'
],


[
'name'=>'Port of Melbourne',
'city'=>'Melbourne',
'lat'=>-37.8409,
'lon'=>144.9465,
'terminal'=>'Melbourne Terminal',
'type'=>'Container Port',
'capacity'=>3000000,
'congestion'=>45,
'status'=>'Normal'
],


[
'name'=>'Port of Brisbane',
'city'=>'Brisbane',
'lat'=>-27.4698,
'lon'=>153.0251,
'terminal'=>'Brisbane Container Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>30,
'status'=>'Normal'
],


[
'name'=>'Port of Fremantle',
'city'=>'Perth',
'lat'=>-32.0569,
'lon'=>115.7439,
'terminal'=>'Fremantle Container Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],


]

],





[
'country'=>'New Zealand',

'ports'=>[


[
'name'=>'Port of Auckland',
'city'=>'Auckland',
'lat'=>-36.8485,
'lon'=>174.7633,
'terminal'=>'Auckland Container Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>30,
'status'=>'Normal'
],


[
'name'=>'Port of Tauranga',
'city'=>'Tauranga',
'lat'=>-37.6878,
'lon'=>176.1651,
'terminal'=>'Tauranga Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>35,
'status'=>'Normal'
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


            'terminal'=>$port['terminal'],


            'type'=>$port['type'],


            'capacity'=>$port['capacity'],


            'congestion'=>$port['congestion'],


            'status'=>$port['status'],


            'risk_score'=>

                $port['congestion'] >= 80
                ? 90

                :

                (
                    $port['congestion'] >= 50
                    ? 60
                    : 30
                )


        ]);



    }


}



}
}