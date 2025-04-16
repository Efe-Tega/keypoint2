@extends('user.user-main')
@section('user-content')
    <x-navigation>
        <x-slot:heading>Task List</x-slot:heading>
    </x-navigation>

    <section>
        <div class="flex bg-backgroundDark py-3 justify-around ">
            <button class="items-center text-base md:text-lg lg:text-xl text-white tab-btn active"
                onclick="showSection('page1', this, 'success')">
                Doing
            </button>
            <button class=" text-white tab-btn text-base md:text-lg lg:text-xl"
                onclick="showSection('page2', this, 'success')"> Success
            </button>
        </div>

        <div class="bg-black min-h-screen">
            <div id="page1" class="section active space-y-1">
                <div class="bg-purple container mx-auto flex justify-between w-full p-4 gap-5">
                    <div class="w-3/4 space-y-0 lg:space-y-1.5">
                        <div class="flex items-center justify-between bg-white/30 backdrop-blur-sm px-2 rounded ">
                            <span class="text-slate-50 font-bold text-sm lg:text-base">VIP2</span>
                            <span class="text-slate-50 font-bold text-sm lg:text-base">Movie Video</span>
                        </div>

                        <div class="font-semibold text-slate-200">Fortress</div>

                        <div class="flex justify-between items-center">
                            <span class="text-white">Price</span>
                            <div class="text-white">
                                <span class="text-xs">NGN</span>
                                <span class="text-green-600 font-semibold text-lg">+300.00</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-white text-xs lg:text-base">2025-04-10 10:22:17</span>
                            <div class="text-white">
                                <button class="bg-primaryDark px-3 py-1 rounded-lg text-sm lg:text-base">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/4 flex items-center justify-center">
                        <img src="{{ asset('backend/assets/thumnail/bond-26.jpg') }}" alt=""
                            class=" w-28 h-14 lg:w-36 lg:h-20">
                    </div>
                </div>
            </div>

            <div id="page2" class="section space-y-1">
                <div class="bg-purple container mx-auto flex justify-between w-full p-4 gap-5">
                    <div class="w-3/4 space-y-0 lg:space-y-1.5">
                        <div class="flex items-center justify-between bg-white/30 backdrop-blur-sm px-2 rounded ">
                            <span class="text-slate-50 font-bold text-sm lg:text-base">VIP2</span>
                            <span class="text-slate-50 font-bold text-sm lg:text-base">Movie Video</span>
                        </div>

                        <div class="font-semibold text-slate-200">Fortress</div>

                        <div class="flex justify-between items-center">
                            <span class="text-white">Price</span>
                            <div class="text-white">
                                <span class="text-xs">NGN</span>
                                <span class="text-green-600 font-semibold text-lg">+300.00</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-white text-xs lg:text-base">Completion Time: 2025-04-10 10:22:17</span>

                        </div>
                    </div>
                    <div class="w-1/4 flex items-center justify-center">
                        <img src="{{ asset('backend/assets/thumnail/bond-26.jpg') }}" alt=""
                            class=" w-28 h-14 lg:w-36 lg:h-20">
                    </div>
                </div>

                <div class="bg-purple container mx-auto flex justify-between w-full p-4 gap-5">
                    <div class="w-3/4 space-y-0 lg:space-y-1.5">
                        <div class="flex items-center justify-between bg-white/30 backdrop-blur-sm px-2 rounded ">
                            <span class="text-slate-50 font-bold text-sm lg:text-base">VIP2</span>
                            <span class="text-slate-50 font-bold text-sm lg:text-base">Movie Video</span>
                        </div>

                        <div class="font-semibold text-slate-200">Fortress</div>

                        <div class="flex justify-between items-center">
                            <span class="text-white">Price</span>
                            <div class="text-white">
                                <span class="text-xs">NGN</span>
                                <span class="text-green-600 font-semibold text-lg">+300.00</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-white text-xs lg:text-base">Completion Time: 2025-04-10 10:22:17</span>

                        </div>
                    </div>
                    <div class="w-1/4 flex items-center justify-center">
                        <img src="{{ asset('backend/assets/thumnail/bond-26.jpg') }}" alt=""
                            class=" w-28 h-14 lg:w-36 lg:h-20">
                    </div>
                </div>


                <div class="bg-purple container mx-auto flex justify-between w-full p-4 gap-5">
                    <div class="w-3/4 space-y-0 lg:space-y-1.5">
                        <div class="flex items-center justify-between bg-white/30 backdrop-blur-sm px-2 rounded ">
                            <span class="text-slate-50 font-bold text-sm lg:text-base">VIP2</span>
                            <span class="text-slate-50 font-bold text-sm lg:text-base">Movie Video</span>
                        </div>

                        <div class="font-semibold text-slate-200">Fortress</div>

                        <div class="flex justify-between items-center">
                            <span class="text-white">Price</span>
                            <div class="text-white">
                                <span class="text-xs">NGN</span>
                                <span class="text-green-600 font-semibold text-lg">+300.00</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-white text-xs lg:text-base">Completion Time: 2025-04-10 10:22:17</span>

                        </div>
                    </div>
                    <div class="w-1/4 flex items-center justify-center">
                        <img src="{{ asset('backend/assets/thumnail/bond-26.jpg') }}" alt=""
                            class=" w-28 h-14 lg:w-36 lg:h-20">
                    </div>
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
