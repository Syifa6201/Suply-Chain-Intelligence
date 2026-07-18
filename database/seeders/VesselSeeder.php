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

            // ================= TAMBAHAN ROUTE =================

[
"start"=>[22.30,114.17],
"destination"=>"Singapore",
"country"=>"Hong Kong",
"heading"=>210
],

[
"start"=>[35.10,129.04],
"destination"=>"Shanghai",
"country"=>"South Korea",
"heading"=>280
],

[
"start"=>[25.27,55.29],
"destination"=>"Rotterdam",
"country"=>"United Arab Emirates",
"heading"=>300
],

[
"start"=>[29.37,47.97],
"destination"=>"Singapore",
"country"=>"Kuwait",
"heading"=>120
],

[
"start"=>[26.25,50.65],
"destination"=>"Mumbai",
"country"=>"Bahrain",
"heading"=>135
],

[
"start"=>[24.82,51.61],
"destination"=>"Shanghai",
"country"=>"Qatar",
"heading"=>90
],

[
"start"=>[31.20,29.91],
"destination"=>"Hamburg",
"country"=>"Egypt",
"heading"=>320
],

[
"start"=>[-29.87,31.03],
"destination"=>"Singapore",
"country"=>"South Africa",
"heading"=>45
],

[
"start"=>[-4.04,39.66],
"destination"=>"Dubai",
"country"=>"Kenya",
"heading"=>35
],

[
"start"=>[6.45,3.39],
"destination"=>"Rotterdam",
"country"=>"Nigeria",
"heading"=>310
],

[
"start"=>[19.05,-104.31],
"destination"=>"Tokyo",
"country"=>"Mexico",
"heading"=>285
],

[
"start"=>[49.28,-123.12],
"destination"=>"Shanghai",
"country"=>"Canada",
"heading"=>275
],

[
"start"=>[-23.96,-46.32],
"destination"=>"Singapore",
"country"=>"Brazil",
"heading"=>75
],

[
"start"=>[-34.60,-58.38],
"destination"=>"Cape Town",
"country"=>"Argentina",
"heading"=>110
],

[
"start"=>[-12.04,-77.14],
"destination"=>"Los Angeles",
"country"=>"Peru",
"heading"=>325
],

[
"start"=>[-36.84,174.76],
"destination"=>"Shanghai",
"country"=>"New Zealand",
"heading"=>330
],

[
"start"=>[-9.47,147.15],
"destination"=>"Singapore",
"country"=>"Papua New Guinea",
"heading"=>300
],

[
"start"=>[35.89,-5.50],
"destination"=>"New York",
"country"=>"Morocco",
"heading"=>300
],

[
"start"=>[36.81,34.64],
"destination"=>"Singapore",
"country"=>"Turkey",
"heading"=>135
],

[
"start"=>[43.11,131.88],
"destination"=>"Busan",
"country"=>"Russia",
"heading"=>180
],

// ================= EXTRA GLOBAL ROUTES =================

[
"start"=>[51.51,-0.12],
"destination"=>"New York",
"country"=>"United Kingdom",
"heading"=>270
],

[
"start"=>[53.54,9.99],
"destination"=>"Los Angeles",
"country"=>"Germany",
"heading"=>285
],

[
"start"=>[51.95,4.14],
"destination"=>"Houston",
"country"=>"Netherlands",
"heading"=>275
],

[
"start"=>[43.29,5.37],
"destination"=>"Algiers",
"country"=>"France",
"heading"=>180
],

[
"start"=>[41.38,2.17],
"destination"=>"Casablanca",
"country"=>"Spain",
"heading"=>225
],

[
"start"=>[45.44,12.31],
"destination"=>"Alexandria",
"country"=>"Italy",
"heading"=>145
],

[
"start"=>[59.93,30.31],
"destination"=>"Rotterdam",
"country"=>"Russia",
"heading"=>250
],

[
"start"=>[59.32,18.06],
"destination"=>"Hamburg",
"country"=>"Sweden",
"heading"=>210
],

