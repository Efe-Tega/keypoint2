@extends('user.user-main')
@section('user-content')
    <header class="bg-backgroundLight">
        <nav class="p-4 container mx-auto">
            <!-- flex container -->
            <div class="flex justify-between items-center">
                <span onclick="window.history.back()" class="cursor-pointer">
                    <img src="{{ asset('backend/assets/svg/arrow-left.svg') }}" alt="" class="w-4 h-4 md:w-7 md:h-7" />
                </span>

                <span class="font-bold md:text-lg lg:text-3xl">My Wallet</span>

                <!-- menu items -->
                <div class="">
                    <span>
                        <a href="{{ route('recharge') }}" class="font-semibold text-sm lg:text-lg">Recharge</a> |
                    </span>
                    <span>
                        <a href="{{ route('withdraw') }}" class="font-semibold text-sm lg:text-lg">Withdraw</a>
                    </span>
                </div>
            </div>
        </nav>
    </header>

    <section class="py-5 container mx-auto px-4">
        <div
            class="grid grid-cols-2 lg:grid-cols-3 border rounded-lg gap-4 justify-items-center px-4 py-6 shadow-[0px_-1px_10px_rgba(9,187,254,0.9),0px_2px_6px_rgba(0,0,0,0.1)] bg-white/20 backdrop-blur-sm ">
            <div class="flex items-center flex-col col-span-1 md:col-span-2 lg:col-span-1">
                <div class="text-white">Account Balance</div>
                <div class="text-lg md:text-2xl text-green-400 font-semibold">{{ number_format($wallet->acct_bal, 2) }}
                    <span class="text-sm font-bold text-green-600 ">NGN</span>
                </div>
            </div>
            <div class="flex flex-col items-center ">
                <div class="text-white">Main Wallet</div>
                <div class="text-lg md:text-2xl text-green-400 font-semibold">0.00
                    <span class="text-sm font-bold text-green-600 ">NGN</span>
                </div>
            </div>

            <div class="flex flex-col items-center mt-3 md:mt-0 col-span-2 md:col-span-1">
                <div class="text-white">Commission Wallet</div>
                <div class="text-lg md:text-2xl text-green-400 font-semibold">0.00
                    <span class="text-sm font-bold text-green-600 ">NGN</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex bg-backgroundDark py-3 justify-around ">
            <button class="items-center text-white tab-btn active" onclick="showSection('page1', this)">
                Recharge Record
            </button>
            <button class=" text-white tab-btn" onclick="showSection('page2', this)"> Withdraw Record
            </button>
        </div>

        <div class="bg-white/10 backdrop-blur-sm min-h-screen py-5">
            <div class="container mx-auto px-4">
                <div id="page1" class="section active">
                    @foreach ($transactions as $transaction)
                        <div class="flex bg-white/40 backdrop-blur-sm justify-between p-1.5 gap-3 mb-3">

                            <div class="flex space-x-1 justify-center items-center">
                                <div class="bg-purpleBg text-white rounded-full px-2 text-lg">+</div>
                                <div class="space-y-1">
                                    <div id="tranId" class="text-xs">{{ $transaction->trans_id }}</div>
                                    @if ($transaction->status === 'paid')
                                        <div id="amount" class="text-base font-semibold text-green-800">
                                            {{ number_format($transaction->amount) }} NGN</div>
                                    @else
                                        <div id="amount" class="text-base font-semibold text-red-800">
                                            {{ number_format($transaction->amount) }} NGN</div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex flex-col items-end">
                                <div id="date" class="text-xs">{{ $transaction->created_at }}</div>
                                @if ($transaction->status === 'paid')
                                    <div id="status" class="text-base font-semibold text-green-900">Successful</div>
                                @else
                                    <div id="status" class="text-base font-semibold text-red-900">Recharge Failed</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="page2" class="section">
                    <h2 class="text-white"">Page 2 Content</h2>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function showSection(id, button, headingText) {
        document
            .querySelectorAll(".section")
            .forEach((el) => el.classList.remove("active"));
        document.getElementById(id).classList.add("active");

        // Remove 'active' class from both buttons
        document.querySelectorAll(".tab-btn").forEach((btn) => btn.classList.remove("active"));

        // Add 'active' class to the clicked button
        button.classList.add("active");
    }
</script>
