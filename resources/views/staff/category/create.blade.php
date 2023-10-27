@extends('layouts.main')

@section('content')
<section>
    <div class="max-w-4xl mx-auto p-2">
        <h2 class="text-4xl font-extrabold mb-4 py-8">Add Category</h2>

        <form method="POST" action="{{ route('staff.add-category') }}">
            @csrf

            <div class="mb-4">
                <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
            </div>

            <div class="mb-4">
                <label for="category_description" class="block text-sm font-medium text-gray-700">Category Description</label>
                <input type="text" name="category_description" id="category_description" class="form-input rounded-md shadow-sm mt-1 block w-full" />
            </div>

            <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Add Category
            </button>
        </form>
    </div>
</section>
@endsection
