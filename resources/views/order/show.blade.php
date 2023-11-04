@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Order Details</h2>

            @if (session('success'))
                <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            @if ($order)
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Order Information</h3>
                    <p class="text-sm text-gray-500">Order Name: {{ $order->order_name }}</p>
                    <p class="text-sm text-gray-500">Order Status: {{ $order->order_status }}</p>
                    <p class="text-sm text-gray-500">Order Total: {{ number_format($order->total_price, 2) }}</p>
                    <p class="text-sm text-gray-500">Order Address: {{ $order->order_address }}</p>
                    <p class="text-sm text-gray-500">Order Phone: {{ $order->order_phone }}</p>
                    <p class="text-sm text-gray-500">Order Email: {{ $order->order_email }}</p>

                    @if ($order->order_status !== 'pending')
                        <p class="text-sm text-gray-500">Payment Transaction date:
                            {{ $order->order_payment_transaction_date }}</p>
                    @endif

                    @if ($order->order_status === 'confirmed')
                        <!-- Show Payment Transaction Image -->
                        <h3 class="text-lg font-semibold mt-4 mb-2">Payment Transaction Image</h3>
                        <img src="{{ asset('/storage/' . $order->order_payment_transaction_image_url) }}" alt="Payment Slip"
                            class="mb-4">
                    @endif

                    <!-- Ordered Items -->
                    <h3 class="text-lg font-semibold mt-4 mb-2">Ordered Items</h3>
                    <div class="overflow-y-auto h-80">
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
                    @if ($order->order_status !== 'pending')
                        <!-- Modal toggle -->
                        <button data-modal-target="download-slip-modal-{{ $order }}" {{-- <button data-modal-target="download-slip-modal{{ $order }}" --}}
                            data-modal-toggle="download-slip-modal-{{ $order }}"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Show Slip
                        </button>
                        @include('order.modal.download-slip')
                    @endif
                </div>
            @else
                <p class="text-sm text-gray-500">No order details available.</p>
            @endif
        </div>
    </section>
@endsection
