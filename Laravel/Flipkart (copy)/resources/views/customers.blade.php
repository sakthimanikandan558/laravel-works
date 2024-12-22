@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="container mx-auto mt-24">
    <h1 class="text-3xl font-bold mb-6">Customers who bought {{ $product->product_name }}</h1>
    
    <div class="container mx-auto p-4">
        <div id="orders-container">
            @include('partials.orders', ['orders' => $orders])
        </div>
    </div>
    <!-- Modal -->
    <div id="customer-modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 hidden" aria-hidden="true">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full relative">
            <button class="absolute top-3 right-3 text-gray-600 hover:text-gray-900" onclick="closeModal()">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div id="modal-content">
                <!-- Customer details will be injected here -->
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        console.log(page);
        fetchOrders(page);
    });
});

function fetchOrders(page) {
    $.ajax({
        url: "{{ url('/products/' . $product->id . '/customers') }}?page=" + page,
        success: function(data) {
            $('#orders-container').html(data);
        },
        error: function(xhr) {
            console.error('Error fetching paginated orders:', xhr.responseText);
        }
    });
}

function openModal(customerId) {
    console.log('HIHIHIHIHIHI')
    $.ajax({
        url: `/customers/${customerId}`,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            const modalContent = `
                <h2 class="text-xl font-bold mb-2">${data.name}</h2>
                <p class="text-gray-700 mb-2"><strong>Email:</strong> ${data.email}</p>
                <p class="text-gray-700 mb-2"><strong>Phone:</strong> ${data.phone}</p>
                <p class="text-gray-700 mb-2"><strong>Address:</strong> ${data.shipping_address}</p>
                <p class="text-gray-700 mb-2"><strong>Total Orders:</strong> ${data.orders_count}</p>
            `;
            $('#modal-content').html(modalContent);
            $('#customer-modal').removeClass('hidden').attr('aria-hidden', 'false');
        },
        error: function(xhr) {
            console.error('Error fetching customer details:', xhr.responseText);
            alert('Failed to fetch customer details. Please try again.');
        }
    });
}

function closeModal() {
    $('#customer-modal').addClass('hidden').attr('aria-hidden', 'true');
}
</script>
@endsection
