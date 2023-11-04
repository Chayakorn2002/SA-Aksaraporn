@extends('layouts.main')

@section('content')
    {{-- <section>
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
    </section> --}}

    <section>
        <div class="h-auto w-full">
            <div class="max-w-5xl h-fit md:flex md:items-center xl:mx-auto">
                <div class="grid grid-cols-4 grid-rows-4">
                    <div class="col-start-1 col-span-3">
                        <img class="" src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="image description">
                    </div>
                    <div class="col-start-4 col-span-1">
                        <div class="shadow p-4 mb-4 h-fit max-w-5xl">
                            <div class="py-2">
                                <div class="text-sm text-red-500">{{ $product->category->category_name }}</div>
                                <div class="text-2xl font-semibold">{{ $product->product_name }}</div>
                                <p class="text-sm text-gray-500 py-2">{{ $product->product_description }}</p>
                            </div>
                            
                            <div class="py-2">
                                <hr class="py-1">
                                <p class="py-2 font-semiblod text-xl text-blue-500">฿ {{ $product->product_price }}</p>
                                <hr class="py-1">
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="col-span-1">
                                    <p class="text-sm text-gray-500">Minimum</p>
                                    <p class="text-sm text-gray-500 py-2">Stock</p>
                                </div>
    
                                <div class="col-start-2 text-right">
                                    <p class="text-sm text-gray-500">{{ $product->product_minimum_quantity }}</p>
                                    <p class="text-sm text-gray-500 py-2">{{ $product->product_stock }}</p>
                                </div>
                            </div>
                            <hr class="py-2">
                            <form method="POST" action="{{ route('order.add-order-item-to-order', ['id' => $product->id]) }}">
                                @csrf
                                <div class="mb-4">
                                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                    <input type="number" name="quantity" id="quantity"
                                        class="form-input rounded-lg shadow-sm mt-1 block w-full"
                                        value="{{ $product->product_minimum_quantity }}" min="{{ $product->product_minimum_quantity }}"
                                        max="{{ $product->product_stock }}">
                                </div>
                                
                                @if ($errors->has('quantity'))
                                    <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                                        <p class="text-red-500 text-sm">{{ $errors->first('quantity') }}</p>
                                    </div>
                                @endif
                                
                                <button type="submit"
                                    class="w-full px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </section>
@endsection
