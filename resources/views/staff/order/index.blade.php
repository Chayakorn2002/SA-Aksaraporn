@extends('layouts.main')

@section('content')
    <section>
        <div class="max-w-7xl mx-auto">
            <div class="border border-gray-200 rounded-xl p-5 shadow-md">
                <div class="flex flex-row border-b-2">
                    <nav class="flex space-x-6">
                        <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-black hover:text-blue-600 active" href="{{ route('staff.orders') }}" aria-current="page">
                            All
                        </a>
                        <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-black hover:text-blue-600" href="{{ route('staff.pending-orders') }}" aria-current="page">
                            Pending
                        </a>
                        <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-black hover:text-blue-600" href="{{ route('staff.confirmed-orders') }}" aria-current="page">
                            Confirmed
                        </a>
                        <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-black hover:text-blue-600" href="{{ route('staff.processing-orders') }}" aria-current="page">
                            Processing
                        </a>
                        <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-black hover:text-blue-600" href="{{ route('staff.completed-orders') }}" aria-current="page">
                            Completed
                        </a>
                    </nav>
                </div>
                <div class="flex flex-col">
                    <div class="my-3 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Order Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @if ($orders->count() > 0)
                                            @foreach ($orders as $order)
                                                <tr class="bg-white hover:bg-gray-50">
                                                    <td class="h-px w-px whitespace-nowrap">
                                                        <a class="block" href="{{ route('staff.show-each-order', ['id' => $order->id]) }}">
                                                            <div class="px-6 py-2">
                                                                <span class="whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $order->order_name }}</span>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td class="h-px w-px whitespace-nowrap">
                                                        <a class="block" href="{{ route('staff.show-each-order', ['id' => $order->id]) }}">
                                                            <div class="px-6 py-2">
                                                                <span class="whitespace-nowrap text-sm text-left font-medium text-gray-800 dark:text-gray-200">{{ $order->order_status }}</span>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td class="h-px w-px whitespace-nowrap text-right">
                                                        <a class="block" href="{{ route('staff.show-each-order', ['id' => $order->id]) }}">
                                                            <div class="px-6 py-2">
                                                                <span class="whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">฿ {{ number_format($order->total_price, 2) }}</span>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if  ($orders->count() <= 0)
                                <div class="max-w-5xl mx-auto p-2 min-h-[15rem] flex flex-col bg-white">
                                    <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                                        <svg class="max-w-[5rem]" viewBox="0 0 375 428" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M254.509 253.872L226.509 226.872" class="stroke-gray-400 dark:stroke-white" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                                            <path d="M237.219 54.3721C254.387 76.4666 264.609 104.226 264.609 134.372C264.609 206.445 206.182 264.872 134.109 264.872C62.0355 264.872 3.60864 206.445 3.60864 134.372C3.60864 62.2989 62.0355 3.87207 134.109 3.87207C160.463 3.87207 184.993 11.6844 205.509 25.1196" class="stroke-gray-400 dark:stroke-white" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                                            <rect x="270.524" y="221.872" width="137.404" height="73.2425" rx="36.6212" transform="rotate(40.8596 270.524 221.872)" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                            <ellipse cx="133.109" cy="404.372" rx="121.5" ry="23.5" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                            <path d="M111.608 188.872C120.959 177.043 141.18 171.616 156.608 188.872" class="stroke-gray-400 dark:stroke-white" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                                            <ellipse cx="96.6084" cy="116.872" rx="9" ry="12" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                            <ellipse cx="172.608" cy="117.872" rx="9" ry="12" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                            <path d="M194.339 147.588C189.547 148.866 189.114 142.999 189.728 138.038C189.918 136.501 191.738 135.958 192.749 137.131C196.12 141.047 199.165 146.301 194.339 147.588Z" class="fill-gray-400 dark:fill-white" fill="currentColor"/>
                                        </svg>
                                        <p class="mt-5 text-sm text-gray-500 dark:text-gray-500">
                                            No Orders Available
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
