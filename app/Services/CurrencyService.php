<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class CurrencyService
{

    public function getRate()
    {

        $response = Http::get(
            'https://open.er-api.com/v6/latest/USD'
        );


        return $response->json();

    }

}