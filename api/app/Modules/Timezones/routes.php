<?php

use Illuminate\Support\Facades\Route;
use Modules\Timezones\TimezoneController;

Route::group([
    'middleware' => 'auth.jwt',
    'prefix' => 'timezones'
], function() {

    Route::get('/', [TimezoneController::class, 'index']);

});
