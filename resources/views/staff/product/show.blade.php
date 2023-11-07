@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-7xl mx-auto p-2">
            <div class="shadow-md border border-gray-200 p-2 rounded-xl">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2 h-fit">
                        @if ($product->images)
                            <div id="gallery" class="relative w-full mt-1 ml-1" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                    @foreach ($product->images as $image)
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('/storage/' . $image) }}"
                                                class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="col-span-1 px-4 py-2">
                        <div class="bg-white border-gray-200">
                            <p class="text-sm text-red-500 font-semibold mt-2">{{ $product->category->category_name }}</p>
                            <p class="text-2xl font-semibold">{{ $product->product_name }}</p>
                            <p class="text-sm text-gray-500 mt-5 mb-7">{{ $product->product_description }}</p>
                            <hr>
                            <p class="my-4 font-semiblod text-xl text-blue-500">฿ {{ $product->product_price }}</p>
                            <hr>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="col-span-1 my-4">
                                <p class="text-sm text-gray-500 my-3">Minimum</p>
                                <p class="text-sm text-gray-500 my-3">Stock</p>
                                <p class="text-sm text-gray-500 my-3">Status</p>
                            </div>
                            <div class="col-span-1 text-right my-4">
                                <p class="text-sm text-gray-500 my-3">{{ $product->product_minimum_quantity }}</p>
                                <p class="text-sm text-gray-500 my-3">{{ $product->product_stock }}</p>
                                <p class="text-sm text-gray-500 my-3">{{ $product->product_status }}</p>
                            </div>
                            <div class="col-span-2">
                                <a href="{{ route('staff.products.edit', $product->id) }}"
                                    class="py-3 px-4 w-full inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                    Edit Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
