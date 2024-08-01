<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/admin/user.php';

require __DIR__ . '/admin/category-product.php';

require __DIR__ . '/admin/product.php';

require __DIR__ . '/admin/promotion.php';

require __DIR__ . '/admin/transaction.php';

require __DIR__ . '/customer/routes.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'adminPage',
])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
