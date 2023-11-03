@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Order Item Detail</h2>

            <div class="border border-gray-200 rounded shadow-md p-4">
                <h3 class="text-lg font-semibold mb-2">Order Item Details</h3>
                <p class="text-sm text-gray-500"><strong>Product Name:</strong> {{ $orderItem->product->product_name }}</p>
                <p class="text-sm text-gray-500"><strong>Quantity:</strong> {{ $orderItem->quantity }}</p>
                <p class="text-sm text-gray-500"><strong>Unit Price:</strong> ${{ number_format($orderItem->product->product_price, 2) }}</p>
                <p class="text-sm text-gray-500"><strong>Total Price:</strong> ${{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }}</p>
                <!-- Add more details as needed, for example, order item ID, description, or any other relevant information -->

                {{-- <div class="mt-4">
                    <a href="{{ route('order.index') }}" class="text-blue-500 hover:underline">Back to Orders</a>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
