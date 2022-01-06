<?php

use Dealskoo\Admin\Http\Controllers\AccountController;
use Dealskoo\Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Dealskoo\Admin\Http\Controllers\Auth\NewPasswordController;
use Dealskoo\Admin\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->prefix(config('admin.route.prefix'))->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/', function () {
            return redirect(\route('admin.dashboard'), 301);
        });
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin::dashboard');
        })->name('dashboard');

        Route::get('/account', [AccountController::class, 'create'])->name('account');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
