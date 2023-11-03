@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Edit Profile</h2>

            @if (session('success'))
                <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('user.update-profile') }}">
                @csrf
                @method('PUT') 

                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('phone_number', auth()->user()->phone_number) }}">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" id="address" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('address', auth()->user()->address) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input rounded-md shadow-sm mt-1 block w-full">
                </div>

                @if ($errors->has('phone_number') || $errors->has('address') || $errors->has('password'))
                    <div class="alert alert-danger bg-red-200 text-red-700 p-4 mb-4 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Update Profile
                </button>
            </form>
        </div>
    </section>
@endsection