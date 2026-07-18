<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VesselApiController;

Route::get('/vessels/live', [VesselApiController::class, 'live']);