<?php

use App\Http\Controllers\Admin\PromotionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'adminPage',
    ])->group(function () {
        Route::resource('promotions', PromotionController::class)->names('admin.master-data.promotions');
    });
