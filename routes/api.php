<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
 ///   return $request->user();
//})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [ApiAuthController::class, 'register'])->name('_register');
    Route::post('/log_in', [ApiAuthController::class, 'login'])->name('log_in');
    Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:api')->name('api_logout');
    Route::post('/refresh', [ApiAuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [ApiAuthController::class, 'me'])->middleware('auth:api')->name('me');
});
