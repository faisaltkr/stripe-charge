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



// Route::get('/checkout', function (Request $request) {
//     $stripePriceId = 'price_1PLeqeKg5RGvwH6hZaB0bdjY';
 
//     $quantity = 1;
 
//     return $request->user()->checkout([$stripePriceId => $quantity], [
//         'success_url' => route('checkout-success'),
//         'cancel_url' => route('checkout-cancel'),
//     ]);
// })->name('checkout');


// Route::post('/product-checkout', function (Request $request) {
//     Cashier::stripe()->checkout->sessions->create([
//         'success_url' => route('checkout-success'),
//         'cancel_url' => route('checkout-cancel'),
//         'line_items' => [
//           [
//             'price' => $request->price_id,
//             'quantity' => 1,
//           ],
//         ],
//         'mode' => 'payment',
//       ]);
// })->name('checkout');

Route::post('checkout', function (Request $request) {
    return Checkout::guest()->create($request->price_id, [
        'success_url' => route('checkout-success'),
        'cancel_url' => route('checkout-cancel'),
    ]);
})->name('checkout');
 
Route::view('/checkout/success', 'products.success')->name('checkout-success');
Route::view('/checkout/cancel', 'products.cancel')->name('checkout-cancel');