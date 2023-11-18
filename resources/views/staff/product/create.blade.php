@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto py-6 px-6 border border-gray-200 rounded-xl shadow-md">
            <h1 class="text-lg font-semibold mb-5">Add Product</h1>
            <form method="POST" action="{{ route('staff.add-product') }}" enctype="multipart/form-data">
                @csrf

                <!-- Product Name -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-2">
                        <label for="product_name" class="text-sm font-medium text-gray-500">Product Name</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <input type="text" name="product_name" id="product_name" class="form-input py-3 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    @error('product_name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Description -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for="product_description" class="text-sm font-medium text-gray-500">Description</label>
                    </div>
                    <div class="col-span-3 mb-4 mt-1">
                        <input type="text" name="product_description" id="product_description" class="form-input py-3 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    @error('product_description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Images -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for="images[]" class="text-sm font-medium text-gray-500">Images</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <input type="file" name="images[]" id="images[]" class="py-0 px-3 pr-11 border-gray-200 form-input rounded-md shadow-sm mt-1 block w-full" multiple />
                    </div>
                    @error('images')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Price -->
                <!-- Add similar code for product_price, product_minimum_quantity, product_stock, and category_id -->
                
                <!-- Product Price -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for="product_price" class="text-sm font-medium text-gray-500">Price</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <input type="number" name="product_price" id="product_price" class="form-input py-3 px-3 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    @error('product_price')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Minimum Quantity -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for="product_minimum_quantity" class="text-sm font-medium text-gray-500">Minimum Quantity</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <input type="number" name="product_minimum_quantity" id="product_minimum_quantity" class="form-input py-3 px-3 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    @error('product_minimum_quantity')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Stock -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for "product_stock" class="text-sm font-medium text-gray-500">Stock</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <input type="number" name="product_stock" id="product_stock" class="form-input py-3 px-3 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    @error('product_stock')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category ID -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for="category_id" class="text-sm font-medium text-gray-500">Category</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <select name="category_id" id="category_id" class="py-3 px-3 pr-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="mt-2 px-4 py-2 w-full font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Add Product
                </button>
            </form>
        </div>
    </section>
@endsection
