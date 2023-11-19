@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-[78rem] mx-auto p-2">
            <h2 class="text-4xl font-extrabold text-center py-10">All Product</h2>

            @if (session('success'))
                <div class="bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-center p-4 flex-wrap">
                <a href="{{ route('home.index') }}"
                    class="bg-white border border-gray-200 shadow-sm rounded-xl py-2 px-4 mr-4 hover:shadow-lg transition">
                    All
                </a>

                @foreach ($categories as $category)
                    <a href="{{ route('products.show-by-category', ['id' => $category->id]) }}"
                        class="bg-white border border-gray-200 shadow-sm rounded-xl py-2 px-4 mr-4 hover:shadow-lg transition">
                        {{ $category->category_name }}
                    </a>
                @endforeach
            </div>

            <div class="my-5">
                {{ $products->links() }}
            </div>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 py-10">
                @foreach ($products as $product)
                    <a href="{{ route('order.add-order-item', ['id' => $product->id]) }}"
                        class="flex flex-col group bg-white border border-gray-200 shadow-sm rounded-xl overflow-hidden hover:shadow-lg transition">
                        <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                            @if (is_array($product->images) && count($product->images) > 0)
                                <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                                    src="{{ asset('/storage/' . $product->images[0]) }}">
                            @else
                                {{-- Placeholder or default image when there is no product image --}}
                                <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                                    src="{{ asset('path_to_placeholder_image.jpg') }}" alt="Placeholder Image">
                            @endif
                        </div>
                        <div class="p-4 md:p-5">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                                {{ $product->product_name }}
                            </h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                {{ $product->product_description }}
                            </p>
                            <div class="flex text-left justify-between">
                                <span
                                    class="text-3xl font-bold text-gray-900">{{ number_format($product->product_price, 2) }}
                                    ฿</span>
                            </div>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Stock : {{ $product->product_stock }}
                            </p>
                        </div>
                    </a>
                @endforeach

                @if (count($products) === 0)
                    <p class="text-gray-500">No Products Available</p>
                @endif
            </div>
        </div>
    </section>
@endsection
