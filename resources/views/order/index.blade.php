@extends('layouts.main')

@section('content')
<section>
    <div class="max-w-4xl mx-auto p-2">
        <h2 class="text-4xl font-extrabold mb-4 py-8">Order Management</h2>

        {{-- @if (count($orders) > 0)
            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($orders as $order)
                    <div class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                        <h3 class="text-lg font-semibold mb-2">Order #{{ $order->id }}</h3>
                        <p class="text-sm text-gray-500">Date: {{ $order->created_at->format('M j, Y H:i A') }}</p>
                        
                        <!-- Add more order details here -->
                        
                        <a href="{{ route('orders.show', ['order' => $order]) }}" class="text-blue-600 hover:underline">View Details</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No orders available.</p>
        @endif --}}
    </div>
</section>
@endsection
