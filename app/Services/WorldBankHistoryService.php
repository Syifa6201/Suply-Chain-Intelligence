<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WorldBankHistoryService
{
    public function getTradeHistory($iso3)
    {
        $indicators = [

            'export' => 'NE.EXP.GNFS.CD',

            'import' => 'NE.IMP.GNFS.CD'

        ];

        $result = [];

        foreach ($indicators as $key => $indicator) {

            try {

                $response = Http::timeout(30)->get(

                    "https://api.worldbank.org/v2/country/$iso3/indicator/$indicator",

                    [

                        'format' => 'json',

                        'per_page' => 10

                    ]

                );

                $json = $response->json();

                $labels = [];
                $values = [];

                if (isset($json[1]) && is_array($json[1])) {

                    /*
                    Ambil data lama -> baru
                    */
                    $rows = array_reverse($json[1]);

                    foreach ($rows as $row) {

                        if (!isset($row['value']) || $row['value'] === null) {
                            continue;
                        }

                        $labels[] = (string) $row['date'];

                        $values[] = round(
                            (float) $row['value'] / 1000000000,
                            2
                        );
                    }

                }

                $result[$key] = [

                    'labels' => array_values($labels),

                    'values' => array_values($values)

                ];

            } catch (\Exception $e) {

                $result[$key] = [

                    'labels' => [],

                    'values' => []

                ];

            }

        }

        return $result;
    }
}