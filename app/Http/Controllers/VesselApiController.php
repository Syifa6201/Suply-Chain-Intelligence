<?php

namespace App\Http\Controllers;

use App\Models\Vessel;

class VesselApiController extends Controller
{

    public function index()
    {

        $vessels = Vessel::with('country')
            ->get();


        return response()->json([

            'success' => true,

            'total' => $vessels->count(),

            'data' => $vessels

        ]);

    }


    public function live()
    {

        $vessels = Vessel::with('country')
            ->get();


        return response()->json([

            'success' => true,

            'total' => $vessels->count(),

            'data' => $vessels->map(function($vessel){

                return [

                    'id' => $vessel->id,

                    'name' => $vessel->name,

                    'country' => optional($vessel->country)->name,

                    'latitude' => (float)$vessel->latitude,

                    'longitude' => (float)$vessel->longitude,

                    'status' => $vessel->status,

                    'speed' => $vessel->speed,

                    'heading' => $vessel->heading,

                    'destination' => $vessel->destination,

                    'cargo' => $vessel->cargo,

                    'risk_score' => $vessel->risk_score,

                    'eta' => $vessel->eta

                ];

            })

        ]);

    }

}