@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto py-6 px-6 border border-gray-200 rounded-xl shadow-md">
            <h1 class="text-lg font-semibold mb-5">Add Processing Order Transaction</h1>
            <form method="POST" action="{{ route('staff.create-processing-order-transaction', $order->id ) }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <!-- Transaction Type (Title) -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-2">
                        <label for="title" class="text-sm font-medium text-gray-500">Title</label>
                    </div>
                    <div class="col-span-3 mb-4 mt-1">
                        <input type="text" name="title" id="title"
                            class="form-input py-3 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    @error('title')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for="description" class="text-sm font-medium text-gray-500">Description</label>
                    </div>
                    <div class="col-span-3 mb-4 mt-1">
                        <input type="text" name="description" id="description"
                            class="form-input py-3 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Images -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-3">
                        <label for="image" class="text-sm font-medium text-gray-500">Image</label>
                    </div>
                    <div class="col-span-3 mb-4">
                        <input type="file" name="image" id="image"
                            class="py-0 px-3 pr-11 border-gray-200 form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>
                    @error('image')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"
                    class="mt-2 px-4 py-2 w-full font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Add Transaction
                </button>
            </form>
        </div>
    </section>
@endsection
