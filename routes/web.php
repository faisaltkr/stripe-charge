<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Checkout;

Route::get('/', function () {
    return redirect('/products');
});


Route::resource('products', ProductController::class);

Route::post('products/charge', [ProductController::class ,'charge'])->name('products.charge');

Route::view('/checkout/success', 'products.success')->name('checkout-success');
Route::view('/checkout/cancel', 'products.cancel')->name('checkout-cancel');