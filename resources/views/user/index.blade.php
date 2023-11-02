@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Customer Dashboard</h2>

            <!-- Add this part to display the success message -->
            @if(session('success'))
                <div class="bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="text-2xl font-extrabold mb-4 py-8">Active Products</h2>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $product)
                    <!-- Product Card -->
                    <a href="{{ route('order.add-order-item', ['id' => $product->id]) }}">
                        <div class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->product_name }}</h3>
                            <p class="text-sm text-gray-500">{{ $product->product_description }}</p>
                            <p class="text-sm text-gray-500">Price: ${{ number_format($product->product_price, 2) }}</p>
                        </div>
                    </a>
                @endforeach

                @if (count($products) === 0)
                    <p class="text-gray-500">No Products Available</p>
                @endif
            </div>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('order.show-cart') }}" class="flex items-center justify-center bg-blue-500 text-white rounded-lg p-4">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    View Cart
                </a>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center bg-slate-500 text-white rounded-lg p-4">
                @csrf
                <button type="submit">
                    <span class="sr-only">Logout</span>
                    Logout
                </button>
            </form>
        </div>
    </section>
@endsection
