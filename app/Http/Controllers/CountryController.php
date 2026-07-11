<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $query = Country::query();

        if(request('search'))
        {
            $query->where('name','like','%'.request('search').'%');
        }

        if(request('region'))
        {
            $query->where('region',request('region'));
        }

        $countries = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $totalCountries = Country::count();

        $regions = Country::select('region')
                    ->distinct()
                    ->orderBy('region')
                    ->pluck('region');

        return view(
            'countries.index',
            compact(
                'countries',
                'totalCountries',
                'regions'
            )
        );
    }
}