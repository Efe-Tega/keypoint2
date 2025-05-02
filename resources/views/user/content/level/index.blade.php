@extends('user.user-main')
@section('user-content')
    <x-navigation>
        <x-slot:heading>Level System</x-slot:heading>
    </x-navigation>

    <div class="bg-backgroundDark min-h-screen">
        <div class="space-y-4 sm:space-y-6 container mx-auto px-4 py-5">
            <!-- Level Cards -->
            <div class="grid grid-cols-1 gap-4 sm:gap-6">

                <!-- Internship Level -->
                <div class="bg-white rounded-lg sm:rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-300 to-gray-400 px-3 sm:px-6 py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <div
                                    class="w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-user-graduate text-lg sm:text-2xl text-gray-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-base sm:text-xl font-bold text-gray-800">{{ $levels[0]->level }}</h3>
                                    <p class="text-xs sm:text-sm text-gray-600">Starting Level</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-gray-100 text-gray-800">
                                    {{ $user->level_id == 1 ? 'Current Level' : 'Starter' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 sm:px-6 py-3 sm:py-4">
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4">
                            <div class="p-2 sm:p-4 rounded-lg bg-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-base sm:text-2xl font-bold text-gray-900">
                                            {{ $levels[0]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-gray-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[0]->reward_amount, 2) }} NGN</p>
                                    </div>

                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Daily Earnings</p>
                                        @php
                                            $daily_earn = $levels[0]->reward_amount * $levels[0]->daily_task;
                                        @endphp
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ $daily_earn }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-coins text-gray-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-gray-200 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ $levels[0]->upgrade_amount == 0 ? 'Free' : '' }}</p>
                                    </div>
                                    <i class="fas fa-arrow-up text-gray-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIP1 Level -->
                <div class="bg-white rounded-lg sm:rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-300 to-indigo-400 px-3 sm:px-6 py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <div
                                    class="w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-lg sm:text-2xl text-blue-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-base sm:text-xl font-bold text-gray-800">{{ $levels[1]->level }}</h3>
                                    {{-- <p class="text-xs sm:text-sm text-gray-600">Bronze Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a href=""
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 sm:px-6 py-3 sm:py-4">
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4">
                            <div class="p-2 sm:p-4 rounded-lg bg-blue-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-base sm:text-2xl font-bold text-gray-900">
                                            {{ $levels[1]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-blue-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-blue-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[1]->reward_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-blue-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-blue-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @php
                                            $daily_earn1 = $levels[1]->daily_task * $levels[1]->reward_amount;
                                        @endphp
                                        <p class="text-xs sm:text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn1) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-coins text-blue-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-blue-200 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-blue-600">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[1]->upgrade_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-arrow-up text-blue-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIP2 Level (Current) -->
                <div class="bg-white rounded-lg sm:rounded-xl shadow-lg overflow-hidden ring-2 ring-indigo-500">
                    <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 px-3 sm:px-6 py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <div
                                    class="w-8 h-8 sm:w-12 sm:h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-lg sm:text-2xl text-indigo-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-base sm:text-xl font-bold text-white">{{ $levels[2]->level }}</h3>
                                    {{-- <p class="text-xs sm:text-sm text-indigo-100">Current Level</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-indigo-400 text-white">
                                    Current
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 sm:px-6 py-3 sm:py-4">
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4">
                            <div class="p-2 sm:p-4 rounded-lg bg-indigo-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-base sm:text-2xl font-bold text-gray-900">
                                            {{ $levels[2]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-indigo-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-indigo-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[2]->reward_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-indigo-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-indigo-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @php
                                            $daily_earn2 = $levels[2]->daily_task * $levels[2]->reward_amount;
                                        @endphp
                                        <p class="text-xs sm:text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn2) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-coins text-indigo-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                            <div class="p-2 sm:p-4 rounded-lg bg-indigo-100 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-indigo-600">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[2]->upgrade_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-arrow-up text-indigo-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more levels with increasing values -->
                <!-- VIP3 Level -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-300 to-pink-400 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-2xl text-purple-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $levels[3]->level }}</h3>
                                    {{-- <p class="text-sm text-gray-600">Silver Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a href=""
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $levels[3]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[3]->reward_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @php
                                            $daily_earn3 = $levels[3]->daily_task * $levels[3]->reward_amount;
                                        @endphp
                                        <p class="text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn3) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-coins text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-purple-600">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[3]->upgrade_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-arrow-up text-purple-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIP4 Level -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-creamPlum px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-2xl text-plum"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $levels[4]->level }}</h3>
                                    {{-- <p class="text-sm text-gray-600">Silver Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a href=""
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $levels[4]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[4]->reward_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @php
                                            $daily_earn4 = $levels[4]->daily_task * $levels[4]->reward_amount;
                                        @endphp
                                        <p class="text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn4) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-coins text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-purple-600">Upgrade Amount</p>
                                        <p class="text-base sm:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[4]->upgrade_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-arrow-up text-purple-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIP5 Level -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-softSky px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-2xl text-sky"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $levels[5]->level }}</h3>
                                    {{-- <p class="text-sm text-gray-600">Silver Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a href=""
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $levels[5]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[5]->reward_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @php
                                            $daily_earn5 = $levels[4]->daily_task * $levels[4]->reward_amount;
                                        @endphp
                                        <p class="text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn5) }} <span class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-coins text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-purple-600">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[5]->upgrade_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-arrow-up text-purple-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIP6 Level -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-peachBrick px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-2xl text-brick"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $levels[6]->level }}</h3>
                                    {{-- <p class="text-sm text-gray-600">Silver Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a href=""
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $levels[6]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[6]->reward_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @php
                                            $daily_earn6 = $levels[6]->daily_task * $levels[6]->reward_amount;
                                        @endphp
                                        <p class="text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn6) }} <span class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-coins text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-purple-600">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[6]->upgrade_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-arrow-up text-purple-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIP7 Level -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-lilacDeepViolet px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-2xl text-deepViolet"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $levels[7]->level }}</h3>
                                    {{-- <p class="text-sm text-gray-600">Silver Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a href=""
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $levels[7]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[7]->reward_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>

                                        @php
                                            $daily_earn7 = $levels[7]->daily_task * $levels[7]->reward_amount;
                                        @endphp
                                        <p class="text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn7) }} <span class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-coins text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-purple-600">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[7]->upgrade_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-arrow-up text-purple-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VIP8 Level -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-frostIceblue px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-star text-2xl text-iceBlue"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $levels[8]->level }}</h3>
                                    {{-- <p class="text-sm text-gray-600">Silver Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a href=""
                                    class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $levels[8]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[8]->reward_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        @php
                                            $daily_earn8 = $levels[8]->daily_task * $levels[8]->reward_amount;
                                        @endphp
                                        <p class="text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn8) }} <span class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-coins text-purple-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-purple-100 upgrade-section">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-purple-600">Upgrade Amount</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[8]->upgrade_amount) }} <span
                                                class="text-sm">NGN</span></p>
                                    </div>
                                    <i class="fas fa-arrow-up text-purple-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Continue with VIP4-VIP9 with similar structure but increasing values -->
                <!-- Example for VIP9 (Supreme) -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-300 to-amber-500 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white shadow-inner">
                                    <i class="fas fa-crown text-2xl text-yellow-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-700">{{ $levels[9]->level }}</h3>
                                    {{-- <p class="text-sm text-gray-500">Supreme Membership</p> --}}
                                </div>
                            </div>
                            <div class="text-right">
                                <a
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-400 text-white">
                                    <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="p-4 rounded-lg bg-yellow-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Daily Tasks</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ $levels[9]->daily_task }}</p>
                                    </div>
                                    <i class="fas fa-tasks text-yellow-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-yellow-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Per Task</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-gray-900">
                                            {{ number_format($levels[9]->reward_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-dollar-sign text-yellow-500"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-yellow-100">
                                <div class="flex items-center justify-between">
                                    <div>

                                        @php
                                            $daily_earn9 = $levels[9]->daily_task * $levels[9]->reward_amount;
                                        @endphp
                                        <p class="text-sm text-gray-500">Daily Earnings</p>
                                        <p class="text-base md:text-lg lg:text-2xl font-bold text-green-600">
                                            {{ number_format($daily_earn9) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-coins text-yellow-400"></i>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg bg-yellow-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs sm:text-sm text-yellow-600">Maximum Level</p>
                                        <p class="text-base sm:text-2xl font-bold text-yellow-900">
                                            {{ number_format($levels[9]->upgrade_amount) }}
                                            <span class="text-sm">NGN</span>
                                        </p>
                                    </div>
                                    <i class="fas fa-crown text-yellow-400 text-sm sm:text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
