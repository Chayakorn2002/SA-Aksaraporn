@extends('layouts.main')

@section('content')
    {{-- <section>
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Admin: Progressing Events</h2>

            <div class="max-w-4xl mx-auto p-2">
                <h2 class="text-4xl font-extrabold mb-4 py-8">Create User or Staff Account</h2>

                <form method="POST" action="{{ route('admin.create-account') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="string" name="phone_number" id="phone_number" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="string" name="address" id="address" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" id="role" class="form-select rounded-md shadow-sm mt-1 block w-full">
                            <option value="user">User</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>

                    

                    <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Create Account
                    </button>
                </form>
            </div>
        </div>
    </section> --}}

    <section>
        <div class="max-w-3xl mx-auto p-2 border border-gray-200 rounded rounded-xl">
            <div class="mx-4 mt-3">
                <h1 class="text-lg font-semibold">Create User or Staff Account</h1>
                <form method="POST" action="{{ route('admin.create-account') }}">
                    @csrf
                    <div class="grid grid-cols-3">

                        <div class="col-span-1 my-4">
                            <label for="name" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Name</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="text" name="name" id="name" class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"/>
                        </div>


                        <div class="col-span-1 my-4">
                            <label for="email" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Email</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="email" name="email" id="email" class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"/>
                        </div>


                        <div class="col-span-1 my-4">
                            <label for="phone_number" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Phone Number</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="string" name="phone_number" id="phone_number" class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"/>
                        </div>


                        <div class="col-span-1 my-4">
                            <label for="address" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Address</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="string" name="address" id="address" class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"/>
                        </div>


                        <div class="col-span-1 my-4">
                            <label for="role" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Role</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <select name="role" id="role" class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                <option value="user">User</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>


                        <div class="col-span-1 my-4">
                            <label for="password" class="inline-block text-sm font-medium text-gray-500 mt-2.5">Password</label>
                        </div>
                        <div class="col-span-2 my-4">
                            <input type="password" name="password" id="password" class="form-input py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"/>
                        </div>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600 mb-2">
                        Create Account
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection