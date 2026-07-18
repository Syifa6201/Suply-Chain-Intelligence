<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Models
|--------------------------------------------------------------------------
*/

use App\Models\Country;
use App\Models\Port;
use App\Models\Vessel;

/*
|--------------------------------------------------------------------------
| User Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryIntelligenceController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\EconomyController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\LiveVesselController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TradeIntelligenceController;
use App\Http\Controllers\TradePredictionController;
use App\Http\Controllers\TradeRiskController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\Api\VesselApiController;
use App\Http\Controllers\WatchlistController;
/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

Route::controller(LoginController::class)->group(function () {

    Route::get('/login', 'index')->name('login');

    Route::post('/login', 'login')->name('login.process');

    Route::post('/logout', 'logout')->name('logout');

});

Route::controller(RegisterController::class)->group(function () {

    Route::get('/register', 'index')->name('register');

    Route::post('/register', 'store')->name('register.store');

});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (!session()->has('user_id')) {

        return redirect('/login');

    }

    return view('dashboard.index', [

        'countries'      => Country::count(),

        'ports'          => Port::count(),

        'vessels'        => Vessel::count(),

        'activeVessel'   => Vessel::where('status', 'Sailing')->count(),

        'delayedVessel'  => Vessel::where('status', 'Delayed')->count(),

    ]);

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('admin')

    ->prefix('admin')

    ->name('admin.')

    ->group(function () {

        Route::get(
            '/',
            [
                AdminDashboardController::class,
                'index'
            ]
        )->name('dashboard');

        Route::resource(
            'users',
            UserController::class
        );

        Route::resource(
            'articles',
            AdminArticleController::class
        );

    });

    /*
|--------------------------------------------------------------------------
| Global Intelligence
|--------------------------------------------------------------------------
*/

Route::controller(GlobalController::class)->group(function () {

    Route::get(
        '/global',
        'index'
    )->name('global.index');

});

Route::controller(CountryIntelligenceController::class)->group(function () {

    Route::get(
        '/country/{country}',
        'show'
    )->name('country.show');

});

/*
|--------------------------------------------------------------------------
| Countries
|--------------------------------------------------------------------------
*/

Route::controller(CountryController::class)->group(function () {

    Route::get(
        '/countries',
        'index'
    )->name('countries.index');

});

/*
|--------------------------------------------------------------------------
| Weather
|--------------------------------------------------------------------------
*/

Route::controller(WeatherController::class)->group(function () {

    Route::get(
        '/weather',
        'index'
    )->name('weather.index');

});

/*
|--------------------------------------------------------------------------
| Economy
|--------------------------------------------------------------------------
*/

Route::controller(EconomyController::class)->group(function () {

    Route::get(
        '/economy',
        'index'
    )->name('economy.index');

});

/*
|--------------------------------------------------------------------------
| Currency
|--------------------------------------------------------------------------
*/

Route::controller(CurrencyController::class)->group(function () {

    Route::get(
        '/currency',
        'index'
    )->name('currency.index');

});

/*
|--------------------------------------------------------------------------
| News Intelligence
|--------------------------------------------------------------------------
*/

Route::controller(NewsController::class)->group(function () {

    Route::get(
        '/news',
        'index'
    )->name('news.index');

});



/*
|--------------------------------------------------------------------------
| Risk Intelligence
|--------------------------------------------------------------------------
*/

Route::controller(RiskController::class)->group(function () {

    Route::get(
        '/risk',
        'index'
    )->name('risk.index');

});


Route::controller(TradeRiskController::class)->group(function () {

    Route::get(
        '/trade-risk',
        'index'
    )->name('trade-risk.index');

});

/*
|--------------------------------------------------------------------------
| Recommendation Engine
|--------------------------------------------------------------------------
*/

Route::controller(RecommendationController::class)->group(function () {

    Route::get(
        '/recommendation',
        'index'
    )->name('recommendation.index');



    Route::get(
        '/recommendation/{country}',
        'show'
    )->name('recommendation.show');

});

/*
|--------------------------------------------------------------------------
| WATCHLIST
|--------------------------------------------------------------------------
*/

Route::get(
    '/watchlist',
    [
        WatchlistController::class,
        'index'
    ]
)
->name('watchlist.index');


Route::post(
    '/watchlist/{code}',
    [WatchlistController::class, 'store']
)->name('watchlist.store');


Route::delete(
    '/watchlist/{watchlist}',
    [
        WatchlistController::class,
        'destroy'
    ]
)
->name('watchlist.destroy');

/*
|--------------------------------------------------------------------------
| Trade Intelligence
|--------------------------------------------------------------------------
*/

Route::controller(TradeIntelligenceController::class)->group(function () {

    Route::get(
        '/trade-intelligence',
        'index'
    )->name('trade.index');

});


Route::controller(TradePredictionController::class)->group(function () {

    Route::get(
        '/trade-prediction',
        'index'
    )->name('trade.prediction');

});

/*
|--------------------------------------------------------------------------
| Port Intelligence
|--------------------------------------------------------------------------
*/

Route::controller(PortController::class)->group(function () {

    Route::get(
        '/ports',
        'index'
    )->name('ports.index');

});

/*
|--------------------------------------------------------------------------
| Vessel Monitoring
|--------------------------------------------------------------------------
*/

Route::controller(LiveVesselController::class)->group(function () {

    Route::get(
        '/live-vessels',
        'index'
    )->name('vessels.index');

});


Route::controller(VesselApiController::class)->group(function () {

    Route::get(
        '/api/vessels/live',
        'live'
    )->name('api.vessels.live');

});

/*
|--------------------------------------------------------------------------
| User Profile
|--------------------------------------------------------------------------
*/

Route::controller(ProfileController::class)->group(function () {

    Route::get(
        '/profile',
        'index'
    )->name('profile.index');



    Route::post(
        '/profile/update',
        'update'
    )->name('profile.update');



    Route::post(
        '/profile/password',
        'password'
    )->name('profile.password');

});

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/

Route::controller(SettingsController::class)->group(function () {

    Route::get(
        '/settings',
        'index'
    )->name('settings.index');



    Route::post(
        '/settings/update',
        'update'
    )->name('settings.update');

});

/*
|--------------------------------------------------------------------------
| Development
|--------------------------------------------------------------------------
*/

Route::get('/test-session', function () {

    return session()->all();

});

Route::post(

'/settings/update',

[SettingsController::class,'update']

)->name('settings.update');