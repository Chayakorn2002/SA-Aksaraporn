<div id="download-slip-modal-{{ $order }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-2xl font-bold text-gray-900">
                    Invoice
                </h3>
            </div>

            <!-- Modal body -->
            <div class="px-6 py-2 space-y-6">
                <!-- Display List of Order Items -->
                <ul>
                    @foreach ($order->orderItems as $orderItem)
                        <div class="py-2">
                            <div class="border border-gray-200 rounded-xl px-4">
                                <p class="text-xl font-semibold mb-2 mt-2">{{ $orderItem->product->product_name }}</p>
                                <div class="grid grid-cols-2 text-gray-500">
                                    <div class="col-span-1 mb-2">
                                        <p class="text-gray-md">Quantity</p>
                                    </div>
                                    <div class="col-span-1 mb-2 text-right text-gray-700">
                                        <p class="text-gray-md">{{ $orderItem->quantity }}</p>
                                    </div>
                                    @if ($orderItem->quantity > 1)
                                        <div class="col-span-1 mb-2">
                                            <p class="text-gray-md">Unit Price</p>
                                        </div>
                                        <div class="col-span-1 mb-2 text-right text-gray-700">
                                            <p class="text-gray-md">{{ number_format($orderItem->product->product_price, 2) }}</p>
                                        </div>
                                    @endif
                                    <div class="col-span-1 mb-2">
                                        <p class="text-gray-md">Total Price</p>
                                    </div>
                                    <div class="col-span-1 mb-2 text-right text-gray-700">
                                        <p class="text-gray-md">฿ {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
                <hr>
                <!-- Display Payer Details -->
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <p class="text-gray-500">Payer</p>
                    </div>
                    <div class="col-span-1 text-right">
                        <p class="text-gray-500">{{ auth()->user()->name }}</p>
                    </div>

                    <div class="col-span-1">
                        <p class="text-gray-500 my-2">Payment Transaction Date</p>
                    </div>
                    <div class="col-span-1 text-right">
                        <p class="text-gray-500 my-2">{{ $order->order_payment_transaction_date }}</p>
                    </div>

                    <div class="col-span-1">
                        <p class="text-black font-semibold">Total Cost</p>
                    </div>
                    <div class="col-span-1 text-right">
                        <p class="text-black font-semibold">฿ {{ $order->total_price }}</p>
                    </div>
                </div>

                <!-- Display Image of Slip -->
                <img src="{{ asset('storage/' . $order->order_payment_transaction_image_url) }}" alt="Transaction Slip" class="w-full">
            </div>
        </div>
    </div>
</div>