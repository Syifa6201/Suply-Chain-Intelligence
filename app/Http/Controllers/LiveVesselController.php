<?php

namespace App\Http\Controllers;

use App\Models\Vessel;

class LiveVesselController extends Controller
{
    public function index()
    {
        $vessels = Vessel::with('country')
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Dashboard Summary
        |--------------------------------------------------------------------------
        */

        $totalVessels = $vessels->count();

        $sailing = $vessels->where('status', 'Sailing')->count();

        $loading = $vessels->where('status', 'Loading')->count();

        $arrived = $vessels->where('status', 'Arrived')->count();

        $delayed = $vessels->where('status', 'Delayed')->count();

        $averageSpeed = round($vessels->avg('speed'), 1);

        $averageRisk = round($vessels->avg('risk_score'));

        return view(
            'live-vessels.index',
            compact(
                'vessels',
                'totalVessels',
                'sailing',
                'loading',
                'arrived',
                'delayed',
                'averageSpeed',
                'averageRisk'
            )
        );
    }
}