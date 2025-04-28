@extends('user.user-main')
@section('user-content')
    <header class="bg-backgroundLight">
        <x-navigation>
            <x-slot:heading>Task List</x-slot:heading>
            <x-slot:headingRight></x-slot:headingRight>
        </x-navigation>
    </header>

    <section class="bg-primaryThinLight">
        <div class="container mx-auto px-4 flex justify-between justify-items-center py-4">
            <div class="w-1/2 text-center space-y-3">
                <span class="text-4xl">{{ $user->remaining_task }}</span>
                <p class="text-lg">Remaining Tasks Today</p>
            </div>
            <div class="w-1/2 text-center space-y-3">
                <span class="text-4xl">{{ $user->task_completed }}</span>
                <p class="text-lg">Task Completed Today</p>
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto px-4">
            @foreach ($videos->chunk(2) as $chunk)
                <div class="flex space-x-6 justify-between pt-10 last:mb-5 relative">
                    @foreach ($chunk as $video)
                        <div class="flex flex-col w-1/2">
                            <span
                                class="absolute top-4 bg-red-600 text-white px-2 rounded-t capitalize">{{ $video->level->level }}</span>

                            <!-- Image with play overlay -->
                            <div class="relative">
                                @if ($user->remaining_task === 0)
                                    <a onclick="showPopup()">
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

                            <x-popup-notification>No more daily Task</x-popup-notification>

                            <button class="bg-gray-400 mt-2">NGN +200.00</button>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>


    </section>
    <script>
        function showPopup() {
            document.getElementById('popup-notification').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup-notification').classList.add('hidden');
        }
    </script>
    </body>

    </html>
@endsection
