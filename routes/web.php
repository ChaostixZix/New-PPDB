<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => ''], function (){
    Route::get('', [\App\Http\Controllers\InertiaController::class, 'index'])->name('depan.index');

    Route::group(['prefix' => 'pengumuman'], function()
    {
        Route::group(['prefix' => 'SMA'], function ()
        {
//            Route::get('list');
        });

    });
});
