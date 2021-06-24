<?php

use Illuminate\Support\Facades\Route;
use Modules\Countries\CountryController;

Route::prefix('countries')->group(function() {

    /* logged in */
    Route::middleware('auth.jwt')->group(function() {
        Route::get('/', [CountryController::class, 'index']);
    });

});