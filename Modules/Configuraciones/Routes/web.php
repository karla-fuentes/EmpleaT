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

// Route::prefix('configuraciones')->group(function() {
//     Route::get('/', 'ConfiguracionesController@index');
// });

Route::group(['middleware' => ['web']], function() {

    Route::middleware(['auth:acceso'])->group(function()
    {
        Route::middleware(['auth:acceso','role:Super Admin|Admin'])->prefix('admin/configuracion')->group(function()
        {
            Route::get('dropdowns/listar',                    'DropdownsController@dropdownsList')->name('admin.dropdowns.list');
            Route::get('dropdowns',                       'DropdownsController@index')->name('admin.dropdowns.index');
            Route::group(['middleware' => ['permission:Crear Dropdowns']], function () {
                Route::post('dropdowns',                      'DropdownsController@store') ->name('admin.dropdowns.store');
                Route::get('dropdowns/crear',                 'DropdownsController@create')->name('admin.dropdowns.create');
            });
            Route::get('dropdowns/{dropdown}',                 'DropdownsController@show')->name('admin.dropdowns.show');
            Route::group(['middleware' => ['permission:Editar Dropdowns']], function () {
                Route::get('dropdowns/{dropdown}/editar',          'DropdownsController@edit')->name('admin.dropdowns.edit');
                Route::patch('dropdowns/{dropdown}',               'DropdownsController@update')->name('admin.dropdowns.update');
            });
            Route::group(['middleware' => ['permission:Eliminar Dropdowns']], function () {
                Route::delete('dropdowns/{dropdown}',              'DropdownsController@destroy')->name('admin.dropdowns.destroy');
            });

        });
    });
});
