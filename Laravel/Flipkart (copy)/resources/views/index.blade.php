@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container mx-auto mt-8 mb-16">
    <h1 class="text-3xl font-bold mb-6">Products</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-lg rounded-lg">
            <thead class="bg-green-500 text-white">
                <tr>
                    <th class="w-1/6 px-4 py-2 text-center">Image</th>
                    <th class="w-1/6 px-4 py-2 text-center">Name</th>
                    <th class="w-1/3 px-4 py-2 text-center">Description</th>
                    <th class="w-1/6 px-4 py-2 text-center">Price</th>
                    <th class="w-1/6 px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($products as $product)
                <tr class="hover:bg-green-100 transition duration-300">
                    <td class="border-t px-4 py-2">
                        @if($product->image)
                        <div class="flex justify-center">
                            <img src="{{ $product->image->url }}" alt="{{ $product->product_name }}" class="h-20 w-20 object-cover rounded-full border border-black">
                        </div>
                        @else
                            <span class="text-gray-500">No Image</span>
                        @endif
                    </td>
                    <td class="border-t px-4 py-2">{{ $product->product_name }}</td>
                    <td class="border-t px-4 py-2">{{ $product->product_description }}</td>
                    <td class="border-t px-4 py-2 text-center">${{ number_format($product->product_price, 2) }}</td>
                    <td class="border-t px-4 py-2 text-center">
                        <a href="{{ route('products.customers', $product->id) }}" class="text-green-600 hover:text-green-800 hover:underline">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
