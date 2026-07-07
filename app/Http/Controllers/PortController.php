<?php

namespace App\Http\Controllers;

use App\Models\Port;

class PortController extends Controller
{
    public function index()
    {
        $ports = Port::with('country')
            ->orderBy('name')
            ->get();

        return view(
            'ports.index',
            compact('ports')
        );
    }
}