@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Product Dashboard</h2>

            <div class="flex items-center w-full justify-between my-8 mx-1">
                <ul class="flex flex-row font-bold mt-0 mr-6 space-x-8 text-lg">
                    <li>
                        <a href="{{ route('staff.products') }}" class="text-gray-900 hover:underline"
                            aria-current="page">All</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.available-products') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Available</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.unavailable-products') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Unavailable</a>
                    </li>
                </ul>
            </div>

            {{-- <div class="flex items-center w-full justify-between">
                <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                    @foreach ($categories as $category)
                        <li>

                        </li>
                    @endforeach
                </ul>
            </div>
            <ul class="flex space-x-4 mb-4">
                <li class="text-xl font-semibold">
                    <a href="{{ route('staff.products') }}" class="text-blue-500 hover:underline">All Products</a>
                </li>
                <li class="text-xl font-semibold">
                    <a href="{{ route('staff.products', ['category' => 'by-category']) }}"
                        class="text-blue-500 hover:underline">Products by Category</a>
                </li>
            </ul> --}}

            {{-- <h2 class="text-2xl font-extrabold mb-4 py-8">Products</h2> --}}

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($products as $product)
                    <!-- Product Card -->
                    <a href="{{ route('staff.products.show', ['id' => $product->id]) }}"
                        class="border border-gray-200 rounded shadow-md p-1 hover:bg-gray-50 transition duration-300 block">
                        <div class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->product_name }}</h3>
                            <p class="text-sm text-gray-500">Category: {{ $product->category->category_name }}</p>
                            <p class="text-sm text-gray-500">Price: {{ $product->product_price }}</p>
                            <p class="text-sm text-gray-500">Minimum Quantity: {{ $product->product_minimum_quantity }}</p>
                            <p class="text-sm text-gray-500">Stock: {{ $product->product_stock }}</p>
                            <p class="text-sm text-gray-500">Status: {{ $product->product_status }}</p>
                        </div>
                    </a>
                @endforeach



                @if (!$products)
                    <p class="text-gray-500">No Product Available</p>
                @endif
            </div>

            <div class="my-8">
                {{ $products->links() }}
            </div>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('staff.add-product') }}"
                    class="flex items-center justify-center bg-green-500 text-white rounded-lg p-4">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Product
                </a>

                <a href="{{ route('staff.add-category') }}"
                    class="flex items-center justify-center bg-green-500 text-white rounded-lg p-4">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Category
                </a>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}"
                    class="flex items-center justify-center bg-slate-500 text-white rounded-lg p-4">
                    @csrf
                    <button type="submit">
                        <span class="sr-only">Logout</span>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
