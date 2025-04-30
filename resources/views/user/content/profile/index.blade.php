@extends('user.user-main')
@section('user-content')
    <header class="bg-backgroundLight">
        <nav class="p-4 container mx-auto">
            <!-- flex container -->
            <div class="flex justify-between items-center">
                <span onclick="window.history.back()" class="cursor-pointer">
                    <img src="{{ asset('backend/assets/svg/arrow-left.svg') }}" alt="" class="w-4 h-4 md:w-7 md:h-7" />
                </span>

                <span class="font-bold md:text-lg lg:text-3xl">User Center</span>

                <!-- menu items -->
                <a href="{{ route('user.wallet') }}" class="font-semibold text-sm lg:text-lg flex gap-2 items-center">
                    <img src="{{ asset('backend/assets/svg/purseColor.svg') }}" alt="" class="w-6 h-6">
                    <span>My Purse</span>
                </a>
            </div>
        </nav>
    </header>


    <section id="breadcrumb" class="py-6 bg-primaryThinLight">
        <div class="flex justify-between container mx-auto px-4 items-center gap-4">
            <div class="flex gap-2 lg:gap-3 items-center">
                <div class="border border-primaryDark p-1 rounded-full">
                    <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                        class="w-7 h-7 lg:w-10 lg:h-10 rounded-full" />
                </div>

                <div class="space-y-1">
                    <p class="text-sm lg:text-lg font-semibold">
                        Account: {{ $user->phone }}
                    </p>
                    <p class="text-xs lg:text-sm">Actual Sign-in Bonus: 200.00</p>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('backend/assets/svg/calendar-check.svg') }}" alt="" class="w-7 h-7" />
                <p class="text-xs lg:text-sm font-semibold">Daily Sign-in</p>
            </div>
        </div>
    </section>

    <section class="py-10 container mx-auto px-4">
        <div
            class="flex justify-between py-5 rounded-t-2xl shadow-[0px_-1px_10px_rgba(9,187,254,0.9),0px_2px_6px_rgba(0,0,0,0.1)] border border-slate-100">
            <div class="flex flex-col items-center border-r-2 w-1/3">
                <p class="text-sm lg:text-lg">Balance(NGN)</p>
                <p class="text-green-500 font-semibold">200.00</p>
            </div>

            <div class="flex flex-col items-center border-r-2 w-1/3">
                <p class="text-sm lg:text-lg">Deposit(NGN)</p>
                <p class="text-green-500 font-semibold">200.00</p>
            </div>

            <div class="flex flex-col items-center w-1/3">
                <p class="text-sm lg:text-lg">Current Level</p>
                <p class="text-primaryDark font-bold">Internship</p>
            </div>
        </div>

        <!-- Earning Activities -->

        <div
            class="grid grid-cols-3 mt-8 shadow-[0px_-1px_10px_rgba(9,187,254,0.9),0px_2px_6px_rgba(0,0,0,0.1)] rounded-b-2xl">
            <div class="flex flex-col border-r-2 border-b-2 py-3 text-center gap-2">
                <p class="text-xs md:text-sm lg:text-lg">
                    Yesterday's Earnings(NGN)
                </p>
                <p class="text-green-500 font-semibold">200.00</p>
            </div>

            <div class="flex flex-col py-3 text-center border-r-2 border-b-2 gap-2">
                <p class="text-xs md:text-sm lg:text-lg">Today's Earnings(NGN)</p>
                <p class="text-green-500 font-semibold">0.00</p>
            </div>

            <div class="flex flex-col text-center py-3 border-b-2 gap-2">
                <p class="text-xs md:text-sm lg:text-lg">
                    This Week's Earnings(NGN)
                </p>
                <p class="text-green-500 font-semibold">400.00</p>
            </div>

            <div class="flex flex-col border-r-2 border-b-2 py-3 text-center gap-2">
                <p class="text-xs md:text-sm lg:text-lg">
                    This Month's Earnings(NGN)
                </p>
                <p class="text-green-500 font-semibold">400.00</p>
            </div>

            <div class="flex flex-col py-3 text-center border-r-2 border-b-2 gap-2">
                <p class="text-xs md:text-sm lg:text-lg">Total Earnings(NGN)</p>
                <p class="text-green-500 font-semibold">400.00</p>
            </div>

            <div class="flex flex-col text-center py-3 border-b-2 gap-2">
                <p class="text-xs md:text-sm lg:text-lg">Total Completed</p>
                <p class="text-green-500 font-semibold">{{ $user->task_completed }}</p>
            </div>

            <div class="flex flex-col text-center py-3 border-r-2">
                <p class="text-xs md:text-sm lg:text-lg">Today Remaining</p>
                <p class="text-green-500 font-semibold">{{ $user->remaining_task }}</p>
            </div>
            <div class="flex flex-col text-center py-3 border-r-2">
                <p class="text-xs md:text-sm lg:text-lg">Task Rewards(NGN)</p>
                <p class="text-green-500 font-semibold">0.00</p>
            </div>
            <div class="flex flex-col text-center py-3">
                <p class="text-xs md:text-sm lg:text-lg">Referral Rewards</p>
                <p class="text-green-500 font-semibold">0.00</p>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('personal.info') }}" class="block w-full h-full">
                    <div
                        class="flex w-full justify-between items-center border border-primaryDark p-3 rounded-2xl hover:bg-backgroundLight hover:translate-x-2 transition duration-300 ease-in-out">

                        <div class="flex gap-3 items-center w-full h-full">
                            <img src="{{ asset('backend/assets/svg/user-square.svg') }}" alt="" class="w-6 h-6" />

                            <p>Personal Information</p>
                        </div>


                        <div class="">
                            <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-4 h-4" />
                        </div>
                    </div>
                </a>

                <a href="{{ route('daily.report') }}" class="block w-full h-full">
                    <div
                        class="flex w-full justify-between items-center border border-primaryDark p-3 rounded-2xl hover:bg-backgroundLight hover:translate-x-2 transition duration-300 ease-in-out">
                        <div class="flex gap-3 items-center">
                            <span>
                                <img src="{{ asset('backend/assets/svg/profit-bar.svg') }}" alt=""
                                    class="w-6 h-6" />
                            </span>
                            <p>Daily Report</p>
                        </div>

                        <div>
                            <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-4 h-4" />
                        </div>
                    </div>
                </a>

                <a href="{{ route('account.change') }}">
                    <div
                        class="flex w-full justify-between items-center border border-primaryDark p-3 rounded-2xl hover:bg-backgroundLight hover:translate-x-2 transition duration-300 ease-in-out">
                        <div class="flex gap-3 items-center">
                            <span>
                                <img src="{{ asset('backend/assets/svg/report.svg') }}" alt="" class="w-7 h-7" />
                            </span>
                            <p>Account Change Record</p>
                        </div>

                        <div>
                            <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt=""
                                class="w-4 h-4" />
                        </div>
                    </div>
                </a>

                <div
                    class="flex w-full justify-between items-center border border-primaryDark p-3 rounded-2xl hover:bg-backgroundLight hover:translate-x-2 transition duration-300 ease-in-out">
                    <div class="flex gap-3 items-center">
                        <span>
                            <img src="{{ asset('backend/assets/svg/share.svg') }}" alt="" class="w-7 h-7" />
                        </span>
                        <p>Invite Friends</p>
                    </div>

                    <div>
                        <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-4 h-4" />
                    </div>
                </div>

                <div
                    class="flex w-full justify-between items-center border border-primaryDark p-3 rounded-2xl hover:bg-backgroundLight hover:translate-x-2 transition duration-300 ease-in-out">
                    <div class="flex gap-3 items-center">
                        <span>
                            <img src="{{ asset('backend/assets/svg/bar-chart.svg') }}" alt="" class="w-7 h-7" />
                        </span>
                        <p>Team Report</p>
                    </div>

                    <div>
                        <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-4 h-4" />
                    </div>
                </div>

                <div
                    class="flex w-full justify-between items-center border border-primaryDark p-3 rounded-2xl hover:bg-backgroundLight hover:translate-x-2 transition duration-300 ease-in-out">
                    <div class="flex gap-3 items-center">
                        <span>
                            <img src="{{ asset('backend/assets/svg/question.svg') }}" alt="" class="w-7 h-7" />
                        </span>
                        <p>Frequently Asked Questions</p>
                    </div>

                    <div>
                        <img src="{{ asset('backend/assets/svg/arrow-right.svg') }}" alt="" class="w-4 h-4" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
