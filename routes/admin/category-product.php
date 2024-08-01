<?php

use App\Http\Controllers\Admin\CategoryProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'adminPage',
    ])->group(function () {
        Route::resource('category-products', CategoryProductController::class)->names('admin.master-data.category-products');
    });
