<?php

namespace App\Services;

class TradeTrendService
{
    public function generate($statistics)
    {

        $export=$statistics['export'] ?? 0;
        $import=$statistics['import'] ?? 0;

        return [

            'export'=>[

                round($export*0.70/1000000000,2),
                round($export*0.78/1000000000,2),
                round($export*0.85/1000000000,2),
                round($export*0.92/1000000000,2),
                round($export*0.97/1000000000,2),
                round($export/1000000000,2),

            ],

            'import'=>[

                round($import*0.70/1000000000,2),
                round($import*0.78/1000000000,2),
                round($import*0.85/1000000000,2),
                round($import*0.92/1000000000,2),
                round($import*0.97/1000000000,2),
                round($import/1000000000,2),

            ]

        ];

    }
}