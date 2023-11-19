@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto py-6 px-6 border border-gray-200 rounded-xl shadow-md">
            <h1 class="text-lg font-semibold mb-5">Add Processing Order Transaction</h1>
            <form method="POST" action="{{ route('staff.create-processing-order-transaction', $order->id) }}"
                enctype="multipart/form-data" id="addTransactionForm">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <!-- Transaction Type (Title) -->
                <div class="grid grid-cols-4">
                    <div class="col-span-1 mt-2">
                        <label for="title" class="text-sm font-medium text-gray-500">Title</label>
                    </div>
                    <div class="col-span-3 mb-4 mt-1">
                        <select name="title" id="title"
                            class="form-select py-3 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                            <option value="Product packed successfully">
                                Product packed successfully
                            </option>
                            <option value="Courier has picked up the parcel">
                                Courier has picked up the parcel
                            </option>
                            <option value="Parcel is being sorted in local area">
                                Parcel is being sorted in local area
                            </option>
                            <option value="Staff is currently delivering the parcel">
                                Staff is currently delivering the parcel
                            </option>
                            <option value="Delivery successful">
                                Delivery successful
                            </option>
                            <option value="Delivery has encountered issues. Please contact the staff">
                                Delivery has encountered issues. Please contact the staff
                            </option>
                        </select>
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

                <button type="button"
                    class="mt-2 px-4 py-2 w-full font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600"
                    onclick="confirmAddTransaction()">
                    Add Transaction
                </button>
            </form>
        </div>

        <script>
            function confirmAddTransaction() {
                if (confirm('Are you sure you want to add this transaction?')) {
                    document.getElementById('addTransactionForm').submit();
                }
            }
        </script>
    </section>
@endsection