[
"start"=>[60.17,24.94],
"destination"=>"London",
"country"=>"Finland",
"heading"=>230
],

[
"start"=>[55.67,12.56],
"destination"=>"Oslo",
"country"=>"Denmark",
"heading"=>340
],

[
"start"=>[53.35,-6.26],
"destination"=>"Boston",
"country"=>"Ireland",
"heading"=>285
],

[
"start"=>[38.72,-9.13],
"destination"=>"Rio de Janeiro",
"country"=>"Portugal",
"heading"=>240
],

[
"start"=>[35.89,14.51],
"destination"=>"Athens",
"country"=>"Malta",
"heading"=>90
],

[
"start"=>[34.67,33.04],
"destination"=>"Haifa",
"country"=>"Cyprus",
"heading"=>110
],

[
"start"=>[32.08,34.78],
"destination"=>"Piraeus",
"country"=>"Israel",
"heading"=>300
],

[
"start"=>[33.90,35.52],
"destination"=>"Alexandria",
"country"=>"Lebanon",
"heading"=>240
],

[
"start"=>[29.53,35.00],
"destination"=>"Jeddah",
"country"=>"Jordan",
"heading"=>180
],

[
"start"=>[24.45,54.38],
"destination"=>"Mumbai",
"country"=>"United Arab Emirates",
"heading"=>110
],

[
"start"=>[21.48,39.19],
"destination"=>"Singapore",
"country"=>"Saudi Arabia",
"heading"=>120
],

[
"start"=>[23.61,58.59],
"destination"=>"Karachi",
"country"=>"Oman",
"heading"=>90
],

[
"start"=>[24.86,67.01],
"destination"=>"Dubai",
"country"=>"Pakistan",
"heading"=>250
],

[
"start"=>[22.34,91.83],
"destination"=>"Singapore",
"country"=>"Bangladesh",
"heading"=>140
],

[
"start"=>[6.94,79.84],
"destination"=>"Port Klang",
"country"=>"Sri Lanka",
"heading"=>95
],

[
"start"=>[13.75,100.50],
"destination"=>"Jakarta",
"country"=>"Thailand",
"heading"=>160
],

[
"start"=>[-6.10,106.88],
"destination"=>"Singapore",
"country"=>"Indonesia",
"heading"=>330
],

[
"start"=>[-7.20,112.73],
"destination"=>"Shanghai",
"country"=>"Indonesia",
"heading"=>25
],

[
"start"=>[14.58,120.97],
"destination"=>"Busan",
"country"=>"Philippines",
"heading"=>20
],

[
"start"=>[10.77,106.70],
"destination"=>"Tokyo",
"country"=>"Vietnam",
"heading"=>45
],

[
"start"=>[35.68,139.69],
"destination"=>"Vancouver",
"country"=>"Japan",
"heading"=>85
],

[
"start"=>[37.56,126.97],
"destination"=>"Seattle",
"country"=>"South Korea",
"heading"=>90
],

// ================= MORE GLOBAL ROUTES =================

[
"start"=>[40.71,-74.00],
"destination"=>"Rotterdam",
"country"=>"United States",
"heading"=>80
],

[
"start"=>[29.76,-95.36],
"destination"=>"Panama",
"country"=>"United States",
"heading"=>135
],

[
"start"=>[25.77,-80.19],
"destination"=>"Santos",
"country"=>"United States",
"heading"=>160
],

[
"start"=>[49.28,-123.12],
"destination"=>"Yokohama",
"country"=>"Canada",
"heading"=>275
],

[
"start"=>[19.43,-99.13],
"destination"=>"Los Angeles",
"country"=>"Mexico",
"heading"=>315
],

[
"start"=>[-33.45,-70.66],
"destination"=>"Callao",
"country"=>"Chile",
"heading"=>350
],

[
"start"=>[-23.55,-46.63],
"destination"=>"Buenos Aires",
"country"=>"Brazil",
"heading"=>205
],

[
"start"=>[-34.60,-58.38],
"destination"=>"Montevideo",
"country"=>"Argentina",
"heading"=>110
],

