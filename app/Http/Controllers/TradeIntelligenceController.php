<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Support\Facades\DB;
use App\Models\Port;
use App\Models\ShippingRoute;
use App\Models\ShippingLane;

class TradeIntelligenceController extends Controller
{

    public function index()
    {

        /*
        |--------------------------------------------------------------------------
        | REAL TRADE DATA
        |--------------------------------------------------------------------------
        */


        $totalVessel = Vessel::count();


        $activeTrade = Vessel::where(
            'status',
            'Sailing'
        )->count();



        $delayedTrade = Vessel::where(
            'status',
            'Delayed'
        )->count();



        /*
        |--------------------------------------------------------------------------
        | REAL SHIPPING ROUTE
        |--------------------------------------------------------------------------
        */


        $topRoutes = Vessel::select(

                'current_port',
                'destination',
                DB::raw('SUM(capacity) as volume'),
                DB::raw('COUNT(*) as total_ship')

            )

            ->groupBy(

                'current_port',
                'destination'

            )

            ->orderByDesc(
                'volume'
            )

            ->limit(10)

            ->get();



        /*
        |--------------------------------------------------------------------------
        | REAL CARGO DATA
        |--------------------------------------------------------------------------
        */


        $commodities = Vessel::select(

                'cargo',
                DB::raw('COUNT(*) as total')

            )

            ->groupBy(
                'cargo'
            )

            ->get();


        $tradeRoutes = ShippingRoute::with([

    'origin',

    'destination',

    'origin.country',

    'destination.country'



])->get();

$shippingLanes = ShippingLane::all();


        return view(
            'trade-intelligence.index',
            compact(

            'totalVessel',
            'activeTrade',
            'delayedTrade',
            'topRoutes',
            'commodities',
            'tradeRoutes',
            'shippingLanes'

            )
        );
                

    }

}