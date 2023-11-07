@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
            {{ session('error') }}
        </div>
    @endif
    <section>
        <div class="max-w-md h-3xl mx-auto">
            <div class="border border-gray-200 rounded rounded-lg shadow-md p-3">
                <h2 class="text-center text-black text-4xl font-extrabold my-3">Profile</h2>
                <hr>
                <div class="grid grid-cols-2">
                    <div class="col-span-1 text-left">
                        <p class="text-md text-gray-500 my-3">Name</p>
                        <p class="text-md text-gray-500">Email</p>
                        <p class="text-md text-gray-500 my-2">Phone</p>
                        <p class="text-md text-gray-800 py-2">Address</p>
                    </div>
                    <div class="col-start-2 text-right">
                        <p class="text-md text-gray-500 my-3">{{ auth()->user()->name }}</p>
                        <p class="text-md text-gray-500">{{ auth()->user()->email }}</p>
                        <p class="text-md text-gray-500 my-2">{{ auth()->user()->phone_number }}</p>
                        <p class="text-md text-gray-800 py-2">{{ auth()->user()->address }}</p>
                    </div>
                </div>
                <a href="{{ route('user.edit-profile') }}"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                    Edit Profile
                </a>
            </div>
        </div>
    </section>

    <!-- Display validation errors next to the input fields -->
    @error('phone_number')
        <div class="text-red-600">{{ $message }}</div>
    @enderror

    @error('address')
        <div class="text-red-600">{{ $message }}</div>
    @enderror

    @error('password')
        <div class="text-red-600">{{ $message }}</div>
    @enderror
@endsection
