<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Services\ShippingPlannerService;

class ShippingPlannerController extends Controller
{
    protected ShippingPlannerService $shipping;

    public function __construct(ShippingPlannerService $shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * Display Shipping Planner page.
     */
    public function index()
    {
        $countries = Country::orderBy('name')->get();

        return view('shipping.index', [
            'countries' => $countries,
            'result' => null,
        ]);
    }

    /**
     * Calculate Shipping Plan.
     */
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'origin_country'      => 'required|exists:countries,id',
            'destination_country' => 'required|exists:countries,id',
            'weight'              => 'required|numeric|min:1',
            'transport'           => 'required|in:sea,air',
            'priority'            => 'required|in:balanced,fastest,cheapest',
        ]);

        // Tidak boleh negara yang sama
        if ($validated['origin_country'] == $validated['destination_country']) {
            return back()
                ->withInput()
                ->withErrors([
                    'destination_country' => 'Destination country must be different from origin country.'
                ]);
        }

        $countries = Country::orderBy('name')->get();

        $result = $this->shipping->calculate($validated);

        // Jika service gagal
        if (!$result['success']) {
            return view('shipping.index', [
                'countries' => $countries,
                'result' => null,
            ])->with('error', $result['message']);
        }

        return view('shipping.index', [
            'countries' => $countries,
            'result' => $result,
        ]);
    }
}