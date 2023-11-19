@extends('layouts.main')

@section('content')

    <section>
        <div class="max-w-lg mx-auto p-2">
            <div class="border border-gray-200 shadow-md rounded-xl p-3">
                <h1 class="text-3xl font-bold text-center mt-2 mb-4">Order Details</h1>
                <hr>

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
                    <h2 class="text-lg font-semibold my-3">Order Information</h2>

                    <div class="grid grid-cols-2 text-gray-500">

                        <div class="col-span-1 mb-2">
                            <p class="text-md">Order Name</p>
                        </div>
                        <div class="col-span-1 mb-2 text-right">
                            <p class="text-md">{{ $order->order_name }}</p>
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

                    @if ($order->order_status === 'confirmed')
                        <h3 class="text-lg font-semibold my-3">Payment Transaction Image</h3>
                        <img src="{{ asset('/storage/' . $order->order_payment_transaction_image_url) }}" alt="Payment Slip"
                            class="mb-4">
                    @endif

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

                    @if ($order->order_status !== 'pending')
                        <button data-modal-target="download-slip-modal-{{ $order }}"
                            data-modal-toggle="download-slip-modal-{{ $order }}"
                            class="w-full block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Invoice
                        </button>
                        @include('order.modal.download-slip')
                    @endif
                    @if ($order->processingOrderTransaction->count() > 0)
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold mb-2">Transactions</h3>
                            <ul>
                                @foreach ($transactions as $transaction)
                                    <li class="mb-4 border-b pb-4">
                                        <strong class="block text-blue-500 mb-1">{{ $transaction->title }}</strong>

                                        @if ($transaction->description !== null)
                                            <p class="text-gray-700 mb-2">{{ $transaction->description }}</p>
                                        @endif

                                        <p class="text-gray-500">{{ $transaction->created_at }}</p>

                                        @if ($transaction->image_url !== null)
                                            <img src="{{ asset('/storage/' . $transaction->image_url) }}" alt=""
                                                class="max-w-full h-auto mt-2">
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                @endif
            </div>
        </div>
    </section>
@endsection
