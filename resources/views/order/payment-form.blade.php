@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-xl mx-auto p-2">

            @if (session('success'))
                <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <div class="border border-gray-200 rounded rounded-xl shadow-md p-4">
                <h2 class="text-4xl text-center font-bold my-3">Payment</h2>

                <!-- Display PromptPay QR Code -->
                <img src="{{ $promptPayQrCode }}" alt="PromptPay QR Code" class="mb-4">

                <!-- Payment Form -->
                <form method="POST" action="{{ route('order.submit-payment') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Transaction Image (Slip) Upload -->
                    <div class="mb-4">
                        <label for="slip" class="block text-sm font-medium text-gray-700">Transaction Image
                            (Slip)</label>
                        <input type="file" id="slip" name="slip" accept="image/*" required>
                    </div>

                    <!-- Phone Number Input -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" id="phone" name="phone"
                            class="form-input rounded-md shadow-sm border-gray-300 mt-1 block w-full"
                            value="{{ auth()->user()->phone_number }}">
                    </div>

                    <!-- Address Input -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                        <textarea id="address" name="address" class="form-textarea border-gray-300 rounded-md shadow-sm mt-1 block w-full">{{ auth()->user()->address }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover-bg-blue-600">
                        Submit Payment
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
