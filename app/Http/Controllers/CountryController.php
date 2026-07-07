<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Country;

class CountryController extends Controller
{
        public function index()
        {
            $countries = Country::orderBy('name')->get();

            return view(
                'countries.index',
                compact('countries')
            );
        }
}