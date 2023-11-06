@extends('layouts.main')

@section('content')
    {{-- <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Edit Product</h2>

            <form method="POST" action="{{ route('staff.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- This is important to specify the HTTP method as PUT for updating -->

                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <!-- Input field for editing the product name -->
                <div class="mb-4">
                    <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="product_name" id="product_name"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $product->product_name }}">
                </div>

                <!-- Input field for editing the product description -->
                <div class="mb-4">
                    <label for="product_description" class="block text-sm font-medium text-gray-700">Product
                        Description</label>
                    <input type="text" name="product_description" id="product_description"
                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ $product->product_description }}">
                </div>

                <!-- Input field for editing the product price -->
                <div class="mb-4">
                    <label for="product_price" class="block text-sm font-medium text-gray-700">Product Price</label>
                    <input type="number" name="product_price" id="product_price"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $product->product_price }}">
                </div>

                <div class="mb-4">
                    <label for="product_minimum_quantity" class="block text-sm font-medium text-gray-700">Product Minimum Quantity</label>
                    <input type="number" name="product_minimum_quantity" id="product_minimum_quantity"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $product->product_minimum_quantity }}" />
                </div> 

                <!-- Input field for editing the product stock -->
                <div class="mb-4">
                    <label for="product_stock" class="block text-sm font-medium text-gray-700">Product Stock</label>
                    <input type="number" name="product_stock" id="product_stock"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $product->product_stock }}">
                </div>

                <!-- Input field for editing the product status -->
                <div class="mb-4">
                    <label for="product_status" class="block text-sm font-medium text-gray-700">Product Status</label>
                    <select name="product_status" id="product_status"
                        class="form-select rounded-md shadow-sm mt-1 block w-full">
                        <option value="available" {{ $product->product_status == 'available' ? 'selected' : '' }}>Available
                        </option>
                        <option value="unavailable" {{ $product->product_status == 'unavailable' ? 'selected' : '' }}>
                            Unavailable</option>
                    </select>
                </div>

                <!-- Input field for editing the product category -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="form-select rounded-md shadow-sm mt-1 block w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Input field for editing product images -->
                <div class="mb-4">
                    <label for="images" class="block text-sm font-medium text-gray-700">Product Images</label>
                    <input type="file" name="images[]" id="images"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" multiple>
                </div>

                <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover-bg-blue-600">
                    Update Product
                </button>
            </form>
        </div>
    </section> --}}



    <section>
        <div class="max-w-2xl mx-auto p-2">
            <div class="border border-gray-200 shadow-lg rounded-xl py-2 px-4">
                <form method="POST" action="{{ route('staff.products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <h1 class="text-2xl font-bold mb-5 mt-3">Edit Product</h1>
                    <div class="grid grid-cols-3">

                        <div class="col-span-1">
                            <label for="category_id" class="text-sm text-gray-800 mt-4">Category</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <select name="category_id" id="category_id" class="py-2 px-3 pr-11 block w-full border-gray-300 rounded rounded-xl shadow-sm text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-span-1">
                            <label for="product_name" class="text-sm text-gray-800 mt-4">Product Name</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <input type="text" name="product_name" id="product_name"
                            class="form-input py-2 px-3 pr-11 block w-full border-gray-300 rounded rounded-xl shadow-sm text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500" 
                            value="{{ $product->product_name }}">
                        </div>

                        <div class="col-span-1">
                            <label for="product_description"  class="text-sm text-gray-800 mt-4">Description</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <input type="text" name="product_description" id="product_description"
                            class="form-input py-2 px-3 pr-11 block w-full border-gray-300 rounded rounded-xl shadow-sm text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500" 
                            value="{{ $product->product_description }}">
                        </div>

                        <div class="col-span-1">
                            <label for="product_price" class="text-sm text-gray-800 mt-4">Price</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <input type="text" name="product_price" id="product_price"
                            class="form-input py-2 px-3 pr-11 block w-full border-gray-300 rounded rounded-xl shadow-sm text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500" 
                            value="{{ $product->product_price }}">
                        </div>

                        <div class="col-span-1">
                            <label for="product_minimum_quantity" class="text-sm text-gray-800 mt-4">Minimum Quantity</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <input type="text" name="product_minimum_quantity" id="product_minimum_quantity"
                            class="form-input py-2 px-3 pr-11 block w-full border-gray-300 rounded rounded-xl shadow-sm text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500" 
                            value="{{ $product->product_minimum_quantity }}">
                        </div>

                        <div class="col-span-1">
                            <label for="product_stock" class="text-sm text-gray-800 mt-4">Stock</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <input type="text" name="product_stock" id="product_stock"
                            class="form-input py-2 px-3 pr-11 block w-full border-gray-300 rounded rounded-xl shadow-sm text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500" 
                            value="{{ $product->product_stock }}">
                        </div>

                        <div class="col-span-1">
                            <label for="product_status" class="text-sm text-gray-800 mt-4">Status</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <select name="product_status" id="product_status" class="py-2 px-3 pr-11 block w-full border-gray-300 rounded rounded-xl shadow-sm text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                            <option value="available" {{ $product->product_status == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="unavailable" {{ $product->product_status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                            </select>
                        </div>

                        <div class="col-span-1">
                            <label for="images" class="text-sm text-gray-800 mt-4">Product Image</label>
                        </div>
                        <div class="col-span-2 my-2">
                            <form>
                                <label for="images" class="sr-only">Choose file</label>
                                <input type="file" name="images[]" id="images" class="form-input block w-full border border-gray-300 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent" multiple>
                            </form>
                        </div>

                        <div class="col-span-3 my-2">
                            <button type="submit" class="py-2 px-4 w-full inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                Update Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
