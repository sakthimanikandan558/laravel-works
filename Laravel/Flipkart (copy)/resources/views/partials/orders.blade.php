<div id="orders-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($orders as $order)
    <div class="bg-white p-6 rounded-lg shadow-lg cursor-pointer transform transition duration-300 ease-in-out hover:scale-105" onclick="openModal({{ $order->customer->id }})">
        <h2 class="text-xl font-bold mb-2">{{ $order->customer->name }}</h2>
        <p class="text-gray-700 mb-2"><strong>Quantity:</strong> {{ $order->quantity }}</p>
        <p class="text-gray-700 mb-2"><strong>Total Price:</strong> ${{ $order->quantity * $product->product_price }}</p>
    </div>
    @endforeach
</div>
<div class="mt-6 pagination">
    {{ $orders->links('pagination::tailwind') }}
</div>