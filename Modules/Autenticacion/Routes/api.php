<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->prefix('auth')->get('/autenticacion', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group( function () {
    Route::post('usuario/login', 'Auth\ApiLoginController@login');
});

Route::middleware('jwt.auth')->prefix('auth')->group(function () {
    Route::post('usuario', 'Auth\ApiLoginController@me');
    Route::post('logout', 'Auth\ApiLoginController@logout');
    Route::post('refresh', 'Auth\ApiLoginController@refresh');
});
