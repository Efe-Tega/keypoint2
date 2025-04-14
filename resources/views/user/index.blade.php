@extends('user.user-main')

@section('user-content')
    @include('user.include.header')

    <section class="container mx-auto px-4 py-5 lg:py-8">
        {{-- <div class="container px-4 mx-auto">
            <div class="">
                <img src="{{ asset('backend/assets/banner/about15.jpg') }}" class="w-full rounded-lg h-48 md:h-56 lg:h-96"
                    alt="" />
            </div>
        </div> --}}

        <div class="slider">
            <div><img src="{{ asset('backend/assets/banner/meeting-banner.jpg') }}" alt="" class="rounded-xl"></div>
            <div><img src="{{ asset('backend/assets/banner/about15.jpg') }}" alt="" class="rounded-xl"></div>
            <div><img src="{{ asset('backend/assets/banner/banner2.png') }}" alt="" class="rounded-xl"></div>
        </div>

    </section>

    <section class="py-5 lg:py-16">
        <div class="container mx-auto px-4">
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

                <a href="">
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

                <a href="">
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
    <section id="task-hall" class="py-10">
        <div class="text-center border-t-2 border-b-2 border-primaryLight py-5 bg-backgroundLight">
            <h1 class="text-2xl font-semibold">Task Hall</h1>
        </div>

        <div class="container px-4 mx-auto">
            <!-- Tasks -->
            <div class="grid grid-cols-4 py-8 gap-8 justify-items-center">
                <button
                    class="rounded w-full md:w-32 lg:w-48 col-span-2 md:col-span-1 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    Internship
                </button>

                <a href="{{ route('task') }}"
                    class="flex flex-row justify-center items-center gap-2 rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-backgroundLight font-semibold shadow-md shadow-primaryDark/30">
                    <span>VIP1</span>
                    <img src="{{ asset('backend/assets/svg/lock.svg') }}" alt="" class="w-3.5 h-3.5" />
                </a>
                <button
                    class="rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP2
                </button>
                <button
                    class="rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP3
                </button>
                <button
                    class="rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP4
                </button>
                <button
                    class="rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP5
                </button>
                <button
                    class="rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP6
                </button>
                <button
                    class="rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP7
                </button>

                <button
                    class="rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP8
                </button>

                <button
                    class="rounded w-full md:w-32 lg:w-48 col-span-2 md:col-span-1 py-2 bg-gradient-to-tr from-primaryLight to-primaryDark text-white font-semibold">
                    VIP9
                </button>
            </div>

            <div class="flex space-x-6 justify-between py-10 relative">
                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">Internship</span>
                    <img src="{{ asset('backend/assets/img/playimage.png') }}" alt="" class="w-50 h-50" />
                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>

                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">VIP</span>
                    <img src="{{ asset('backend/assets/img/playimage.png') }}" alt="" class="w-50 h-50" />
                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership List -->
    <section class="pt-10">
        <div class="text-center border-t-2 border-b-2 border-primaryLight py-5 bg-backgroundLight">
            <h1 class="text-2xl font-semibold">Membership List</h1>
        </div>

        <div class="container mx-auto px-4 pt-2">
            <div class="w-full overflow-hidden">
                <div class="scroll-container">
                    <div id="scroll-content" class="scroll-content">
                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>

                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-200 rounded-2xl mb-3 px-2"
                            style="height: 70px">
                            <div class="flex gap-1.5 items-center">
                                <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                                    class="w-14 h-14 rounded-full" />
                                <div class="flex flex-col items-start gap-2">
                                    <span>Congratulations: 07******68</span>
                                    <span>Income this week</span>
                                </div>
                            </div>

                            <div class="text-green-500 font-semibold">44938.00 NGN</div>
                        </div>
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
