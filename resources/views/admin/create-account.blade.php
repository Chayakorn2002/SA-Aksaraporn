@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-3xl mx-auto p-2 border border-gray-200 rounded rounded-xl">
            <div class="mx-4 mt-3">
                <h1 class="text-lg font-semibold">Create User or Staff Account</h1>

                @if (session('success'))
                    <div class="alert alert-success bg-green-200 text-green-700 p-4 mb-4 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.create-account') }}">
                    @csrf
                    <div class="grid grid-cols-3">

                        <div class="col-span-1 my-4">
                            <label for="name" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Name</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="text" name="name" id="name"
                                class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" />
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-1 my-4">
                            <label for="email"
                                class="inline-block text-sm font-medium text-gray-500 mt-2.5">Email</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="email" name="email" id="email"
                                class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" />
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-1 my-4">
                            <label for="phone_number" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Phone
                                Number</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="text" name="phone_number" id="phone_number"
                                class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" />
                            @error('phone_number')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-1 my-4">
                            <label for="address"
                                class="inline-block text-sm font-medium text-gray-500 mt-2.5">Address</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="text" name="address" id="address"
                                class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" />
                            @error('address')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-1 my-4">
                            <label for="role" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Role</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <select name="role" id="role"
                                class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                <option value="user">User</option>
                                <option value="staff">Staff</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-1 my-4">
                            <label for="password"
                                class="inline-block text-sm font-medium text-gray-500 mt-2.5">Password</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="password" name="password" id="password"
                                class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" />
                            @error('password')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600 mb-2">
                        Create Account
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
