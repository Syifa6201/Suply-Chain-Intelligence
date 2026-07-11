<?php

namespace App\Services;

class TradePotentialService
{
    public function analyze(
        array $statistics,
        array $risk,
        array $news
    ) {

        $export = $statistics['export'] ?? 0;
        $import = $statistics['import'] ?? 0;
        $inflation = $statistics['inflation'] ?? 0;

        $balance = $export - $import;

        /*
        |--------------------------------------------------------------------------
        | Trade Status
        |--------------------------------------------------------------------------
        */

        if ($balance > 0) {

            $status = "Trade Surplus";
            $color = "success";

        } elseif ($balance < 0) {

            $status = "Trade Deficit";
            $color = "danger";

        } else {

            $status = "Balanced";
            $color = "warning";

        }

        /*
        |--------------------------------------------------------------------------
        | Market Condition
        |--------------------------------------------------------------------------
        */

        if ($inflation < 3) {

            $market = "Stable Market";

        } elseif ($inflation < 8) {

            $market = "Moderate Inflation";

        } else {

            $market = "High Inflation";

        }

        /*
        |--------------------------------------------------------------------------
        | AI Analysis
        |--------------------------------------------------------------------------
        */

        $exports = [];
        $imports = [];

        if ($balance > 0) {

            $exports[] = "Export performance exceeds imports.";

        } else {

            $imports[] = "Import demand is higher than exports.";

        }

        if ($risk['score'] < 40) {

            $exports[] = "Low logistics risk.";

        } elseif ($risk['score'] < 70) {

            $exports[] = "Logistics remain manageable.";

        } else {

            $imports[] = "High logistics risk.";

        }

        foreach($news['articles'] ?? [] as $article){

            $text = strtolower(
                ($article['title'] ?? '') .
                ' ' .
                ($article['description'] ?? '')
            );

            if(
                str_contains($text,'trade') ||
                str_contains($text,'export') ||
                str_contains($text,'manufacturing')
            ){

                $exports[] = "Positive trade news detected.";

                break;

            }

        }

        return [

            'status' => $status,

            'color' => $color,

            'market' => $market,

            'balance' => $balance,

            'export' => $export,

            'import' => $import,

            'exports' => array_unique($exports),

            'imports' => array_unique($imports)

        ];

    }
}