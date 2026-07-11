<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Country;

class EconomyController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Selected Country
        |--------------------------------------------------------------------------
        */

        $selectedCountry = request('country', 'Indonesia');

        $country = Country::where('name', $selectedCountry)->firstOrFail();

        $iso3 = $country->iso3;

        $countries = Country::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Get Indicator Helper
        |--------------------------------------------------------------------------
        */

        $gdpValue = $this->getIndicator($iso3, 'NY.GDP.MKTP.CD');
        $inflationValue = $this->getIndicator($iso3, 'FP.CPI.TOTL.ZG');
        $populationValue = $this->getIndicator($iso3, 'SP.POP.TOTL');
        $exportValue = $this->getIndicator($iso3, 'NE.EXP.GNFS.CD');
        $importValue = $this->getIndicator($iso3, 'NE.IMP.GNFS.CD');

        return view('economy.index', compact(

            'countries',
            'selectedCountry',

            'gdpValue',
            'inflationValue',
            'populationValue',
            'exportValue',
            'importValue'

        ));
    }

    /*
    |--------------------------------------------------------------------------
    | World Bank Indicator
    |--------------------------------------------------------------------------
    */

    private function getIndicator($iso3, $indicator)
    {
        try {

            $response = Http::timeout(30)->get(

                "https://api.worldbank.org/v2/country/$iso3/indicator/$indicator",

                [

                    'format' => 'json',
                    'per_page' => 100

                ]

            );

            if (!$response->successful()) {
                return 0;
            }

            $json = $response->json();

            if (!isset($json[1])) {
                return 0;
            }

            foreach ($json[1] as $row) {

                if (!is_null($row['value'])) {
                    return $row['value'];
                }

            }

            return 0;

        } catch (\Exception $e) {

            return 0;

        }
    }
}