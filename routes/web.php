<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config('admin.route.prefix'))->name('admin.')->group(function () {

    Route::middleware([])->group(function () {

    });
});
