@extends('user.user-main')
@section('user-content')
    <header class="bg-backgroundLight">
        <nav class="p-4 container mx-auto">
            <!-- flex container -->
            <div class="flex justify-between items-center">
                <span onclick="window.history.back()" class="cursor-pointer">
                    <img src="{{ asset('backend/assets/svg/arrow-left.svg') }}" alt="" class="w-4 h-4 md:w-7 md:h-7" />
                </span>

                <span class="font-bold md:text-lg lg:text-3xl">Withdrawal</span>

                <!-- menu items -->
                <a href="{{ route('user.wallet') }}" class="font-semibold text-sm lg:text-lg">Withdraw Records</a>
            </div>
        </nav>
    </header>

    <section class="">
        <form action="/home" method="post">
            <div class="container mx-auto px-4 py-8">

                <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0 bg-white/20 backdrop-blur-sm px-5 py-8 rounded-xl">
                    <div class="w-full">
                        <label for="" class="font-medium text-sm text-white">
                            Withdrawal Method
                        </label>

                        <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                            <select name="" id=""
                                class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600">
                                <option value="" disabled selected class="text-sm">
                                    -- Select Withdraw --
                                </option>
                                <option value="" class="text-sm">Opay</option>
                                <option value="" class="text-sm">PalmPay</option>
                                <option value="" class="text-sm">Moniepoint</option>
                                <option value="" class="text-sm">Kuda</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="" class="font-medium text-sm text-white">
                            Withdrawal Wallet
                        </label>

                        <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                            <select name="" id=""
                                class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600">

                                <option value="" class="text-xs md:text-sm lg:text-base">Main Wallet [0.00]</option>
                                <option value="" class="text-xs md:text-sm lg:text-base">Commission Wallet [0.00]
                                </option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-backgroundDark">
                <div class="flex  py-3 justify-around container mx-auto px-4 ">
                    <h1 class="text-white">Current wallet balance NGN 200, you can only withdraw 1 time daily</h1>
                </div>
            </div>

            <div class="container mx-auto px-4 py-8 bg-white/20 backdrop-blur-sm ">
                <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                    <div class="w-full">
                        <label for="" class="font-medium text-white text-sm">
                            Withdrawal Amount
                        </label>
                        <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                            <input type="text" name="" id="amountInput" placeholder="Select withdraw amount below"
                                readonly
                                class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-backgroundDark py-1"></div>

            <div class="grid grid-cols-4 bg-white/20 backdrop-blur-sm ">
                <x-tile data-amount="10">10</x-tile>
                <x-tile data-amount="100">100</x-tile>
                <x-tile data-amount="500">500</x-tile>
                <x-tile data-amount="1000">1000</x-tile>
                <x-tile data-amount="30000">30000</x-tile>
                <x-tile data-amount="50000">50000</x-tile>
                <x-tile data-amount="120000">120000</x-tile>
                <x-tile data-amount="1000000" class="text-sm">1000000</x-tile>
            </div>

            <div class="container mx-auto px-4 py-8">
                <button type="submit"
                    class="inline-flex items-center justify-center w-full px-4 py-2 mt-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                    Submit
                </button>
            </div>
        </form>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const amountInput = document.getElementById("amountInput");
            const amountBoxes = document.querySelectorAll(".amount-box");

            // Format function
            const formatAmount = (amount) => {
                return new Intl.NumberFormat('en-NG').format(amount);
            };

            amountBoxes.forEach(box => {
                box.addEventListener("click", function() {
                    // const amount = this.dataset.amount;
                    // amountInput.value = `${amount} NGN`;

                    // === With Number format ===
                    const rawAmount = this.dataset.amount;
                    const formattedAmount = `${formatAmount(rawAmount)} NGN`;
                    amountInput.value = formattedAmount;
                });
            });

        });
    </script>
@endsection
