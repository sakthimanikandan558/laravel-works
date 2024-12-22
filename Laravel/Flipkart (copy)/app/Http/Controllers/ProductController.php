<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['image', 'orders.customer'])->get();
        return view('index', compact('products'));
    }

    public function showCustomers($id, Request $request)
    {
        $product = Product::findOrFail($id);

        if ($product->orders->isEmpty()) {
            return redirect()->route('products');
        }

        $orders = $product->orders()->with('customer')->paginate(12);

        if ($request->ajax()) {
            return view('partials.orders', compact('orders', 'product'))->render();
        }

        return view('customers', compact('product', 'orders'));
    }
}
