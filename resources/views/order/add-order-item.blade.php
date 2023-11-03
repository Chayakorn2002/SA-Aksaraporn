@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">{{ $product->product_name }}</h2>

            <div class="border border-gray-200 rounded shadow-md p-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">Product Details</h3>
                <p class="text-sm text-gray-500">Description: {{ $product->product_description }}</p>
                <p class="text-sm text-gray-500">Price: {{ $product->product_price }}</p>
                <p class="text-sm text-gray-500">Minimum: {{ $product->product_minimum_quantity }}</p>
                <p class="text-sm text-gray-500">Stock: {{ $product->product_stock }}</p>
                <p class="text-sm text-gray-500">Category: {{ $product->category->category_name }}</p>
            </div>

            <div class="border border-gray-200 rounded shadow-md p-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">Add to Cart</h3>
                <form method="POST" action="{{ route('order.add-order-item-to-order', ['id' => $product->id]) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" name="quantity" id="quantity"
                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ $product->product_minimum_quantity }}" min="{{ $product->product_minimum_quantity }}"
                            max="{{ $product->product_stock }}">
                    </div>


                    @if ($errors->has('quantity'))
                        <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                            <p class="text-red-500 text-sm">{{ $errors->first('quantity') }}</p>
                        </div>
                    @endif

                    <button type="submit"
                        class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Add to Cart
                    </button>
                </form>
            </div>

            @if ($product->images)
                <div class="border border-gray-200 rounded shadow-md p-4">
                    <h3 class="text-lg font-semibold mb-2">Product Images</h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <td class="flex gap-4 px-6 py-4">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('/storage/' . $image) }}" alt="multiple image"
                                    class="w-20 h-20 border border-blue-600">
                            @endforeach
                        </td>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