[
"start"=>[-34.88,-56.18],
"destination"=>"Rio de Janeiro",
"country"=>"Uruguay",
"heading"=>40
],

[
"start"=>[-2.17,-79.92],
"destination"=>"Panama",
"country"=>"Ecuador",
"heading"=>330
],

[
"start"=>[10.48,-66.90],
"destination"=>"Houston",
"country"=>"Venezuela",
"heading"=>325
],

[
"start"=>[9.00,-79.50],
"destination"=>"Singapore",
"country"=>"Panama",
"heading"=>270
],

[
"start"=>[18.47,-69.90],
"destination"=>"Miami",
"country"=>"Dominican Republic",
"heading"=>315
],

[
"start"=>[17.97,-76.79],
"destination"=>"Colon",
"country"=>"Jamaica",
"heading"=>290
],

[
"start"=>[25.04,-77.35],
"destination"=>"New York",
"country"=>"Bahamas",
"heading"=>320
],

[
"start"=>[5.56,-0.20],
"destination"=>"Lagos",
"country"=>"Ghana",
"heading"=>95
],

[
"start"=>[-6.81,39.28],
"destination"=>"Mombasa",
"country"=>"Tanzania",
"heading"=>25
],

[
"start"=>[-25.97,32.58],
"destination"=>"Durban",
"country"=>"Mozambique",
"heading"=>180
],

[
"start"=>[-22.95,14.50],
"destination"=>"Cape Town",
"country"=>"Namibia",
"heading"=>170
],

[
"start"=>[36.75,3.06],
"destination"=>"Marseille",
"country"=>"Algeria",
"heading"=>25
],

[
"start"=>[33.57,-7.61],
"destination"=>"Lisbon",
"country"=>"Morocco",
"heading"=>35
],

[
"start"=>[6.52,3.37],
"destination"=>"Tema",
"country"=>"Nigeria",
"heading"=>260
],

[
"start"=>[59.91,10.75],
"destination"=>"Hamburg",
"country"=>"Norway",
"heading"=>180
],

[
"start"=>[64.14,-21.94],
"destination"=>"Halifax",
"country"=>"Iceland",
"heading"=>285
],

[
"start"=>[-36.85,174.76],
"destination"=>"Sydney",
"country"=>"New Zealand",
"heading"=>285
],

[
"start"=>[-18.12,178.45],
"destination"=>"Auckland",
"country"=>"Fiji",
"heading"=>210
],

[
"start"=>[-17.73,168.31],
"destination"=>"Brisbane",
"country"=>"Vanuatu",
"heading"=>240
],

[
"start"=>[-9.43,159.95],
"destination"=>"Port Moresby",
"country"=>"Solomon Islands",
"heading"=>260
],

[
"start"=>[-22.27,166.45],
"destination"=>"Sydney",
"country"=>"New Caledonia",
"heading"=>235
],

[
"start"=>[-17.55,-149.56],
"destination"=>"Honolulu",
"country"=>"French Polynesia",
"heading"=>35
],

// ================= GLOBAL SHIPPING LANES =================

[
"start"=>[1.29,103.85],
"destination"=>"Jakarta",
"country"=>"Singapore",
"heading"=>160
],

[
"start"=>[1.29,103.85],
"destination"=>"Ho Chi Minh",
"country"=>"Singapore",
"heading"=>70
],

[
"start"=>[22.30,114.17],
"destination"=>"Singapore",
"country"=>"Hong Kong",
"heading"=>210
],

[
"start"=>[31.23,121.49],
"destination"=>"Busan",
"country"=>"China",
"heading"=>55
],

[
"start"=>[31.23,121.49],
"destination"=>"Tokyo",
"country"=>"China",
"heading"=>80
],

[
"start"=>[35.10,129.04],
"destination"=>"Shanghai",
"country"=>"South Korea",
"heading"=>260
],

[
"start"=>[35.68,139.69],
"destination"=>"Busan",
"country"=>"Japan",
"heading"=>285
],

