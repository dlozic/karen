<?php

use Illuminate\Support\Facades\Route;
use Modules\Contacts\ContactController;

Route::group([
    'middleware' => 'auth.jwt',
    'prefix' => 'contacts'
], function() {

    Route::get('/', [ContactController::class, 'index']);
    Route::get('/{contact}', [ContactController::class, 'show']);
    Route::post('/', [ContactController::class, 'store']);
    Route::put('/{contact}', [ContactController::class, 'update']);
    Route::delete('/{contact}', [ContactController::class, 'destroy']);

});
