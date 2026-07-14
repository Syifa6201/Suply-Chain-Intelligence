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
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\TradePredictionController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\AdminDashboardController;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\PortController;



/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/


Route::get(
    '/login',
    [
        LoginController::class,
        'index'
    ]
)->name('login');


Route::post(
    '/login',
    [
        LoginController::class,
        'login'
    ]
)->name('login.process');



Route::get(
    '/register',
    [
        RegisterController::class,
        'index'
    ]
)->name('register');



Route::post(
    '/register',
    [
        RegisterController::class,
        'store'
    ]
)->name('register.store');



Route::post(
    '/logout',
    [
        LoginController::class,
        'logout'
    ]
)->name('logout');





/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/


Route::get('/', function(){

    return redirect('/login');

});





/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', function(){


    if(!session()->has('user_id')){

        return redirect('/login');

    }


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


})->name('dashboard');






/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/


Route::middleware(['admin'])
->prefix('admin')
->group(function(){


    Route::get(
        '/',
        [
            AdminDashboardController::class,
            'index'
        ]
    )
    ->name('admin.dashboard');

Route::resource(
    'users',
    UserController::class
);

Route::resource(
    'ports',
    PortController::class
);


});






/*
|--------------------------------------------------------------------------
| GLOBAL INTELLIGENCE
|--------------------------------------------------------------------------
*/


Route::get(
    '/global',
    [
        GlobalController::class,
        'index'
    ]
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
| COUNTRIES
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
| RISK
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
| PORT
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
| VESSEL
|--------------------------------------------------------------------------
*/


Route::get(
    '/live-vessels',
    [
        LiveVesselController::class,
        'index'
    ]
);



Route::get(
    '/api/vessels/live',
    [
        VesselApiController::class,
        'live'
    ]
);







/*
|--------------------------------------------------------------------------
| TRADE
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





Route::get(
    '/trade-prediction',
    [
        TradePredictionController::class,
        'index'
    ]
)
->name('trade.prediction');







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
| SETTINGS
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







/*
|--------------------------------------------------------------------------
| RECOMMENDATION
|--------------------------------------------------------------------------
*/


Route::get(
    '/recommendation',
    [
        RecommendationController::class,
        'index'
    ]
)
->name('recommendation.index');



Route::get(
    '/recommendation/{country}',
    [
        RecommendationController::class,
        'show'
    ]
)
->name('recommendation.show');



Route::get('/test-session', function(){

    return session()->all();

});