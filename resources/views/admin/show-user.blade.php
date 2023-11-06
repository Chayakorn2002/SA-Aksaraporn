@extends('layouts.main')

@section('content')
    {{-- <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">User Profile</h2>

            <div class="border border-gray-200 rounded shadow-md p-4">
                <h3 class="text-lg font-semibold mb-2">User Information</h3>
                <p class="text-sm text-gray-500">Name: {{ $user->name }}</p>
                <p class="text-sm text-gray-500">Email: {{ $user->email }}</p>
                <p class="text-sm text-gray-500">Role: {{ $user->role }}</p>
                <p class="text-sm text-gray-500">Phone Number: {{ $user->phone_number }}</p>
                <p class="text-sm text-gray-500">Address: {{ $user->address }}</p>
                <p class="text-sm text-gray-500">Status: {{ $user->status }}</p>
                <p class="text-sm text-gray-500">Registered at: {{ $user->created_at }}</p>

                @if ($user->status === 'active')
                    <form method="POST" action="{{ route('admin.suspend-account', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Suspend Account
                        </button>
                    </form>
                @elseif ($user->status === 'suspended')
                    <form method="POST" action="{{ route('admin.activate-account', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Activate Account
                        </button>
                    </form>
                @endif

            </div>
        </div>
    </section> --}}

    <section>
        <div class="max-w-md mx-auto p-2 border border-gray-200 rounded rounded-xl">

            <h1 class="text-4xl font-extrabold py-5 text-center">User Profile</h1>
            <hr>
            <h2 class="text-lg font-semibold mt-2">User Information</h2>

            <div class="grid grid-cols-2">

                <div class="col-span-1">
                    <p class="text-md text-gray-500 my-2">Name</p>
                </div>
                <div class="col-span-1 text-right">
                    <p class="text-md text-gray-500 my-2">{{ $user->name }}</p>
                </div>

                <div class="col-span-1">
                    <p class="text-md text-gray-500 my-2">Email</p>
                </div>
                <div class="col-span-1 text-right">
                    <p class="text-md text-gray-500 my-2">{{ $user->email }}</p> 
                </div>

                <div class="col-span-1">
                    <p class="text-md text-gray-500 my-2">Role</p>
                </div>
                <div class="col-span-1 text-right">
                    <p class="text-md text-gray-500 my-2">{{ $user->role }}</p>
                </div>

                <div class="col-span-1">
                    <p class="text-md text-gray-500 my-2">Phone Number</p>
                </div>
                <div class="col-span-1 text-right">
                    <p class="text-md text-gray-500 my-2">{{ $user->phone_number }}</p>
                </div>

                <div class="col-span-1">
                    <p class="text-md text-gray-500 my-2">Address</p>
                </div>
                <div class="col-span-1 text-right">
                    <p class="text-md text-gray-500 my-2">{{ $user->address }}</p>
                </div>

                <div class="col-span-1">
                    <p class="text-md text-gray-500 my-2">Status</p>
                </div>
                <div class="col-span-1 text-right">
                    <p class="text-md text-gray-500 my-2">{{ $user->status }}</p>
                </div>

                <div class="col-span-1">
                    <p class="text-md text-gray-500 my-1">Registered at</p>
                </div>
                <div class="col-span-1 text-right">
                    <p class="text-md text-gray-500 my-2">{{ $user->created_at }}</p>
                </div>
            </div>

            @if ($user->status === 'active')
                    <form method="POST" action="{{ route('admin.suspend-account', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Suspend Account
                        </button>
                    </form>
                @elseif ($user->status === 'suspended')
                    <form method="POST" action="{{ route('admin.activate-account', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Activate Account
                        </button>
                    </form>
                @endif
        </div>
    </section>
@endsection
