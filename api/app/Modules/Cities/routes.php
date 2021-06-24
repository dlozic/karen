<?php

use Illuminate\Support\Facades\Route;
use Modules\Cities\CityController;

Route::prefix('cities')->group(function() {

    /* logged in */
    Route::middleware('auth.jwt')->group(function() {
        Route::get('/', [CityController::class, 'index']);
    });

});