<?php

namespace App\Http\Controllers;

use App\Services\RiskService;

class RiskController extends Controller
{
    public function index(RiskService $riskService)
    {
        // sementara static dulu
        $weatherScore = 20;
        $currencyScore = 50;
        $newsScore = 60;
        $economyScore = 40;

        $score = $riskService->calculate(
            $weatherScore,
            $currencyScore,
            $newsScore,
            $economyScore
        );

        $level = $riskService->level($score);
        $recommendation = $riskService->recommendation($level);

        return view('risk.index', compact(
            'score',
            'level',
            'recommendation',
            'weatherScore',
            'currencyScore',
            'newsScore',
            'economyScore'
        ));
    }
}