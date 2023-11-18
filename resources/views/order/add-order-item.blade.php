@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-5xl mx-auto mt-10">
            <div class="bg-white grid grid-cols-8 shadow-lg rounded-xl border-gray-200">
                @if ($product->images)
                    <div id="gallery" class="w-full relative col-start-1 col-span-6" data-carousel="slide">
                        <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                            <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                                src="{{ asset('/storage/' . $product->images[0]) }}">
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                @endif
                <div class="col-start-7 col-span-2 px-4 py-2">
                    <div class="bg-white border-gray-200">
                        <p class="text-sm text-red-500 font-semibold mt-2">{{ $product->category->category_name }}</p>
                        <p class="text-2xl font-semibold">{{ $product->product_name }}</p>
                        <p class="text-sm text-gray-500 mt-5 mb-7">{{ $product->product_description }}</p>
                        <hr>
                        <p class="my-4 font-semiblod text-xl text-blue-500">฿ {{ $product->product_price }}</p>
                        <hr>
                    </div>
                    <div class="grid grid-cols-2 mb-2">
                        <div class="col-span-1 mt-4">
                            <p class="text-sm text-gray-500">Minimum</p>
                            <p class="text-sm text-gray-500 my-2">Stock</p>
                        </div>
                        <div class="col-span-1 mt-4 text-right">
                            <p class="text-sm text-gray-500">{{ $product->product_minimum_quantity }}</p>
                            <p class="text-sm text-gray-500 my-2">{{ $product->product_stock }}</p>
                        </div>
                    </div>
                    <hr class="my-2">
                    <form method="POST" action="{{ route('order.add-order-item-to-order', ['id' => $product->id]) }}">
                        @csrf
                        <div class="mb-2.5">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mt-1">Quantity</label>
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
    </section>
@endsection
