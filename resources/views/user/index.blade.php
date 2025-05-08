@extends('user.user-main')

@section('title')
    {{ __('Home Page') }}
@endsection

@section('user-content')
    @include('user.include.header')

    <section class="container mx-auto px-4 py-2.5 lg:py-8">
        <div class="slider">
            <div><img src="{{ asset('backend/assets/banner/meeting-banner.jpg') }}" alt="" class="rounded-xl"></div>
            <div><img src="{{ asset('backend/assets/banner/about15.jpg') }}" alt="" class="rounded-xl"></div>
            <div><img src="{{ asset('backend/assets/banner/banner2.png') }}" alt="" class="rounded-xl"></div>
        </div>
    </section>

    <section class="container mx-auto px-4 py-2.5 lg:py-8">
        <div class="px-4 py-6 rounded-lg bg-white">
            <div class="grid grid-cols-4 gap-10">
                <a href="{{ route('recharge') }}">
                    <div class="flex flex-col items-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/coinbag.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Recharge</span>
                    </div>
                </a>

                <a href="{{ route('withdraw') }}">
                    <div class="flex flex-col items-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/wallet.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Withdraw</span>
                    </div>
                </a>

                <a href="">
                    <div class="flex flex-col items-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/coinstack.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Fund</span>
                    </div>
                </a>

                <a href="">
                    <div class="flex flex-col items-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/calender.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Calender</span>
                    </div>
                </a>

                <a href="">
                    <div class="flex flex-col items-center text-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/company.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Company Profile</span>
                    </div>
                </a>

                <a href="">
                    <div class="flex flex-col items-center text-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/book.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Help Manual</span>
                    </div>
                </a>

                <a href="">
                    <div class="flex flex-col items-center text-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/message.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Message Notification</span>
                    </div>
                </a>

                <a href="{{ route('user.invite') }}">
                    <div class="flex flex-col items-center text-center space-y-1.5">
                        <div class="bg-backgroundLight p-3 rounded-lg hover:-translate-y-0.5 transition-all duration-300">
                            <img src="{{ asset('backend/assets/svg/gift.svg') }}" alt=""
                                class="w-7 h-7 lg:w-10 lg:h-10" />
                        </div>
                        <span class="text-sm lg:text-lg">Invitation Rewards</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Task Hall -->
    <section id="task-hall" class="container px-4 mx-auto py-2.5 lg:py-8">
        <div class="px-4  bg-white py-3 rounded-lg">
            <h1 class="text-2xl font-semibold">Task Hall</h1>

            <!-- Tasks -->
            @include('user.include.tasks-grid')

            @foreach ($videos->chunk(2) as $chunk)
                <div class="flex space-x-6 justify-between pt-10 last:mb-5 relative">
                    @foreach ($chunk as $video)
                        <div class="flex flex-col w-1/2">
                            <span
                                class="absolute top-4 bg-red-600 text-white px-2 rounded-t capitalize">{{ $video->level->level }}</span>

                            <!-- Image with play overlay -->
                            <div class="relative">
                                @if ($user->remaining_task === 0 && $user->level_id === 1)
                                    <a onclick="levelPopup()">
                                        <img src="{{ asset('https://d2qdns14jj6ua6.cloudfront.net/' . $video->thumbnail) }}"
                                            class="w-full h-28 md:h-48 lg:h-64" alt="Thumbnail" />

                                        <!-- Play Icon -->
                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 cursor-pointer">
                                            <div class="bg-white p-2 lg:p-4 rounded-full">
                                                <svg class="w-5 h-5 lg:w-10 lg:h-10 text-gray-800" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($user->remaining_task === 0)
                                    <a onclick="showDailyPopup()">
                                        <img src="{{ asset('https://d2qdns14jj6ua6.cloudfront.net/' . $video->thumbnail) }}"
                                            class="w-full h-28 md:h-48 lg:h-64" alt="Thumbnail" />

                                        <!-- Play Icon -->
                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 cursor-pointer">
                                            <div class="bg-white p-2 lg:p-4 rounded-full">
                                                <svg class="w-5 h-5 lg:w-10 lg:h-10 text-gray-800" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('task.detail', ['id' => $video->id]) }}">
                                        <img src="{{ asset('https://d2qdns14jj6ua6.cloudfront.net/' . $video->thumbnail) }}"
                                            class="w-full h-28 md:h-48 lg:h-64" alt="Thumbnail" />

                                        <!-- Play Icon -->
                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 cursor-pointer">
                                            <div class="bg-white p-2 lg:p-4 rounded-full">
                                                <svg class="w-5 h-5 lg:w-10 lg:h-10 text-gray-800" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>

                            <button class="bg-gray-400 mt-2 text-white font-semibold">NGN
                                +{{ number_format($video->level->reward_amount, 2) }}</button>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <!-- Level Popup Notification -->
            <div id="levelpopup-notification" class="container mx-auto px-4 hidden">
                <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
                        <div class="mb-1 text-sm">You must be a VIP member to continue receiving task</div>
                        <button onclick="closeLevelPopup()"
                            class="mt-2 px-4 py-1 bg-primaryDark text-white rounded-sm">Confirm</button>
                    </div>
                </div>
            </div>

            <!-- Daily Popup Notification -->
            <div id="dailypopup-notification" class="container mx-auto px-4 hidden">
                <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
                        <div class="mb-1 text-sm">No more task for the day</div>
                        <button onclick="closeDailyPopup()"
                            class="mt-2 px-4 py-1 bg-primaryDark text-white rounded-sm">Confirm</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @php
        $newMembers = App\Models\MembershipList::all();
    @endphp

    <!-- Membership List -->
    <section class="bg-white container mx-auto px-4 mt-8">
        <div class="">
            <h1 class="text-2xl font-semibold py-3">Membership List</h1>

            <div class="w-full overflow-hidden">
                <div class="scroll-container">
                    <div id="scroll-content" class="scroll-content">
                        @foreach ($newMembers as $member)
                            <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-1"
                                style="height: 70px">
                                <div class="flex gap-1.5 items-center">
                                    <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                        class="w-14 h-14 rounded-full" />
                                    <div class="flex flex-col items-start gap-2">
                                        <span class="text-xs sm:text-sm md:text-base">Congratulations:
                                            {{ substr($member->phone, 0, 2) . '*******' . substr($member->phone, -2) }}
                                        </span>
                                        <span class="text-xs sm:text-sm md:text-base">Income this week</span>
                                    </div>
                                </div>

                                <div class="text-green-500 font-semibold text-xs sm:text-sm md:text-base">
                                    {{ $member->amount }} NGN
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="{{ asset('backend/assets/js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Slick JS from CDN (Load after jQuery) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('.slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000
        });
    });
</script>

<script>
    function levelPopup() {
        document.getElementById('levelpopup-notification').classList.remove('hidden');
    }

    function showDailyPopup() {
        document.getElementById('dailypopup-notification').classList.remove('hidden');
    }

    function closeLevelPopup() {
        document.getElementById('levelpopup-notification').classList.add('hidden');
    }

    function closeDailyPopup() {
        document.getElementById('dailypopup-notification').classList.add('hidden');
    }
</script>
