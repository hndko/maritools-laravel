<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Tools\CekController;
use App\Http\Controllers\Backend\Tools\CekRegionMLBBController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('/');
});

Route::prefix('tools')->group(function () {
    Route::prefix('cek')->name('cek.')->group(function () {
        Route::get('/', [CekController::class, 'index'])->name('index');
        Route::post('/', [CekController::class, 'store'])->name('store');
    });

    Route::prefix('cek_region')->name('cek_region.')->group(function () {
        Route::get('/', [CekRegionMLBBController::class, 'index'])->name('index');
        Route::post('/', [CekRegionMLBBController::class, 'store'])->name('store');
    });
});
