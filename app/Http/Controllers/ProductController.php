<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Checkout;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function charge(Request $request)
    {
        
        $product = Product::find($request->id);

        
        //$user = $request->user();

        // return Checkout::guest()->create("price_1PLeqaKg5RGvwH6hc6IK143q", [
        //     'success_url' => route('checkout-success'),
        //     'cancel_url' => route('checkout-cancel'),
        // ]);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        \Stripe\Charge::create([
            'amount' => $product->price*100,
            'currency' => 'usd',
            'source' => 'tok_visa',
            'description' => $product->description,
          ]);

        return redirect('checkout/success')->with('success', 'Charge successful!');
    }
}
