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
                <h2 class="text-center text-3xl mb-4 p-10 font-bold">Shopping Cart</h2>

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
                    <div class="grid grid-flow-row-dense grid-cols-4 px-10 gap-4">
                        <div class="col-span-3">
                            <div class="flex flex-col">
                                <div class="-m-1.5 overflow-x-auto">
                                    <div class="p-1.5 min-w-full inline-block align-middle">
                                        <div class="border rounded-lg overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="bg-gray-50 dark:bg-gray-700">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">
                                                            Product Name</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">
                                                            Description</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">
                                                            QTY</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase dark:text-gray-400">
                                                            Unit Price</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase dark:text-gray-400">
                                                            Total</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($currentOrder->orderItems as $orderItem)
                                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                        <tr>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                                {{ $orderItem->product->product_name }}</td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $orderItem->product->product_description }}</td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                {{ $orderItem->quantity }}</td>
                                                            @if ($orderItem->quantity > 1)
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                    {{ number_format($orderItem->product->product_price, 2) }}
                                                                </td>
                                                            @endif
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-800 dark:text-gray-200">
                                                                {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                                @if ($currentOrder->orderItems->isEmpty())
                                                    <p class="text-sm text-gray-500">No order items in your cart.</p>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="border border-gray-200 rounded-lg p-3">
                                <h3 class="text-lg font-semibold mb-2">Order Summary</h3>
                                <div class="grid gap-4 grid-cols-2">
                                    <div class="col-span-1">
                                        {{-- <p class="text-sm text-gray-500">Order Name</p> --}}
                                        <p class="text-sm text-gray-500 py-2">Status</p>
                                        <p class="text-sm text-gray-500">Total</p>
                                        @if ($currentOrder->orderItems->isNotEmpty())
                                            <div class="py-2">
                                                <a href="{{ route('order.edit-cart', $currentOrder->id) }}"
                                                    class="text-sm text-blue-500 hover:underline">Edit Order</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-span-1">
                                        {{-- <p class="text-sm text-gray-500 text-right row">{{ $currentOrder->order_name }}</p> --}}
                                        <p class="text-sm text-gray-500 text-right py-2">{{ $currentOrder->order_status }}</p>
                                        <p class="text-sm text-gray-500 text-right">฿{{ $currentOrder->total_price }}</p>
                                    </div>
                                </div>
                                @if ($currentOrder->orderItems->isNotEmpty())
                                    <a href="{{ route('order.show-payment-form') }}">
                                        <button type="button"
                                            class="w-full py-3 px-4 inline-flex justify-center items-center uppercase gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                            Proceed to checkout
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @else 
                    <div class="max-w-5xl mx-auto p-2 min-h-[15rem] flex flex-col bg-white">
                        <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                            <svg class="max-w-[5rem]" viewBox="0 0 375 428" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M254.509 253.872L226.509 226.872" class="stroke-gray-400 dark:stroke-white" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                                <path d="M237.219 54.3721C254.387 76.4666 264.609 104.226 264.609 134.372C264.609 206.445 206.182 264.872 134.109 264.872C62.0355 264.872 3.60864 206.445 3.60864 134.372C3.60864 62.2989 62.0355 3.87207 134.109 3.87207C160.463 3.87207 184.993 11.6844 205.509 25.1196" class="stroke-gray-400 dark:stroke-white" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                                <rect x="270.524" y="221.872" width="137.404" height="73.2425" rx="36.6212" transform="rotate(40.8596 270.524 221.872)" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                <ellipse cx="133.109" cy="404.372" rx="121.5" ry="23.5" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                <path d="M111.608 188.872C120.959 177.043 141.18 171.616 156.608 188.872" class="stroke-gray-400 dark:stroke-white" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                                <ellipse cx="96.6084" cy="116.872" rx="9" ry="12" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                <ellipse cx="172.608" cy="117.872" rx="9" ry="12" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                <path d="M194.339 147.588C189.547 148.866 189.114 142.999 189.728 138.038C189.918 136.501 191.738 135.958 192.749 137.131C196.12 141.047 199.165 146.301 194.339 147.588Z" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                            </svg>
                            <p class="mt-5 text-sm text-gray-500 dark:text-gray-500">
                                No items in your cart
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
