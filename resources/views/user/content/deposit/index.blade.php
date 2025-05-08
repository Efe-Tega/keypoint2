@extends('user.user-main')
@section('user-content')
    <header class="bg-backgroundLight">
        <nav class="p-4 container mx-auto">
            <!-- flex container -->
            <div class="flex justify-between items-center">
                <span onclick="window.history.back()" class="cursor-pointer">
                    <img src="{{ asset('backend/assets/svg/arrow-left.svg') }}" alt="" class="w-4 h-4 md:w-7 md:h-7" />
                </span>

                <div>
                    <img src="{{ asset('backend/assets/logo.png') }}" alt="" class="w-36 h-10 lg:w-52 lg:h-14 " />
                </div>

                <!-- menu items -->
                <a href="" class="font-semibold text-sm lg:text-lg"> </a>
            </div>
        </nav>
    </header>

    <section>
        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'warning',
                        text: '{{ session('error') }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif

        <div class="container mx-auto px-4 mb-10">
            <!-- Balance info -->
            <div class="py-6 flex justify-between items-center">
                <div class="font-semibold md:text-2xl text-sm">Available Balance</div>
                <div class="text-3xl text-green-600 font-bold">{{ number_format($wallet->com_wallet, 2) }}
                    <span class="text-sm"> NGN</span>
                </div>
            </div>
            <p class="text-sm mb-3">Please select a recharge method below</p>

            <!-- Payment Method -->
            <a href="{{ route('recharge.details') }}">
                <div
                    class="flex items-center justify-between gap-4 text-gray-700 text-sm font-medium bg-gray-200 mb-3 px-2 py-2 rounded-tl-lg rounded-tr-lg">
                    <div class="flex gap-1.5 items-center">
                        <img src="{{ asset('backend/assets/svg/bank.svg') }}" alt=""
                            class="w-10 h-10 p-2 rounded-full bg-white" />
                        <div class="flex flex-col items-start gap-2">
                            <span class="font-bold">365Pay</span>
                            <span class="text-sm">Minimum amount 1,000NGN, Maximum amount 5,000,000NGN</span>
                        </div>
                    </div>

                    <div class="">
                        <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-5 h-5" />
                    </div>
                </div>
            </a>

            <div
                class="flex items-center justify-between gap-4 text-gray-700 text-sm font-medium bg-gray-200 mb-3 px-2 py-2">
                <div class="flex gap-1.5 items-center">
                    <img src="{{ asset('backend/assets/svg/bank.svg') }}" alt=""
                        class="w-10 h-10 p-2 rounded-full bg-white" />
                    <div class="flex flex-col items-start gap-2">
                        <span class="font-bold">365Pay</span>
                        <span class="text-sm">Minimum amount 1,000NGN, Maximum amount 5,000,000NGN</span>
                    </div>
                </div>

                <div class="">
                    <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-5 h-5" />
                </div>
            </div>

            <div
                class="flex items-center justify-between gap-4 text-gray-700 text-sm font-medium bg-gray-200 mb-3 px-2 py-2">
                <div class="flex gap-1.5 items-center">
                    <img src="{{ asset('backend/assets/svg/bank.svg') }}" alt=""
                        class="w-10 h-10 p-2 rounded-full bg-white" />
                    <div class="flex flex-col items-start gap-2">
                        <span class="font-bold">365Pay</span>
                        <span class="text-sm">Minimum amount 1,000NGN, Maximum amount 5,000,000NGN</span>
                    </div>
                </div>

                <div class="">
                    <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-5 h-5" />
                </div>
            </div>

            <div
                class="flex items-center justify-between gap-4 text-gray-700 text-sm font-medium bg-gray-200 mb-3 px-2 py-2">
                <div class="flex gap-1.5 items-center">
                    <img src="{{ asset('backend/assets/svg/bank.svg') }}" alt=""
                        class="w-10 h-10 p-2 rounded-full bg-white" />
                    <div class="flex flex-col items-start gap-2">
                        <span class="font-bold">365Pay</span>
                        <span class="text-sm">Minimum amount 1,000NGN, Maximum amount 5,000,000NGN</span>
                    </div>
                </div>

                <div class="">
                    <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-5 h-5" />
                </div>
            </div>
        </div>
    </section>
@endsection
