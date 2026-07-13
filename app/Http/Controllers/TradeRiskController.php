<?php

namespace App\Http\Controllers;

use App\Models\TradeRisk;


class TradeRiskController extends Controller
{


public function index()
{


    $risks = TradeRisk::with(
        'shippingLane'
    )
    ->latest()
    ->get();



    $totalRoute = $risks->count();



    $highRisk = $risks
        ->whereIn(
            'risk_level',
            [
                'HIGH',
                'CRITICAL'
            ]
        )
        ->count();



    $averageRisk = round(
        $risks->avg(
            'risk_score'
        )
    );



    return view(

        'trade-risk.index',

        compact(

            'risks',

            'totalRoute',

            'highRisk',

            'averageRisk'

        )

    );


}


}