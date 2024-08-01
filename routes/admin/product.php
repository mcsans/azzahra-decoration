<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'adminPage',
    ])->group(function () {
        Route::resource('products', ProductController::class)->names('admin.master-data.products');
    });
