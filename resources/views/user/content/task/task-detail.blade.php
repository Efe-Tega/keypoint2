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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <title>Video Player</title>

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
                    <span class="text-gray-700">{{ $video->movie_title }}</span>
                </div>

                <div class="movie-summary">
                    <h1 class="font-semibold">Movie Summary</h1>
                    <span class="flex text-justify text-gray-700 text-sm md:text-lg">{{ $video->summary }}</span>
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
                            <span
                                class="text-end text-green-500 font-semibold text-lg">+{{ number_format($video->level->reward_amount, 2) }}
                                NGN</span>
                        </div>
                    </div>

                </div>
            </div>

            <x-popup-notification>Please complete the task before submitting!</x-popup-notification>

            <div class="task-button flex justify-between gap-5">
                <a href="{{ route('task.detail', ['id' => $video->id]) }}"
                    class="text-center bg-textSecondary text-white font-semibold px-4 py-2 w-1/2 rounded-tr-lg rounded-bl-lg">Watch
                    Later</a>
                <button data-task-id="{{ $video->id }}"
                    class="bg-primaryDark text-white font-semibold px-4 py-1 lg:py-2 text-sm lg:text-lg w-1/2 rounded-tr-lg rounded-bl-lg">Submit
                    Completed
                    Task</button>
            </div>
        </section>
    </main>

    @include('user.include.footer')

    <script src="{{ asset('backend/assets/js/video-script.js') }}"></script>

    <script>
        const button = document.querySelector('.task-button button:last-child');
        const taskId = button.getAttribute('data-task-id');

        button.addEventListener('click', function(e) {
            const currentTimeText = document.getElementById('current_video_time').innerText;
            const timeInSeconds = parseInt(currentTimeText);

            if (isNaN(timeInSeconds) || timeInSeconds < 10) {
                e.preventDefault();
                showPopup();
            } else {
                button.disabled = true;
                button.innerText = 'Submitting...';
                console.log("Task Submitted", taskId);
                submitTask(taskId);
            }
        });

        function showPopup() {
            document.getElementById('popup-notification').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup-notification').classList.add('hidden');
        }

        function submitTask(taskId) {
            fetch("/reward-task", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        task_id: taskId,
                    })
                }).then(response => response.json())
                .then(data => {
                    toastr.success('Task Completed!');

                    setTimeout(() => {
                        window.location.href = "{{ route('task') }}"
                    }, 2000);
                }).catch(error => {
                    console.error('Error: ', error);
                })
        }
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


</body>

</html>
