@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Order Dashboard</h2>

            <div class="flex items-center w-full justify-between my-8 mx-1">
                <ul class="flex flex-row font-bold mt-0 mr-6 space-x-8 text-lg">
                    <li>
                        <a href="{{ route('staff.orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.pending-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Pending</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.confirmed-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Confirmed</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.processing-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Processing</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.completed-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Completed</a>
                    </li>
                </ul>
            </div>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($orders as $order)
                    <a href="{{ route('staff.show-each-order', ['id' => $order->id]) }}">
                        <div class="border border-gray-200 rounded shadow-md p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $order->order_name }}</h3>
                            <p class="text-sm text-gray-500">Order Status: {{ $order->order_status }}</p>
                            <p class="text-sm text-gray-500">Order Total: {{ number_format($order->total_price, 2) }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-500">No Orders Available</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
