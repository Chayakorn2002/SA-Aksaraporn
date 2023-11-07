@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto py-6 px-6 border border-gray-200 rounded rounded-xl shadow-md">
            <h1 class="text-lg font-semibold mb-5">Add Category</h1>
            <form method="POST" action="{{ route('staff.add-category') }}">
                @csrf
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-2">
                        <label for="category_name" class="text-sm font-medium text-gray-500">Category</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <input type="text" name="category_name" id="category_name"
                            class="form-input py-3 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                        @error('category_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1 mt-3">
                        <label for="category_description" class="text-sm font-medium text-gray-500">Description</label>
                    </div>
                    <div class="col-span-3 mb-4 mt-1">
                        <input type="text" name="category_description" id="category_description"
                            class="form-input py-3 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                        @error('category_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-4">
                        <button type="submit"
                            class="mt-2 px-4 py-2 w-full font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                            Add Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
