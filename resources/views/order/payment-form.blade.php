@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Payment</h2>

            <div class="border border-gray-200 rounded shadow-md p-4">
                <!-- Display PromptPay QR Code -->
                <img src="{{ $promptPayQrCode }}" alt="PromptPay QR Code" class="mb-4">
                
                <!-- Payment Form -->
                <form method="POST" action="{{ route('order.submit-payment') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Transaction Image (Slip) Upload -->
                    <div class="mb-4">
                        <label for="slip" class="block text-sm font-medium text-gray-700">Transaction Image (Slip)</label>
                        <input type="file" id="slip" name="slip" accept="image/*" required>
                    </div>

                    <!-- Address Input -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                        <textarea id="address" name="address" class="form-textarea rounded-md shadow-sm mt-1 block w-full"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Submit Payment
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
