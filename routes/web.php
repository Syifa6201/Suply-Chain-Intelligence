<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\EconomyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RiskController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/countries', [CountryController::class, 'index']);

Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/economy', [EconomyController::class, 'index']);

Route::get('/currency', [CurrencyController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/risk', [RiskController::class, 'index']);