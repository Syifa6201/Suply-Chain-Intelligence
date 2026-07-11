<?php

namespace App\Services;

class TradeAnalysisService
{
    public function analyze(array $statistics)
    {
        $export = (float)($statistics['export'] ?? 0);
        $import = (float)($statistics['import'] ?? 0);

        $balance = $export - $import;

        if ($balance > 0) {
            $status = 'Trade Surplus';
            $color = 'success';
        } elseif ($balance < 0) {
            $status = 'Trade Deficit';
            $color = 'danger';
        } else {
            $status = 'Balanced';
            $color = 'warning';
        }

        return [

            'export' => $export,

            'import' => $import,

            'balance' => $balance,

            'status' => $status,

            'color' => $color

        ];
    }
}