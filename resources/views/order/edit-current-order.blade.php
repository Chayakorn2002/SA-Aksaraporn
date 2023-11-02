@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Edit Order</h2>

            @if ($currentOrder)
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Order Details</h3>
                    <p class="text-sm text-gray-500">Order Name: {{ $currentOrder->order_name }}</p>
                    <p class="text-sm text-gray-500">Order Status: {{ $currentOrder->order_status }}</p>
                    <p class="text-sm text-gray-500">Order Total: ${{ $currentOrder->total_price }}</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2">Edit Order Items</h3>
                    <form method="POST" action="{{ route('order.update-cart', $currentOrder->id) }}">
                        @csrf
                        @method('PUT')

                        <ul>
                            @foreach ($currentOrder->orderItems as $orderItem)
                                <li class="mb-4">
                                    <strong>{{ $orderItem->product->product_name }}</strong>
                                    <div class="mb-4">
                                        Quantity:
                                        <input type="number" name="quantity[]" value="{{ $orderItem->quantity }}"
                                            min="1">
                                    </div>
                                    @if ($orderItem->quantity > 1)
                                        <div class="mb-4">
                                            Unit Price: ${{ number_format($orderItem->product->product_price, 2) }} Baht
                                        </div>
                                    @endif
                                    <div class="mb-4">
                                        Total Price:
                                        {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }}
                                        Baht
                                    </div>
                                    <div class="mb-4">
                                        <a href="{{ route('order.delete-order-item', ['orderId' => $currentOrder->id, 'orderItem' => $orderItem->id]) }}""
                                            class="text-red-500
                                            hover:underline">Delete</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <button type="submit"
                            class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                            Update Order
                        </button>
                    </form>
                </div>
            @else
                <p class="text-sm text-gray-500">No items in your cart.</p>
            @endif
        </div>
    </section>
@endsection
