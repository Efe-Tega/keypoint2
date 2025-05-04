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
                    <span class="font-bold md:text-lg lg:text-3xl">Recharge</span>
                </div>

                <!-- menu items -->
                <a href="{{ route('user.wallet') }}" class="font-semibold"> Recharge Records </a>
            </div>
        </nav>
    </header>

    <section class="py-10">
        <div class="container mx-auto px-4">
            <form action="{{ route('payment.initiate') }}" method="POST">
                @csrf

                <div class="flex flex-col lg:flex-row gap-4 justify-between">
                    <div class="lg:w-1/2">
                        <label for="" class="text-base font-medium text-gray-900">
                            Recharge Amount
                        </label>
                        <div class="mt-2.5 text-gray-400 focus-within:text-gray-600">
                            <input type="text" name="amount" id="" placeholder="Enter recharge amount"
                                class="w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                        </div>
                    </div>

                    <div class="lg:w-1/2">
                        <label for="" class="text-base font-medium text-gray-900">
                            Recharge Channel
                        </label>
                        <div class="mt-2.5 text-gray-400 focus-within:text-gray-600">
                            <select
                                class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600">
                                <option value="" disabled>Select Recharge Option</option>
                                <option value="">Bank</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex max-w-lg mx-auto gap-4 mt-10 items-center justify-center">
                    <button type="submit"
                        class="bg-primaryDark px-4 py-2 w-1/2 text-white font-semibold rounded-tl-lg rounded-br-lg hover:bg-gradient-to-tl hover:from-primaryLight hover:to-primaryDark transition duration-300 ease-in-out hover:-translate-y-1">
                        Recharge
                    </button>
                    <a href=""
                        class="w-1/2 px-4 py-2 font-semibold bg-backgroundLight border border-primaryLight rounded-tr-lg rounded-bl-lg hover:bg-gray-200 transition duration-300 ease-in-out hover:-translate-y-1">
                        Back
                    </a>
                </div>
            </form>

            <!-- Payment Instructions -->
            <div class="py-16 px-4">
                <ol class="list-decimal space-y-2">
                    <li>
                        Please make the payment according to the last account number
                        obtained
                    </li>
                    <li>
                        The payment validity period is 8 minutes. If the payment is made
                        after 8 minutes, the financial account will become invalid
                    </li>
                    <li>
                        If the recharge request exceeds 8 minutes, please obtain the
                        latest account number again to make the payment.
                    </li>
                    <li>
                        Fill in the amount you need to recharge, and the amount you
                        transfer for payment must be fixed.
                    </li>
                </ol>
            </div>
        </div>
    </section>
@endsection
