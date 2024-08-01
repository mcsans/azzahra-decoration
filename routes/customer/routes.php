<?php

use App\Http\Controllers\Customer\MidtransController;
use App\Livewire\Customer\About;
use App\Livewire\Customer\Cart;
use App\Livewire\Customer\Checkout;
use App\Livewire\Customer\History;
use App\Livewire\Customer\Home;
use App\Livewire\Customer\ProductDetail;
use App\Livewire\Customer\Shop;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'customerPage',
])->group(function () {

    Route::get('/', Home::class)->name('home');
    Route::get('about', About::class)->name('customer.about');
    Route::get('shop', Shop::class)->name('customer.shop');
    Route::get('shop/{categoryProduct}', Shop::class)->name('customer.shop-category');
});

Route::middleware([

    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'customerPage',
])->group(function () {
    Route::get('product-detail/{product}', ProductDetail::class)->name('customer.product-detail');
    Route::get('cart', Cart::class)->name('customer.cart');
    Route::get('checkout', Checkout::class)->name('customer.checkout');
    Route::get('history', History::class)->name('customer.history');
});

Route::post('midtrans-callback', [MidtransController::class, 'callback'])->withoutMiddleware(VerifyCsrfToken::class)->name('midtrans-callback');
