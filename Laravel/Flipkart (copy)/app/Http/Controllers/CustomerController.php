<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show($id)
    {
        $customer = Customer::withCount('orders')->findOrFail($id);
        return response()->json($customer);
    }
}
