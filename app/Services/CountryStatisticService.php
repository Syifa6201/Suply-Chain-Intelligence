<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryStatisticService
{
    public function getStatistics($iso3)
    {
        $indicators = [

            'inflation' => 'FP.CPI.TOTL.ZG',
            'population' => 'SP.POP.TOTL',
            'export'     => 'NE.EXP.GNFS.CD',
            'import'     => 'NE.IMP.GNFS.CD',

        ];

        $result = [];

        foreach ($indicators as $key => $indicator) {

            try {

                $response = Http::timeout(30)->get(

                    "https://api.worldbank.org/v2/country/$iso3/indicator/$indicator",

                    [

                        'format'   => 'json',
                        'per_page' => 100

                    ]

                );

                if (!$response->successful()) {

                    $result[$key] = 0;
                    continue;

                }

                $json = $response->json();

                $result[$key] = $this->latestValue(

                    $json[1] ?? []

                );

            } catch (\Exception $e) {

                $result[$key] = 0;

            }

        }

        return $result;
    }

    private function latestValue(array $rows)
    {
        foreach ($rows as $row) {

            if (
                isset($row['value']) &&
                $row['value'] !== null
            ) {

                return (float) $row['value'];

            }

        }

        return 0;
    }
}