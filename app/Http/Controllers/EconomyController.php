<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class EconomyController extends Controller
{
    public function index()
    {
        $country = "IDN";

        $gdp = Http::get("https://api.worldbank.org/v2/country/$country/indicator/NY.GDP.MKTP.CD?format=json")->json();
        $inflation = Http::get("https://api.worldbank.org/v2/country/$country/indicator/FP.CPI.TOTL.ZG?format=json")->json();
        $population = Http::get("https://api.worldbank.org/v2/country/$country/indicator/SP.POP.TOTL?format=json")->json();
        $export = Http::get("https://api.worldbank.org/v2/country/$country/indicator/NE.EXP.GNFS.CD?format=json")->json();
        $import = Http::get("https://api.worldbank.org/v2/country/$country/indicator/NE.IMP.GNFS.CD?format=json")->json();

        $gdpValue = $gdp[1][0]['value'] ?? 0;
        $inflationValue = $inflation[1][0]['value'] ?? 0;
        $populationValue = $population[1][0]['value'] ?? 0;
        $exportValue = $export[1][0]['value'] ?? 0;
        $importValue = $import[1][0]['value'] ?? 0;

        return view('economy.index', compact(
            'gdpValue',
            'inflationValue',
            'populationValue',
            'exportValue',
            'importValue'
        ));
    }
}