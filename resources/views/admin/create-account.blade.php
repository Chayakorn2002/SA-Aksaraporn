@extends('layouts.main')

@section('content')
<section>
    <div class="max-w-4xl mx-auto p-2">
        <h2 class="text-4xl font-extrabold mb-4 py-8">Admin: Progressing Events</h2>

        {{-- Replace this part with the "create account" view content --}}
        <div class="max-w-4xl mx-auto p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Create User or Staff Account</h2>

            <form method="POST" action="{{ route('admin.createAccount') }}">
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
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role" class="form-select rounded-md shadow-sm mt-1 block w-full">
                        <option value="user">User</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Create Account
                </button>
            </form>
        </div>
        {{-- End of "create account" view content --}}
    </div>
</section>
@endsection
