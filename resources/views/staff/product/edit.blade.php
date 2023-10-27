@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Edit Product</h2>

            <form method="POST" action="{{ route('staff.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- This is important to specify the HTTP method as PUT for updating -->

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
    </section>
@endsection
