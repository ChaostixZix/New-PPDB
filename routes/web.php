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
            Route::get('list', [\App\Http\Controllers\Pengumuman\SMAController::class, 'index'])->name('pengumuman.sma.list');
            Route::get('profile/{id}', [\App\Http\Controllers\Pengumuman\SMAController::class, 'sma'])->name('pengumuman.sma.profil');
            Route::get('prestasi/{id}', [\App\Http\Controllers\Pengumuman\SMAController::class, 'prestasi'])->name('pengumuman.sma.prestasi');
            Route::get('pindahtugas/{id}', [\App\Http\Controllers\Pengumuman\SMAController::class, 'pindahtugas'])->name('pengumuman.sma.pindahtugas');
            Route::get('afirmasi/{id}', [\App\Http\Controllers\Pengumuman\SMAController::class, 'afirmasi'])->name('pengumuman.sma.afirmasi');
            Route::get('zonasi/{id}', [\App\Http\Controllers\Pengumuman\SMAController::class, 'zonasi'])->name('pengumuman.sma.zonasi');
        });

    });
});
