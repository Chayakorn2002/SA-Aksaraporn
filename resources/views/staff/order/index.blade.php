@extends('layouts.main')

@section('content')
    <section>
        <div class="w-full max-w-4xl mx-10 p-2">
            <h2 class="text-4xl font-extrabold mb-4 py-8">Order Dashboard</h2>

            {{-- <div class="border-b-2 border-gray-200 dark:border-gray-700">
                <nav class="-mb-0.5 flex space-x-6">
                  <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 active" href="#" aria-current="page">
                    Tab 1
                  </a>
                  <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" href="#">
                    Tab 2
                  </a>
                  <a class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600" href="#">
                    Tab 3
                  </a>
                </nav>
              </div> --}}

            <div class="flex items-center w-full justify-between my-8 mx-1">
                <ul class="flex flex-row font-bold mt-0 mr-6 space-x-8 text-lg">
                    <li>
                        <a href="{{ route('staff.orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.pending-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Pending</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.confirmed-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Confirmed</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.processing-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Processing</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.completed-orders') }}" class="text-gray-900 hover:underline"
                            aria-current="page">Completed</a>
                    </li>
                </ul>
            </div>

            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($orders as $order)
                    <a href="{{ route('staff.show-each-order', ['id' => $order->id]) }}">
                        <div class="border border-gray-200 rounded shadow-md p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $order->order_name }}</h3>
                            <p class="text-sm text-gray-500">Order Status: {{ $order->order_status }}</p>
                            <p class="text-sm text-gray-500">Order Total: {{ number_format($order->total_price, 2) }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-500">No Orders Available</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
