@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Add Product</h2>

            <form method="POST" action="{{ route('staff.add-product') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="product_name" id="product_name"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label for="product_description" class="block text-sm font-medium text-gray-700">Product
                        Description</label>
                    <input type="text" name="product_description" id="product_description"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label for="images[]" class="block text-sm font-medium text-gray-700">Product Images</label>
                    <input type="file" name="images[]" id="images[]"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" multiple />
                </div>

                @error('images')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror

                <div class="mb-4">
                    <label for="product_price" class="block text-sm font-medium text-gray-700">Product Price</label>
                    <input type="number" name="product_price" id="product_price"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label for="product_stock" class="block text-sm font-medium text-gray-700">Product Stock</label>
                    <input type="number" name="product_stock" id="product_stock"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="form-select rounded-md shadow-sm mt-1 block w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Add Product
                </button>
            </form>
        </div>
    </section>
@endsection
