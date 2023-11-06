<header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full text-sm">
    <nav class="mt-6 relative max-w-7xl w-full bg-white border border-gray-200 rounded-[36px] mx-2 py-3 px-4 md:flex md:items-center md:justify-between md:py-0 md:px-6 lg:px-8 xl:mx-auto dark:bg-gray-800 dark:border-gray-700" aria-label="Global">
        <div class="h-fit w-full">
            <div class="p-2">
                <div class="flex item-center">

                    <!-- logo -->
                    <div class="flex w-2/3 items-center">
                        <a class="flex-none text-4xl font-semibold dark:text-white" href="{{ url('/') }}" aria-label="Brand">Aksaraporn</a>
                    </div>
                    

                    <!-- user -->
                    <div class="flex items-center w-1/3 justify-end">
                        <div class="">
                            @if (Route::has('login'))
                                <div class="flex items-center">
                                    @Auth
                                    <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
                                        @if (Auth::user()->role === 'USER')
                                            <div class="">
                                                <div class="flex items-center gap-x-5 md:my-5">
                                                    <a href="{{ route('order.show-cart') }}">
                                                        <svg class="w-5 h-5 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                                                        </svg>
                                                    </a>
                                                    
                                                    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="">
                                                        <svg class="w-5 h-5 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </button>
                                                    
                                                    <!-- Dropdown menu -->
                                                    <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                        <div class="px-5 py-3 text-sm text-gray-900 dark:text-white">
                                                            <div>{{ auth()->user()->name }}</div>
                                                            <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                                                        </div>
                                                        <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                                                            <li>
                                                                <a href="{{ route('user.profile') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('order.history') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Order</a>
                                                            </li>
                                                        </ul>
    
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <x-dropdown-link :href="route('logout')"
                                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                                <div class="">
                                                                <span href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</span>
                                                                </div>
                                                            </x-dropdown-link>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if (Auth::user()->role === 'STAFF')
                                            <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:items-center md:justify-end md:gap-y-0 md:gap-x-7 md:mt-0 md:pl-7">
                                                <a href="{{ route('staff.orders') }}" class="text-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Orders</a>
                                                <a href="{{ route('staff.products') }}" class="text-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Products</a>
                                                {{-- <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--trigger:hover] md:py-4"> --}}
                                                
                                                    <ul class="flex items-center gap-x-5 font-medium text-gray-500 hover:text-blue-600 md:border-l md:border-gray-300 md:my-6 md:pl-6 dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500">
                                                    
                                                        <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="">
                                                            <svg class="w-5 h-5 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                            </svg>
                                                        </button>
                                                        
                                                        <!-- Dropdown menu -->
                                                        <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                            <div class="px-5 py-3 text-sm text-gray-900 dark:text-white">
                                                                <div>{{ auth()->user()->name }}</div>
                                                                <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                                                            </div>
                                                            <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                                                                <li>
                                                                    <form method="POST" action="{{ route('logout') }}">
                                                                        @csrf
                                                                        <x-dropdown-link :href="route('logout')"
                                                                            onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                                            <div class="">
                                                                            <span href="#" class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</span>
                                                                            </div>
                                                                        </x-dropdown-link>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif

                                        @if (Auth::user()->role === 'ADMIN')
                                        <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:items-center md:justify-end md:gap-y-0 md:gap-x-7 md:mt-0 md:pl-7">
                                            {{-- <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--trigger:hover] md:py-4"> --}}
                                            
                                                <div class="flex items-center gap-x-5 font-medium text-gray-500 hover:text-blue-600 md:border-l md:border-gray-300 md:my-6 md:pl-6 dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500">
                                                
                                                    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="">
                                                        <svg class="w-5 h-5 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </button>
                                                    
                                                    <!-- Dropdown menu -->
                                                    <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                        <div class="px-5 py-3 text-sm text-gray-900 dark:text-white">
                                                            <div>{{ auth()->user()->name }}</div>
                                                            <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                                                        </div>
                                                        <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                                                            <li>
                                                                <form method="POST" action="{{ route('logout') }}">
                                                                    @csrf
                                                                    <x-dropdown-link :href="route('logout')"
                                                                        onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                                        <div class="">
                                                                        <span href="#" class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</span>
                                                                        </div>
                                                                    </x-dropdown-link>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                        {{-- <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">

                                                <div class="bg-black rounded-lg my-4">
                                                    <span class="text-white flex items-center justify-center h-10 w-24">Log
                                                        Out</span>
                                                </div>
                                            </x-dropdown-link>
                                        </form> --}}
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

                {{-- <div class="flex items-center w-full justify-between">
                    <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm"> --}}

                        {{-- Default --}}
                        {{-- @if (Auth::user()->role !== 'STAFF')
                            <li>
                                <a href="{{ url('/') }}" class="text-gray-900 hover:underline"
                                    aria-current="page">Home</a>
                            </li>
                        @endif --}}
                        {{-- Staff --}}

                        {{-- @if (Auth::user()->role === 'STAFF')
                            <li>
                                <a href="{{ route('staff.orders') }}" class="text-gray-900 hover:underline">Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('staff.products') }}" class="text-gray-900 hover:underline">Products</a>
                            </li>
                        @endif --}}

                        {{-- User --}}
                        {{-- @if (Auth::user()->role !== 'STAFF') 
                        <li>
                            <a href="{{ url('/') }}" class="text-gray-900 hover:underline" aria-current="page">Home</a>
                        </li>
                        @endif --}}
                        {{-- Staff --}}
                        {{-- @if (Auth::user()->role === 'USER')
                            <li>
                                <a href="{{ route('order.show-cart') }}" class="text-gray-900 hover:underline">Cart</a>
                            </li>

                            <li>
                                <a href="{{ route('order.history') }}" class="text-gray-900 hover:underline">Orders</a>
                            </li>

                            <li>
                                <a href="{{ route('user.profile') }}" class="text-gray-900 hover:underline">Profile</a>
                            </li>
                            
                        @endif --}}

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
</header>