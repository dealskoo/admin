<?php

use Dealskoo\Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('admin.route.prefix'))->name('admin.')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::middleware([])->group(function () {

    });
});