[
"start"=>[13.08,80.28],
"destination"=>"Colombo",
"country"=>"India",
"heading"=>210
],

[
"start"=>[6.94,79.84],
"destination"=>"Dubai",
"country"=>"Sri Lanka",
"heading"=>300
],

[
"start"=>[24.86,67.01],
"destination"=>"Mumbai",
"country"=>"Pakistan",
"heading"=>130
],

[
"start"=>[25.27,55.29],
"destination"=>"Doha",
"country"=>"United Arab Emirates",
"heading"=>90
],

[
"start"=>[26.25,50.65],
"destination"=>"Dubai",
"country"=>"Bahrain",
"heading"=>315
],

[
"start"=>[24.82,51.61],
"destination"=>"Jeddah",
"country"=>"Qatar",
"heading"=>260
],

[
"start"=>[21.48,39.19],
"destination"=>"Suez",
"country"=>"Saudi Arabia",
"heading"=>330
],

[
"start"=>[23.61,58.59],
"destination"=>"Mumbai",
"country"=>"Oman",
"heading"=>90
],

[
"start"=>[31.20,29.91],
"destination"=>"Istanbul",
"country"=>"Egypt",
"heading"=>25
],

[
"start"=>[35.89,-5.50],
"destination"=>"Barcelona",
"country"=>"Morocco",
"heading"=>45
],

[
"start"=>[36.75,3.06],
"destination"=>"Marseille",
"country"=>"Algeria",
"heading"=>40
],

[
"start"=>[6.45,3.39],
"destination"=>"Cape Town",
"country"=>"Nigeria",
"heading"=>170
],

[
"start"=>[5.56,-0.20],
"destination"=>"Abidjan",
"country"=>"Ghana",
"heading"=>260
],

[
"start"=>[-4.04,39.66],
"destination"=>"Colombo",
"country"=>"Kenya",
"heading"=>60
],

[
"start"=>[-29.87,31.03],
"destination"=>"Melbourne",
"country"=>"South Africa",
"heading"=>110
],

[
"start"=>[-33.92,18.42],
"destination"=>"Buenos Aires",
"country"=>"South Africa",
"heading"=>250
],

[
"start"=>[-23.96,-46.32],
"destination"=>"Cape Town",
"country"=>"Brazil",
"heading"=>110
],

[
"start"=>[-34.60,-58.38],
"destination"=>"Rio de Janeiro",
"country"=>"Argentina",
"heading"=>35
],

[
"start"=>[-12.04,-77.14],
"destination"=>"Guayaquil",
"country"=>"Peru",
"heading"=>335
],

[
"start"=>[19.05,-104.31],
"destination"=>"Shanghai",
"country"=>"Mexico",
"heading"=>285
],

[
"start"=>[33.74,-118.27],
"destination"=>"Honolulu",
"country"=>"United States",
"heading"=>260
],

[
"start"=>[40.71,-74.00],
"destination"=>"London",
"country"=>"United States",
"heading"=>70
],

[
"start"=>[49.28,-123.12],
"destination"=>"Busan",
"country"=>"Canada",
"heading"=>275
],

// ================= TRANS PACIFIC & GLOBAL =================

[
"start"=>[21.30,-157.86],
"destination"=>"Yokohama",
"country"=>"United States",
"heading"=>285
],

[
"start"=>[61.21,-149.90],
"destination"=>"Busan",
"country"=>"United States",
"heading"=>260
],

[
"start"=>[47.60,-122.33],
"destination"=>"Shanghai",
"country"=>"United States",
"heading"=>275
],

[
"start"=>[37.77,-122.42],
"destination"=>"Singapore",
"country"=>"United States",
"heading"=>250
],

[
"start"=>[32.72,-117.16],
"destination"=>"Tokyo",
"country"=>"United States",
"heading"=>275
],

[
"start"=>[64.14,-21.94],
"destination"=>"Rotterdam",
"country"=>"Iceland",
"heading"=>110
],

