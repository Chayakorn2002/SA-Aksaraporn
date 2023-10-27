@extends('layouts.main')

@section('content')
<section>
    <div class="max-w-4xl mx-auto p-2">
        <h2 class="text-4xl font-extrabold mb-4 py-8">Product Details</h2>

        <div class="border border-gray-200 rounded shadow-md p-4">
            <h3 class="text-lg font-semibold mb-2">{{ $product->product_name }}</h3>
            <p class="text-sm text-gray-500">Price: ${{ $product->product_price }}</p>
            
            <!-- Display more product details here -->
            
            <p class="mt-4">{{ $product->product_description }}</p>
        </div>
    </div>
</section>
@endsection