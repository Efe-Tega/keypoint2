<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/player.css') }}" />
    <title>Video Player</title>
    <!-- S-Tech04 -->
    <!-- www.youtube.com/c/STech04 -->
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">
    <main class="flex-grow">
        <x-navigation>
            <x-slot:heading>Task Details</x-slot:heading>
        </x-navigation>

        <section>
            <div class="video_container">
                <div class="video_player ">
                    <video preload="metadata" class="main-video" id="challengeVideo" playsinline webkit-playsinline
                        poster="{{ $cloudfrontUrl . '/' . $video->thumbnail }}">
                        <source src="{{ $cloudfrontUrl . '/' . $video->video_url }}" type="video/mp4" />
                    </video>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 py-8">
            <div class="mb-8 space-y-4">
                <div class="movie-title">
                    <h1 class="font-semibold">Movie Title</h1>
                    <span class="text-gray-700">Bond 25</span>
                </div>

                <div class="movie-summary">
                    <h1 class="font-semibold">Movie Summary</h1>
                    <span class="flex text-justify text-gray-700 text-sm md:text-lg">25 years after a streak
                        of
                        brutal murders
                        shocked the
                        quiet town of
                        Woodsboro, Calif, a new killer dons the Ghostface mask and begins targeting a group of teenagers
                        to resurrect secrets from the town's deadly past.</span>
                </div>

                <div class="task-requirement">
                    <h1 class="font-semibold">Task Requirements</h1>

                    <div class="flex justify-between items-center">
                        <div id="watch-time" class="">
                            <p class="text-gray-700 text-sm md:text-lg">Watch 10 seconds</p>
                            <p class="text-gray-700 text-sm md:text-lg">Watch Time:
                                <span id="current_video_time">0 seconds</span>
                            </p>
                        </div>

                        <div id="reward" class="flex flex-col ">
                            <h2 class="text-end text-sm font-semibold">Reward Amount</h2>
                            <span class="text-end text-green-500 font-semibold text-lg">+300.00 NGN</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Popup Notification -->
            <div id="popup-notification" class="container mx-auto px-4 hidden">
                <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
                        <p class="text-red-600 font-semibold mb-4">Please complete the task before submitting!</p>
                        <button onclick="closePopup()"
                            class="mt-2 px-4 py-2 bg-primaryDark text-white rounded-md">Okay</button>
                    </div>
                </div>
            </div>


            <div class="task-button flex justify-between gap-5">
                <button
                    class="bg-textSecondary text-white font-semibold px-4 py-2 w-1/2 rounded-tr-lg rounded-bl-lg">Watch
                    Later</button>
                <button
                    class="bg-primaryDark text-white font-semibold px-4 py-1 lg:py-2 text-sm lg:text-lg w-1/2 rounded-tr-lg rounded-bl-lg">Submit
                    Completed
                    Task</button>
            </div>
        </section>
    </main>

    @include('user.include.footer')

    <script src="{{ asset('backend/assets/js/video-script.js') }}"></script>

    <script>
        document.querySelector('.task-button button:last-child').addEventListener('click', function(e) {
            const currentTimeText = document.getElementById('current_video_time').innerText;
            const timeInSeconds = parseInt(currentTimeText);

            if (isNaN(timeInSeconds) || timeInSeconds < 10) {
                e.preventDefault();
                showPopup();
            } else {
                // Proceed with form submission or any action
                console.log("Task submitted!");
            }
        });

        function showPopup() {
            document.getElementById('popup-notification').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup-notification').classList.add('hidden');
        }
    </script>

</body>

</html>
