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

Route::middleware('api')->prefix('v1/config')->group( function () {
    Route::get('dropdowns/obtenerHijos', 'DropdownsController@getChilds')->name('api.confi.hijos');
});
Route::middleware('auth:api')->get('/configuraciones', function (Request $request) {
    return $request->user();
});
