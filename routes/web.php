<?php


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| MODELS
|--------------------------------------------------------------------------
*/

use App\Models\Country;
use App\Models\Port;
use App\Models\Vessel;


/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\CountryController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\EconomyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\CountryIntelligenceController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\LiveVesselController;
use App\Http\Controllers\Api\VesselApiController;
use App\Http\Controllers\TradeIntelligenceController;
use App\Http\Controllers\TradeRiskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;




/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/


Route::get('/', function(){



    $countries = Country::count();


    $ports = Port::count();


    $vessels = Vessel::count();



    $activeVessel = Vessel::where(

        'status',

        'Sailing'

    )->count();





    $delayedVessel = Vessel::where(

        'status',

        'Delayed'

    )->count();






    return view(

        'dashboard.index',

        compact(

            'countries',

            'ports',

            'vessels',

            'activeVessel',

            'delayedVessel'

        )

    );



});







/*
|--------------------------------------------------------------------------
| GLOBAL INTELLIGENCE
|--------------------------------------------------------------------------
*/


Route::get(
    '/global',
    [GlobalController::class,'index']
);





Route::get(
    '/country/{country}',
    [
        CountryIntelligenceController::class,
        'show'
    ]
)
->name('country.show');








/*
|--------------------------------------------------------------------------
| COUNTRY
|--------------------------------------------------------------------------
*/


Route::get(
    '/countries',
    [
        CountryController::class,
        'index'
    ]
);








/*
|--------------------------------------------------------------------------
| WEATHER
|--------------------------------------------------------------------------
*/


Route::get(
    '/weather',
    [
        WeatherController::class,
        'index'
    ]
);







/*
|--------------------------------------------------------------------------
| ECONOMY
|--------------------------------------------------------------------------
*/


Route::get(
    '/economy',
    [
        EconomyController::class,
        'index'
    ]
);







/*
|--------------------------------------------------------------------------
| CURRENCY
|--------------------------------------------------------------------------
*/


Route::get(
    '/currency',
    [
        CurrencyController::class,
        'index'
    ]
);








/*
|--------------------------------------------------------------------------
| NEWS
|--------------------------------------------------------------------------
*/


Route::get(
    '/news',
    [
        NewsController::class,
        'index'
    ]
);








/*
|--------------------------------------------------------------------------
| RISK ENGINE
|--------------------------------------------------------------------------
*/


Route::get(
    '/risk',
    [
        RiskController::class,
        'index'
    ]
);






Route::get(
    '/trade-risk',
    [
        TradeRiskController::class,
        'index'
    ]
)
->name('trade-risk.index');









/*
|--------------------------------------------------------------------------
| PORT INTELLIGENCE
|--------------------------------------------------------------------------
*/


Route::get(
    '/ports',
    [
        PortController::class,
        'index'
    ]
)
->name('ports.index');









/*
|--------------------------------------------------------------------------
| VESSEL MONITORING
|--------------------------------------------------------------------------
*/


Route::get(
    '/live-vessels',
    [
        LiveVesselController::class,
        'index'
    ]
);






/*
|--------------------------------------------------------------------------
| VESSEL API REALTIME
|--------------------------------------------------------------------------
*/


Route::get(

    '/api/vessels/live',

    [
        VesselApiController::class,
        'live'
    ]

);








/*
|--------------------------------------------------------------------------
| TRADE INTELLIGENCE
|--------------------------------------------------------------------------
*/


Route::get(

    '/trade-intelligence',

    [
        TradeIntelligenceController::class,
        'index'
    ]

)

->name('trade.index');









/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/


Route::get(

    '/profile',

    [
        ProfileController::class,
        'index'
    ]

)

->name('profile.index');





Route::post(

    '/profile/update',

    [
        ProfileController::class,
        'update'
    ]

)

->name('profile.update');






Route::post(

    '/profile/password',

    [
        ProfileController::class,
        'password'
    ]

)

->name('profile.password');



/*
|--------------------------------------------------------------------------
| SETTING
|--------------------------------------------------------------------------
*/




Route::get(
    '/settings',
    [
        SettingsController::class,
        'index'
    ]
)
->name('settings.index');



Route::post(
    '/settings/update',
    [
        SettingsController::class,
        'update'
    ]
)
->name('settings.update');