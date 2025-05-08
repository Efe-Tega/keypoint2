@extends('user.user-main')

@section('title')
    {{ __('Task List') }}
@endsection

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
                @if ($pendingTask)
                    <div class="bg-purpleBg container mx-auto flex justify-between w-full p-4 gap-5">
                        <div class="w-3/4 space-y-1.5">
                            <div class="flex items-center justify-between bg-white/30 backdrop-blur-sm px-2 rounded ">
                                <span
                                    class="text-slate-50 font-bold text-sm lg:text-base">{{ $pendingTask->level->level }}</span>
                                <span class="text-slate-50 font-bold text-sm lg:text-base">Movie Video</span>
                            </div>

                            <div class="font-semibold text-slate-200">{{ $pendingTask->task->movie_title }}</div>

                            <div class="flex justify-between items-center">
                                <span class="text-white">Price</span>
                                <div class="text-white">
                                    <span class="text-xs">NGN</span>
                                    <span
                                        class="text-green-600 font-semibold text-lg">+{{ number_format($pendingTask->level->reward_amount, 2) }}</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-white text-xs lg:text-base">{{ $pendingTask->created_at }}</span>
                                <div class="text-white">
                                    <a href="{{ route('task.detail', $pendingTask->id) }}"
                                        class="bg-primaryDark px-3 py-1 rounded-lg text-sm lg:text-base">Submit</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/4 flex items-center justify-center">
                            <img src="{{ asset('backend/assets/thumnail/bond-26.jpg') }}" alt=""
                                class=" w-28 h-14 lg:w-36 lg:h-20">
                        </div>
                    </div>
                @elseif($video)
                    <div class="bg-purpleBg container mx-auto flex justify-between w-full p-4 gap-5">
                        <div class="w-3/4 space-y-1.5">
                            <div class="flex items-center justify-between bg-white/30 backdrop-blur-sm px-2 rounded ">
                                <span class="text-slate-50 font-bold text-sm lg:text-base">{{ $video->level->level }}</span>
                                <span class="text-slate-50 font-bold text-sm lg:text-base">Movie Video</span>
                            </div>

                            <div class="font-semibold text-slate-200">{{ $video->task->movie_title }}</div>

                            <div class="flex justify-between items-center">
                                <span class="text-white">Price</span>
                                <div class="text-white">
                                    <span class="text-xs">NGN</span>
                                    <span
                                        class="text-green-600 font-semibold text-lg">+{{ number_format($video->level->reward_amount, 2) }}</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-white text-xs lg:text-base">{{ $video->created_at }}</span>
                                <div class="text-white">
                                    <a href="{{ route('task.detail', $video->id) }}"
                                        class="bg-primaryDark px-3 py-1 rounded-lg text-sm lg:text-base">Submit</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/4 flex items-center justify-center">
                            <img src="{{ asset('backend/assets/thumnail/bond-26.jpg') }}" alt=""
                                class=" w-28 h-14 lg:w-36 lg:h-20">
                        </div>
                    </div>
                @endif
            </div>

            <!-- Watched History -->
            <div id="page2" class="section space-y-1">
                @foreach ($watchedVideos as $watched)
                    <div class="bg-purpleBg container mx-auto flex justify-between w-full p-4 gap-5">
                        <div class="w-3/4 space-y-1.5">
                            <div class="flex items-center justify-between bg-white/30 backdrop-blur-sm px-2 rounded ">
                                <span
                                    class="text-slate-50 font-bold text-sm lg:text-base">{{ $watched->video->level->level }}</span>
                                <span class="text-slate-50 font-bold text-sm lg:text-base">Movie Video</span>
                            </div>

                            <div class="font-semibold text-slate-200">{{ $watched->video->movie_title }}</div>

                            <div class="flex justify-between items-center">
                                <span class="text-white">Price</span>
                                <div class="text-white">
                                    <span class="text-xs">NGN</span>
                                    <span
                                        class="text-green-600 font-semibold text-lg">+{{ number_format($watched->video->level->reward_amount, 2) }}</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-white text-xs lg:text-base">Completion Time:
                                    {{ $watched->created_at }}</span>

                            </div>
                        </div>
                        <div class="w-1/4 flex items-center justify-center">
                            <img src="{{ $cloudfrontUrl . '/' . $watched->video->thumbnail }}" alt=""
                                class=" w-28 h-14 lg:w-36 lg:h-20">
                        </div>
                    </div>
                @endforeach

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
