<?php

use App\Livewire\Cart;
use App\Livewire\CheckoutStatus;
use App\Livewire\CreateNewAddress;
use App\Livewire\Orders;
use App\Livewire\Product;
use App\Livewire\StoreFront;
use App\Livewire\ViewOrder;
use Illuminate\Support\Facades\Route;

Route::get('/', StoreFront::class)->name('home');
Route::get('/product/{productId}', Product::class)->name('product');
Route::get('/cart', Cart::class)->name('cart');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/create-address', CreateNewAddress::class)->name('createAddress');
    Route::get('/checkout-status', CheckoutStatus::class)->name('checkoutStatus');
    Route::get('/order/{orderId}', ViewOrder::class)->name('viewOrder');
    Route::get('/orders', Orders::class)->name('orders');
});
