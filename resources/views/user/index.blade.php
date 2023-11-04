@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-[78rem] mx-auto p-2">
            <h2 class="text-4xl font-extrabold text-center py-10">All Product</h2>

            <!-- Add this part to display the success message -->
            @if(session('success'))
                <div class="bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- <h2 class="text-2xl font-extrabold mb-4 py-8">Active Products</h2> --}}

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 py-10">
                @foreach ($products as $product)
                    <!-- Product Card -->
                    {{-- <a href="{{ route('order.add-order-item', ['id' => $product->id]) }}">
                        <div class="w-full p-5 bg-white border border-gray-200 rounded-lg shadow">
                            <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
                            <h3 class="text-lg font-semibold mb-2">{{ $product->product_name }}</h3>
                            
                            <p class="text-sm text-gray-500">Minimum: {{ $product->product_minimum_quantity }}</p> 
                            <div class="flex items-center justify-between">
                                <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($product->product_price, 2) }} ฿</span>
                                <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                            </div>
                        </div>
                    </a> --}}
                    
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
                          <div class="flex text-left justify-between">
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($product->product_price, 2) }} ฿</span>
                          </div>
                          
                        </div>
                    </a>
                @endforeach

                @if (count($products) === 0)
                    <p class="text-gray-500">No Products Available</p>
                @endif
            </div>

            {{-- <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('order.show-cart') }}" class="flex items-center justify-center bg-blue-500 text-white rounded-lg p-4">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    View Cart
                </a>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center bg-slate-500 text-white rounded-lg p-4">
                @csrf
                <button type="submit">
                    <span class="sr-only">Logout</span>
                    Logout
                </button>
            </form> --}}
        </div>
    </section>
@endsection



{{-- <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg" alt="">
    </div>
</div> --}}


