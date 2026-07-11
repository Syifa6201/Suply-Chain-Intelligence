<?php

namespace App\Services;

use App\Models\Port;
use App\Models\Country;

class PortService
{
    public function getPorts($countryName)
    {
        $country = Country::where('name', $countryName)->first();

        if (!$country) {
            return collect();
        }

        return Port::where('country_id', $country->id)
            ->orderBy('name')
            ->get();
    }
}