[
"start"=>[55.68,12.57],
"destination"=>"Oslo",
"country"=>"Denmark",
"heading"=>10
],

[
"start"=>[59.91,10.75],
"destination"=>"Copenhagen",
"country"=>"Norway",
"heading"=>160
],

[
"start"=>[59.33,18.07],
"destination"=>"Helsinki",
"country"=>"Sweden",
"heading"=>90
],

[
"start"=>[60.17,24.94],
"destination"=>"Stockholm",
"country"=>"Finland",
"heading"=>270
],

[
"start"=>[53.35,-6.26],
"destination"=>"Liverpool",
"country"=>"Ireland",
"heading"=>85
],

[
"start"=>[50.91,-1.40],
"destination"=>"Rotterdam",
"country"=>"United Kingdom",
"heading"=>95
],

[
"start"=>[51.92,4.48],
"destination"=>"Antwerp",
"country"=>"Netherlands",
"heading"=>180
],

[
"start"=>[51.22,4.40],
"destination"=>"Hamburg",
"country"=>"Belgium",
"heading"=>45
],

[
"start"=>[53.55,10.00],
"destination"=>"Gdansk",
"country"=>"Germany",
"heading"=>70
],

[
"start"=>[54.35,18.65],
"destination"=>"Helsinki",
"country"=>"Poland",
"heading"=>30
],

[
"start"=>[59.44,24.75],
"destination"=>"Stockholm",
"country"=>"Estonia",
"heading"=>300
],

[
"start"=>[56.95,24.10],
"destination"=>"Tallinn",
"country"=>"Latvia",
"heading"=>15
],

[
"start"=>[55.70,21.13],
"destination"=>"Riga",
"country"=>"Lithuania",
"heading"=>5
],

[
"start"=>[44.43,26.10],
"destination"=>"Istanbul",
"country"=>"Romania",
"heading"=>160
],

[
"start"=>[42.70,23.32],
"destination"=>"Piraeus",
"country"=>"Bulgaria",
"heading"=>180
],

[
"start"=>[37.98,23.72],
"destination"=>"Alexandria",
"country"=>"Greece",
"heading"=>150
],

[
"start"=>[41.01,28.97],
"destination"=>"Odessa",
"country"=>"Turkey",
"heading"=>40
],

[
"start"=>[46.48,30.73],
"destination"=>"Istanbul",
"country"=>"Ukraine",
"heading"=>190
],

[
"start"=>[44.79,20.45],
"destination"=>"Constanta",
"country"=>"Serbia",
"heading"=>110
],

[
"start"=>[45.81,15.98],
"destination"=>"Venice",
"country"=>"Croatia",
"heading"=>290
],

[
"start"=>[46.05,14.51],
"destination"=>"Trieste",
"country"=>"Slovenia",
"heading"=>240
],

[
"start"=>[47.49,19.04],
"destination"=>"Constanta",
"country"=>"Hungary",
"heading"=>120
],

[
"start"=>[48.21,16.37],
"destination"=>"Hamburg",
"country"=>"Austria",
"heading"=>320
],

[
"start"=>[50.08,14.43],
"destination"=>"Rotterdam",
"country"=>"Czech Republic",
"heading"=>300
],

// ================= INDIAN OCEAN & AFRICA =================

[
"start"=>[-20.16,57.50],
"destination"=>"Singapore",
"country"=>"Mauritius",
"heading"=>60
],

[
"start"=>[-4.62,55.45],
"destination"=>"Dubai",
"country"=>"Seychelles",
"heading"=>15
],

[
"start"=>[-18.91,47.52],
"destination"=>"Durban",
"country"=>"Madagascar",
"heading"=>180
],

[
"start"=>[-25.97,32.58],
"destination"=>"Singapore",
"country"=>"Mozambique",
"heading"=>45
],

[
"start"=>[-22.57,17.08],
"destination"=>"Cape Town",
"country"=>"Namibia",
"heading"=>170
],

[
"start"=>[15.50,32.56],
"destination"=>"Jeddah",
"country"=>"Sudan",
"heading"=>25
],

