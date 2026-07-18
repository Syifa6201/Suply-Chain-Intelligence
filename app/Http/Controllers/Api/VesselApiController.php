<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Vessel;
use Illuminate\Http\Request;

class VesselApiController extends Controller
{
    public function live(Request $request)
    {
        $query = Vessel::with('country');

        // Filter berdasarkan nama negara (opsional)
        if ($request->filled('country')) {

            $country = Country::where(
                'name',
                $request->country
            )->first();

            if ($country) {

                $query->where(
                    'country_id',
                    $country->id
                );

            }

        }

        $vessels = $query->get()->map(function ($v) {

            return [

                'id' => $v->id,

                'imo' => $v->imo,

                'name' => $v->name,

                'country' => optional($v->country)->name,

                'lat' => (float) $v->latitude,

                'lng' => (float) $v->longitude,

                'status' => $v->status,

                'speed' => $v->speed,

                'heading' => $v->heading,

                'cargo' => $v->cargo,

                'destination' => $v->destination,

                'risk' => $v->risk_score,

                'eta' => optional($v->eta)->format('d M Y H:i'),

            ];

        });

        return response()->json([

            'success' => true,

            'data' => $vessels

        ]);
    }
}