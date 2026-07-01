<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index()
    {
        $response = Http::get('https://open.er-api.com/v6/latest/USD');

        $data = $response->json();

        $rates = $data['rates'] ?? [];

        $usdToIdr = $rates['IDR'] ?? 0;
        $usdToEur = $rates['EUR'] ?? 0;
        $usdToCny = $rates['CNY'] ?? 0;

        $risk = "Low";

        if ($usdToIdr > 17000) {
            $risk = "High";
        } elseif ($usdToIdr > 16500) {
            $risk = "Medium";
        }

        return view('currency.index', compact(
            'usdToIdr',
            'usdToEur',
            'usdToCny',
            'risk'
        ));
    }
}