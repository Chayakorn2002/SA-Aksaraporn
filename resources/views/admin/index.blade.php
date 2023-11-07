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
        <div class="max-w-7xl mx-auto border border-gray-200 shadow-md rounded rounded-xl py-1 px-3">
            <div class="grid grid-cols-3 my-2">
                <div class="col-span-1">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1">
                            <a class="" href="{{ route('home.index') }}" aria-current="page">
                                <button type="button" class="w-full py-3 px-6 inline-flex justify-center items-center rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    All
                                </button>
                            </a>
                        </div>
                        <div class="col-span-1">
                            <a class="" href="{{ route('admin.active-account') }}" aria-current="page">
                                <button type="button" class="w-full py-3 px-6 inline-flex justify-center items-center rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Active
                                </button>
                            </a>
                        </div>
                        <div class="col-span-1">
                            <a class="" href="{{ route('admin.suspended-account')}}" aria-current="page">
                                <button type="button" class="w-full py-3 px-6 inline-flex justify-center items-center rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Suspended
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-start-3 text-right">
                    <a class="" href="{{ route('admin.create-account') }}">
                        <button type="button" class="py-3 px-4 inline-flex justify-center items-center  rounded-md bg-green-100 border border-transparent font-semibold text-green-500 hover:text-white hover:bg-green-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Create Account
                        </button>
                    </a>
                </div>
            </div>
            <div class="border border-gray-200 p-2 rounded rounded-xl px-5 mb-2">

                <h1 class="text-5xl font-bold mt-7">Staff</h1>

                <div class="grid grid-cols-4 gap-6 py-7">
                    @foreach ($users as $user)
                        @if ($user->role === 'STAFF')
                            <div class="col-span-1">
                                <a href="{{ route('admin.show-account', ['id' => $user->id]) }}">
                                    <div class="border border-gray-200 shadow-md rounded rounded-xl px-3 py-3 hover:bg-gray-100 transition duration-300">
                                        <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

                @if (count($users->where('role', 'STAFF')) === 0)
                    <p class="text-gray-500">No Staff Available</p>
                @endif

                <hr class="mt-5">

                <h2 class="text-5xl font-bold mt-7">User</h2>

                <div class="grid grid-cols-4 gap-6 py-7">
                    @foreach ($users as $user)
                        @if ($user->role === 'USER')
                            <div class="col-span-1">
                                <a href="{{ route('admin.show-account', ['id' => $user->id]) }}">
                                    <div class="border border-gray-200 shadow-md rounded rounded-xl px-3 py-3 hover:bg-gray-100 transition duration-300">
                                        <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

                @if (count($users->where('role', 'USER')) === 0)
                    <p class="text-gray-500">No User Available</p>
                @endif
            </div>
        </div>
    </section>
@endsection
