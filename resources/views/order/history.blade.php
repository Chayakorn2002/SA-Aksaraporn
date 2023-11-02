@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Order History</h2>

            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                    <div class="border border-gray-200 rounded shadow-md p-4 mb-4">
                        <h3 class="text-lg font-semibold mb-2">Order Information</h3>
                        <p class="text-sm text-gray-500">Order Name: {{ $order->order_name }}</p>
                        <p class="text-sm text-gray-500">Order Status: {{ $order->order_status }}</p>
                        <p class="text-sm text-gray-500">Order Total: {{ number_format($order->total_price, 2) }}</p>

                        <h3 class="text-lg font-semibold mt-4 mb-2">Ordered Items</h3>
                        <ul>
                            @foreach ($order->orderItems as $orderItem)
                                <li class="mb-4">
                                    <strong>{{ $orderItem->product->product_name }}</strong>
                                    <div class="mb-4">
                                        Quantity: {{ $orderItem->quantity }}
                                    </div>
                                    <div class="mb-4">
                                        @if ($orderItem->quantity > 1)
                                            Unit Price: {{ number_format($orderItem->product->product_price, 2) }} Baht
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        Total Price: {{ number_format($orderItem->calculateTotalPrice(), 2) }} Baht
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @else
                <p class="text-sm text-gray-500">No order history available.</p>
            @endif
        </div>
    </section>
@endsection
