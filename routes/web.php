<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('/');
});