[
"start"=>[9.03,38.74],
"destination"=>"Mombasa",
"country"=>"Ethiopia",
"heading"=>140
],

[
"start"=>[11.58,43.14],
"destination"=>"Aden",
"country"=>"Djibouti",
"heading"=>90
],

[
"start"=>[2.04,45.34],
"destination"=>"Mombasa",
"country"=>"Somalia",
"heading"=>210
],

[
"start"=>[-15.41,28.28],
"destination"=>"Durban",
"country"=>"Zambia",
"heading"=>170
],

[
"start"=>[-17.82,31.05],
"destination"=>"Maputo",
"country"=>"Zimbabwe",
"heading"=>160
],

[
"start"=>[-24.65,25.91],
"destination"=>"Cape Town",
"country"=>"Botswana",
"heading"=>190
],

[
"start"=>[-26.20,28.04],
"destination"=>"Singapore",
"country"=>"South Africa",
"heading"=>70
],

[
"start"=>[6.30,-10.79],
"destination"=>"Lagos",
"country"=>"Liberia",
"heading"=>85
],

[
"start"=>[8.48,-13.23],
"destination"=>"Tema",
"country"=>"Sierra Leone",
"heading"=>95
],

[
"start"=>[14.69,-17.44],
"destination"=>"Casablanca",
"country"=>"Senegal",
"heading"=>25
],

[
"start"=>[5.35,-4.01],
"destination"=>"Lagos",
"country"=>"Ivory Coast",
"heading"=>80
],

[
"start"=>[12.37,-1.53],
"destination"=>"Tema",
"country"=>"Burkina Faso",
"heading"=>170
],

[
"start"=>[13.51,2.11],
"destination"=>"Lagos",
"country"=>"Niger",
"heading"=>180
],

[
"start"=>[12.65,-8.00],
"destination"=>"Dakar",
"country"=>"Mali",
"heading"=>250
],

[
"start"=>[3.86,11.52],
"destination"=>"Lagos",
"country"=>"Cameroon",
"heading"=>280
],

[
"start"=>[0.39,9.45],
"destination"=>"Douala",
"country"=>"Gabon",
"heading"=>320
],

[
"start"=>[-4.27,15.28],
"destination"=>"Luanda",
"country"=>"Congo",
"heading"=>210
],

[
"start"=>[-8.83,13.23],
"destination"=>"Cape Town",
"country"=>"Angola",
"heading"=>170
],

[
"start"=>[-15.79,-47.88],
"destination"=>"Santos",
"country"=>"Brazil",
"heading"=>140
],

[
"start"=>[-34.90,-56.16],
"destination"=>"Buenos Aires",
"country"=>"Uruguay",
"heading"=>260
],

[
"start"=>[-16.50,-68.15],
"destination"=>"Callao",
"country"=>"Bolivia",
"heading"=>300
],

[
"start"=>[4.71,-74.07],
"destination"=>"Panama",
"country"=>"Colombia",
"heading"=>330
],

[
"start"=>[8.98,-79.52],
"destination"=>"Los Angeles",
"country"=>"Panama",
"heading"=>310
],

[
"start"=>[18.49,-69.93],
"destination"=>"New York",
"country"=>"Dominican Republic",
"heading"=>320
],

// ================= ARCTIC • PACIFIC • ATLANTIC =================

[
"start"=>[64.18,-51.72],
"destination"=>"Reykjavik",
"country"=>"Greenland",
"heading"=>90
],

[
"start"=>[64.14,-21.94],
"destination"=>"Halifax",
"country"=>"Iceland",
"heading"=>270
],

[
"start"=>[60.39,5.32],
"destination"=>"Rotterdam",
"country"=>"Norway",
"heading"=>180
],

[
"start"=>[57.70,11.97],
"destination"=>"Hamburg",
"country"=>"Sweden",
"heading"=>170
],

[
"start"=>[55.40,10.38],
"destination"=>"Oslo",
"country"=>"Denmark",
"heading"=>350
],

