<?php

use Dealskoo\Admin\Http\Controllers\AccountController;
use Dealskoo\Admin\Http\Controllers\AdminController;
use Dealskoo\Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Dealskoo\Admin\Http\Controllers\Auth\NewPasswordController;
use Dealskoo\Admin\Http\Controllers\Auth\PasswordResetLinkController;
use Dealskoo\Admin\Http\Controllers\DashboardController;
use Dealskoo\Admin\Http\Controllers\LocalizationController;
use Dealskoo\Admin\Http\Controllers\NotificationController;
use Dealskoo\Admin\Http\Controllers\RoleController;
use Dealskoo\Admin\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'admin_locale'])->prefix(config('admin.route.prefix'))->name('admin.')->group(function () {

    Route::get('/locale/{locale}', [LocalizationController::class, '__invoke'])->name('locale');

    Route::view('/banned', 'admin::auth.banned')->name('banned');

    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/', function () {
            return redirect(\route('admin.dashboard'), 301);
        })->name('welcome');
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware(['auth:admin', 'admin_active'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'handle'])->name('dashboard');

        Route::get('/search', [SearchController::class, 'handle'])->name('search');

        Route::prefix('/account')->name('account.')->group(function () {
            Route::view('/', 'admin::account.profile')->name('profile');

            Route::post('/', [AccountController::class, 'store'])->name('profile');

            Route::post('/avatar', [AccountController::class, 'avatar'])->name('avatar');

            Route::view('/email', 'admin::account.email')->name('email');

            Route::middleware(['throttle:6,1'])->post('/email', [AccountController::class, 'email'])->name('email');

            Route::middleware(['signed', 'throttle:6,1'])->get('/email/verify/{hash}', [AccountController::class, 'emailVerify'])->name('email.verify');

            Route::view('/password', 'admin::account.password')->name('password');

            Route::post('/password', [AccountController::class, 'password'])->name('password');
        });

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::name('notification.')->group(function () {
            Route::get('/notifications', [NotificationController::class, 'list'])->name('list');
            Route::get('/notifications/unread', [NotificationController::class, 'unread'])->name('unread');
            Route::get('/notifications/all_read', [NotificationController::class, 'allRead'])->name('all_read');
            Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('show');
        });

        Route::resource('roles', RoleController::class);

        Route::get('admins/{id}/login', [AdminController::class, 'login'])->name('admins.login');
        Route::resource('admins', AdminController::class);
    });
});
