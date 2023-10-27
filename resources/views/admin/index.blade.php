@extends('layouts.main')

@section('content')
<section>
    <div class="max-w-4xl mx-auto p-2">
        <h2 class="text-4xl font-extrabold mb-4 py-8">Admin: Progressing Events</h2>

        {{-- <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($users as $user)
            <!-- Event Card -->
            <a href=" {{ route('admin.show_event', ['event' => $event]) }} ">
                <div class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                    <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->description }}</p>
                    <div class="mt-4">
                        <span class="text-sm text-gray-600">Starts: {{ $event->start_at->format('M j, Y H:i A') }}</span>
                        <br>
                        <span class="text-sm text-gray-600">Ends: {{ $event->end_at->format('M j, Y H:i A') }}</span>
                    </div>
                </div>
            </a>
            @endforeach

            @if (count($users) === 0)
            <p class="text-gray-500">No Available User.</p>
            @endif
        </div> --}}

        <h2 class="text-2xl font-extrabold mb-4 py-8">Users with permission</h2>

        <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($users as $user)
            {{-- @if ($user->can_create_event) --}}
            <!-- User Card -->
            {{-- <a href=" {{ route('admin.show_user', ['user' => $user]) }} "> --}}
                <div class="border border-gray-200 rounded shadow-md p-4 hover:bg-gray-50 transition duration-300">
                    <h3 class="text-lg font-semibold mb-2">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            {{-- </a> --}}
            {{-- @endif --}}
            @endforeach

            {{-- @if (count($users->where('can_create_event', true)) === 0)
            <p class="text-gray-500">No users with permission to create events.</p>
            @endif --}}
        </div>

        <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <a href="{{ route('admin.create-account') }}" class="flex items-center justify-center bg-green-500 text-black rounded-lg p-4">
                {{-- <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg> --}}
                Create Account
            </a>

            {{-- <a href="{{ route('admin.revoke_permission') }}" class="flex items-center justify-center bg-red-400 text-white rounded-lg p-4">
                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                </svg>
                Revoke Permission
            </a> --}}

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center bg-slate-500 text-white rounded-lg p-4">
                @csrf
                <button type="submit">
                    <span class="sr-only">Logout</span>
                    Logout
                </button>
            </form>
        </div>

        {{-- @if (count($events) === 0)
        <p class="text-gray-500">No progressing events.</p>
        @endif --}}
</section>
@endsection