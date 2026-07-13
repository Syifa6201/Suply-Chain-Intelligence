<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Country;
use Illuminate\Http\Request;


class PortController extends Controller
{


    public function index(Request $request)
    {


        $query = Port::with('country');



        // SEARCH PORT

        if($request->search){

            $query->where(
                'name',
                'like',
                '%'.$request->search.'%'
            );

        }



        // FILTER COUNTRY

        if($request->country){

            $query->whereHas(
                'country',
                function($q) use($request){

                    $q->where(
                        'name',
                        $request->country
                    );

                }
            );

        }




        // FILTER STATUS

        if($request->status){

            $query->where(
                'status',
                $request->status
            );

        }





        $ports = $query
            ->orderByDesc('congestion')
            ->paginate(15)
            ->withQueryString();





        $countries = Country::orderBy('name')
            ->pluck('name');





        // STATISTICS


        $totalPorts = Port::count();


        $activePorts = Port::where(
            'status',
            'Normal'
        )->count();



        $delayPorts = Port::where(
            'status',
            'Delay'
        )->count();



        $criticalPorts = Port::where(
            'status',
            'Critical'
        )->count();





 // MAP DATA


$mapPorts = Port::with('country')
    ->whereNotNull('latitude')
    ->whereNotNull('longitude')
    ->get()
    ->map(function($port){


        return [

            'name'=>$port->name,

            'country'=>$port->country->name ?? '-',

            'city'=>$port->city,

            'latitude'=>(float)$port->latitude,

            'longitude'=>(float)$port->longitude,

            'status'=>$port->status,

            'congestion'=>$port->congestion,

            'capacity'=>$port->capacity,

            'risk_score'=>$port->risk_score

        ];


    });


        // CHART DATA


        $capacityChart = Port::orderByDesc('capacity')
            ->take(8)
            ->get([
                'name',
                'capacity'
            ]);


        return view(

            'ports.index',

            compact(

                'ports',

                'countries',

                'totalPorts',

                'activePorts',

                'delayPorts',

                'criticalPorts',

                'mapPorts',

                'capacityChart'

            )

        );

    }


}