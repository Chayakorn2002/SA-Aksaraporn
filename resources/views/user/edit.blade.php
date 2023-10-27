@extends('layouts.main')

@section('content')
<section class="flex">
    <!-- content -->
    <div class="px-40 w-full">
        <form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 lg:gap-8 py-8">
                <div class="">
                    {{-- <div class="rounded-lg border-4 border-black h-64 w-64 shadow-xl">
                        <img class="rounded-lg inset-0 h-full w-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="">
                    </div> --}}
                    <div class="bg-black h-10 w-64 rounded-lg my-8 shadow-xl flex justify-center items-center">
                        <button class="bg-black h-10 w-64 rounded-lg my-8 shadow-xl flex justify-center items-center">
                            <span class="text-white">Save</span>
                        </button>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="flow-root">
                        <dl class="-my-3 divide-y divide-gray-100 text-sm">
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Name</dt>
                                <textarea class="w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="1" type="name" name="name" id="name" placeholder="{{ Auth::user()->name }}"></textarea>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Email</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ Auth::user()->email }}</dd>
                            </div>

                            {{-- <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Student Id</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ Auth::user()->studentID }}</dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Faculty</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ Auth::user()->faculty }}</dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">College Year</dt>
                                <dd class="text-gray-700 sm:col-span-2">{{ Auth::user()->college_year }}</dd>
                            </div> --}}

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Phone Number</dt>
                                <textarea class="w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="1" type="phone_number" name="phone_number" id="phone_number" placeholder="{{ Auth::user()->phone_number }}"></textarea>
                            </div>


                            <div class=" grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">Address</dt>
                                <textarea class="w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="1" type="address" name="address" id="address" placeholder="{{ Auth::user()->address }}"></textarea>
                            </div>

                            {{-- <div class=" grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                <dt class="font-medium text-gray-900">bio</dt>
                                <textarea class="w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="4" type="bio" name="bio" id="bio" placeholder="{{ Auth::user()->bio }}"></textarea>
                            </div> --}}
                        </dl>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>
@endsection