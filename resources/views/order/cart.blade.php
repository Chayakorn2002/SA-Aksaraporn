@extends('layouts.main')

@section('content')
    {{-- <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Shopping Cart</h2>

            @if (session('success'))
                <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            @if ($currentOrder)
            <div class="grid grid-flow-row-dense grid-cols-3">
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Order Details</h3>
                    <p class="text-sm text-gray-500">Order Name: {{ $currentOrder->order_name }}</p>
                    <p class="text-sm text-gray-500">Order Status: {{ $currentOrder->order_status }}</p>
                    <p class="text-sm text-gray-500">Order Total: {{ $currentOrder->total_price }} baht.</p>

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
                                        Unit Price: {{ number_format($orderItem->product->product_price, 2) }} Baht
                                    </div>
                                @endif
                                <div class="mb-4">
                                    Total Price:
                                    {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }} Baht
                                </div>
                            </li>
                        @endforeach

                        @if ($currentOrder->orderItems->isEmpty())
                            <p class="text-sm text-gray-500">No order items in your cart.</p>
                        @endif
                    </ul>

                    @if ($currentOrder->orderItems->isNotEmpty())
                        <div class="mt-4">
                            <a href="{{ route('order.edit-cart', $currentOrder->id) }}"
                                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover-bg-blue-600">
                                Edit Order
                            </a>

                        <a href="{{ route('order.show-payment-form') }}" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                            Confirm Order
                        </a>
                    </div>
                            <a href="{{ route('order.show-payment-form') }}"
                                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover-bg-blue-600">
                                Confirm Order
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            @else
                <p class="text-sm text-gray-500">No items in your cart.</p>
            @endif
        </div>
    </section> --}}

    <section>
        <div class="h-fit w-full">
            <div class="p-2">
                
                <h2 class="text-center text-3xl mb-4 p-10">Shopping Cart</h2>

                @if (session('success'))
                    <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="grid grid-flow-row-dense grid-cols-4 px-10 gap-4">
                    <div class="col-span-3">
                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                              <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                                  <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Product Name</th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Description</th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">QTY</th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Unit Price</th>
                                          <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Total</th>
                                        </tr>
                                      </thead>
                                    @foreach ($currentOrder->orderItems as $orderItem)
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $orderItem->product->product_name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $orderItem->product->product_description }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $orderItem->quantity }}</td>
                                                @if ($orderItem->quantity > 1)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ number_format($orderItem->product->product_price, 2) }}</td>
                                                @endif
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-800 dark:text-gray-200">{{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }}</td>                                            
                                            </tr>
                                        </tbody>
                                    @endforeach
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-span-1">
                        <div class="border border-gray-200 rounded-lg p-3">
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="text-sm text-gray-800">Address</p>
                            <div class="py-2">
                                <ul class="border border-gray-200"></ul>
                            </div>
                            <h3 class="text-lg font-semibold mb-2">Order Summary</h3>
                            <div class="grid gap-4 grid-cols-2">
                                <div class="col-span-1">
                                    {{-- <p class="text-sm text-gray-500">Order Name</p> --}}
                                    <p class="text-sm text-gray-500 py-2">Status</p>
                                    <p class="text-sm text-gray-500">Total</p>
                                    <div class="py-2">
                                        <a href="{{ route('order.edit-cart', $currentOrder->id) }}" class="text-sm text-blue-500 hover:underline">Edit Order</a>
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    {{-- <p class="text-sm text-gray-500 text-right row">{{ $currentOrder->order_name }}</p> --}}
                                    <p class="text-sm text-gray-500 text-right py-2">{{ $currentOrder->order_status }}</p>
                                    <p class="text-sm text-gray-500 text-right">฿{{ $currentOrder->total_price }}</p>
                                </div>
                            </div>
                            <a href="{{ route('order.show-payment-form') }}">
                                <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center uppercase gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Proceed to checkout
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