[
"start"=>[53.48,-2.24],
"destination"=>"Dublin",
"country"=>"United Kingdom",
"heading"=>290
],

[
"start"=>[53.35,-6.26],
"destination"=>"Liverpool",
"country"=>"Ireland",
"heading"=>90
],

[
"start"=>[50.11,8.68],
"destination"=>"Rotterdam",
"country"=>"Germany",
"heading"=>300
],

[
"start"=>[48.85,2.35],
"destination"=>"Marseille",
"country"=>"France",
"heading"=>180
],

[
"start"=>[41.39,2.17],
"destination"=>"Valencia",
"country"=>"Spain",
"heading"=>230
],

[
"start"=>[38.72,-9.13],
"destination"=>"Azores",
"country"=>"Portugal",
"heading"=>250
],

[
"start"=>[39.47,-0.37],
"destination"=>"Algiers",
"country"=>"Spain",
"heading"=>190
],

[
"start"=>[35.17,33.36],
"destination"=>"Piraeus",
"country"=>"Cyprus",
"heading"=>300
],

[
"start"=>[35.90,14.51],
"destination"=>"Naples",
"country"=>"Malta",
"heading"=>310
],

[
"start"=>[32.08,34.78],
"destination"=>"Limassol",
"country"=>"Israel",
"heading"=>290
],

[
"start"=>[33.89,35.50],
"destination"=>"Haifa",
"country"=>"Lebanon",
"heading"=>180
],

[
"start"=>[29.53,35.00],
"destination"=>"Suez",
"country"=>"Jordan",
"heading"=>260
],

[
"start"=>[25.20,55.27],
"destination"=>"Muscat",
"country"=>"United Arab Emirates",
"heading"=>120
],

[
"start"=>[23.59,58.40],
"destination"=>"Karachi",
"country"=>"Oman",
"heading"=>70
],

[
"start"=>[24.45,54.37],
"destination"=>"Mumbai",
"country"=>"United Arab Emirates",
"heading"=>110
],

[
"start"=>[13.44,144.75],
"destination"=>"Tokyo",
"country"=>"Guam",
"heading"=>340
],

[
"start"=>[-17.73,168.32],
"destination"=>"Auckland",
"country"=>"Vanuatu",
"heading"=>160
],

[
"start"=>[-21.13,-175.20],
"destination"=>"Suva",
"country"=>"Tonga",
"heading"=>270
],

[
"start"=>[-13.83,-171.76],
"destination"=>"Auckland",
"country"=>"Samoa",
"heading"=>220
],

[
"start"=>[-18.14,178.44],
"destination"=>"Sydney",
"country"=>"Fiji",
"heading"=>230
],

[
"start"=>[-9.44,159.96],
"destination"=>"Brisbane",
"country"=>"Solomon Islands",
"heading"=>250
],

[
"start"=>[-22.27,166.45],
"destination"=>"Auckland",
"country"=>"New Caledonia",
"heading"=>140
],

[
"start"=>[-17.54,-149.57],
"destination"=>"Honolulu",
"country"=>"French Polynesia",
"heading"=>40
],

[
"start"=>[-21.23,-159.78],
"destination"=>"Papeete",
"country"=>"Cook Islands",
"heading"=>95
],

