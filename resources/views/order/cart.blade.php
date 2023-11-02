@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Shopping Cart</h2>

            @if ($currentOrder)
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Order Details</h3>
                    <p class="text-sm text-gray-500">Order Name: {{ $currentOrder->order_name }}</p>
                    <p class="text-sm text-gray-500">Order Status: {{ $currentOrder->order_status }}</p>
                    <p class="text-sm text-gray-500">Order Total: ${{ $currentOrder->total_price }}</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Order Items</h3>
                    <ul>
                        @foreach ($currentOrder->orderItems as $orderItem)
                            <li>
                                <div class="mb-4">
                                    <strong>{{ $orderItem->product->product_name }}</strong>
                                </div>
                                <div class="mb-4">
                                    Quantity: {{ $orderItem->quantity }}
                                </div>
                                @if ($orderItem->quantity > 1)
                                    <div class="mb-4">
                                        Unit Price: ${{ number_format($orderItem->product->product_price, 2) }} Baht
                                    </div>
                                @endif
                                <div class="mb-4">
                                    Total Price:
                                    {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }} Baht
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-4">
                        <a href="{{ route('order.edit-cart', $currentOrder->id) }}" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                            Edit Order
                        </a>

                        {{-- <form method="POST" action="{{ route('order.confirm', $currentOrder->id) }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600">
                                Confirm Order
                            </button>
                        </form> --}}
                    </div>
                </div>
            @else
                <p class="text-sm text-gray-500">No items in your cart.</p>
            @endif
        </div>
    </section>
@endsection