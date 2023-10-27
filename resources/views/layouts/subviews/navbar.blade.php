<nav class="bg-white px-40">
    <div class="h-fit w-full">
        <div class="pt-4">
            <div class="flex item-center">

                <!-- logo -->
                <div class="flex w-2/3 items-center">
                    <span class="font-semibold text-4xl pr-4">Aksaraporn</span>
                </div>

                <!-- user -->
                <div class="flex items-center w-1/3 justify-end">
                    <div class="">
                        @if (Route::has('login'))
                            <div class="flex items-center">
                                @Auth
                                    <a href="{{ route('user.index') }}">
                                        <div class="max-w-4xl mx-auto p-2">
                                            <div class="font-bold m-4 text-lg">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                        {{-- <div class="bg-gray-400 rounded-lg h-10 w-10 mx-4 shadow-xl">
                                    <img class="rounded-lg border-2 border-black inset-0 h-full w-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="">
                                </div> --}}
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">

                                            <div class="bg-black rounded-lg my-4">
                                                <span class="text-white flex items-center justify-center h-10 w-24">Log
                                                    Out</span>
                                            </div>
                                        </x-dropdown-link>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="px-4">Log in</a>

                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="bg-black rounded-lg p-3 text-white">Sign
                                            Up!</a>
                                    @endif --}}
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full justify-between">
                <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">

                    {{-- Default --}}
                    @if (Auth::user()->role !== 'STAFF') 
                    <li>
                        <a href="{{ url('/') }}" class="text-gray-900 hover:underline" aria-current="page">Home</a>
                    </li>
                    @endif
                    {{-- Staff --}}
                    @if (Auth::user()->role === 'STAFF')
                        <li>
                            <a href="{{ route('staff.orders') }}" class="text-gray-900 hover:underline">Orders</a>
                        </li>
                        <li>
                            <a href="{{ route('staff.products') }}" class="text-gray-900 hover:underline">Products</a>
                        </li>
                    @endif

                    {{-- <li>
                        <a href="{{ route('events.index') }}" class="text-gray-900 hover:underline">All Events</a>
                    </li>
                    @Auth
                    @if (Auth::user()->can_create_event)
                    <li>
                        <a href="{{ route('events.my_events') }}" class="text-gray-900 hover:underline">
                            My Events
                        </a>
                    </li>
                    @endif

                    <li>
                        <a href="{{ route('events.user_events') }}" class="text-gray-900 hover:underline">Attended
                            Events
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('staff.staffEvents') }}" class="text-gray-900 hover:underline">
                            Staff
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" class="text-gray-900 hover:underline">Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('certifications.show') }}" class="text-gray-900 hover:underline">Certification</a>
                    </li>
                    @endauth --}}
                </ul>
                <div class="flex">
                    @Auth
                        <div class="">
                            {{-- <span class=" font-semibold">{{ Auth::user()->name }}</span> --}}
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
