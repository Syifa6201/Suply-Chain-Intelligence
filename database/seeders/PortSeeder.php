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

[
'country'=>'Sri Lanka',

'ports'=>[

[
'name'=>'Port of Colombo',
'city'=>'Colombo',
'lat'=>6.9271,
'lon'=>79.8612,
'terminal'=>'Colombo International Container Terminal',
'type'=>'Container Port',
'capacity'=>7800000,
'congestion'=>40,
'status'=>'Normal'
],

[
'name'=>'Port of Hambantota',
'city'=>'Hambantota',
'lat'=>6.1246,
'lon'=>81.1185,
'terminal'=>'Hambantota Port',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Bangladesh',

'ports'=>[

[
'name'=>'Port of Chittagong',
'city'=>'Chittagong',
'lat'=>22.3350,
'lon'=>91.8325,
'terminal'=>'Chittagong Container Terminal',
'type'=>'Container Port',
'capacity'=>3200000,
'congestion'=>65,
'status'=>'Delay'
],

[
'name'=>'Port of Mongla',
'city'=>'Khulna',
'lat'=>22.4825,
'lon'=>89.6014,
'terminal'=>'Mongla Port Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Pakistan',

'ports'=>[

[
'name'=>'Port of Karachi',
'city'=>'Karachi',
'lat'=>24.8607,
'lon'=>66.9905,
'terminal'=>'Karachi International Terminal',
'type'=>'Container Port',
'capacity'=>3500000,
'congestion'=>55,
'status'=>'Delay'
],

[
'name'=>'Port Qasim',
'city'=>'Karachi',
'lat'=>24.7850,
'lon'=>67.3430,
'terminal'=>'Qasim Container Terminal',
'type'=>'Container Port',
'capacity'=>2400000,
'congestion'=>45,
'status'=>'Normal'
],

]

],

[
'country'=>'Oman',

'ports'=>[

[
'name'=>'Port of Sohar',
'city'=>'Sohar',
'lat'=>24.3430,
'lon'=>56.7290,
'terminal'=>'Sohar Container Terminal',
'type'=>'Container Port',
'capacity'=>4200000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Salalah',
'city'=>'Salalah',
'lat'=>17.0190,
'lon'=>54.0897,
'terminal'=>'Salalah Terminal',
'type'=>'Container Port',
'capacity'=>5000000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Vietnam',

'ports'=>[

[
'name'=>'Hai Phong Port',
'city'=>'Hai Phong',
'lat'=>20.8449,
'lon'=>106.6881,
'terminal'=>'Hai Phong International Terminal',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>45,
'status'=>'Normal'
],

[
'name'=>'Da Nang Port',
'city'=>'Da Nang',
'lat'=>16.0544,
'lon'=>108.2022,
'terminal'=>'Da Nang Port',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Malaysia',

'ports'=>[

[
'name'=>'Penang Port',
'city'=>'Penang',
'lat'=>5.4164,
'lon'=>100.3327,
'terminal'=>'Penang Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Bintulu Port',
'city'=>'Sarawak',
'lat'=>3.1700,
'lon'=>113.0400,
'terminal'=>'Bintulu Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Indonesia',

'ports'=>[

[
'name'=>'Port of Makassar',
'city'=>'Makassar',
'lat'=>-5.1477,
'lon'=>119.4327,
'terminal'=>'Makassar New Port',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Bitung',
'city'=>'Bitung',
'lat'=>1.4450,
'lon'=>125.1824,
'terminal'=>'Bitung International Hub',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Sorong',
'city'=>'Sorong',
'lat'=>-0.8762,
'lon'=>131.2558,
'terminal'=>'Sorong Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Norway',

'ports'=>[

[
'name'=>'Port of Oslo',
'city'=>'Oslo',
'lat'=>59.9070,
'lon'=>10.7522,
'terminal'=>'Oslo Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>25,
'status'=>'Normal'
],

[
'name'=>'Port of Bergen',
'city'=>'Bergen',
'lat'=>60.3913,
'lon'=>5.3221,
'terminal'=>'Bergen Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Sweden',

'ports'=>[

[
'name'=>'Port of Gothenburg',
'city'=>'Gothenburg',
'lat'=>57.7089,
'lon'=>11.9746,
'terminal'=>'Gothenburg Container Terminal',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Stockholm',
'city'=>'Stockholm',
'lat'=>59.3293,
'lon'=>18.0686,
'terminal'=>'Stockholm Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Finland',

'ports'=>[

[
'name'=>'Port of Helsinki',
'city'=>'Helsinki',
'lat'=>60.1699,
'lon'=>24.9384,
'terminal'=>'Helsinki South Harbour',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of HaminaKotka',
'city'=>'Kotka',
'lat'=>60.4660,
'lon'=>26.9458,
'terminal'=>'HaminaKotka Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Denmark',

'ports'=>[

[
'name'=>'Port of Aarhus',
'city'=>'Aarhus',
'lat'=>56.1629,
'lon'=>10.2039,
'terminal'=>'Aarhus Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Copenhagen',
'city'=>'Copenhagen',
'lat'=>55.6761,
'lon'=>12.5683,
'terminal'=>'Copenhagen Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Ireland',

'ports'=>[

[
'name'=>'Port of Dublin',
'city'=>'Dublin',
'lat'=>53.3498,
'lon'=>-6.2603,
'terminal'=>'Dublin Port Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Cork',
'city'=>'Cork',
'lat'=>51.8985,
'lon'=>-8.4756,
'terminal'=>'Cork Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Romania',

'ports'=>[

[
'name'=>'Port of Constanta',
'city'=>'Constanta',
'lat'=>44.1598,
'lon'=>28.6348,
'terminal'=>'Constanta South Terminal',
'type'=>'Container Port',
'capacity'=>2200000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Croatia',

'ports'=>[

[
'name'=>'Port of Rijeka',
'city'=>'Rijeka',
'lat'=>45.3271,
'lon'=>14.4422,
'terminal'=>'Rijeka Gateway',
'type'=>'Container Port',
'capacity'=>950000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Slovenia',

'ports'=>[

[
'name'=>'Port of Koper',
'city'=>'Koper',
'lat'=>45.5481,
'lon'=>13.7302,
'terminal'=>'Koper Container Terminal',
'type'=>'Container Port',
'capacity'=>1100000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Lithuania',

'ports'=>[

[
'name'=>'Port of Klaipeda',
'city'=>'Klaipeda',
'lat'=>55.7033,
'lon'=>21.1443,
'terminal'=>'Klaipeda Terminal',
'type'=>'Container Port',
'capacity'=>1300000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Latvia',

'ports'=>[

[
'name'=>'Port of Riga',
'city'=>'Riga',
'lat'=>56.9496,
'lon'=>24.1052,
'terminal'=>'Riga Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Estonia',

'ports'=>[

[
'name'=>'Port of Tallinn',
'city'=>'Tallinn',
'lat'=>59.4370,
'lon'=>24.7536,
'terminal'=>'Muuga Harbour',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Peru',

'ports'=>[

[
'name'=>'Port of Callao',
'city'=>'Callao',
'lat'=>-12.0464,
'lon'=>-77.1428,
'terminal'=>'Callao Container Terminal',
'type'=>'Container Port',
'capacity'=>2800000,
'congestion'=>40,
'status'=>'Normal'
],

[
'name'=>'Port of Paita',
'city'=>'Piura',
'lat'=>-5.0892,
'lon'=>-81.1144,
'terminal'=>'Paita Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Ecuador',

'ports'=>[

[
'name'=>'Port of Guayaquil',
'city'=>'Guayaquil',
'lat'=>-2.1709,
'lon'=>-79.9224,
'terminal'=>'Guayaquil Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Manta',
'city'=>'Manta',
'lat'=>-0.9677,
'lon'=>-80.7089,
'terminal'=>'Manta International Terminal',
'type'=>'Container Port',
'capacity'=>800000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Uruguay',

'ports'=>[

[
'name'=>'Port of Montevideo',
'city'=>'Montevideo',
'lat'=>-34.9011,
'lon'=>-56.1645,
'terminal'=>'Montevideo Container Terminal',
'type'=>'Container Port',
'capacity'=>1400000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Paraguay',

'ports'=>[

[
'name'=>'Port of Asuncion',
'city'=>'Asuncion',
'lat'=>-25.2637,
'lon'=>-57.5759,
'terminal'=>'Asuncion River Terminal',
'type'=>'River Port',
'capacity'=>500000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Bolivia',

'ports'=>[

[
'name'=>'Puerto Aguirre',
'city'=>'Santa Cruz',
'lat'=>-18.4700,
'lon'=>-57.8500,
'terminal'=>'Puerto Aguirre',
'type'=>'River Port',
'capacity'=>350000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Venezuela',

'ports'=>[

[
'name'=>'Port of La Guaira',
'city'=>'La Guaira',
'lat'=>10.6010,
'lon'=>-66.9330,
'terminal'=>'La Guaira Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>45,
'status'=>'Delay'
],

[
'name'=>'Port of Puerto Cabello',
'city'=>'Carabobo',
'lat'=>10.4731,
'lon'=>-68.0125,
'terminal'=>'Puerto Cabello Terminal',
'type'=>'Container Port',
'capacity'=>1700000,
'congestion'=>40,
'status'=>'Normal'
],

]

],

[
'country'=>'Costa Rica',

'ports'=>[

[
'name'=>'Port of Limon',
'city'=>'Limon',
'lat'=>9.9910,
'lon'=>-83.0360,
'terminal'=>'Limon Container Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Guatemala',

'ports'=>[

[
'name'=>'Puerto Quetzal',
'city'=>'Escuintla',
'lat'=>13.9200,
'lon'=>-90.7900,
'terminal'=>'Quetzal Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Dominican Republic',

'ports'=>[

[
'name'=>'Port of Caucedo',
'city'=>'Santo Domingo',
'lat'=>18.4300,
'lon'=>-69.6680,
'terminal'=>'DP World Caucedo',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Jamaica',

'ports'=>[

[
'name'=>'Port of Kingston',
'city'=>'Kingston',
'lat'=>17.9712,
'lon'=>-76.7936,
'terminal'=>'Kingston Freeport',
'type'=>'Container Port',
'capacity'=>3200000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Bahamas',

'ports'=>[

[
'name'=>'Freeport Harbour',
'city'=>'Freeport',
'lat'=>26.5333,
'lon'=>-78.7000,
'terminal'=>'Freeport Container Port',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>15,
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
'lat'=>-29.8710,
'lon'=>31.0260,
'terminal'=>'Durban Container Terminal',
'type'=>'Container Port',
'capacity'=>3200000,
'congestion'=>55,
'status'=>'Delay'
],

[
'name'=>'Port of Cape Town',
'city'=>'Cape Town',
'lat'=>-33.9180,
'lon'=>18.4350,
'terminal'=>'Cape Town Container Terminal',
'type'=>'Container Port',
'capacity'=>1400000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Ngqura',
'city'=>'Gqeberha',
'lat'=>-33.8080,
'lon'=>25.6880,
'terminal'=>'Ngqura Deepwater Terminal',
'type'=>'Container Port',
'capacity'=>2000000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Egypt',

'ports'=>[

[
'name'=>'Port of Alexandria',
'city'=>'Alexandria',
'lat'=>31.2001,
'lon'=>29.9187,
'terminal'=>'Alexandria Container Terminal',
'type'=>'Container Port',
'capacity'=>1900000,
'congestion'=>45,
'status'=>'Normal'
],

[
'name'=>'Port Said',
'city'=>'Port Said',
'lat'=>31.2653,
'lon'=>32.3019,
'terminal'=>'East Port Said',
'type'=>'Container Port',
'capacity'=>5200000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Morocco',

'ports'=>[

[
'name'=>'Tangier Med Port',
'city'=>'Tangier',
'lat'=>35.8895,
'lon'=>-5.5030,
'terminal'=>'Tangier Med Terminal',
'type'=>'Container Port',
'capacity'=>9000000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Casablanca',
'city'=>'Casablanca',
'lat'=>33.5992,
'lon'=>-7.6200,
'terminal'=>'Casablanca Terminal',
'type'=>'Container Port',
'capacity'=>1700000,
'congestion'=>35,
'status'=>'Normal'
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
'capacity'=>1600000,
'congestion'=>40,
'status'=>'Normal'
],

]

],

[
'country'=>'Tanzania',

'ports'=>[

[
'name'=>'Port of Dar es Salaam',
'city'=>'Dar es Salaam',
'lat'=>-6.8161,
'lon'=>39.2804,
'terminal'=>'Dar Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>35,
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
'lat'=>6.4550,
'lon'=>3.3841,
'terminal'=>'Apapa Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>60,
'status'=>'Delay'
],

[
'name'=>'Tin Can Island Port',
'city'=>'Lagos',
'lat'=>6.4304,
'lon'=>3.3677,
'terminal'=>'Tin Can Terminal',
'type'=>'Container Port',
'capacity'=>1400000,
'congestion'=>55,
'status'=>'Delay'
],

]

],

[
'country'=>'Ghana',

'ports'=>[

[
'name'=>'Port of Tema',
'city'=>'Tema',
'lat'=>5.6698,
'lon'=>0.0166,
'terminal'=>'Tema Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Algeria',

'ports'=>[

[
'name'=>'Port of Algiers',
'city'=>'Algiers',
'lat'=>36.7538,
'lon'=>3.0588,
'terminal'=>'Algiers Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Namibia',

'ports'=>[

[
'name'=>'Port of Walvis Bay',
'city'=>'Walvis Bay',
'lat'=>-22.9576,
'lon'=>14.5053,
'terminal'=>'Walvis Bay Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Mozambique',

'ports'=>[

[
'name'=>'Port of Maputo',
'city'=>'Maputo',
'lat'=>-25.9692,
'lon'=>32.5732,
'terminal'=>'Maputo Container Terminal',
'type'=>'Container Port',
'capacity'=>850000,
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
'lat'=>-36.8406,
'lon'=>174.7390,
'terminal'=>'Auckland Container Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],

[
'name'=>'Port of Tauranga',
'city'=>'Tauranga',
'lat'=>-37.6830,
'lon'=>176.1670,
'terminal'=>'Tauranga Container Terminal',
'type'=>'Container Port',
'capacity'=>1700000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Lyttelton',
'city'=>'Christchurch',
'lat'=>-43.6020,
'lon'=>172.7210,
'terminal'=>'Lyttelton Terminal',
'type'=>'Container Port',
'capacity'=>700000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Papua New Guinea',

'ports'=>[

[
'name'=>'Port Moresby Port',
'city'=>'Port Moresby',
'lat'=>-9.4743,
'lon'=>147.1590,
'terminal'=>'Port Moresby Terminal',
'type'=>'Container Port',
'capacity'=>600000,
'congestion'=>20,
'status'=>'Normal'
],

[
'name'=>'Port of Lae',
'city'=>'Lae',
'lat'=>-6.7330,
'lon'=>147.0000,
'terminal'=>'Lae Container Terminal',
'type'=>'Container Port',
'capacity'=>850000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Fiji',

'ports'=>[

[
'name'=>'Port of Suva',
'city'=>'Suva',
'lat'=>-18.1248,
'lon'=>178.4501,
'terminal'=>'Suva Terminal',
'type'=>'Container Port',
'capacity'=>400000,
'congestion'=>15,
'status'=>'Normal'
],

[
'name'=>'Port of Lautoka',
'city'=>'Lautoka',
'lat'=>-17.6120,
'lon'=>177.4500,
'terminal'=>'Lautoka Wharf',
'type'=>'Container Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Samoa',

'ports'=>[

[
'name'=>'Port of Apia',
'city'=>'Apia',
'lat'=>-13.8333,
'lon'=>-171.7667,
'terminal'=>'Apia Main Wharf',
'type'=>'Container Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Tonga',

'ports'=>[

[
'name'=>'Port of Nukualofa',
'city'=>'Nukualofa',
'lat'=>-21.1393,
'lon'=>-175.2049,
'terminal'=>'Nukualofa Wharf',
'type'=>'Container Port',
'capacity'=>150000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Vanuatu',

'ports'=>[

[
'name'=>'Port Vila',
'city'=>'Port Vila',
'lat'=>-17.7333,
'lon'=>168.3167,
'terminal'=>'Port Vila Terminal',
'type'=>'Container Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Solomon Islands',

'ports'=>[

[
'name'=>'Port of Honiara',
'city'=>'Honiara',
'lat'=>-9.4280,
'lon'=>159.9500,
'terminal'=>'Honiara Port',
'type'=>'Container Port',
'capacity'=>120000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'New Caledonia',

'ports'=>[

[
'name'=>'Port of Noumea',
'city'=>'Noumea',
'lat'=>-22.2758,
'lon'=>166.4580,
'terminal'=>'Noumea Container Terminal',
'type'=>'Container Port',
'capacity'=>350000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'French Polynesia',

'ports'=>[

[
'name'=>'Port of Papeete',
'city'=>'Papeete',
'lat'=>-17.5516,
'lon'=>-149.5585,
'terminal'=>'Papeete Harbour',
'type'=>'Container Port',
'capacity'=>250000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Guam',

'ports'=>[

[
'name'=>'Port of Guam',
'city'=>'Apra Harbor',
'lat'=>13.4443,
'lon'=>144.6530,
'terminal'=>'Apra Container Terminal',
'type'=>'Container Port',
'capacity'=>500000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Turkey',

'ports'=>[

[
'name'=>'Port of Ambarli',
'city'=>'Istanbul',
'lat'=>40.9760,
'lon'=>28.6800,
'terminal'=>'Marport Terminal',
'type'=>'Container Port',
'capacity'=>3200000,
'congestion'=>40,
'status'=>'Normal'
],

[
'name'=>'Port of Mersin',
'city'=>'Mersin',
'lat'=>36.8121,
'lon'=>34.6415,
'terminal'=>'Mersin International Port',
'type'=>'Container Port',
'capacity'=>2600000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Izmir',
'city'=>'Izmir',
'lat'=>38.4237,
'lon'=>27.1428,
'terminal'=>'Alsancak Port',
'type'=>'Container Port',
'capacity'=>1400000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Ukraine',

'ports'=>[

[
'name'=>'Port of Odessa',
'city'=>'Odessa',
'lat'=>46.4825,
'lon'=>30.7233,
'terminal'=>'Odessa Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>45,
'status'=>'Delay'
],

[
'name'=>'Port of Chornomorsk',
'city'=>'Odessa',
'lat'=>46.3070,
'lon'=>30.6540,
'terminal'=>'Chornomorsk Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Georgia',

'ports'=>[

[
'name'=>'Port of Poti',
'city'=>'Poti',
'lat'=>42.1550,
'lon'=>41.6710,
'terminal'=>'Poti Sea Port',
'type'=>'Container Port',
'capacity'=>700000,
'congestion'=>25,
'status'=>'Normal'
],

[
'name'=>'Port of Batumi',
'city'=>'Batumi',
'lat'=>41.6510,
'lon'=>41.6360,
'terminal'=>'Batumi Oil Terminal',
'type'=>'Oil Port',
'capacity'=>500000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Romania',

'ports'=>[

[
'name'=>'Midia Port',
'city'=>'Constanta',
'lat'=>44.3390,
'lon'=>28.6790,
'terminal'=>'Midia Terminal',
'type'=>'Oil Port',
'capacity'=>800000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Bulgaria',

'ports'=>[

[
'name'=>'Port of Varna',
'city'=>'Varna',
'lat'=>43.2141,
'lon'=>27.9147,
'terminal'=>'Varna Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

[
'name'=>'Port of Burgas',
'city'=>'Burgas',
'lat'=>42.5048,
'lon'=>27.4626,
'terminal'=>'Burgas Terminal',
'type'=>'Container Port',
'capacity'=>700000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Russia',

'ports'=>[

[
'name'=>'Port of Saint Petersburg',
'city'=>'Saint Petersburg',
'lat'=>59.9343,
'lon'=>30.3351,
'terminal'=>'First Container Terminal',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Novorossiysk',
'city'=>'Novorossiysk',
'lat'=>44.7230,
'lon'=>37.7680,
'terminal'=>'Novorossiysk Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Vladivostok',
'city'=>'Vladivostok',
'lat'=>43.1155,
'lon'=>131.8855,
'terminal'=>'Vladivostok Commercial Port',
'type'=>'Container Port',
'capacity'=>1700000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Kazakhstan',

'ports'=>[

[
'name'=>'Port of Aktau',
'city'=>'Aktau',
'lat'=>43.6510,
'lon'=>51.1970,
'terminal'=>'Aktau Seaport',
'type'=>'Cargo Port',
'capacity'=>1200000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Azerbaijan',

'ports'=>[

[
'name'=>'Port of Baku',
'city'=>'Baku',
'lat'=>40.3630,
'lon'=>49.8490,
'terminal'=>'Baku International Sea Trade Port',
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
'name'=>'Port of Veracruz',
'city'=>'Veracruz',
'lat'=>19.2057,
'lon'=>-96.1342,
'terminal'=>'Veracruz Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Manzanillo',
'city'=>'Colima',
'lat'=>19.0511,
'lon'=>-104.3150,
'terminal'=>'Manzanillo International Terminal',
'type'=>'Container Port',
'capacity'=>4200000,
'congestion'=>45,
'status'=>'Delay'
],

[
'name'=>'Port of Lazaro Cardenas',
'city'=>'Michoacan',
'lat'=>17.9583,
'lon'=>-102.1947,
'terminal'=>'Lazaro Cardenas Terminal',
'type'=>'Container Port',
'capacity'=>3500000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Panama',

'ports'=>[

[
'name'=>'Port of Balboa',
'city'=>'Balboa',
'lat'=>8.9510,
'lon'=>-79.5660,
'terminal'=>'Balboa Container Terminal',
'type'=>'Container Port',
'capacity'=>5200000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Cristobal',
'city'=>'Colon',
'lat'=>9.3590,
'lon'=>-79.9000,
'terminal'=>'Cristobal Container Terminal',
'type'=>'Container Port',
'capacity'=>4000000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Honduras',

'ports'=>[

[
'name'=>'Puerto Cortes',
'city'=>'Puerto Cortes',
'lat'=>15.8400,
'lon'=>-87.9490,
'terminal'=>'Puerto Cortes Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Nicaragua',

'ports'=>[

[
'name'=>'Port of Corinto',
'city'=>'Corinto',
'lat'=>12.4820,
'lon'=>-87.1730,
'terminal'=>'Corinto Terminal',
'type'=>'Container Port',
'capacity'=>500000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'El Salvador',

'ports'=>[

[
'name'=>'Port of Acajutla',
'city'=>'Acajutla',
'lat'=>13.5920,
'lon'=>-89.8330,
'terminal'=>'Acajutla Container Terminal',
'type'=>'Container Port',
'capacity'=>700000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Belize',

'ports'=>[

[
'name'=>'Port of Belize',
'city'=>'Belize City',
'lat'=>17.4995,
'lon'=>-88.1976,
'terminal'=>'Belize Port Terminal',
'type'=>'Container Port',
'capacity'=>350000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Cuba',

'ports'=>[

[
'name'=>'Port of Mariel',
'city'=>'Mariel',
'lat'=>22.9890,
'lon'=>-82.7530,
'terminal'=>'Mariel Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>20,
'status'=>'Normal'
],

[
'name'=>'Port of Havana',
'city'=>'Havana',
'lat'=>23.1136,
'lon'=>-82.3666,
'terminal'=>'Havana Port',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Puerto Rico',

'ports'=>[

[
'name'=>'Port of San Juan',
'city'=>'San Juan',
'lat'=>18.4655,
'lon'=>-66.1057,
'terminal'=>'San Juan Container Terminal',
'type'=>'Container Port',
'capacity'=>1400000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Trinidad and Tobago',

'ports'=>[

[
'name'=>'Port of Spain',
'city'=>'Port of Spain',
'lat'=>10.6549,
'lon'=>-61.5019,
'terminal'=>'Port of Spain Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>20,
'status'=>'Normal'
],

[
'name'=>'Point Lisas Port',
'city'=>'Couva',
'lat'=>10.4000,
'lon'=>-61.4830,
'terminal'=>'Point Lisas Industrial Port',
'type'=>'Industrial Port',
'capacity'=>900000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Israel',

'ports'=>[

[
'name'=>'Port of Haifa',
'city'=>'Haifa',
'lat'=>32.8191,
'lon'=>34.9982,
'terminal'=>'Haifa Bayport',
'type'=>'Container Port',
'capacity'=>1900000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Ashdod',
'city'=>'Ashdod',
'lat'=>31.8044,
'lon'=>34.6553,
'terminal'=>'Ashdod Container Terminal',
'type'=>'Container Port',
'capacity'=>1700000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Lebanon',

'ports'=>[

[
'name'=>'Port of Beirut',
'city'=>'Beirut',
'lat'=>33.9010,
'lon'=>35.5190,
'terminal'=>'Beirut Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Jordan',

'ports'=>[

[
'name'=>'Port of Aqaba',
'city'=>'Aqaba',
'lat'=>29.5319,
'lon'=>35.0061,
'terminal'=>'Aqaba Container Terminal',
'type'=>'Container Port',
'capacity'=>1300000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Kuwait',

'ports'=>[

[
'name'=>'Shuwaikh Port',
'city'=>'Kuwait City',
'lat'=>29.3630,
'lon'=>47.9160,
'terminal'=>'Shuwaikh Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Shuaiba Port',
'city'=>'Ahmadi',
'lat'=>29.0400,
'lon'=>48.1500,
'terminal'=>'Shuaiba Industrial Port',
'type'=>'Industrial Port',
'capacity'=>1200000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Bahrain',

'ports'=>[

[
'name'=>'Khalifa Bin Salman Port',
'city'=>'Hidd',
'lat'=>26.2450,
'lon'=>50.6540,
'terminal'=>'KBSP Container Terminal',
'type'=>'Container Port',
'capacity'=>1100000,
'congestion'=>20,
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
'lat'=>24.8230,
'lon'=>51.6130,
'terminal'=>'Hamad Container Terminal',
'type'=>'Container Port',
'capacity'=>7600000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Cyprus',

'ports'=>[

[
'name'=>'Port of Limassol',
'city'=>'Limassol',
'lat'=>34.6750,
'lon'=>33.0410,
'terminal'=>'Limassol Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Malta',

'ports'=>[

[
'name'=>'Malta Freeport',
'city'=>'Marsaxlokk',
'lat'=>35.8420,
'lon'=>14.5430,
'terminal'=>'Malta Freeport Terminal',
'type'=>'Container Port',
'capacity'=>3400000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Portugal',

'ports'=>[

[
'name'=>'Port of Sines',
'city'=>'Sines',
'lat'=>37.9560,
'lon'=>-8.8690,
'terminal'=>'Sines Container Terminal',
'type'=>'Container Port',
'capacity'=>2400000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Lisbon',
'city'=>'Lisbon',
'lat'=>38.7223,
'lon'=>-9.1393,
'terminal'=>'Lisbon Container Terminal',
'type'=>'Container Port',
'capacity'=>950000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Iceland',

'ports'=>[

[
'name'=>'Port of Reykjavik',
'city'=>'Reykjavik',
'lat'=>64.1466,
'lon'=>-21.9426,
'terminal'=>'Sundahofn Container Terminal',
'type'=>'Container Port',
'capacity'=>500000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Belgium',

'ports'=>[

[
'name'=>'Port of Zeebrugge',
'city'=>'Bruges',
'lat'=>51.3300,
'lon'=>3.2070,
'terminal'=>'Zeebrugge Container Terminal',
'type'=>'Container Port',
'capacity'=>2800000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Netherlands',

'ports'=>[

[
'name'=>'Port of Amsterdam',
'city'=>'Amsterdam',
'lat'=>52.3791,
'lon'=>4.8994,
'terminal'=>'Amsterdam Container Terminal',
'type'=>'Container Port',
'capacity'=>1600000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Vlissingen',
'city'=>'Vlissingen',
'lat'=>51.4420,
'lon'=>3.5730,
'terminal'=>'Vlissingen Terminal',
'type'=>'Container Port',
'capacity'=>800000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Germany',

'ports'=>[

[
'name'=>'Port of Bremen',
'city'=>'Bremen',
'lat'=>53.0793,
'lon'=>8.8017,
'terminal'=>'Eurogate Bremen',
'type'=>'Container Port',
'capacity'=>2200000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Wilhelmshaven',
'city'=>'Wilhelmshaven',
'lat'=>53.5290,
'lon'=>8.1120,
'terminal'=>'JadeWeserPort',
'type'=>'Container Port',
'capacity'=>2700000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'France',

'ports'=>[

[
'name'=>'Port of Dunkirk',
'city'=>'Dunkirk',
'lat'=>51.0344,
'lon'=>2.3768,
'terminal'=>'Dunkirk Container Terminal',
'type'=>'Container Port',
'capacity'=>950000,
'congestion'=>20,
'status'=>'Normal'
],

[
'name'=>'Port of Nantes',
'city'=>'Nantes',
'lat'=>47.2184,
'lon'=>-1.5536,
'terminal'=>'Nantes Saint-Nazaire',
'type'=>'Container Port',
'capacity'=>850000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Spain',

'ports'=>[

[
'name'=>'Port of Bilbao',
'city'=>'Bilbao',
'lat'=>43.2630,
'lon'=>-2.9350,
'terminal'=>'Bilbao Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>25,
'status'=>'Normal'
],

[
'name'=>'Port of Las Palmas',
'city'=>'Las Palmas',
'lat'=>28.1235,
'lon'=>-15.4363,
'terminal'=>'Las Palmas Terminal',
'type'=>'Container Port',
'capacity'=>1100000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Italy',

'ports'=>[

[
'name'=>'Port of Naples',
'city'=>'Naples',
'lat'=>40.8518,
'lon'=>14.2681,
'terminal'=>'Naples Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

[
'name'=>'Port of Venice',
'city'=>'Venice',
'lat'=>45.4408,
'lon'=>12.3155,
'terminal'=>'Venice Terminal',
'type'=>'Container Port',
'capacity'=>850000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Greece',

'ports'=>[

[
'name'=>'Port of Thessaloniki',
'city'=>'Thessaloniki',
'lat'=>40.6401,
'lon'=>22.9444,
'terminal'=>'ThPA Container Terminal',
'type'=>'Container Port',
'capacity'=>750000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Ireland',

'ports'=>[

[
'name'=>'Port of Shannon Foynes',
'city'=>'Limerick',
'lat'=>52.6610,
'lon'=>-8.6260,
'terminal'=>'Foynes Terminal',
'type'=>'Bulk Port',
'capacity'=>600000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'United Kingdom',

'ports'=>[

[
'name'=>'Port of Bristol',
'city'=>'Bristol',
'lat'=>51.4545,
'lon'=>-2.5879,
'terminal'=>'Royal Portbury Dock',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>20,
'status'=>'Normal'
],

[
'name'=>'Port of Southampton',
'city'=>'Southampton',
'lat'=>50.9097,
'lon'=>-1.4043,
'terminal'=>'DP World Southampton',
'type'=>'Container Port',
'capacity'=>3500000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Argentina',

'ports'=>[

[
'name'=>'Port of Buenos Aires',
'city'=>'Buenos Aires',
'lat'=>-34.6037,
'lon'=>-58.3816,
'terminal'=>'Terminal 4',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>35,
'status'=>'Normal'
],

[
'name'=>'Port of Rosario',
'city'=>'Rosario',
'lat'=>-32.9442,
'lon'=>-60.6505,
'terminal'=>'Rosario Terminal',
'type'=>'River Port',
'capacity'=>1200000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'United Arab Emirates',

'ports'=>[

[
'name'=>'Port Rashid',
'city'=>'Dubai',
'lat'=>25.2697,
'lon'=>55.2819,
'terminal'=>'Port Rashid Terminal',
'type'=>'Container Port',
'capacity'=>2500000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Fujairah',
'city'=>'Fujairah',
'lat'=>25.1288,
'lon'=>56.3265,
'terminal'=>'Fujairah Oil Terminal',
'type'=>'Oil Port',
'capacity'=>5000000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Brazil',

'ports'=>[

[
'name'=>'Port of Itajai',
'city'=>'Itajai',
'lat'=>-26.9071,
'lon'=>-48.6619,
'terminal'=>'Itajai Container Terminal',
'type'=>'Container Port',
'capacity'=>1300000,
'congestion'=>30,
'status'=>'Normal'
],

[
'name'=>'Port of Suape',
'city'=>'Recife',
'lat'=>-8.3936,
'lon'=>-34.9606,
'terminal'=>'Suape Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'China',

'ports'=>[

[
'name'=>'Port of Xiamen',
'city'=>'Xiamen',
'lat'=>24.4798,
'lon'=>118.0894,
'terminal'=>'Xiamen International Terminal',
'type'=>'Container Port',
'capacity'=>12000000,
'congestion'=>45,
'status'=>'Normal'
],

[
'name'=>'Port of Tianjin',
'city'=>'Tianjin',
'lat'=>39.3434,
'lon'=>117.3616,
'terminal'=>'Tianjin Port Terminal',
'type'=>'Container Port',
'capacity'=>21000000,
'congestion'=>55,
'status'=>'Delay'
],

[
'name'=>'Port of Dalian',
'city'=>'Dalian',
'lat'=>38.9140,
'lon'=>121.6147,
'terminal'=>'Dayaowan Terminal',
'type'=>'Container Port',
'capacity'=>10000000,
'congestion'=>40,
'status'=>'Normal'
],

]

],

[
'country'=>'India',

'ports'=>[

[
'name'=>'Port of Cochin',
'city'=>'Kochi',
'lat'=>9.9312,
'lon'=>76.2673,
'terminal'=>'International Container Transshipment Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>25,
'status'=>'Normal'
],

[
'name'=>'Visakhapatnam Port',
'city'=>'Visakhapatnam',
'lat'=>17.6868,
'lon'=>83.2185,
'terminal'=>'Vizag Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Cambodia',

'ports'=>[

[
'name'=>'Port of Sihanoukville',
'city'=>'Sihanoukville',
'lat'=>10.6253,
'lon'=>103.5234,
'terminal'=>'Sihanoukville Autonomous Port',
'type'=>'Container Port',
'capacity'=>750000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Myanmar',

'ports'=>[

[
'name'=>'Port of Yangon',
'city'=>'Yangon',
'lat'=>16.8661,
'lon'=>96.1951,
'terminal'=>'Myanmar International Terminal',
'type'=>'Container Port',
'capacity'=>950000,
'congestion'=>40,
'status'=>'Normal'
],

[
'name'=>'Port of Thilawa',
'city'=>'Yangon',
'lat'=>16.7000,
'lon'=>96.2500,
'terminal'=>'Thilawa Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Brunei',

'ports'=>[

[
'name'=>'Muara Port',
'city'=>'Bandar Seri Begawan',
'lat'=>5.0252,
'lon'=>115.0726,
'terminal'=>'Muara Container Terminal',
'type'=>'Container Port',
'capacity'=>500000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Iran',

'ports'=>[

[
'name'=>'Port of Bandar Abbas',
'city'=>'Bandar Abbas',
'lat'=>27.1832,
'lon'=>56.2666,
'terminal'=>'Shahid Rajaee Terminal',
'type'=>'Container Port',
'capacity'=>4200000,
'congestion'=>45,
'status'=>'Normal'
],

[
'name'=>'Port of Imam Khomeini',
'city'=>'Khuzestan',
'lat'=>30.4370,
'lon'=>49.0780,
'terminal'=>'Imam Khomeini Terminal',
'type'=>'Bulk Port',
'capacity'=>2500000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Iraq',

'ports'=>[

[
'name'=>'Port of Umm Qasr',
'city'=>'Basra',
'lat'=>30.0340,
'lon'=>47.9300,
'terminal'=>'Umm Qasr Container Terminal',
'type'=>'Container Port',
'capacity'=>1200000,
'congestion'=>45,
'status'=>'Delay'
],

]

],

[
'country'=>'Yemen',

'ports'=>[

[
'name'=>'Port of Aden',
'city'=>'Aden',
'lat'=>12.7855,
'lon'=>45.0187,
'terminal'=>'Aden Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Tunisia',

'ports'=>[

[
'name'=>'Port of Rades',
'city'=>'Tunis',
'lat'=>36.7690,
'lon'=>10.2760,
'terminal'=>'Rades Container Terminal',
'type'=>'Container Port',
'capacity'=>950000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Senegal',

'ports'=>[

[
'name'=>'Port of Dakar',
'city'=>'Dakar',
'lat'=>14.7167,
'lon'=>-17.4677,
'terminal'=>'Dakar Container Terminal',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Angola',

'ports'=>[

[
'name'=>'Port of Luanda',
'city'=>'Luanda',
'lat'=>-8.8383,
'lon'=>13.2344,
'terminal'=>'Luanda Container Terminal',
'type'=>'Container Port',
'capacity'=>850000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Cameroon',

'ports'=>[

[
'name'=>'Port of Douala',
'city'=>'Douala',
'lat'=>4.0511,
'lon'=>9.7679,
'terminal'=>'Douala Container Terminal',
'type'=>'Container Port',
'capacity'=>1100000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Albania',

'ports'=>[

[
'name'=>'Port of Durres',
'city'=>'Durres',
'lat'=>41.3231,
'lon'=>19.4540,
'terminal'=>'Durres Container Terminal',
'type'=>'Container Port',
'capacity'=>650000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Montenegro',

'ports'=>[

[
'name'=>'Port of Bar',
'city'=>'Bar',
'lat'=>42.0931,
'lon'=>19.1003,
'terminal'=>'Bar Container Terminal',
'type'=>'Container Port',
'capacity'=>500000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Albania',

'ports'=>[

[
'name'=>'Port of Vlore',
'city'=>'Vlore',
'lat'=>40.4661,
'lon'=>19.4897,
'terminal'=>'Vlore Cargo Terminal',
'type'=>'Cargo Port',
'capacity'=>300000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Algeria',

'ports'=>[

[
'name'=>'Port of Oran',
'city'=>'Oran',
'lat'=>35.6971,
'lon'=>-0.6348,
'terminal'=>'Oran Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Libya',

'ports'=>[

[
'name'=>'Port of Tripoli',
'city'=>'Tripoli',
'lat'=>32.8872,
'lon'=>13.1913,
'terminal'=>'Tripoli Container Terminal',
'type'=>'Container Port',
'capacity'=>750000,
'congestion'=>30,
'status'=>'Normal'
],

],

[
'country'=>'Sudan',

'ports'=>[

[
'name'=>'Port Sudan',
'city'=>'Port Sudan',
'lat'=>19.6158,
'lon'=>37.2164,
'terminal'=>'South Port Terminal',
'type'=>'Container Port',
'capacity'=>850000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Madagascar',

'ports'=>[

[
'name'=>'Port of Toamasina',
'city'=>'Toamasina',
'lat'=>-18.1492,
'lon'=>49.4023,
'terminal'=>'Toamasina Container Terminal',
'type'=>'Container Port',
'capacity'=>650000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Mauritius',

'ports'=>[

[
'name'=>'Port Louis',
'city'=>'Port Louis',
'lat'=>-20.1609,
'lon'=>57.5012,
'terminal'=>'Mauritius Container Terminal',
'type'=>'Container Port',
'capacity'=>700000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Seychelles',

'ports'=>[

[
'name'=>'Port Victoria',
'city'=>'Victoria',
'lat'=>-4.6200,
'lon'=>55.4550,
'terminal'=>'Victoria Commercial Port',
'type'=>'Container Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Maldives',

'ports'=>[

[
'name'=>'Port of Male',
'city'=>'Male',
'lat'=>4.1755,
'lon'=>73.5093,
'terminal'=>'Maldives Commercial Harbour',
'type'=>'Container Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Benin',

'ports'=>[

[
'name'=>'Port of Cotonou',
'city'=>'Cotonou',
'lat'=>6.3572,
'lon'=>2.4323,
'terminal'=>'Cotonou Container Terminal',
'type'=>'Container Port',
'capacity'=>850000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Togo',

'ports'=>[

[
'name'=>'Port of Lome',
'city'=>'Lome',
'lat'=>6.1375,
'lon'=>1.2123,
'terminal'=>'Lome Container Terminal',
'type'=>'Container Port',
'capacity'=>1800000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Ivory Coast',

'ports'=>[

[
'name'=>'Port of Abidjan',
'city'=>'Abidjan',
'lat'=>5.3097,
'lon'=>-4.0127,
'terminal'=>'Abidjan Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Congo',

'ports'=>[

[
'name'=>'Port of Pointe-Noire',
'city'=>'Pointe-Noire',
'lat'=>-4.7692,
'lon'=>11.8664,
'terminal'=>'Pointe-Noire Container Terminal',
'type'=>'Container Port',
'capacity'=>950000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Democratic Republic of the Congo',

'ports'=>[

[
'name'=>'Port of Matadi',
'city'=>'Matadi',
'lat'=>-5.8167,
'lon'=>13.4500,
'terminal'=>'Matadi River Terminal',
'type'=>'River Port',
'capacity'=>700000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Gabon',

'ports'=>[

[
'name'=>'Port of Owendo',
'city'=>'Libreville',
'lat'=>0.3167,
'lon'=>9.5000,
'terminal'=>'Owendo Container Terminal',
'type'=>'Container Port',
'capacity'=>650000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Guinea',

'ports'=>[

[
'name'=>'Port of Conakry',
'city'=>'Conakry',
'lat'=>9.5092,
'lon'=>-13.7122,
'terminal'=>'Conakry Container Terminal',
'type'=>'Container Port',
'capacity'=>600000,
'congestion'=>25,
'status'=>'Normal'
],

]

],

[
'country'=>'Sierra Leone',

'ports'=>[

[
'name'=>'Port of Freetown',
'city'=>'Freetown',
'lat'=>8.4657,
'lon'=>-13.2317,
'terminal'=>'Queen Elizabeth II Quay',
'type'=>'Container Port',
'capacity'=>500000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Liberia',

'ports'=>[

[
'name'=>'Port of Monrovia',
'city'=>'Monrovia',
'lat'=>6.3156,
'lon'=>-10.8074,
'terminal'=>'Freeport of Monrovia',
'type'=>'Container Port',
'capacity'=>450000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Mauritania',

'ports'=>[

[
'name'=>'Port of Nouadhibou',
'city'=>'Nouadhibou',
'lat'=>20.9425,
'lon'=>-17.0362,
'terminal'=>'Nouadhibou Commercial Port',
'type'=>'Bulk Port',
'type'=>'Bulk Port',
'capacity'=>700000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Guinea-Bissau',

'ports'=>[

[
'name'=>'Port of Bissau',
'city'=>'Bissau',
'lat'=>11.8636,
'lon'=>-15.5989,
'terminal'=>'Bissau Commercial Port',
'type'=>'Container Port',
'capacity'=>250000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Cape Verde',

'ports'=>[

[
'name'=>'Port of Praia',
'city'=>'Praia',
'lat'=>14.9331,
'lon'=>-23.5133,
'terminal'=>'Porto da Praia',
'type'=>'Container Port',
'capacity'=>280000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Comoros',

'ports'=>[

[
'name'=>'Port of Moroni',
'city'=>'Moroni',
'lat'=>-11.7042,
'lon'=>43.2402,
'terminal'=>'Moroni Port',
'type'=>'Container Port',
'capacity'=>150000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Eritrea',

'ports'=>[

[
'name'=>'Port of Massawa',
'city'=>'Massawa',
'lat'=>15.6081,
'lon'=>39.4745,
'terminal'=>'Massawa Commercial Port',
'type'=>'Container Port',
'capacity'=>450000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Somalia',

'ports'=>[

[
'name'=>'Port of Mogadishu',
'city'=>'Mogadishu',
'lat'=>2.0469,
'lon'=>45.3182,
'terminal'=>'Mogadishu Port',
'type'=>'Container Port',
'capacity'=>500000,
'congestion'=>35,
'status'=>'Normal'
],

]

],

[
'country'=>'Ethiopia',

'ports'=>[

[
'name'=>'Modjo Dry Port',
'city'=>'Modjo',
'lat'=>8.5860,
'lon'=>39.1210,
'terminal'=>'Modjo Inland Terminal',
'type'=>'Dry Port',
'capacity'=>900000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Uganda',

'ports'=>[

[
'name'=>'Port Bell',
'city'=>'Kampala',
'lat'=>0.3136,
'lon'=>32.5811,
'terminal'=>'Port Bell Terminal',
'type'=>'Lake Port',
'capacity'=>250000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Rwanda',

'ports'=>[

[
'name'=>'Kigali Logistics Platform',
'city'=>'Kigali',
'lat'=>-1.9441,
'lon'=>30.0619,
'terminal'=>'Kigali Dry Port',
'type'=>'Dry Port',
'capacity'=>350000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Burundi',

'ports'=>[

[
'name'=>'Port of Bujumbura',
'city'=>'Bujumbura',
'lat'=>-3.3614,
'lon'=>29.3599,
'terminal'=>'Bujumbura Lake Port',
'type'=>'Lake Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Botswana',

'ports'=>[

[
'name'=>'Gaborone Dry Port',
'city'=>'Gaborone',
'lat'=>-24.6282,
'lon'=>25.9231,
'terminal'=>'Gaborone Inland Terminal',
'type'=>'Dry Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Zimbabwe',

'ports'=>[

[
'name'=>'Harare Dry Port',
'city'=>'Harare',
'lat'=>-17.8252,
'lon'=>31.0335,
'terminal'=>'Harare Inland Terminal',
'type'=>'Dry Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Zambia',

'ports'=>[

[
'name'=>'Lusaka Dry Port',
'city'=>'Lusaka',
'lat'=>-15.3875,
'lon'=>28.3228,
'terminal'=>'Lusaka Logistics Hub',
'type'=>'Dry Port',
'capacity'=>350000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Malawi',

'ports'=>[

[
'name'=>'Port of Chipoka',
'city'=>'Chipoka',
'lat'=>-13.9938,
'lon'=>34.5150,
'terminal'=>'Chipoka Lake Port',
'type'=>'Lake Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Lesotho',

'ports'=>[

[
'name'=>'Maseru Dry Port',
'city'=>'Maseru',
'lat'=>-29.3158,
'lon'=>27.4869,
'terminal'=>'Maseru Inland Terminal',
'type'=>'Dry Port',
'capacity'=>150000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Eswatini',

'ports'=>[

[
'name'=>'Matsapha Dry Port',
'city'=>'Matsapha',
'lat'=>-26.5286,
'lon'=>31.3070,
'terminal'=>'Matsapha Inland Terminal',
'type'=>'Dry Port',
'capacity'=>200000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Mali',

'ports'=>[

[
'name'=>'Bamako Dry Port',
'city'=>'Bamako',
'lat'=>12.6392,
'lon'=>-8.0029,
'terminal'=>'Bamako Inland Terminal',
'type'=>'Dry Port',
'capacity'=>250000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Niger',

'ports'=>[

[
'name'=>'Niamey Dry Port',
'city'=>'Niamey',
'lat'=>13.5116,
'lon'=>2.1254,
'terminal'=>'Niamey Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>220000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Chad',

'ports'=>[

[
'name'=>'NDjamena Dry Port',
'city'=>'NDjamena',
'lat'=>12.1348,
'lon'=>15.0557,
'terminal'=>'NDjamena Inland Terminal',
'type'=>'Dry Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Central African Republic',

'ports'=>[

[
'name'=>'Bangui River Port',
'city'=>'Bangui',
'lat'=>4.3947,
'lon'=>18.5582,
'terminal'=>'Bangui River Terminal',
'type'=>'River Port',
'capacity'=>150000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'South Sudan',

'ports'=>[

[
'name'=>'Juba River Port',
'city'=>'Juba',
'lat'=>4.8517,
'lon'=>31.5825,
'terminal'=>'Juba Nile Terminal',
'type'=>'River Port',
'capacity'=>170000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Burkina Faso',

'ports'=>[

[
'name'=>'Ouagadougou Dry Port',
'city'=>'Ouagadougou',
'lat'=>12.3714,
'lon'=>-1.5197,
'terminal'=>'Ouagadougou Inland Terminal',
'type'=>'Dry Port',
'capacity'=>220000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Burkina Faso',

'ports'=>[

[
'name'=>'Bobo-Dioulasso Dry Port',
'city'=>'Bobo-Dioulasso',
'lat'=>11.1771,
'lon'=>-4.2979,
'terminal'=>'Bobo Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>150000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Gambia',

'ports'=>[

[
'name'=>'Port of Banjul',
'city'=>'Banjul',
'lat'=>13.4549,
'lon'=>-16.5790,
'terminal'=>'Banjul Port Terminal',
'type'=>'Container Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Equatorial Guinea',

'ports'=>[

[
'name'=>'Port of Malabo',
'city'=>'Malabo',
'lat'=>3.7504,
'lon'=>8.7741,
'terminal'=>'Malabo Commercial Port',
'type'=>'Container Port',
'capacity'=>350000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Sao Tome and Principe',

'ports'=>[

[
'name'=>'Port of Sao Tome',
'city'=>'Sao Tome',
'lat'=>0.3365,
'lon'=>6.7273,
'terminal'=>'Sao Tome Port',
'type'=>'Container Port',
'capacity'=>120000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Guinea',

'ports'=>[

[
'name'=>'Port of Kamsar',
'city'=>'Kamsar',
'lat'=>10.6510,
'lon'=>-14.6050,
'terminal'=>'Kamsar Bulk Terminal',
'type'=>'Bulk Port',
'capacity'=>800000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Togo',

'ports'=>[

[
'name'=>'Lome Container Terminal',
'city'=>'Lome',
'lat'=>6.1370,
'lon'=>1.2870,
'terminal'=>'LCT',
'type'=>'Container Port',
'capacity'=>2200000,
'congestion'=>30,
'status'=>'Normal'
],

]

],

[
'country'=>'Benin',

'ports'=>[

[
'name'=>'Port of Cotonou Oil Terminal',
'city'=>'Cotonou',
'lat'=>6.3520,
'lon'=>2.4310,
'terminal'=>'Oil Terminal',
'type'=>'Oil Port',
'capacity'=>600000,
'congestion'=>20,
'status'=>'Normal'
],

]

],

[
'country'=>'Mauritania',

'ports'=>[

[
'name'=>'Port of Nouakchott',
'city'=>'Nouakchott',
'lat'=>18.0735,
'lon'=>-15.9582,
'terminal'=>'Friendship Port',
'type'=>'Container Port',
'capacity'=>450000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Congo',

'ports'=>[

[
'name'=>'Port of Brazzaville',
'city'=>'Brazzaville',
'lat'=>-4.2634,
'lon'=>15.2429,
'terminal'=>'Brazzaville River Port',
'type'=>'River Port',
'capacity'=>250000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Antigua and Barbuda',

'ports'=>[

[
'name'=>'Port of St Johns',
'city'=>'St Johns',
'lat'=>17.1274,
'lon'=>-61.8468,
'terminal'=>'Deep Water Harbour',
'type'=>'Container Port',
'capacity'=>250000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Barbados',

'ports'=>[

[
'name'=>'Port of Bridgetown',
'city'=>'Bridgetown',
'lat'=>13.0975,
'lon'=>-59.6167,
'terminal'=>'Bridgetown Port',
'type'=>'Container Port',
'capacity'=>450000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Dominica',

'ports'=>[

[
'name'=>'Port of Roseau',
'city'=>'Roseau',
'lat'=>15.3092,
'lon'=>-61.3794,
'terminal'=>'Roseau Ferry Terminal',
'type'=>'Container Port',
'capacity'=>150000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Grenada',

'ports'=>[

[
'name'=>'Port of St Georges',
'city'=>'St Georges',
'lat'=>12.0561,
'lon'=>-61.7486,
'terminal'=>'St Georges Port',
'type'=>'Container Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Saint Lucia',

'ports'=>[

[
'name'=>'Port Castries',
'city'=>'Castries',
'lat'=>14.0101,
'lon'=>-60.9875,
'terminal'=>'Castries Harbour',
'type'=>'Container Port',
'capacity'=>220000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Saint Vincent and the Grenadines',

'ports'=>[

[
'name'=>'Port Kingstown',
'city'=>'Kingstown',
'lat'=>13.1600,
'lon'=>-61.2248,
'terminal'=>'Kingstown Port',
'type'=>'Container Port',
'capacity'=>170000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Kiribati',

'ports'=>[

[
'name'=>'Port of Betio',
'city'=>'Betio',
'lat'=>1.3570,
'lon'=>172.9211,
'terminal'=>'Betio Wharf',
'type'=>'Container Port',
'capacity'=>150000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Tuvalu',

'ports'=>[

[
'name'=>'Port of Funafuti',
'city'=>'Funafuti',
'lat'=>-8.5167,
'lon'=>179.2167,
'terminal'=>'Funafuti Wharf',
'type'=>'Container Port',
'capacity'=>80000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Nauru',

'ports'=>[

[
'name'=>'Port of Aiwo',
'city'=>'Aiwo',
'lat'=>-0.5340,
'lon'=>166.9139,
'terminal'=>'Aiwo Harbour',
'type'=>'Container Port',
'capacity'=>100000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Marshall Islands',

'ports'=>[

[
'name'=>'Port of Majuro',
'city'=>'Majuro',
'lat'=>7.0897,
'lon'=>171.3803,
'terminal'=>'Delap Dock',
'type'=>'Container Port',
'capacity'=>120000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Palau',

'ports'=>[

[
'name'=>'Port of Malakal',
'city'=>'Koror',
'lat'=>7.3398,
'lon'=>134.4791,
'terminal'=>'Malakal Commercial Port',
'type'=>'Container Port',
'capacity'=>90000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Federated States of Micronesia',

'ports'=>[

[
'name'=>'Port of Pohnpei',
'city'=>'Palikir',
'lat'=>6.9770,
'lon'=>158.2365,
'terminal'=>'Pohnpei Main Wharf',
'type'=>'Container Port',
'capacity'=>100000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Cook Islands',

'ports'=>[

[
'name'=>'Port of Avatiu',
'city'=>'Avarua',
'lat'=>-21.2067,
'lon'=>-159.7750,
'terminal'=>'Avatiu Harbour',
'type'=>'Container Port',
'capacity'=>70000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Niue',

'ports'=>[

[
'name'=>'Port of Alofi',
'city'=>'Alofi',
'lat'=>-19.0544,
'lon'=>-169.9187,
'terminal'=>'Alofi Wharf',
'type'=>'General Cargo Port',
'capacity'=>30000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Tokelau',

'ports'=>[

[
'name'=>'Port of Nukunonu',
'city'=>'Nukunonu',
'lat'=>-9.2000,
'lon'=>-171.8500,
'terminal'=>'Nukunonu Wharf',
'type'=>'General Cargo Port',
'capacity'=>20000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Samoa',

'ports'=>[

[
'name'=>'Port of Apia',
'city'=>'Apia',
'lat'=>-13.8333,
'lon'=>-171.7667,
'terminal'=>'Apia International Port',
'type'=>'Container Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'American Samoa',

'ports'=>[

[
'name'=>'Port of Pago Pago',
'city'=>'Pago Pago',
'lat'=>-14.2781,
'lon'=>-170.7020,
'terminal'=>'Pago Pago Harbor',
'type'=>'Container Port',
'capacity'=>220000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Northern Mariana Islands',

'ports'=>[

[
'name'=>'Port of Saipan',
'city'=>'Saipan',
'lat'=>15.2123,
'lon'=>145.7545,
'terminal'=>'Saipan Commercial Port',
'type'=>'Container Port',
'capacity'=>100000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Greenland',

'ports'=>[

[
'name'=>'Port of Nuuk',
'city'=>'Nuuk',
'lat'=>64.1748,
'lon'=>-51.7389,
'terminal'=>'Nuuk Harbour',
'type'=>'Container Port',
'capacity'=>120000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Faroe Islands',

'ports'=>[

[
'name'=>'Port of Torshavn',
'city'=>'Torshavn',
'lat'=>62.0079,
'lon'=>-6.7900,
'terminal'=>'Torshavn Harbour',
'type'=>'Container Port',
'capacity'=>90000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'Aruba',

'ports'=>[

[
'name'=>'Port of Oranjestad',
'city'=>'Oranjestad',
'lat'=>12.5186,
'lon'=>-70.0358,
'terminal'=>'Oranjestad Cargo Terminal',
'type'=>'Container Port',
'capacity'=>120000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Curacao',

'ports'=>[

[
'name'=>'Port of Willemstad',
'city'=>'Willemstad',
'lat'=>12.1084,
'lon'=>-68.9340,
'terminal'=>'Curacao Container Terminal',
'type'=>'Container Port',
'capacity'=>450000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Sint Maarten',

'ports'=>[

[
'name'=>'Port of Philipsburg',
'city'=>'Philipsburg',
'lat'=>18.0250,
'lon'=>-63.0458,
'terminal'=>'Dr. A.C. Wathey Cruise & Cargo Port',
'type'=>'Container Port',
'capacity'=>100000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Bermuda',

'ports'=>[

[
'name'=>'Port of Hamilton',
'city'=>'Hamilton',
'lat'=>32.2949,
'lon'=>-64.7814,
'terminal'=>'Hamilton Cargo Terminal',
'type'=>'Container Port',
'capacity'=>90000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Cayman Islands',

'ports'=>[

[
'name'=>'Port of George Town',
'city'=>'George Town',
'lat'=>19.2866,
'lon'=>-81.3674,
'terminal'=>'George Town Port',
'type'=>'General Cargo Port',
'capacity'=>80000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'British Virgin Islands',

'ports'=>[

[
'name'=>'Port of Road Town',
'city'=>'Road Town',
'lat'=>18.4286,
'lon'=>-64.6185,
'terminal'=>'Road Harbour',
'type'=>'Container Port',
'capacity'=>70000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
'country'=>'Turks and Caicos Islands',

'ports'=>[

[
'name'=>'Port of Grand Turk',
'city'=>'Cockburn Town',
'lat'=>21.4612,
'lon'=>-71.1419,
'terminal'=>'Grand Turk Port',
'type'=>'General Cargo Port',
'capacity'=>60000,
'congestion'=>5,
'status'=>'Normal'
],

]

],

[
'country'=>'French Guiana',

'ports'=>[

[
'name'=>'Port of Degrad des Cannes',
'city'=>'Cayenne',
'lat'=>4.8986,
'lon'=>-52.3005,
'terminal'=>'Degrad des Cannes Terminal',
'type'=>'Container Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Reunion',

'ports'=>[

[
'name'=>'Port of Pointe des Galets',
'city'=>'Le Port',
'lat'=>-20.9373,
'lon'=>55.2915,
'terminal'=>'Grand Port Maritime',
'type'=>'Container Port',
'capacity'=>380000,
'congestion'=>15,
'status'=>'Normal'
],

]

],

[
'country'=>'Mayotte',

'ports'=>[

[
'name'=>'Port of Longoni',
'city'=>'Longoni',
'lat'=>-12.7243,
'lon'=>45.1522,
'terminal'=>'Longoni Container Terminal',
'type'=>'Container Port',
'capacity'=>180000,
'congestion'=>10,
'status'=>'Normal'
],

]

],

[
    'country' => 'Mexico',
    'ports' => [
        [
            'name' => 'Port of Manzanillo',
            'city' => 'Manzanillo',
            'code' => 'MXZLO',
            'type' => 'Container',
            'latitude' => 19.0523,
            'longitude' => -104.3156,
        ],
        [
            'name' => 'Port of Veracruz',
            'city' => 'Veracruz',
            'code' => 'MXVER',
            'type' => 'Container',
            'latitude' => 19.2025,
            'longitude' => -96.1342,
        ],
        [
            'name' => 'Port of Lazaro Cardenas',
            'city' => 'Lazaro Cardenas',
            'code' => 'MXLZC',
            'type' => 'Container',
            'latitude' => 17.9583,
            'longitude' => -102.1947,
        ],
        [
            'name' => 'Port of Altamira',
            'city' => 'Altamira',
            'code' => 'MXATM',
            'type' => 'Container',
            'latitude' => 22.3928,
            'longitude' => -97.9384,
        ],
        [
            'name' => 'Port of Ensenada',
            'city' => 'Ensenada',
            'code' => 'MXESE',
            'type' => 'Container',
            'latitude' => 31.8570,
            'longitude' => -116.6246,
        ],
    ],
],

[
    'country' => 'Micronesia',
    'ports' => [
        [
            'name' => 'Port of Pohnpei',
            'city' => 'Palikir',
            'code' => 'FMPNI',
            'type' => 'Seaport',
            'latitude' => 6.9850,
            'longitude' => 158.2089,
        ],
        [
            'name' => 'Port of Chuuk',
            'city' => 'Weno',
            'code' => 'FMTKK',
            'type' => 'Seaport',
            'latitude' => 7.4465,
            'longitude' => 151.8413,
        ],
        [
            'name' => 'Port of Yap',
            'city' => 'Colonia',
            'code' => 'FMYAP',
            'type' => 'Seaport',
            'latitude' => 9.5167,
            'longitude' => 138.1167,
        ],
    ],
],

[
    'country' => 'Moldova',
    'ports' => [
        [
            'name' => 'Port of Giurgiulesti',
            'city' => 'Giurgiulesti',
            'code' => 'MDGIU',
            'type' => 'River Port',
            'latitude' => 45.4806,
            'longitude' => 28.1978,
        ],
    ],
],

[
    'country' => 'Monaco',
    'ports' => [
        [
            'name' => 'Port Hercules',
            'city' => 'Monaco',
            'code' => 'MCPHE',
            'type' => 'Marina',
            'latitude' => 43.7384,
            'longitude' => 7.4274,
        ],
        [
            'name' => 'Fontvieille Port',
            'city' => 'Monaco',
            'code' => 'MCFON',
            'type' => 'Marina',
            'latitude' => 43.7275,
            'longitude' => 7.4137,
        ],
    ],
],

[
    'country' => 'Mongolia',
    'ports' => [
        [
            'name' => 'Altanbulag Dry Port',
            'city' => 'Altanbulag',
            'code' => 'MNALT',
            'type' => 'Dry Port',
            'latitude' => 50.3152,
            'longitude' => 106.4986,
        ],
        [
            'name' => 'Zamyn-Uud Dry Port',
            'city' => 'Zamyn-Uud',
            'code' => 'MNZUU',
            'type' => 'Dry Port',
            'latitude' => 43.7281,
            'longitude' => 111.9040,
        ],
    ],
],

[
    'country' => 'Montenegro',
    'ports' => [
        [
            'name' => 'Port of Bar',
            'city' => 'Bar',
            'code' => 'MEBAR',
            'type' => 'Container',
            'latitude' => 42.0931,
            'longitude' => 19.0894,
        ],
        [
            'name' => 'Port of Kotor',
            'city' => 'Kotor',
            'code' => 'MEKOT',
            'type' => 'Passenger',
            'latitude' => 42.4247,
            'longitude' => 18.7712,
        ],
    ],
],

[
    'country' => 'Morocco',
    'ports' => [
        [
            'name' => 'Port of Tanger Med',
            'city' => 'Tangier',
            'code' => 'MATNG',
            'type' => 'Container',
            'latitude' => 35.8925,
            'longitude' => -5.5035,
        ],
        [
            'name' => 'Port of Casablanca',
            'city' => 'Casablanca',
            'code' => 'MACAS',
            'type' => 'Container',
            'latitude' => 33.6037,
            'longitude' => -7.6188,
        ],
        [
            'name' => 'Port of Agadir',
            'city' => 'Agadir',
            'code' => 'MAAGA',
            'type' => 'Commercial',
            'latitude' => 30.4202,
            'longitude' => -9.6166,
        ],
        [
            'name' => 'Port of Nador',
            'city' => 'Nador',
            'code' => 'MANDR',
            'type' => 'Commercial',
            'latitude' => 35.1681,
            'longitude' => -2.9287,
        ],
        [
            'name' => 'Port of Safi',
            'city' => 'Safi',
            'code' => 'MASFI',
            'type' => 'Bulk',
            'latitude' => 32.2994,
            'longitude' => -9.2372,
        ],
    ],
],

[
    'country' => 'Mozambique',
    'ports' => [
        [
            'name' => 'Port of Maputo',
            'city' => 'Maputo',
            'code' => 'MZMPM',
            'type' => 'Container',
            'latitude' => -25.9667,
            'longitude' => 32.5833,
        ],
        [
            'name' => 'Port of Beira',
            'city' => 'Beira',
            'code' => 'MZBEW',
            'type' => 'Container',
            'latitude' => -19.8436,
            'longitude' => 34.8389,
        ],
        [
            'name' => 'Port of Nacala',
            'city' => 'Nacala',
            'code' => 'MZMNC',
            'type' => 'Deep Sea',
            'latitude' => -14.5400,
            'longitude' => 40.6728,
        ],
        [
            'name' => 'Port of Quelimane',
            'city' => 'Quelimane',
            'code' => 'MZUEL',
            'type' => 'Commercial',
            'latitude' => -17.8786,
            'longitude' => 36.8883,
        ],
    ],
],

[
    'country' => 'Myanmar',
    'ports' => [
        [
            'name' => 'Port of Yangon',
            'city' => 'Yangon',
            'code' => 'MMRGN',
            'type' => 'Container',
            'latitude' => 16.7689,
            'longitude' => 96.1735,
        ],
        [
            'name' => 'Port of Thilawa',
            'city' => 'Yangon',
            'code' => 'MMTHL',
            'type' => 'Container',
            'latitude' => 16.6876,
            'longitude' => 96.2685,
        ],
        [
            'name' => 'Port of Sittwe',
            'city' => 'Sittwe',
            'code' => 'MMSIT',
            'type' => 'Commercial',
            'latitude' => 20.1462,
            'longitude' => 92.8984,
        ],
        [
            'name' => 'Port of Kyaukpyu',
            'city' => 'Kyaukpyu',
            'code' => 'MMKYP',
            'type' => 'Deep Sea',
            'latitude' => 19.4290,
            'longitude' => 93.5430,
        ],
    ],
],

[
    'country' => 'Namibia',
    'ports' => [
        [
            'name' => 'Port of Walvis Bay',
            'city' => 'Walvis Bay',
            'code' => 'NAWVB',
            'type' => 'Container',
            'latitude' => -22.9575,
            'longitude' => 14.5053,
        ],
        [
            'name' => 'Port of Lüderitz',
            'city' => 'Luderitz',
            'code' => 'NALUD',
            'type' => 'Commercial',
            'latitude' => -26.6481,
            'longitude' => 15.1538,
        ],
    ],
],

[
    'country' => 'Nauru',
    'ports' => [
        [
            'name' => 'Port of Aiwo',
            'city' => 'Aiwo',
            'code' => 'NRAIW',
            'type' => 'Seaport',
            'latitude' => -0.5340,
            'longitude' => 166.9139,
        ],
    ],
],

[
    'country' => 'Nepal',
    'ports' => [
        [
            'name' => 'Birgunj Inland Port',
            'city' => 'Birgunj',
            'code' => 'NPBIR',
            'type' => 'Dry Port',
            'latitude' => 27.0104,
            'longitude' => 84.8774,
        ],
        [
            'name' => 'Kathmandu ICD',
            'city' => 'Kathmandu',
            'code' => 'NPKTM',
            'type' => 'Dry Port',
            'latitude' => 27.7172,
            'longitude' => 85.3240,
        ],
    ],
],

[
    'country' => 'Netherlands',
    'ports' => [
        [
            'name' => 'Port of Rotterdam',
            'city' => 'Rotterdam',
            'code' => 'NLRTM',
            'type' => 'Container',
            'latitude' => 51.9475,
            'longitude' => 4.1426,
        ],
        [
            'name' => 'Port of Amsterdam',
            'city' => 'Amsterdam',
            'code' => 'NLAMS',
            'type' => 'Container',
            'latitude' => 52.3791,
            'longitude' => 4.8994,
        ],
        [
            'name' => 'Port of Moerdijk',
            'city' => 'Moerdijk',
            'code' => 'NLMOE',
            'type' => 'Bulk',
            'latitude' => 51.7042,
            'longitude' => 4.6270,
        ],
        [
            'name' => 'Port of Vlissingen',
            'city' => 'Vlissingen',
            'code' => 'NLVLI',
            'type' => 'Commercial',
            'latitude' => 51.4424,
            'longitude' => 3.5735,
        ],
        [
            'name' => 'Port of Groningen',
            'city' => 'Groningen',
            'code' => 'NLGRQ',
            'type' => 'Commercial',
            'latitude' => 53.2194,
            'longitude' => 6.5665,
        ],
    ],
],

[
    'country' => 'New Zealand',
    'ports' => [
        [
            'name' => 'Port of Auckland',
            'city' => 'Auckland',
            'code' => 'NZAKL',
            'type' => 'Container',
            'latitude' => -36.8406,
            'longitude' => 174.7820,
        ],
        [
            'name' => 'Port of Tauranga',
            'city' => 'Tauranga',
            'code' => 'NZTRG',
            'type' => 'Container',
            'latitude' => -37.6583,
            'longitude' => 176.1958,
        ],
        [
            'name' => 'Port of Lyttelton',
            'city' => 'Christchurch',
            'code' => 'NZLYT',
            'type' => 'Container',
            'latitude' => -43.6014,
            'longitude' => 172.7202,
        ],
        [
            'name' => 'Port of Napier',
            'city' => 'Napier',
            'code' => 'NZNPE',
            'type' => 'Commercial',
            'latitude' => -39.4833,
            'longitude' => 176.9167,
        ],
        [
            'name' => 'Port of Wellington',
            'city' => 'Wellington',
            'code' => 'NZWLG',
            'type' => 'Container',
            'latitude' => -41.2865,
            'longitude' => 174.7762,
        ],
    ],
],

[
    'country' => 'Nicaragua',
    'ports' => [
        [
            'name' => 'Port of Corinto',
            'city' => 'Corinto',
            'code' => 'NICIO',
            'type' => 'Container',
            'latitude' => 12.4825,
            'longitude' => -87.1731,
        ],
        [
            'name' => 'Port of Bluefields',
            'city' => 'Bluefields',
            'code' => 'NIBEF',
            'type' => 'Commercial',
            'latitude' => 12.0137,
            'longitude' => -83.7640,
        ],
        [
            'name' => 'Port of El Bluff',
            'city' => 'Bluefields',
            'code' => 'NIELB',
            'type' => 'Commercial',
            'latitude' => 11.9906,
            'longitude' => -83.7428,
        ],
    ],
],

[
    'country' => 'Niger',
    'ports' => [
        [
            'name' => 'Dosso Dry Port',
            'city' => 'Dosso',
            'code' => 'NEDOS',
            'type' => 'Dry Port',
            'latitude' => 13.0500,
            'longitude' => 3.2000,
        ],
        [
            'name' => 'Niamey Inland Port',
            'city' => 'Niamey',
            'code' => 'NENIM',
            'type' => 'Dry Port',
            'latitude' => 13.5116,
            'longitude' => 2.1254,
        ],
    ],
],

[
    'country' => 'Nigeria',
    'ports' => [
        [
            'name' => 'Lagos Port',
            'city' => 'Lagos',
            'code' => 'NGLOS',
            'type' => 'Container',
            'latitude' => 6.4550,
            'longitude' => 3.3841,
        ],
        [
            'name' => 'Tin Can Island Port',
            'city' => 'Lagos',
            'code' => 'NGTIN',
            'type' => 'Container',
            'latitude' => 6.4339,
            'longitude' => 3.3608,
        ],
        [
            'name' => 'Onne Port',
            'city' => 'Port Harcourt',
            'code' => 'NGONN',
            'type' => 'Container',
            'latitude' => 4.7254,
            'longitude' => 7.1518,
        ],
        [
            'name' => 'Port Harcourt Port',
            'city' => 'Port Harcourt',
            'code' => 'NGPHC',
            'type' => 'Commercial',
            'latitude' => 4.7774,
            'longitude' => 7.0134,
        ],
        [
            'name' => 'Calabar Port',
            'city' => 'Calabar',
            'code' => 'NGCBQ',
            'type' => 'Commercial',
            'latitude' => 4.9589,
            'longitude' => 8.3220,
        ],
    ],
],

[
    'country' => 'North Macedonia',
    'ports' => [
        [
            'name' => 'Skopje Dry Port',
            'city' => 'Skopje',
            'code' => 'MKSKP',
            'type' => 'Dry Port',
            'latitude' => 41.9981,
            'longitude' => 21.4254,
        ],
    ],
],

[
    'country' => 'Norway',
    'ports' => [
        [
            'name' => 'Port of Oslo',
            'city' => 'Oslo',
            'code' => 'NOOSL',
            'type' => 'Container',
            'latitude' => 59.9070,
            'longitude' => 10.7522,
        ],
        [
            'name' => 'Port of Bergen',
            'city' => 'Bergen',
            'code' => 'NOBGO',
            'type' => 'Container',
            'latitude' => 60.3929,
            'longitude' => 5.3242,
        ],
        [
            'name' => 'Port of Stavanger',
            'city' => 'Stavanger',
            'code' => 'NOSVG',
            'type' => 'Commercial',
            'latitude' => 58.9699,
            'longitude' => 5.7331,
        ],
        [
            'name' => 'Port of Tromsø',
            'city' => 'Tromso',
            'code' => 'NOTOS',
            'type' => 'Commercial',
            'latitude' => 69.6492,
            'longitude' => 18.9553,
        ],
        [
            'name' => 'Port of Narvik',
            'city' => 'Narvik',
            'code' => 'NONVK',
            'type' => 'Bulk',
            'latitude' => 68.4385,
            'longitude' => 17.4273,
        ],
    ],
],

[
    'country' => 'Oman',
    'ports' => [
        [
            'name' => 'Port of Salalah',
            'city' => 'Salalah',
            'code' => 'OMSLL',
            'type' => 'Container',
            'latitude' => 16.9390,
            'longitude' => 54.0083,
        ],
        [
            'name' => 'Port Sultan Qaboos',
            'city' => 'Muscat',
            'code' => 'OMMCT',
            'type' => 'Commercial',
            'latitude' => 23.6167,
            'longitude' => 58.5833,
        ],
        [
            'name' => 'Port of Sohar',
            'city' => 'Sohar',
            'code' => 'OMSOH',
            'type' => 'Container',
            'latitude' => 24.4700,
            'longitude' => 56.6200,
        ],
        [
            'name' => 'Port of Duqm',
            'city' => 'Duqm',
            'code' => 'OMDQM',
            'type' => 'Deep Sea',
            'latitude' => 19.6690,
            'longitude' => 57.7040,
        ],
    ],
],

[
    'country' => 'Pakistan',
    'ports' => [
        [
            'name' => 'Port of Karachi',
            'city' => 'Karachi',
            'code' => 'PKKHI',
            'type' => 'Container',
            'latitude' => 24.8466,
            'longitude' => 66.9750,
        ],
        [
            'name' => 'Port Qasim',
            'city' => 'Karachi',
            'code' => 'PKBQM',
            'type' => 'Container',
            'latitude' => 24.7750,
            'longitude' => 67.3500,
        ],
        [
            'name' => 'Gwadar Port',
            'city' => 'Gwadar',
            'code' => 'PKGWD',
            'type' => 'Deep Sea',
            'latitude' => 25.1264,
            'longitude' => 62.3225,
        ],
    ],
],

[
    'country' => 'Palau',
    'ports' => [
        [
            'name' => 'Malakal Port',
            'city' => 'Koror',
            'code' => 'PWROR',
            'type' => 'Seaport',
            'latitude' => 7.3419,
            'longitude' => 134.4599,
        ],
    ],
],

[
    'country' => 'Panama',
    'ports' => [
        [
            'name' => 'Port of Balboa',
            'city' => 'Balboa',
            'code' => 'PABLB',
            'type' => 'Container',
            'latitude' => 8.9490,
            'longitude' => -79.5668,
        ],
        [
            'name' => 'Port of Cristobal',
            'city' => 'Colon',
            'code' => 'PACRI',
            'type' => 'Container',
            'latitude' => 9.3592,
            'longitude' => -79.9014,
        ],
        [
            'name' => 'Manzanillo International Terminal',
            'city' => 'Colon',
            'code' => 'PAMIT',
            'type' => 'Container',
            'latitude' => 9.3628,
            'longitude' => -79.8856,
        ],
        [
            'name' => 'Colon Container Terminal',
            'city' => 'Colon',
            'code' => 'PACCT',
            'type' => 'Container',
            'latitude' => 9.3545,
            'longitude' => -79.8928,
        ],
        [
            'name' => 'Vacamonte Port',
            'city' => 'Vacamonte',
            'code' => 'PAVAC',
            'type' => 'Fishing',
            'latitude' => 8.9145,
            'longitude' => -79.7216,
        ],
    ],
],

[
    'country' => 'Papua New Guinea',
    'ports' => [
        [
            'name' => 'Port Moresby Port',
            'city' => 'Port Moresby',
            'code' => 'PGPOM',
            'type' => 'Container',
            'latitude' => -9.4438,
            'longitude' => 147.1803,
        ],
        [
            'name' => 'Port of Lae',
            'city' => 'Lae',
            'code' => 'PGLAE',
            'type' => 'Container',
            'latitude' => -6.7330,
            'longitude' => 147.0000,
        ],
        [
            'name' => 'Port of Madang',
            'city' => 'Madang',
            'code' => 'PGMAG',
            'type' => 'Commercial',
            'latitude' => -5.2215,
            'longitude' => 145.7869,
        ],
        [
            'name' => 'Port of Rabaul',
            'city' => 'Rabaul',
            'code' => 'PGRAB',
            'type' => 'Commercial',
            'latitude' => -4.1967,
            'longitude' => 152.1721,
        ],
    ],
],

[
    'country' => 'Paraguay',
    'ports' => [
        [
            'name' => 'Port of Asuncion',
            'city' => 'Asuncion',
            'code' => 'PYASU',
            'type' => 'River Port',
            'latitude' => -25.2637,
            'longitude' => -57.5759,
        ],
        [
            'name' => 'Port of Villeta',
            'city' => 'Villeta',
            'code' => 'PYVIL',
            'type' => 'River Port',
            'latitude' => -25.5064,
            'longitude' => -57.5652,
        ],
    ],
],

[
    'country' => 'Peru',
    'ports' => [
        [
            'name' => 'Port of Callao',
            'city' => 'Callao',
            'code' => 'PECLL',
            'type' => 'Container',
            'latitude' => -12.0500,
            'longitude' => -77.1500,
        ],
        [
            'name' => 'Port of Paita',
            'city' => 'Paita',
            'code' => 'PEPTA',
            'type' => 'Container',
            'latitude' => -5.0892,
            'longitude' => -81.1147,
        ],
        [
            'name' => 'Port of Matarani',
            'city' => 'Matarani',
            'code' => 'PEMAT',
            'type' => 'Bulk',
            'latitude' => -17.0005,
            'longitude' => -72.1083,
        ],
        [
            'name' => 'Port of Salaverry',
            'city' => 'Salaverry',
            'code' => 'PESAL',
            'type' => 'Commercial',
            'latitude' => -8.2272,
            'longitude' => -78.9761,
        ],
    ],
],

[
    'country' => 'Philippines',
    'ports' => [
        [
            'name' => 'Port of Manila',
            'city' => 'Manila',
            'code' => 'PHMNL',
            'type' => 'Container',
            'latitude' => 14.5995,
            'longitude' => 120.9842,
        ],
        [
            'name' => 'Port of Batangas',
            'city' => 'Batangas',
            'code' => 'PHBTG',
            'type' => 'Container',
            'latitude' => 13.7565,
            'longitude' => 121.0583,
        ],
        [
            'name' => 'Port of Cebu',
            'city' => 'Cebu',
            'code' => 'PHCEB',
            'type' => 'Container',
            'latitude' => 10.3157,
            'longitude' => 123.8854,
        ],
        [
            'name' => 'Port of Davao',
            'city' => 'Davao',
            'code' => 'PHDVO',
            'type' => 'Commercial',
            'latitude' => 7.0731,
            'longitude' => 125.6128,
        ],
        [
            'name' => 'Port of Subic',
            'city' => 'Subic',
            'code' => 'PHSFS',
            'type' => 'Container',
            'latitude' => 14.8225,
            'longitude' => 120.2828,
        ],
    ],
],

[
    'country' => 'Poland',
    'ports' => [
        [
            'name' => 'Port of Gdansk',
            'city' => 'Gdansk',
            'code' => 'PLGDN',
            'type' => 'Container',
            'latitude' => 54.3520,
            'longitude' => 18.6466,
        ],
        [
            'name' => 'Port of Gdynia',
            'city' => 'Gdynia',
            'code' => 'PLGDY',
            'type' => 'Container',
            'latitude' => 54.5189,
            'longitude' => 18.5305,
        ],
        [
            'name' => 'Port of Szczecin',
            'city' => 'Szczecin',
            'code' => 'PLSZZ',
            'type' => 'Commercial',
            'latitude' => 53.4285,
            'longitude' => 14.5528,
        ],
        [
            'name' => 'Port of Swinoujscie',
            'city' => 'Swinoujscie',
            'code' => 'PLSWI',
            'type' => 'Commercial',
            'latitude' => 53.9100,
            'longitude' => 14.2478,
        ],
    ],
],

[
    'country' => 'Portugal',
    'ports' => [
        [
            'name' => 'Port of Sines',
            'city' => 'Sines',
            'code' => 'PTSIE',
            'type' => 'Container',
            'latitude' => 37.9561,
            'longitude' => -8.8698,
        ],
        [
            'name' => 'Port of Lisbon',
            'city' => 'Lisbon',
            'code' => 'PTLIS',
            'type' => 'Container',
            'latitude' => 38.7223,
            'longitude' => -9.1393,
        ],
        [
            'name' => 'Port of Leixoes',
            'city' => 'Porto',
            'code' => 'PTLEI',
            'type' => 'Container',
            'latitude' => 41.1856,
            'longitude' => -8.7033,
        ],
        [
            'name' => 'Port of Setubal',
            'city' => 'Setubal',
            'code' => 'PTSET',
            'type' => 'Commercial',
            'latitude' => 38.5244,
            'longitude' => -8.8882,
        ],
        [
            'name' => 'Port of Aveiro',
            'city' => 'Aveiro',
            'code' => 'PTAVE',
            'type' => 'Commercial',
            'latitude' => 40.6405,
            'longitude' => -8.6538,
        ],
    ],
],

[
    'country' => 'Qatar',
    'ports' => [
        [
            'name' => 'Hamad Port',
            'city' => 'Doha',
            'code' => 'QAHMD',
            'type' => 'Container',
            'latitude' => 25.0084,
            'longitude' => 51.6335,
        ],
        [
            'name' => 'Doha Port',
            'city' => 'Doha',
            'code' => 'QADOH',
            'type' => 'Commercial',
            'latitude' => 25.2948,
            'longitude' => 51.5450,
        ],
        [
            'name' => 'Ras Laffan Port',
            'city' => 'Ras Laffan',
            'code' => 'QARLF',
            'type' => 'LNG Terminal',
            'latitude' => 25.9240,
            'longitude' => 51.6160,
        ],
        [
            'name' => 'Mesaieed Port',
            'city' => 'Mesaieed',
            'code' => 'QAMES',
            'type' => 'Industrial',
            'latitude' => 24.9854,
            'longitude' => 51.5495,
        ],
    ],
],

[
    'country' => 'Romania',
    'ports' => [
        [
            'name' => 'Port of Constanta',
            'city' => 'Constanta',
            'code' => 'ROCND',
            'type' => 'Container',
            'latitude' => 44.1733,
            'longitude' => 28.6383,
        ],
        [
            'name' => 'Port of Mangalia',
            'city' => 'Mangalia',
            'code' => 'ROMGL',
            'type' => 'Commercial',
            'latitude' => 43.8167,
            'longitude' => 28.5833,
        ],
        [
            'name' => 'Port of Galati',
            'city' => 'Galati',
            'code' => 'ROGAL',
            'type' => 'River Port',
            'latitude' => 45.4353,
            'longitude' => 28.0080,
        ],
        [
            'name' => 'Port of Braila',
            'city' => 'Braila',
            'code' => 'ROBRA',
            'type' => 'River Port',
            'latitude' => 45.2692,
            'longitude' => 27.9575,
        ],
    ],
],

[
    'country' => 'Russia',
    'ports' => [
        [
            'name' => 'Port of Saint Petersburg',
            'city' => 'Saint Petersburg',
            'code' => 'RULED',
            'type' => 'Container',
            'latitude' => 59.9343,
            'longitude' => 30.3351,
        ],
        [
            'name' => 'Port of Novorossiysk',
            'city' => 'Novorossiysk',
            'code' => 'RUNVS',
            'type' => 'Container',
            'latitude' => 44.7235,
            'longitude' => 37.7686,
        ],
        [
            'name' => 'Port of Vladivostok',
            'city' => 'Vladivostok',
            'code' => 'RUVVO',
            'type' => 'Container',
            'latitude' => 43.1155,
            'longitude' => 131.8855,
        ],
        [
            'name' => 'Port of Murmansk',
            'city' => 'Murmansk',
            'code' => 'RUMMK',
            'type' => 'Bulk',
            'latitude' => 68.9585,
            'longitude' => 33.0827,
        ],
        [
            'name' => 'Port of Vostochny',
            'city' => 'Nakhodka',
            'code' => 'RUVYP',
            'type' => 'Container',
            'latitude' => 42.7300,
            'longitude' => 133.0830,
        ],
    ],
],

[
    'country' => 'Rwanda',
    'ports' => [
        [
            'name' => 'Kigali Logistics Platform',
            'city' => 'Kigali',
            'code' => 'RWKGL',
            'type' => 'Dry Port',
            'latitude' => -1.9706,
            'longitude' => 30.1044,
        ],
    ],
],

[
    'country' => 'Saint Kitts and Nevis',
    'ports' => [
        [
            'name' => 'Port Zante',
            'city' => 'Basseterre',
            'code' => 'KNBAS',
            'type' => 'Cruise',
            'latitude' => 17.2948,
            'longitude' => -62.7261,
        ],
        [
            'name' => 'Charlestown Port',
            'city' => 'Charlestown',
            'code' => 'KNCHA',
            'type' => 'Commercial',
            'latitude' => 17.1348,
            'longitude' => -62.6230,
        ],
    ],
],

[
    'country' => 'Saint Lucia',
    'ports' => [
        [
            'name' => 'Port Castries',
            'city' => 'Castries',
            'code' => 'LCCAS',
            'type' => 'Container',
            'latitude' => 14.0101,
            'longitude' => -60.9875,
        ],
        [
            'name' => 'Port Vieux Fort',
            'city' => 'Vieux Fort',
            'code' => 'LCVIF',
            'type' => 'Commercial',
            'latitude' => 13.7167,
            'longitude' => -60.9500,
        ],
    ],
],

[
    'country' => 'Saint Vincent and the Grenadines',
    'ports' => [
        [
            'name' => 'Kingstown Port',
            'city' => 'Kingstown',
            'code' => 'VCKTN',
            'type' => 'Commercial',
            'latitude' => 13.1587,
            'longitude' => -61.2248,
        ],
        [
            'name' => 'Port Elizabeth',
            'city' => 'Bequia',
            'code' => 'VCBEQ',
            'type' => 'Passenger',
            'latitude' => 13.0090,
            'longitude' => -61.2357,
        ],
    ],
],

[
    'country' => 'Samoa',
    'ports' => [
        [
            'name' => 'Port of Apia',
            'city' => 'Apia',
            'code' => 'WSAPW',
            'type' => 'Container',
            'latitude' => -13.8333,
            'longitude' => -171.7667,
        ],
    ],
],

[
    'country' => 'San Marino',
    'ports' => [
        [
            'name' => 'San Marino Logistics Hub',
            'city' => 'San Marino',
            'code' => 'SMSMR',
            'type' => 'Dry Port',
            'latitude' => 43.9424,
            'longitude' => 12.4578,
        ],
    ],
],

[
    'country' => 'Sao Tome and Principe',
    'ports' => [
        [
            'name' => 'Port of Sao Tome',
            'city' => 'Sao Tome',
            'code' => 'STTMS',
            'type' => 'Commercial',
            'latitude' => 0.3365,
            'longitude' => 6.7273,
        ],
        [
            'name' => 'Port of Neves',
            'city' => 'Neves',
            'code' => 'STNEV',
            'type' => 'Commercial',
            'latitude' => 0.3618,
            'longitude' => 6.5482,
        ],
    ],
],

[
    'country' => 'Saudi Arabia',
    'ports' => [
        [
            'name' => 'Jeddah Islamic Port',
            'city' => 'Jeddah',
            'code' => 'SAJED',
            'type' => 'Container',
            'latitude' => 21.4858,
            'longitude' => 39.1733,
        ],
        [
            'name' => 'King Abdul Aziz Port',
            'city' => 'Dammam',
            'code' => 'SADMM',
            'type' => 'Container',
            'latitude' => 26.4282,
            'longitude' => 50.1020,
        ],
        [
            'name' => 'King Fahad Industrial Port',
            'city' => 'Yanbu',
            'code' => 'SAYNB',
            'type' => 'Industrial',
            'latitude' => 24.0891,
            'longitude' => 38.0618,
        ],
        [
            'name' => 'Jazan Port',
            'city' => 'Jazan',
            'code' => 'SAGIZ',
            'type' => 'Commercial',
            'latitude' => 16.8892,
            'longitude' => 42.5511,
        ],
        [
            'name' => 'Ras Al Khair Port',
            'city' => 'Ras Al Khair',
            'code' => 'SARAK',
            'type' => 'Industrial',
            'latitude' => 27.5284,
            'longitude' => 49.1918,
        ],
    ],
],

[
    'country' => 'Senegal',
    'ports' => [
        [
            'name' => 'Port of Dakar',
            'city' => 'Dakar',
            'code' => 'SNDKR',
            'type' => 'Container',
            'latitude' => 14.6937,
            'longitude' => -17.4441,
        ],
        [
            'name' => 'Port of Ziguinchor',
            'city' => 'Ziguinchor',
            'code' => 'SNZIG',
            'type' => 'Commercial',
            'latitude' => 12.5681,
            'longitude' => -16.2733,
        ],
    ],
],

[
    'country' => 'Serbia',
    'ports' => [
        [
            'name' => 'Port of Belgrade',
            'city' => 'Belgrade',
            'code' => 'RSBEG',
            'type' => 'River Port',
            'latitude' => 44.8176,
            'longitude' => 20.4633,
        ],
        [
            'name' => 'Port of Novi Sad',
            'city' => 'Novi Sad',
            'code' => 'RSNSD',
            'type' => 'River Port',
            'latitude' => 45.2671,
            'longitude' => 19.8335,
        ],
    ],
],

[
    'country' => 'Seychelles',
    'ports' => [
        [
            'name' => 'Port Victoria',
            'city' => 'Victoria',
            'code' => 'SCVIC',
            'type' => 'Container',
            'latitude' => -4.6200,
            'longitude' => 55.4550,
        ],
    ],
],

[
    'country' => 'Sierra Leone',
    'ports' => [
        [
            'name' => 'Queen Elizabeth II Quay',
            'city' => 'Freetown',
            'code' => 'SLFNA',
            'type' => 'Container',
            'latitude' => 8.4855,
            'longitude' => -13.2307,
        ],
        [
            'name' => 'Pepel Port',
            'city' => 'Pepel',
            'code' => 'SLPEP',
            'type' => 'Bulk',
            'latitude' => 8.5860,
            'longitude' => -13.0580,
        ],
    ],
],

[
    'country' => 'Singapore',
    'ports' => [
        [
            'name' => 'Port of Singapore',
            'city' => 'Singapore',
            'code' => 'SGSIN',
            'type' => 'Container',
            'latitude' => 1.2644,
            'longitude' => 103.8400,
        ],
        [
            'name' => 'Tuas Mega Port',
            'city' => 'Singapore',
            'code' => 'SGTUA',
            'type' => 'Container',
            'latitude' => 1.2475,
            'longitude' => 103.6319,
        ],
        [
            'name' => 'Jurong Port',
            'city' => 'Singapore',
            'code' => 'SGJUR',
            'type' => 'Multipurpose',
            'latitude' => 1.3048,
            'longitude' => 103.7060,
        ],
    ],
],

[
    'country' => 'Slovakia',
    'ports' => [
        [
            'name' => 'Port of Bratislava',
            'city' => 'Bratislava',
            'code' => 'SKBTS',
            'type' => 'River Port',
            'latitude' => 48.1486,
            'longitude' => 17.1077,
        ],
    ],
],

[
    'country' => 'Slovenia',
    'ports' => [
        [
            'name' => 'Port of Koper',
            'city' => 'Koper',
            'code' => 'SIKOP',
            'type' => 'Container',
            'latitude' => 45.5481,
            'longitude' => 13.7302,
        ],
    ],
],

[
    'country' => 'Solomon Islands',
    'ports' => [
        [
            'name' => 'Port of Honiara',
            'city' => 'Honiara',
            'code' => 'SBHIR',
            'type' => 'Container',
            'latitude' => -9.4310,
            'longitude' => 159.9550,
        ],
        [
            'name' => 'Port of Noro',
            'city' => 'Noro',
            'code' => 'SBNOR',
            'type' => 'Commercial',
            'latitude' => -8.2200,
            'longitude' => 157.2000,
        ],
    ],
],

[
    'country' => 'Somalia',
    'ports' => [
        [
            'name' => 'Port of Mogadishu',
            'city' => 'Mogadishu',
            'code' => 'SOMGQ',
            'type' => 'Container',
            'latitude' => 2.0469,
            'longitude' => 45.3182,
        ],
        [
            'name' => 'Port of Berbera',
            'city' => 'Berbera',
            'code' => 'SOBBO',
            'type' => 'Commercial',
            'latitude' => 10.4396,
            'longitude' => 45.0143,
        ],
        [
            'name' => 'Port of Kismayo',
            'city' => 'Kismayo',
            'code' => 'SOKMU',
            'type' => 'Commercial',
            'latitude' => -0.3582,
            'longitude' => 42.5454,
        ],
    ],
],

[
    'country' => 'South Africa',
    'ports' => [
        [
            'name' => 'Port of Durban',
            'city' => 'Durban',
            'code' => 'ZADUR',
            'type' => 'Container',
            'latitude' => -29.8587,
            'longitude' => 31.0218,
        ],
        [
            'name' => 'Port of Cape Town',
            'city' => 'Cape Town',
            'code' => 'ZACPT',
            'type' => 'Container',
            'latitude' => -33.9070,
            'longitude' => 18.4200,
        ],
        [
            'name' => 'Port of Richards Bay',
            'city' => 'Richards Bay',
            'code' => 'ZARCB',
            'type' => 'Bulk',
            'latitude' => -28.7807,
            'longitude' => 32.0377,
        ],
        [
            'name' => 'Port Elizabeth Port',
            'city' => 'Gqeberha',
            'code' => 'ZAPLZ',
            'type' => 'Container',
            'latitude' => -33.9608,
            'longitude' => 25.6022,
        ],
        [
            'name' => 'Port of Saldanha',
            'city' => 'Saldanha Bay',
            'code' => 'ZASDB',
            'type' => 'Bulk',
            'latitude' => -33.0117,
            'longitude' => 17.9442,
        ],
    ],
],

[
    'country' => 'South Korea',
    'ports' => [
        [
            'name' => 'Port of Busan',
            'city' => 'Busan',
            'code' => 'KRPUS',
            'type' => 'Container',
            'latitude' => 35.1028,
            'longitude' => 129.0403,
        ],
        [
            'name' => 'Port of Incheon',
            'city' => 'Incheon',
            'code' => 'KRINC',
            'type' => 'Container',
            'latitude' => 37.4563,
            'longitude' => 126.7052,
        ],
        [
            'name' => 'Port of Gwangyang',
            'city' => 'Gwangyang',
            'code' => 'KRKAN',
            'type' => 'Container',
            'latitude' => 34.9397,
            'longitude' => 127.6958,
        ],
        [
            'name' => 'Port of Ulsan',
            'city' => 'Ulsan',
            'code' => 'KRUSN',
            'type' => 'Industrial',
            'latitude' => 35.5384,
            'longitude' => 129.3114,
        ],
        [
            'name' => 'Port of Pyeongtaek',
            'city' => 'Pyeongtaek',
            'code' => 'KRPTK',
            'type' => 'Commercial',
            'latitude' => 36.9833,
            'longitude' => 126.8417,
        ],
    ],
],

[
    'country' => 'South Sudan',
    'ports' => [
        [
            'name' => 'Juba River Port',
            'city' => 'Juba',
            'code' => 'SSJUB',
            'type' => 'River Port',
            'latitude' => 4.8594,
            'longitude' => 31.5713,
        ],
    ],
],

[
    'country' => 'Spain',
    'ports' => [
        [
            'name' => 'Port of Valencia',
            'city' => 'Valencia',
            'code' => 'ESVLC',
            'type' => 'Container',
            'latitude' => 39.4699,
            'longitude' => -0.3763,
        ],
        [
            'name' => 'Port of Barcelona',
            'city' => 'Barcelona',
            'code' => 'ESBCN',
            'type' => 'Container',
            'latitude' => 41.3851,
            'longitude' => 2.1734,
        ],
        [
            'name' => 'Port of Algeciras',
            'city' => 'Algeciras',
            'code' => 'ESALG',
            'type' => 'Container',
            'latitude' => 36.1408,
            'longitude' => -5.4562,
        ],
        [
            'name' => 'Port of Bilbao',
            'city' => 'Bilbao',
            'code' => 'ESBIO',
            'type' => 'Container',
            'latitude' => 43.2630,
            'longitude' => -2.9350,
        ],
        [
            'name' => 'Port of Las Palmas',
            'city' => 'Las Palmas',
            'code' => 'ESLPA',
            'type' => 'Commercial',
            'latitude' => 28.1235,
            'longitude' => -15.4363,
        ],
    ],
],

[
    'country' => 'Sri Lanka',
    'ports' => [
        [
            'name' => 'Port of Colombo',
            'city' => 'Colombo',
            'code' => 'LKCMB',
            'type' => 'Container',
            'latitude' => 6.9271,
            'longitude' => 79.8612,
        ],
        [
            'name' => 'Port of Hambantota',
            'city' => 'Hambantota',
            'code' => 'LKHBA',
            'type' => 'Deep Sea',
            'latitude' => 6.1241,
            'longitude' => 81.1185,
        ],
        [
            'name' => 'Port of Trincomalee',
            'city' => 'Trincomalee',
            'code' => 'LKTRR',
            'type' => 'Commercial',
            'latitude' => 8.5874,
            'longitude' => 81.2152,
        ],
    ],
],

[
    'country' => 'Sudan',
    'ports' => [
        [
            'name' => 'Port Sudan',
            'city' => 'Port Sudan',
            'code' => 'SDPZU',
            'type' => 'Container',
            'latitude' => 19.6158,
            'longitude' => 37.2164,
        ],
        [
            'name' => 'Osman Digna Port',
            'city' => 'Sawakin',
            'code' => 'SDSAW',
            'type' => 'Commercial',
            'latitude' => 19.1048,
            'longitude' => 37.3321,
        ],
    ],
],

[
    'country' => 'Suriname',
    'ports' => [
        [
            'name' => 'Port of Paramaribo',
            'city' => 'Paramaribo',
            'code' => 'SRPBM',
            'type' => 'Commercial',
            'latitude' => 5.8520,
            'longitude' => -55.2038,
        ],
        [
            'name' => 'Port of Nieuw Nickerie',
            'city' => 'Nieuw Nickerie',
            'code' => 'SRNIE',
            'type' => 'River Port',
            'latitude' => 5.9260,
            'longitude' => -56.9900,
        ],
    ],
],

[
    'country' => 'Sweden',
    'ports' => [
        [
            'name' => 'Port of Gothenburg',
            'city' => 'Gothenburg',
            'code' => 'SEGOT',
            'type' => 'Container',
            'latitude' => 57.7089,
            'longitude' => 11.9746,
        ],
        [
            'name' => 'Port of Stockholm',
            'city' => 'Stockholm',
            'code' => 'SESTO',
            'type' => 'Passenger',
            'latitude' => 59.3293,
            'longitude' => 18.0686,
        ],
        [
            'name' => 'Port of Malmo',
            'city' => 'Malmo',
            'code' => 'SEMMA',
            'type' => 'Commercial',
            'latitude' => 55.6050,
            'longitude' => 13.0038,
        ],
        [
            'name' => 'Port of Helsingborg',
            'city' => 'Helsingborg',
            'code' => 'SEHEL',
            'type' => 'Container',
            'latitude' => 56.0465,
            'longitude' => 12.6945,
        ],
    ],
],

[
    'country' => 'Switzerland',
    'ports' => [
        [
            'name' => 'Port of Basel',
            'city' => 'Basel',
            'code' => 'CHBSL',
            'type' => 'River Port',
            'latitude' => 47.5596,
            'longitude' => 7.5886,
        ],
        [
            'name' => 'Port of Kleinhuningen',
            'city' => 'Basel',
            'code' => 'CHKLE',
            'type' => 'River Port',
            'latitude' => 47.5800,
            'longitude' => 7.6000,
        ],
    ],
],

[
    'country' => 'Taiwan',
    'ports' => [
        [
            'name' => 'Port of Kaohsiung',
            'city' => 'Kaohsiung',
            'code' => 'TWKHH',
            'type' => 'Container',
            'latitude' => 22.6163,
            'longitude' => 120.3000,
        ],
        [
            'name' => 'Port of Keelung',
            'city' => 'Keelung',
            'code' => 'TWKEL',
            'type' => 'Container',
            'latitude' => 25.1276,
            'longitude' => 121.7392,
        ],
        [
            'name' => 'Port of Taichung',
            'city' => 'Taichung',
            'code' => 'TWTXG',
            'type' => 'Container',
            'latitude' => 24.2667,
            'longitude' => 120.5167,
        ],
        [
            'name' => 'Port of Taipei',
            'city' => 'Taipei',
            'code' => 'TWTPE',
            'type' => 'Container',
            'latitude' => 25.1500,
            'longitude' => 121.4000,
        ],
    ],
],

[
'country'=>'Tajikistan',

'ports'=>[

[
'name'=>'Dushanbe Dry Port',
'city'=>'Dushanbe',
'lat'=>38.5598,
'lon'=>68.7870,
'terminal'=>'Dushanbe Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>250000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Afghanistan',

'ports'=>[

[
'name'=>'Hairatan Dry Port',
'city'=>'Hairatan',
'lat'=>37.4420,
'lon'=>67.4300,
'terminal'=>'Hairatan Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>300000,
'congestion'=>20,
'status'=>'Normal'
],

],

],


[
'country'=>'Uzbekistan',

'ports'=>[

[
'name'=>'Tashkent Dry Port',
'city'=>'Tashkent',
'lat'=>41.2995,
'lon'=>69.2401,
'terminal'=>'Tashkent Logistics Hub',
'type'=>'Dry Port',
'capacity'=>500000,
'congestion'=>20,
'status'=>'Normal'
],

[
'name'=>'Navoi Dry Port',
'city'=>'Navoi',
'lat'=>40.0844,
'lon'=>65.3792,
'terminal'=>'Navoi Logistics Center',
'type'=>'Dry Port',
'capacity'=>350000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Kyrgyzstan',

'ports'=>[

[
'name'=>'Bishkek Dry Port',
'city'=>'Bishkek',
'lat'=>42.8746,
'lon'=>74.5698,
'terminal'=>'Bishkek Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>250000,
'congestion'=>10,
'status'=>'Normal'
],

],

],


[
'country'=>'Mongolia',

'ports'=>[

[
'name'=>'Zamyn-Uud Dry Port',
'city'=>'Zamyn-Uud',
'lat'=>43.7230,
'lon'=>111.9040,
'terminal'=>'Zamyn-Uud Logistics Hub',
'type'=>'Dry Port',
'capacity'=>400000,
'congestion'=>20,
'status'=>'Normal'
],

[
'name'=>'Ulaanbaatar Logistics Terminal',
'city'=>'Ulaanbaatar',
'lat'=>47.8864,
'lon'=>106.9057,
'terminal'=>'Ulaanbaatar Dry Port',
'type'=>'Dry Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

],

],

[
'country'=>'Belarus',

'ports'=>[

[
'name'=>'Minsk Dry Port',
'city'=>'Minsk',
'lat'=>53.9006,
'lon'=>27.5590,
'terminal'=>'Minsk Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>400000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Moldova',

'ports'=>[

[
'name'=>'Giurgiulesti Port',
'city'=>'Giurgiulesti',
'lat'=>45.4780,
'lon'=>28.1970,
'terminal'=>'Giurgiulesti International Port',
'type'=>'River Port',
'capacity'=>500000,
'congestion'=>20,
'status'=>'Normal'
],

],

],


[
'country'=>'Bosnia and Herzegovina',

'ports'=>[

[
'name'=>'Port of Brcko',
'city'=>'Brcko',
'lat'=>44.8728,
'lon'=>18.8100,
'terminal'=>'Brcko River Terminal',
'type'=>'River Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Albania',

'ports'=>[

[
'name'=>'Port of Durres',
'city'=>'Durres',
'lat'=>41.3231,
'lon'=>19.4565,
'terminal'=>'Durres Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>25,
'status'=>'Normal'
],

],

],


[
'country'=>'North Macedonia',

'ports'=>[

[
'name'=>'Skopje Dry Port',
'city'=>'Skopje',
'lat'=>41.9981,
'lon'=>21.4254,
'terminal'=>'Skopje Logistics Hub',
'type'=>'Dry Port',
'capacity'=>250000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Kosovo',

'ports'=>[

[
'name'=>'Pristina Dry Port',
'city'=>'Pristina',
'lat'=>42.6629,
'lon'=>21.1655,
'terminal'=>'Pristina Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>200000,
'congestion'=>10,
'status'=>'Normal'
],

],

],


[
'country'=>'Armenia',

'ports'=>[

[
'name'=>'Yerevan Dry Port',
'city'=>'Yerevan',
'lat'=>40.1792,
'lon'=>44.4991,
'terminal'=>'Yerevan Logistics Center',
'type'=>'Dry Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Iran',

'ports'=>[

[
'name'=>'Port of Bandar Abbas',
'city'=>'Bandar Abbas',
'lat'=>27.1832,
'lon'=>56.2666,
'terminal'=>'Shahid Rajaee Port',
'type'=>'Container Port',
'capacity'=>6000000,
'congestion'=>50,
'status'=>'Delay'
],

[
'name'=>'Port of Chabahar',
'city'=>'Chabahar',
'lat'=>25.2969,
'lon'=>60.6430,
'terminal'=>'Chabahar Free Zone Port',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],

],

],


[
'country'=>'Iraq',

'ports'=>[

[
'name'=>'Port of Umm Qasr',
'city'=>'Basra',
'lat'=>30.0360,
'lon'=>47.9230,
'terminal'=>'Umm Qasr Container Terminal',
'type'=>'Container Port',
'capacity'=>1500000,
'congestion'=>45,
'status'=>'Delay'
],

],

],


[
'country'=>'Syria',

'ports'=>[

[
'name'=>'Port of Latakia',
'city'=>'Latakia',
'lat'=>35.5175,
'lon'=>35.7835,
'terminal'=>'Latakia Container Terminal',
'type'=>'Container Port',
'capacity'=>700000,
'congestion'=>40,
'status'=>'Delay'
],

],

],


[
'country'=>'Tunisia',

'ports'=>[

[
'name'=>'Port of Rades',
'city'=>'Tunis',
'lat'=>36.7690,
'lon'=>10.2760,
'terminal'=>'Rades Container Terminal',
'type'=>'Container Port',
'capacity'=>900000,
'congestion'=>30,
'status'=>'Normal'
],

],

],


[
'country'=>'Libya',

'ports'=>[

[
'name'=>'Port of Tripoli',
'city'=>'Tripoli',
'lat'=>32.8872,
'lon'=>13.1913,
'terminal'=>'Tripoli Maritime Terminal',
'type'=>'Container Port',
'capacity'=>800000,
'congestion'=>35,
'status'=>'Delay'
],

[
'name'=>'Port of Misrata',
'city'=>'Misrata',
'lat'=>32.3754,
'lon'=>15.0925,
'terminal'=>'Misrata Free Zone Port',
'type'=>'Container Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],

],

],

[
'country'=>'Laos',

'ports'=>[

[
'name'=>'Vientiane Dry Port',
'city'=>'Vientiane',
'lat'=>17.9757,
'lon'=>102.6331,
'terminal'=>'Vientiane Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Nepal',

'ports'=>[

[
'name'=>'Birgunj Dry Port',
'city'=>'Birgunj',
'lat'=>27.0104,
'lon'=>84.8770,
'terminal'=>'Birgunj Inland Container Depot',
'type'=>'Dry Port',
'capacity'=>400000,
'congestion'=>20,
'status'=>'Normal'
],

],

],


[
'country'=>'Mongolia',

'ports'=>[

[
'name'=>'Zamyn Uud Dry Port',
'city'=>'Zamyn Uud',
'lat'=>43.7230,
'lon'=>111.9040,
'terminal'=>'Zamyn Uud Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>350000,
'congestion'=>15,
'status'=>'Normal'
],

],

],


[
'country'=>'Kyrgyzstan',

'ports'=>[

[
'name'=>'Bishkek Logistics Terminal',
'city'=>'Bishkek',
'lat'=>42.8746,
'lon'=>74.5698,
'terminal'=>'Bishkek Dry Port',
'type'=>'Dry Port',
'capacity'=>250000,
'congestion'=>10,
'status'=>'Normal'
],

],

],


[
'country'=>'Uzbekistan',

'ports'=>[

[
'name'=>'Navoi Dry Port',
'city'=>'Navoi',
'lat'=>40.0844,
'lon'=>65.3792,
'terminal'=>'Navoi Logistics Center',
'type'=>'Dry Port',
'capacity'=>500000,
'congestion'=>15,
'status'=>'Normal'
],

[
'name'=>'Tashkent Logistics Terminal',
'city'=>'Tashkent',
'lat'=>41.2995,
'lon'=>69.2401,
'terminal'=>'Tashkent Dry Port',
'type'=>'Dry Port',
'capacity'=>400000,
'congestion'=>20,
'status'=>'Normal'
],

],

],

[
'country'=>'Hong Kong',

'ports'=>[
[
'name'=>'Hong Kong Port',
'city'=>'Hong Kong',
'lat'=>22.3193,
'lon'=>114.1694,
'terminal'=>'Hong Kong Container Terminal',
'type'=>'Container Port',
'capacity'=>18000000,
'congestion'=>35,
'status'=>'Normal'
],
],

],


[
'country'=>'Switzerland',

'ports'=>[
[
'name'=>'Port of Basel',
'city'=>'Basel',
'lat'=>47.5596,
'lon'=>7.5886,
'terminal'=>'Basel Rhine Terminal',
'type'=>'River Port',
'capacity'=>500000,
'congestion'=>20,
'status'=>'Normal'
],
],

],


[
'country'=>'Austria',

'ports'=>[
[
'name'=>'Port of Vienna',
'city'=>'Vienna',
'lat'=>48.2082,
'lon'=>16.3738,
'terminal'=>'Vienna Danube Port',
'type'=>'River Port',
'capacity'=>1200000,
'congestion'=>15,
'status'=>'Normal'
],
],

],


[
'country'=>'Czech Republic',

'ports'=>[
[
'name'=>'Port of Decin',
'city'=>'Decin',
'lat'=>50.7736,
'lon'=>14.2148,
'terminal'=>'Decin River Terminal',
'type'=>'River Port',
'capacity'=>400000,
'congestion'=>15,
'status'=>'Normal'
],
],

],


[
'country'=>'Hungary',

'ports'=>[
[
'name'=>'Port of Budapest',
'city'=>'Budapest',
'lat'=>47.4979,
'lon'=>19.0402,
'terminal'=>'Budapest Danube Port',
'type'=>'River Port',
'capacity'=>1000000,
'congestion'=>20,
'status'=>'Normal'
],
],

],


[
'country'=>'Ethiopia',

'ports'=>[
[
'name'=>'Modjo Dry Port',
'city'=>'Modjo',
'lat'=>8.6000,
'lon'=>39.1167,
'terminal'=>'Modjo Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>1000000,
'congestion'=>25,
'status'=>'Normal'
],
],

],


[
'country'=>'Laos',

'ports'=>[
[
'name'=>'Thanaleng Dry Port',
'city'=>'Vientiane',
'lat'=>17.9000,
'lon'=>102.6000,
'terminal'=>'Thanaleng Logistics Hub',
'type'=>'Dry Port',
'capacity'=>300000,
'congestion'=>15,
'status'=>'Normal'
],
],

],


[
'country'=>'Mongolia',

'ports'=>[
[
'name'=>'Zamyn Uud Dry Port',
'city'=>'Zamyn Uud',
'lat'=>43.7230,
'lon'=>111.9040,
'terminal'=>'Zamyn Uud Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>400000,
'congestion'=>20,
'status'=>'Normal'
],
],

],


[
'country'=>'Uzbekistan',

'ports'=>[
[
'name'=>'Navoi Dry Port',
'city'=>'Navoi',
'lat'=>40.0844,
'lon'=>65.3792,
'terminal'=>'Navoi Logistics Center',
'type'=>'Dry Port',
'capacity'=>500000,
'congestion'=>15,
'status'=>'Normal'
],
],

],


[
'country'=>'Afghanistan',

'ports'=>[
[
'name'=>'Hairatan Dry Port',
'city'=>'Hairatan',
'lat'=>37.0150,
'lon'=>67.4290,
'terminal'=>'Hairatan Logistics Terminal',
'type'=>'Dry Port',
'capacity'=>250000,
'congestion'=>20,
'status'=>'Normal'
],
],

],

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

