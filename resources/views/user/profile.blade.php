@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">User Profile</h2>

            <div class="border border-gray-200 rounded shadow-md p-4">
                <p class="text-sm text-gray-500">Name: {{ auth()->user()->name }}</p>
                <p class="text-sm text-gray-500">Email: {{ auth()->user()->email }}</p>
                <p class="text-sm text-gray-500">Phone Number: {{ auth()->user()->phone_number }}</p>
                <p class="text-sm text-gray-500">Address: {{ auth()->user()->address }}</p>

                <a href="{{ route('user.edit-profile') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Edit Profile
                </a>
            </div>
        </div>
    </section>
@endsection
