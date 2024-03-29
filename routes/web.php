<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','\Modules\Autenticacion\Http\Controllers\Auth\LoginController@showLoginForm');


Route::group(['middleware' => ['web']], function() {

    Route::middleware(['auth:acceso','role:Super Admin|Admin'])->prefix('admin')->group(function()
    {
        Route::get('/dashboard', 'HomeController@index')->name('home');
    });
});
