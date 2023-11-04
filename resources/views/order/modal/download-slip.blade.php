<div id="download-slip-modal-{{ $order }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Order Details
                </h3>
            </div>

            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <!-- Display List of Order Items -->
                <ul>
                    @foreach ($order->orderItems as $orderItem)
                        <li>
                            <div class="mb-4">
                                <strong>{{ $orderItem->product->product_name }}</strong>
                            </div>
                            <div class="mb-4">
                                Quantity: {{ $orderItem->quantity }}
                            </div>
                            @if ($orderItem->quantity > 1)
                                <div class="mb-4">
                                    Unit Price: {{ number_format($orderItem->product->product_price, 2) }} Baht
                                </div>
                            @endif
                            <div class="mb-4">
                                Total Price:
                                {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }} Baht
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Display Payer Details -->
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Payer: {{ auth()->user()->name }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Order Payment Transaction Date: {{ $order->order_payment_transaction_date }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Total Cost: {{ $order->total_price }} baht.
                </p>

                <!-- Display Image of Slip -->
                <img src="{{ asset('storage/' . $order->order_payment_transaction_image_url) }}" alt="Transaction Slip"
                    class="w-full">
            </div>
        </div>
    </div>
</div>