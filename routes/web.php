<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Tools\CekController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('/');
});

Route::prefix('tools')->group(function () {
    Route::prefix('cek')->name('cek.')->group(function () {
        Route::get('/', [CekController::class, 'index'])->name('index');
        Route::post('/', [CekController::class, 'store'])->name('store');
    });
});
