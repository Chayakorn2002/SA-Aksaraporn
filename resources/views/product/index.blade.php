@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Product List</h2>

            @if (count($products) > 0)
                <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        <a href="{{ route('product.show', ['product' => $product]) }}" class="text-blue-600 hover:underline">
                            <div
                                class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                                <h3 class="text-lg font-semibold mb-2">{{ $product->product_name }}</h3>
                                <p class="text-sm text-gray-500">Price: ${{ $product->proprice }}</p>

                                <!-- Add more product details here -->
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No products available.</p>
            @endif
        </div>
    </section>
@endsection
