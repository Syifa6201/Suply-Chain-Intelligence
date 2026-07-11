<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Country;

class PortController extends Controller
{
    public function index()
    {
        $query = Port::with('country');

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if (request('search')) {

            $query->where('name', 'like', '%' . request('search') . '%');

        }

        /*
        |--------------------------------------------------------------------------
        | Filter Country
        |--------------------------------------------------------------------------
        */

        if (request('country')) {

            $query->whereHas('country', function ($q) {

                $q->where('name', request('country'));

            });

        }

        $ports = $query
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalPorts = Port::count();

        $activePorts = Port::where('status', '!=', 'Closed')->count();

        $delayPorts = Port::where('status', 'Delay')->count();

        $criticalPorts = Port::where('status', 'Critical')->count();

        $countries = Country::orderBy('name')->pluck('name');

        return view(
            'ports.index',
            compact(
                'ports',
                'countries',
                'totalPorts',
                'activePorts',
                'delayPorts',
                'criticalPorts'
            )
        );
    }
}