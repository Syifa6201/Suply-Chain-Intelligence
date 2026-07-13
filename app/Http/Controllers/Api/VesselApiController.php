<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vessel;

class VesselApiController extends Controller
{

    public function index()
    {

        $vessels = Vessel::with('country')->get();


        return response()->json([

            'success'=>true,

            'total'=>$vessels->count(),

            'data'=>$vessels

        ]);

    }



    public function live()
    {

        $vessels = Vessel::with('country')->get();


        return response()->json([

            'success'=>true,

            'total'=>$vessels->count(),

            'data'=>$vessels

        ]);

    }


}