@extends('user.user-main')

@section('title')
    {{ __('Level System') }}
@endsection

@section('user-content')
    <x-navigation>
        <x-slot:heading>Level System</x-slot:heading>
    </x-navigation>

    <div class="bg-backgroundDark min-h-screen">
        <div class="space-y-4 sm:space-y-6 container mx-auto px-4 py-5">
            <!-- Level Cards -->
            <div class="grid grid-cols-1 gap-4 sm:gap-6">

                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: '{{ session('success') }}',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        });
                    </script>
                @endif

                @isset($levels[0])
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
                @endisset

                @isset($levels[1])
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
                                    @if ($user->level_id === 2)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        <button type="button" data-level-id="{{ $levels[1]->id }}"
                                            data-level-name="{{ $levels[1]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[1]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button>
                                    @endif
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
                                                {{ number_format($levels[1]->upgrade_amount, 2) }}
                                                <span class="text-sm">NGN</span>
                                            </p>
                                        </div>
                                        <i class="fas fa-arrow-up text-blue-400 text-sm sm:text-base"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($levels[2])
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
                                    @if ($user->level_id === 3)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        <button type="button" data-level-id="{{ $levels[2]->id }}"
                                            data-level-name="{{ $levels[2]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[2]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-indigo-400 text-white">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button>
                                    @endif
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
                @endisset

                @isset($levels[3])
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
                                    @if ($user->level_id === 4)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        <button type="button" data-level-id="{{ $levels[3]->id }}"
                                            data-level-name="{{ $levels[3]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[3]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button>
                                    @endif
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
                @endisset

                @isset($levels[4])
                    <!-- VIP4 Level -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden" onclick="showPopup()">
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
                                    @if ($user->level_id === 5)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        {{-- <button type="button" data-level-id="{{ $levels[4]->id }}"
                                            data-level-name="{{ $levels[4]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[4]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button> --}}
                                        <button type="button" onclick="showPopup()"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">Coming
                                            Soon</button>
                                    @endif
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
                @endisset

                @isset($levels[5])
                    <!-- VIP5 Level -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden" onclick="showPopup()">
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
                                    @if ($user->level_id === 6)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        {{-- <button type="button" data-level-id="{{ $levels[5]->id }}"
                                            data-level-name="{{ $levels[5]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[5]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button> --}}

                                        <button type="button" onclick="showPopup()"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">Coming
                                            Soon</button>
                                    @endif
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
                @endisset

                @isset($levels[6])
                    <!-- VIP6 Level -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden" onclick="showPopup()">
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
                                    @if ($user->level_id === 7)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        {{-- <button type="button" data-level-id="{{ $levels[6]->id }}"
                                            data-level-name="{{ $levels[6]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[6]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button> --}}

                                        <button type="button" onclick="showPopup()"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">Coming
                                            Soon</button>
                                    @endif
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
                @endisset

                @isset($levels[7])
                    <!-- VIP7 Level -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden" onclick="showPopup()">
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
                                    @if ($user->level_id === 8)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        {{-- <button type="button" data-level-id="{{ $levels[7]->id }}"
                                            data-level-name="{{ $levels[7]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[7]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button> --}}
                                    @endif
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
                @endisset

                @isset($levels[8])
                    <!-- VIP8 Level -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden" onclick="showPopup()">
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
                                    @if ($user->level_id === 9)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            Current Level
                                        </span>
                                    @else
                                        {{-- <button type="button" data-level-id="{{ $levels[8]->id }}"
                                            data-level-name="{{ $levels[8]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[8]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button> --}}
                                        <button type="button" onclick="showPopup()"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">Coming
                                            Soon</button>
                                    @endif
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
                @endisset

                @isset($levels[9])
                    <!-- Example for VIP9 (Supreme) -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden" onclick="showPopup()">
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
                                    @if ($user->level_id === 10)
                                        <span
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-yellow-400 text-white">
                                            Current Level
                                        </span>
                                    @else
                                        {{-- <button type="button" data-level-id="{{ $levels[9]->id }}"
                                            data-level-name="{{ $levels[9]->level }}"
                                            data-upgrade-amount ="{{ number_format($levels[9]->upgrade_amount) }}"
                                            onclick="openUpgradeModal(this)"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-yellow-400 text-white">
                                            <i class="fas fa-arrow-circle-up animate-up mr-1"></i>
                                            Join Now
                                        </button> --}}
                                        <button type="button" onclick="showPopup()"
                                            class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-blue-100 text-blue-800">Coming
                                            Soon</button>
                                    @endif
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
                @endisset

            </div>
        </div>
    </div>

    <!-- Popup Notification -->
    <div id="popup-notification" class="container mx-auto px-4 hidden">
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
                <div class="mb-1 text-sm">Coming Soon</div>
                <button onclick="closePopup()" class="mt-2 px-4 py-1 bg-primaryDark text-white rounded-sm">Ok</button>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="upgradeModal" class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg w-full max-w-md p-6">
            <h6 id="upgradeModalText" class="sm:text-sm md:text-xl font-semibold text-gray-800 mb-4 text-center">
                </h4>

                <form action="{{ route('upgrade.level') }}" method="POST">
                    @csrf

                    <input type="hidden" name="level_id" id="modalLevelId">

                    <div class="flex justify-center space-x-2 mt-5">
                        <button type="button" onclick="closeUpgradeModal()"
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Confirm</button>
                    </div>
                </form>
        </div>
    </div>

    <script>
        function openUpgradeModal(button) {
            const levelId = button.getAttribute('data-level-id');
            const levelName = button.getAttribute('data-level-name');
            const upgradeAmount = button.getAttribute('data-upgrade-amount');
            const modal = document.getElementById('upgradeModal');

            document.getElementById('modalLevelId').value = levelId;

            // Set modal text dynamically
            const modalText = `Are you sure you want to spend ${upgradeAmount} NGN to upgrade to ${levelName}?`;
            document.getElementById('upgradeModalText').textContent = modalText;

            modal.classList.remove('hidden');
            modal.classList.add('flex')
        }

        function closeUpgradeModal() {
            const modal = document.getElementById('upgradeModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        function showPopup() {
            document.getElementById('popup-notification').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup-notification').classList.add('hidden');
        }
    </script>
@endsection
