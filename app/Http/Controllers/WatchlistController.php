<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Country;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Watchlist Page
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
{
    if (!session()->has('user_id')) {

        return redirect('/login');

    }

    $query = Watchlist::with([
        'country',
        'country.ports'
    ])
    ->where(
        'user_id',
        session('user_id')
    );

    if ($request->filled('search')) {

        $query->whereHas('country', function ($q) use ($request) {

            $q->where(
                'name',
                'like',
                '%'.$request->search.'%'
            );

        });

    }

    if ($request->filled('region')) {

        $query->whereHas('country', function ($q) use ($request) {

            $q->where(
                'region',
                $request->region
            );

        });

    }

    $watchlists = $query
        ->latest()
        ->get();

    $regions = Country::orderBy('region')
        ->pluck('region')
        ->unique()
        ->filter();

    return view(
        'watchlist.index',
        [

            'watchlists'=>$watchlists,

            'regions'=>$regions,

            'totalCountries'=>$watchlists->count(),

            'totalPorts'=>$watchlists->sum(function($item){

                return $item->country->ports->count();

            })

        ]
    );
}

    /*
    |--------------------------------------------------------------------------
    | Add Country
    |--------------------------------------------------------------------------
    */

    public function store($code)
{
    if (!session()->has('user_id')) {

        return redirect('/login');

    }

    $country = Country::where(
        'code',
        $code
    )->firstOrFail();

    $exists = Watchlist::where(
        'user_id',
        session('user_id')
    )
    ->where(
        'country_id',
        $country->id
    )
    ->exists();

    if($exists){

        return back()->with(

            'warning',

            $country->name.' already exists in Watchlist.'

        );

    }

    Watchlist::create([

        'user_id'=>session('user_id'),

        'country_id'=>$country->id

    ]);

    return back()->with(

        'success',

        $country->name.' successfully added.'

    );
}

    /*
    |--------------------------------------------------------------------------
    | Remove Country
    |--------------------------------------------------------------------------
    */

    public function destroy(Watchlist $watchlist)
{
    if(

        $watchlist->user_id

        !=

        session('user_id')

    ){

        abort(403);

    }

    $watchlist->delete();

    return back()->with(

        'success',

        'Country removed from Watchlist.'

    );
}
}