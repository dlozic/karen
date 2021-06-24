<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Acl\PermissionController;
use Modules\Core\Auth\AuthController;
use Modules\Core\Files\UploadController;
use Modules\Core\Users\UserController;

/* auth */
Route::prefix('auth')->group(function() {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    /* when logged in */
    Route::middleware('auth.jwt')->group(function() {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('change-password/{user}', [AuthController::class, 'changePassword']);
        Route::post('toggle-activation/{user}', [AuthController::class, 'toggleActivation']);
    });
});

/* permissions */
Route::group([
    'middleware' => 'auth.jwt',
    'prefix' => 'permissions'
], function() {
    Route::get('/', [PermissionController::class, 'index']);
});

/* upload */
Route::prefix('upload')->group(function() {
    /* logged in */
    Route::middleware('auth.jwt')->group(function() {
        Route::post('/', UploadController::class);
    });
});

/* users */
Route::group([
    'middleware' => 'auth.jwt',
    'prefix' => 'users'
], function() {
    Route::delete('{user}', [UserController::class, 'destroy']);
    Route::post('{user}/change_profile_image', [UserController::class, 'change_profile_image']);
});