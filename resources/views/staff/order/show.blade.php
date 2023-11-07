@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-7xl mx-auto rounded rounded-xl">
            <div class="border border-gray-100 w-full my-5 rounded-full shadow-md">
                <h1 class="text-3xl font-bold text-center my-3">Order Detail</h1>
            </div>
            {{-- <hr class="my-3"> --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <div class="rounded rounded-xl ">
                        @if ($order->order_status !== 'pending')
                        <img src="{{ asset('/storage/' . $order->order_payment_transaction_image_url) }}" alt="Payment Slip" class="">
                        {{-- <img class="w-full rounded-xl" src="https://images.unsplash.com/photo-1665686377065-08ba896d16fd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=700&h=800&q=80" alt="Image Description"> --}}
                        {{-- <h3 class="text-lg font-semibold my-3 text-center">Payment Transaction Image</h3> --}}
                        @endif
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="border border-gray-1oo rounded rounded-xl p-4">
                        @if ($order)
                            <div class="grid grid-cols-2 text-gray-500">

                                <div class="col-span-1 mb-2">
                                    <p class="text-md"></p>
                                </div>
                                <div class="col-span-1 mb-2 text-right">
                                    <p class="text-md font-semibold text-black my-5">{{ $order->order_name }}</p>
                                </div>

                                <div class="col-span-1 mb-2">
                                    <p class="text-md">Status</p>
                                </div>
                                <div class="col-span-1 mb-2 text-right">
                                    <p class="text-md">{{ $order->order_status }}</p>
                                </div>

                                <div class="col-span-1 mb-2">
                                    <p class="text-md">Total</p>
                                </div>
                                <div class="col-span-1 mb-2 text-right">
                                    <p class="text-md">{{ number_format($order->total_price, 2) }}</p>
                                </div>

                                <div class="col-span-1 mb-2">
                                    <p class="text-md">Address</p>
                                </div>
                                <div class="col-span-1 mb-2 text-right">
                                    <p class="text-md">{{ $order->order_address }}</p>
                                </div>

                                <div class="col-span-1 mb-2">
                                    <p class="text-md">Phone</p>
                                </div>
                                <div class="col-span-1 mb-2 text-right">
                                    <p class="text-md">{{ $order->order_phone }}</p>
                                </div>

                                <div class="col-span-1 mb-2">
                                    <p class="text-md">Email</p>
                                </div>
                                <div class="col-span-1 mb-2 text-right">
                                    <p class="text-md">{{ $order->order_email }}</p>
                                </div>
                                
                                <div class="col-span-1 mb-2">
                                    <p class="text-md">Payment Transaction date</p>
                                </div>
                                <div class="col-span-1 mb-2 text-right">
                                    <p class="text-md">{{ $order->order_payment_transaction_date }}</p>
                                </div>
                            </div>

                            <hr class="my-3">

                            <h3 class="text-lg font-semibold my-3">Ordered Items</h3>
                            @foreach ($order->orderItems as $orderItem)
                                <div class="grid grid-cols-2">
                                    <div class="col-span-1 mb-2">
                                        <p class="text-md"></p>
                                    </div>
                                    <div class="col-span-1 mb-2 text-right">
                                        <p class="text-md font-semibold">{{ $orderItem->product->product_name }}</p>
                                    </div>

                                    <div class="col-span-1 mb-2">
                                        <p class="text-md">Quantity</p>
                                    </div>
                                    <div class="col-span-1 mb-2 text-right">
                                        <p class="text-md">{{ $orderItem->quantity }}</p>
                                    </div>

                                    <div class="col-span-1 mb-2">
                                        <p class="text-md">Unit Price</p>
                                    </div>
                                    <div class="col-span-1 mb-2 text-right">
                                        <p class="text-md">{{ number_format($orderItem->product->product_price, 2) }}</p>
                                    </div>
                                    
                                    <div class="col-span-1 mb-2">
                                        <p class="text-md">Total Price</p>
                                    </div>
                                    <div class="col-span-1 mb-2 text-right">
                                        <p class="text-md">{{ number_format($orderItem->calculateTotalPrice(), 2) }}</p>
                                    </div>
                                </div>

                                <hr class="my-3">

                            @endforeach

                            @if ($order->order_status === 'confirmed')
                                <form method="POST"
                                    action="{{ route('staff.update-order-status-confirmed-to-processing', ['id' => $order->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 my-1.5">
                                        Change Status to Processing
                                    </button>
                                </form>
                            @elseif ($order->order_status === 'processing')
                                <form method="POST"
                                    action="{{ route('staff.update-order-status-processing-to-completed', ['id' => $order->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                        Change Status to Completed
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
