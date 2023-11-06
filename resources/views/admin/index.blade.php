@extends('layouts.main')

@section('content')
    {{-- <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Admin Dashboard</h2>

            <ul class="flex flex-row font-bold mt-0 mr-6 space-x-8 text-lg">
                <li>
                    <a href="{{ route('home.index') }}" class="text-gray-900 hover:underline"
                        aria-current="page">All</a>
                </li>
                <li>
                    <a href="{{ route('admin.active-account') }}" class="text-gray-900 hover:underline"
                        aria-current="page">Active</a>
                </li>
                <li>
                    <a href="{{ route('admin.suspended-account')}}" class="text-gray-900 hover:underline"
                        aria-current="page">Suspended</a>
                </li>
            </ul>

            <h2 class="text-2xl font-extrabold mb-4 py-8">User</h2>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($users as $user)
                    @if ($user->role === 'USER')
                        <a href=" {{ route('admin.show-account', ['id' => $user->id]) }} ">
                            <div
                                class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                                <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                <p>
                            </div>
                        </a>
                    @endif
                @endforeach

                @if (!$users)
                    <p class="text-gray-500">No User Available</p>
                @endif
            </div>

            <h2 class="text-2xl font-extrabold mb-4 py-8">Staff</h2>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($users as $user)
                    @if ($user->role === 'STAFF')
                        <a href=" {{ route('admin.show-account', ['id' => $user->id]) }} ">
                            <div
                                class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                                <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                <p>
                            </div>

                        </a>
                    @endif
                @endforeach

                @if (count($users->where('role', 'STAFF')) === 0)
                    <p class="text-gray-500">No Staff Available</p>
                @endif
            </div>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('admin.create-account') }}"
                    class="flex items-center justify-center bg-green-500 text-white rounded-lg p-4">
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>
                    Create Account
                </a>
            </div>

            @if (count($events) === 0)
        <p class="text-gray-500">No progressing events.</p>
        @endif
    </section> --}}


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
