<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/player.css') }}"> --}}

    <!-- Include Slick CSS from CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Toaster --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        .slick-slide {
            height: 250px;
        }

        .slick-next,
        .slick-prev {
            display: none !important;
        }

        .slick-slide img {
            height: 100%;
            width: 100%;
            object-fit: cover
        }

        .scroll-container {
            height: 20.5rem;
            overflow: hidden;
            position: relative;
        }

        .scroll-content {
            transition: transform 0.8s ease-in-out;
            display: flex;
            flex-direction: column;
        }

        .section {
            display: none;
        }

        .active {
            display: block;
        }

        .tab-btn {
            display: inline-block;
        }

        .tab-btn.active {
            border-bottom: 2px solid purple;
            /* You can change the color to fit your design */
        }

        /* Large screens (1024px and up) */
        @media (min-width: 600px) {
            .slick-slide {
                height: 400px;
            }
        }

        @media (min-width: 1024px) {
            .slick-slide {
                height: 500px;
            }
        }

        @keyframes upDown {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-3px);
            }
        }

        .animate-up {
            animation: upDown 3s ease-in-out infinite;
        }
    </style>
</head>

@php
    $routeName = Route::currentRouteName();
    $backgroundColor = '';
    $backgroundImage = '';

    if (in_array($routeName, ['daily.report', 'personal.info', 'account.change', 'user.wallet', 'withdraw'])) {
        $backgroundImage = asset('backend/assets/bg/bg-2.jpg');
    } else {
        $backgroundColor = '#f1f5f9';
    }
@endphp

<body class="flex flex-col min-h-screen"
    style="background-color: {{ $backgroundColor }}; background-image: url('{{ $backgroundImage }}'); background-size: cover; ">
    <main class="flex-grow">
        @yield('user-content')
    </main>

    <!-- Footer -->
    @include('user.include.footer')

    <script>
        const bgImage = new Image();
        bgImage.src = "{{ $backgroundImage }}"
        bgImage.onload = function() {
            document.body.style.backgroundImage = 'url(' + bgImage.src + ')';
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
