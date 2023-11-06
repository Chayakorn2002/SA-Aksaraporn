@extends('layouts.main')

@section('content')
    {{-- <section>
        <div class="max-w-xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Edit Order</h2>

            @if ($currentOrder)
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Order Details</h3>
                    <p class="text-sm text-gray-500">Order Name: {{ $currentOrder->order_name }}</p>
                    <p class="text-sm text-gray-500">Order Status: {{ $currentOrder->order_status }}</p>
                    <p class="text-sm text-gray-500">Order Total: ${{ $currentOrder->total_price }}</p>


                    @if (count($currentOrder->orderItems) > 0)
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
                                                min="0">
                                        </div>
                                        @if ($orderItem->quantity > 1)
                                            <div class="mb-4">
                                                Unit Price: {{ number_format($orderItem->product->product_price, 2) }} Baht
                                            </div>
                                        @endif
                                        <div class="mb-4">
                                            Total Price:
                                            {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }}
                                            Baht
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <button type="submit"
                                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                Update Order
                            </button>
                        </form>
                    @endif
                </div>
            @else
                <p class="text-sm text-gray-500">No items in your cart.</p>
            @endif
        </div>
    </section> --}}

    <section>
        <div class="max-w-lg mx-auto p-2">
            <h2 class="text-3xl text-center font-bold mt-2 bg-white shadow-md rounded rounded-xl py-2 border border-gray-200">Edit Order</h2>
            @if ($currentOrder)
                <div class="py-4">
                    <div class="border border-gray-200 rounded rounded-xl py-2 px-4 shadow-xl">
                        <h3 class="text-lg font-semibold py-2">Order Details</h3>
                        <div class="grid grid-cols-2">
                            <div class="col-span-1">
                                <p class="text-md text-gray-500 text-left py-2">Order Name</p>
                                <p class="text-md text-gray-500 text-left py-2">Order Status</p>
                            </div>
                            <div class="col-span-1 text-right item-right">
                                <p class="text-md text-gray-500 py-2">{{ $currentOrder->order_name }}</p>
                                <div class="py-2">
                                    <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-green-200">
                                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                        </svg>
                                        {{ $currentOrder->order_status }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <p class="text-md text-gray-500 text-left py-2">Total</p>
                            </div>
                            <div class="col-span-1 text-right item-right">
                                <p class="text-md text-gray-500 py-2">฿ {{ $currentOrder->total_price }}</p>
                            </div>
                            <hr class="col-span-2 my-4">
                            <h3 class="text-lg font-semibold py-2">Edit Order Items</h3>
                        </div>
                        @if (count($currentOrder->orderItems) > 0)
                            <form method="POST" action="{{ route('order.update-cart', $currentOrder->id) }}">
                                @csrf
                                @method('PUT')
                                @foreach ($currentOrder->orderItems as $orderItem)
                                    <div class="grid grid-cols-2">
                                        <div class="col-start-1 text-left">
                                            <p class="text-gray-500 text-md">Product Name</p>
                                            <p class="text-gray-500 text-md my-3">Quantity</p>
                                            <p class="text-gray-500 text-md">Unit Price</p>
                                        </div>
                                        <div class="col-start-2 text-right">
                                            <p class="text-md">{{ $orderItem->product->product_name }}</p>
                                            @if ($orderItem->quantity > 1)
                                                <input type="number" name="quantity[]" value="{{ $orderItem->quantity }}" min="0" class="rounded rounded-md border-gray-500 my-2.5" style="width: 60px; height:30px;">
                                            @endif
                                            <p class="text-md">{{ number_format($orderItem->product->product_price, 2) }}</p>
                                        </div> 
                                    </div>
                                    <hr class="my-4">      
                                    <div class="grid grid-cols-2">
                                        <p class="text-black text-lg font-semibold">Total</p>
                                        <p class="text-blue-500 text-lg font-semibold text-right">฿ {{ number_format($orderItem->quantity * $orderItem->product->product_price, 2) }}</p>
                                    </div>
                                    <hr class="my-4">        
                                @endforeach
                                
                                <button type="submit" class="w-full py-3 px-4 my-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                    Update Order
                                </button>
                            </form>
                        @endif
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
    </section>
@endsection
