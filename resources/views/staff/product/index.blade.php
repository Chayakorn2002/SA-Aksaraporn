@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <section>
        <div class="max-w-7xl mx-auto">

            <div class="p-3">
                {{-- <h1 class="text-5xl text-center font-extrabold w-full">Product Dashboard</h1> --}}
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <div class="grid grid-cols-3 col-span-1 gap-2 mb-2">
                            <a href="{{ route('staff.products') }}">
                                <button type="button"
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    All
                                </button>
                            </a>

                            <a href="{{ route('staff.available-products') }}">
                                <button type="button"
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Available
                                </button>
                            </a>

                            <a href="{{ route('staff.unavailable-products') }}">
                                <button type="button"
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Unavailable
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-start-3 col-span-1 text-right">
                        <a href="{{ route('staff.add-category') }}">
                            <button type="button"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-green-100 border border-transparent font-semibold text-green-500 hover:text-white hover:bg-green-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Add Category
                            </button>
                        </a>
                        <a href="{{ route('staff.add-product') }}">
                            <button type="button"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-green-100 border border-transparent font-semibold text-green-500 hover:text-white hover:bg-green-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Add Product
                            </button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="my-5">
                    {{ $products->links() }}
                </div>
                <div class="grid grid-cols-3 gap-4 mt-3">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <a href="{{ route('staff.products.show', ['id' => $product->id]) }}"
                                class="flex flex-col group bg-white border border-gray-200 shadow-sm rounded-xl overflow-hidden hover:shadow-lg transition">

                                <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                                    @if (is_array($product->images) && count($product->images) > 0)
                                        <img class="w-full h-full bg-gray-100 absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                                            src="{{ asset('/storage/' . $product->images[0]) }}">
                                    @else
                                        {{-- Placeholder or default image when there is no product image --}}
                                        <img class="w-full h-full bg-gray-100 absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                                            src="{{ asset('path_to_placeholder_image.jpg') }}" alt="Placeholder Image">
                                    @endif
                                </div>
                                <div class="px-5">
                                    <div class="text-sm grid grid-cols-2 my-3">
                                        <div class="col-span-1">
                                            <h2 class="text-xl font-semibold text-black my-3 inline">
                                                {{ $product->product_name }}</h2>
                                        </div>
                                        <div class="col-start-2 text-right">
                                            <h3 class="text-lg font-semibold text-blue-500">฿ {{ $product->product_price }}
                                            </h3>
                                        </div>

                                        <div class="col-span-1 mt-5">
                                            <p>Category</p>
                                        </div>
                                        <div class="text-right col-span-1 mt-5">
                                            <p class="">{{ $product->category->category_name }}</p>
                                        </div>

                                        <div class="col-span-1">
                                            <p>Minimum Quantity</p>
                                        </div>
                                        <div class="text-right col-span-1">
                                            <p class="">{{ $product->product_minimum_quantity }}</p>
                                        </div>

                                        <div class="col-span-1">
                                            <p>Stock</p>
                                        </div>
                                        <div class="text-right col-span-1">
                                            <p class="">{{ $product->product_stock }}</p>
                                        </div>

                                        <div class="col-span-1">
                                            <p>Status</p>
                                        </div>
                                        <div class="text-right col-span-1">
                                            <p class="">{{ $product->product_status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class="text-gray-500">No Product Available</p>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
