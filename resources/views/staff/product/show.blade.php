@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">{{ $product->product_name }}</h2>

            <div class="border border-gray-200 rounded shadow-md p-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">Product Details</h3>
                <p class="text-sm text-gray-500">Description: {{ $product->product_description }}</p>
                <p class="text-sm text-gray-500">Price: {{ $product->product_price }}</p>
                <p class="text-sm text-gray-500">Stock: {{ $product->product_stock }}</p>
                <p class="text-sm text-gray-500">Status: {{ $product->product_status }}</p>
                <p class="text-sm text-gray-500">Category: {{ $product->category->category_name }}</p>
            </div>

            @if ($product->images)
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Product Images</h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <td class="flex gap-4 px-6 py-4">
                            @foreach($product->images as $image)
                            <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class="w-20 h-20 border border-blue-600">
                            @endforeach
                        </td>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Add the button for editing the product -->
        <div class="max-w-4xl mx-auto p-2 mt-4">
            <a href="{{ route('staff.products.edit', $product->id) }}" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Edit Product
            </a>
        </div>
    </section>
@endsection
