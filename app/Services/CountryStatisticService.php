<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryStatisticService
{

    public function getStatistics($iso3)
    {

        $indicators = [

            'inflation'=>'FP.CPI.TOTL.ZG',

            'population'=>'SP.POP.TOTL',

            'export'=>'NE.EXP.GNFS.CD',

            'import'=>'NE.IMP.GNFS.CD'

        ];


        $result=[];


        foreach($indicators as $key=>$indicator){


            $response = Http::timeout(30)->get(

                "https://api.worldbank.org/v2/country/$iso3/indicator/$indicator",

                [

                    'format'=>'json',

                    'per_page'=>100

                ]

            );


            if($response->successful()){


                $data = $response->json();


                if(isset($data[1])){


                    foreach($data[1] as $item){


                        if($item['value'] !== null){


                            $result[$key]=$item['value'];

                            break;

                        }


                    }


                }


            }


        }


        return [

            'inflation'=>$result['inflation'] ?? null,

            'population'=>$result['population'] ?? null,

            'export'=>$result['export'] ?? null,

            'import'=>$result['import'] ?? null

        ];

    }

}