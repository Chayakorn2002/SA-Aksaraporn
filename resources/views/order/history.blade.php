@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Order History</h2>

            @if (session('success'))
                <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex items-center w-full justify-between my-8 mx-1">
                <ul class="flex flex-row font-bold mt-0 mr-6 space-x-8 text-lg">
                    <li>
                        <a href="{{ route('order.history') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('order.pending') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Pending</a>
                    </li>
                    <li>
                        <a href="{{ route('order.confirmed')}}" class="text-gray-900 hover:underline"
                            aria-current="page">Confirmed</a>
                    </li>
                    <li>
                        <a href="{{ route('order.processing') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Processing</a>
                    </li>
                    <li>
                        <a href="{{ route('order.completed') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Completed</a>
                    </li>
                </ul>
            </div>

            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                <a href="{{ route('order.show-each-order', ['id' => $order->id]) }}">
                    <div class="border border-gray-200 rounded shadow-md p-4 mb-4">
                        <!-- Order Information -->
                        <h3 class="text-lg font-semibold mb-2">{{ $order->order_name }}</h3>
                        <p class="text-sm text-gray-500">Order Status: {{ $order->order_status }}</p>
                        <p class="text-sm text-gray-500">Order Total: {{ number_format($order->total_price, 2) }} ฿</p>
                    </div>
                </a>
                @endforeach
            @else
                <p class="text-sm text-gray-500">No order history available.</p>
            @endif
        </div>
    </section>
@endsection
