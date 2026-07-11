<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OECService
{
    public function getTradePotential($country)
    {
        try{

            $response = Http::timeout(20)
                ->get("https://oec.world/api/search",$this->query($country));

            if(!$response->successful()){
                return null;
            }

            return $response->json();

        }catch(\Exception $e){

            return null;

        }
    }

    private function query($country)
    {
        return [

            'q'=>$country

        ];
    }
}