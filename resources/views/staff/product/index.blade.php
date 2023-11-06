@extends('layouts.main')

@section('content')
    {{-- <section>
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
            </div> --}}

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

            {{-- <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

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
            </div> --}}
        {{-- </div>
    </section> --}}


    <section>
        <div class="max-w-7xl mx-auto">
            
            <div class="p-3">
                {{-- <h1 class="text-5xl text-center font-extrabold w-full">Product Dashboard</h1> --}}
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <div class="grid grid-cols-3 col-span-1 gap-2 mb-2">
                            <a href="{{ route('staff.products') }}" >
                                <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                All
                                </button>
                            </a>
                            
                            <a href="{{ route('staff.available-products') }}">
                                <button  type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Available
                                </button>
                            </a>
                            
                            <a href="{{ route('staff.unavailable-products') }}">
                                <button  type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Unavailable
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-start-3 col-span-1 text-right">
                        <a href="{{ route('staff.add-category') }}">
                            <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-green-100 border border-transparent font-semibold text-green-500 hover:text-white hover:bg-green-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Add Category
                            </button>
                        </a>
                        <a href="{{ route('staff.add-product') }}">
                            <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-green-100 border border-transparent font-semibold text-green-500 hover:text-white hover:bg-green-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
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
                                <img class="w-full h-full bg-gray-100 absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl" src="../docs/assets/img/500x300/img1.jpg">
                            </div>
                            <div class="px-5">
                                <div class="text-sm grid grid-cols-2 my-3">
                                    <div class="col-span-1">
                                        <h2 class="text-xl font-semibold text-black my-3 inline">{{ $product->product_name }}</h2>
                                    </div>
                                    <div class="col-start-2 text-right">
                                        <h3 class="text-lg font-semibold text-blue-500">฿ {{ $product->product_price }}</h3>
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
                {{-- <div class="mb-8 grid grid-cols-1 grid-rows-4 gap-4 md:grid-cols-2 lg:grid-cols-3 py-10">
                    @foreach ($products as $product)
                        <a href="{{ route('order.add-order-item', ['id' => $product->id]) }}" class="flex flex-col group bg-white border border-gray-200 shadow-sm rounded-xl overflow-hidden hover:shadow-lg transition">
                            <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                                <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl" src="../docs/assets/img/500x300/img1.jpg">
                            </div>
                            <div class="p-4 md:p-5">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                                    {{ $product->product_name }}
                                </h3>
                                <p class="mt-1 text-gray-800 dark:text-gray-400">
                                    {{ $product->product_description }}
                                </p>
                                <div class="flex text-left justify-between ">
                                    <span class="text-3xl row-start-4 font-bold text-gray-900">{{ number_format($product->product_price, 2) }} ฿</span>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    @if (count($products) === 0)
                        <p class="text-gray-500">No Products Available</p>
                    @endif --}}
            </div>
        </div>
    </section>
@endsection
