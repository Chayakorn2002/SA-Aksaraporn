@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Product Details</h2>

            <div class="border border-gray-200 rounded shadow-md p-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">{{ $product->product_name }}</h3>
                <p class="text-sm text-gray-500">Description: {{ $product->product_description }}</p>
                <p class="text-sm text-gray-500">Price: ${{ number_format($product->product_price, 2) }}</p>
                <p class="text-sm text-gray-500">Minimum: {{ $product->product_minimum_quantity }}</p> 
                <p class="text-sm text-gray-500">Stock: {{ $product->product_stock }}</p>
                <p class="text-sm text-gray-500">Status: {{ $product->product_status }}</p>
                <p class="text-sm text-gray-500">Category: {{ $product->category->category_name }}</p>
            </div>

            

            @if ($product->images)
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Product Images</h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($product->images as $image)
                            <img src="{{ asset('/storage/' . $image) }}" alt="Product Image" class="w-full">
                        @endforeach
                    </div>
                </div>
            @endif

            
        </div>
        
    </section>
@endsection



