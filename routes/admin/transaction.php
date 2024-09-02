<?php

use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'adminPage',
    ])->group(function () {
        Route::resource('transactions', TransactionController::class)->names('admin.transactions');

        Route::get('transactions/{transaction}/confirm', [TransactionController::class, 'confirm'])->name('admin.transactions.confirm');
    });