[
"start"=>[-19.05,-169.92],
"destination"=>"Auckland",
"country"=>"Niue",
"heading"=>210
],


        ];



        $countries=[

    // Asia
    "Singapore",
    "Indonesia",
    "Malaysia",
    "Thailand",
    "Vietnam",
    "Philippines",
    "Brunei",
    "Cambodia",
    "Myanmar",
    "Laos",
    "China",
    "Japan",
    "South Korea",
    "North Korea",
    "Taiwan",
    "Hong Kong",
    "India",
    "Pakistan",
    "Bangladesh",
    "Sri Lanka",
    "Nepal",
    "Bhutan",
    "Maldives",
    "United Arab Emirates",
    "Saudi Arabia",
    "Qatar",
    "Bahrain",
    "Kuwait",
    "Oman",
    "Jordan",
    "Israel",
    "Lebanon",
    "Turkey",

    // Europe
    "United Kingdom",
    "Ireland",
    "France",
    "Germany",
    "Netherlands",
    "Belgium",
    "Luxembourg",
    "Spain",
    "Portugal",
    "Italy",
    "Switzerland",
    "Austria",
    "Poland",
    "Denmark",
    "Norway",
    "Sweden",
    "Finland",
    "Iceland",
    "Czech Republic",
    "Slovakia",
    "Hungary",
    "Romania",
    "Bulgaria",
    "Croatia",
    "Slovenia",
    "Serbia",
    "Ukraine",
    "Russia",
    "Greece",
    "Estonia",
    "Latvia",
    "Lithuania",

    // North America
    "United States",
    "Canada",
    "Mexico",
    "Panama",
    "Cuba",
    "Jamaica",
    "Bahamas",
    "Dominican Republic",
    "Trinidad and Tobago",

    // South America
    "Brazil",
    "Argentina",
    "Chile",
    "Peru",
    "Colombia",
    "Ecuador",
    "Venezuela",
    "Uruguay",
    "Paraguay",
    "Bolivia",

    // Africa
    "South Africa",
    "Egypt",
    "Nigeria",
    "Kenya",
    "Tanzania",
    "Mozambique",
    "Namibia",
    "Angola",
    "Ghana",
    "Cameroon",
    "Morocco",
    "Algeria",
    "Tunisia",
    "Senegal",
    "Ivory Coast",
    "Djibouti",
    "Somalia",
    "Sudan",
    "Ethiopia",
    "Madagascar",
    "Mauritius",
    "Seychelles",

    // Oceania
    "Australia",
    "New Zealand",
    "Papua New Guinea",
    "Fiji",
    "Samoa",
    "Tonga",
    "Vanuatu",
    "Solomon Islands",
    "New Caledonia",
    "French Polynesia"

];



        $cargo=[

    "Container",
    "Dry Bulk",
    "Liquid Bulk",
    "Crude Oil",
    "LNG",
    "LPG",
    "Coal",
    "Iron Ore",
    "Steel",
    "Machinery",
    "Electronics",
    "Automobile",
    "Vehicle",
    "Food",
    "Rice",
    "Wheat",
    "Corn",
    "Coffee",
    "Palm Oil",
    "Rubber",
    "Textile",
    "Chemical",
    "Fertilizer",
    "Cement",
    "Timber",
    "Paper",
    "Medical Equipment",
    "Pharmaceutical",
    "Construction Material",
    "Mixed Cargo"

];




        $counter=1;



        /*
|--------------------------------------------------------------------------
| CREATE 40 VESSELS
|--------------------------------------------------------------------------
*/

for($i=1;$i<=250;$i++){



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


                "imo"=>"98".str_pad($i,5,'0',STR_PAD_LEFT),


                "name"=>[
"Pacific Trader",
"Ocean Carrier",
"Blue Horizon",
"Atlantic Voyager",
"Global Navigator",
"Sea Explorer",
"Ocean Spirit",
"Maritime Star",
"Ever Pioneer",
"Golden Ocean",
"Asia Express",
"Pacific Queen",
"Neptune Carrier",
"Sea Falcon",
"Ocean Titan",
"Eastern Pearl",
"Liberty Marine",
"Royal Cargo",
"Ocean Phoenix",
"Global Express"
][array_rand([
"Pacific Trader",
"Ocean Carrier",
"Blue Horizon",
"Atlantic Voyager",
"Global Navigator",
"Sea Explorer",
"Ocean Spirit",
"Maritime Star",
"Ever Pioneer",
"Golden Ocean",
"Asia Express",
"Pacific Queen",
"Neptune Carrier",
"Sea Falcon",
"Ocean Titan",
"Eastern Pearl",
"Liberty Marine",
"Royal Cargo",
"Ocean Phoenix",
"Global Express"
])]." ".$i,



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