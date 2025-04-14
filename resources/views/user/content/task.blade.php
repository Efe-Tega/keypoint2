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
                <span class="text-4xl">0</span>
                <p class="text-lg">Remaining Tasks Today</p>
            </div>
            <div class="w-1/2 text-center space-y-3">
                <span class="text-4xl">0</span>
                <p class="text-lg">Remaining Tasks Today</p>
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto px-4">
            <div class="flex space-x-6 justify-between py-10 relative">
                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">Internship</span>
                    <video class="w-full h-auto" controls poster="{{ asset('backend/assets/img/playimage.png') }}">
                        <source src="{{ asset('backend/assets/video/story-teller.mp4') }}" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>

                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">VIP</span>

                    <!-- Image with play overlay -->
                    <div class="relative">
                        <a href="{{ url('/task-detail') }}">
                            <img src="{{ asset('backend/assets/thumnail/bond-26.jpg') }}" class="w-full h-auto"
                                alt="Thumbnail" />

                            <!-- Play Icon -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 cursor-pointer"
                                id="playButton1">
                                <div class="bg-white p-2 lg:p-4 rounded-full">
                                    <svg class="w-5 h-5 lg:w-10 lg:h-10 text-gray-800" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>

                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>
            </div>

            {{-- <div class="flex space-x-6 justify-between py-10 relative">
                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">Internship</span>
                    <video class="w-full h-auto" controls poster="{{ asset('backend/assets/img/playimage.png') }}">
                        <source src="{{ asset('backend/assets/video/story-teller.mp4') }}" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>

                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">VIP</span>
                    <div class="relative">
                        <video class="w-full h-auto" controls poster="{{ asset('backend/assets/thumnail/bond-26.jpg') }}"
                            id="video1">
                            <source src="{{ asset('backend/assets/video/bond26.mp4') }}" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>

                        <!-- Play Icon -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 cursor-pointer"
                            id="playButton1">
                            <div class="bg-white p-2 lg:p-4 rounded-full">
                                <svg class="w-5 h-5 lg:w-10 lg:h-10 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>
            </div>

            <div class="flex space-x-6 justify-between py-10 relative">
                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">Internship</span>
                    <video class="w-full h-auto" controls poster="{{ asset('backend/assets/img/playimage.png') }}">
                        <source src="{{ asset('backend/assets/video/story-teller.mp4') }}" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>

                <div class="flex flex-col w-1/2">
                    <span class="absolute top-4 bg-red-600 text-white px-2 rounded-t">VIP</span>
                    <div class="relative">
                        <video class="w-full h-auto" controls poster="{{ asset('backend/assets/thumnail/bond-26.jpg') }}"
                            id="video1">
                            <source src="{{ asset('backend/assets/video/bond26.mp4') }}" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>

                        <!-- Play Icon -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 cursor-pointer"
                            id="playButton1">
                            <div class="bg-white p-2 lg:p-4 rounded-full">
                                <svg class="w-5 h-5 lg:w-10 lg:h-10 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <button class="bg-gray-400 mt-2">NGN +200.00</button>
                </div>
            </div> --}}
        </div>
    </section>

    <!-- JavaScript to Play Video on Click -->
    {{-- <script>
        document
            .getElementById("playButton1")
            .addEventListener("click", function() {
                const url = this.dataset.url;
                window.location.href = url;
            });
    </script> --}}
    </body>

    </html>
@endsection
