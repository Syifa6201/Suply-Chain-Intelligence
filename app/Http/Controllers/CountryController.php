<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    public function index()
    {
        $response = Http::timeout(30)
            ->withoutVerifying()
            ->get('https://restcountries.francocarballar.com/api/v1/all');

        if (!$response->successful()) {
            dd('HTTP Error', $response->status(), $response->body());
        }

        $json = $response->json();

        $countries = collect($json)->map(function ($country) {
            return [
                'name' => $country['name']['common'] ?? $country['name'] ?? '-',
                'code' => $country['cca2'] ?? '-',
                'currency' => isset($country['currencies'])
                    ? array_key_first($country['currencies'])
                    : '-',
                'region' => $country['region'] ?? '-',
                'language' => isset($country['languages'])
                    ? implode(', ', $country['languages'])
                    : '-',
                'flag' => $country['flags']['png'] ?? ($country['flag'] ?? null)
            ];
        });

        return view('countries.index', compact('countries'));
    }
}