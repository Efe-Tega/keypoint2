<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>View Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @vite('resources/css/app.css')

    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        .modal.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>

<body class="bg-navy flex flex-col min-h-screen font-sans text-gray-100">
    <main class="flex-grow">
        <!-- Header -->
        <header class="bg-navyLight shadow-lg border-b border-gray-800 sticky top-0 z-50">
            <div class="max-w-4xl mx-auto px-4">
                <div class="flex items-center h-16">
                    <button onclick="window.history.back()"
                        class="text-gray-400 hover:text-white transition-colors p-2 -ml-2">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </button>
                    <h1 class="text-xl font-medium text-white flex-1 text-center">Messages</h1>
                    <!-- Desktop Actions -->
                    <div class="hidden md:flex items-center space-x-2">
                        <button onclick="markAllAsRead()"
                            class="text-sm text-gray-300 hover:text-white bg-navy px-3 py-1.5 rounded-lg transition-colors">
                            <i class="fas fa-check-double mr-1"></i>Mark All Read
                        </button>
                        <button
                            class="text-sm text-red-400 hover:text-red-300 bg-navy px-3 py-1.5 rounded-lg transition-colors">
                            <i class="fas fa-trash-alt mr-1"></i>Clear All
                        </button>
                    </div>
                    <!-- Mobile Actions Dropdown -->
                    <div class="md:hidden relative">
                        <button onclick="toggleMobileMenu()" class="text-gray-400 hover:text-white p-2">
                            <i class="fas fa-ellipsis-v text-lg"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="mobileMenu"
                            class="absolute right-0 mt-2 w-48 bg-navyLight rounded-lg shadow-xl border border-gray-700 hidden">
                            <div class="py-1">
                                <button onclick="markAllAsRead(); hideMobileMenu()"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-navy hover:text-white transition-colors flex items-center">
                                    <i class="fas fa-check-double w-5"></i>
                                    <span>Mark All Read</span>
                                </button>
                                <button onclick="showClearConfirm(); hideMobileMenu()"
                                    class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-navy hover:text-red-300 transition-colors flex items-center">
                                    <i class="fas fa-trash-alt w-5"></i>
                                    <span>Clear All</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Message List -->

        <section class="max-w-4xl mx-auto px-4 py-6">
            @if (isset($messages) && $messages->isNotEmpty())
                <div id="messageList" class="bg-navyLight rounded-xl shadow-xl overflow-hidden">
                    <ul class="divide-y divide-gray-800">
                        @foreach ($messages as $message)
                            <li class="group hover:bg-navy/50 transition-colors">
                                <button onclick="showMessage(this)" data-id="{{ $message->id }}"
                                    data-title="{{ $message->messageNotification->title }}"
                                    data-date="{{ $message->created_at->format('F j, Y') }}"
                                    data-status="{{ $message->status }}"
                                    data-content="{{ $message->messageNotification->content }}"
                                    class="w-full flex items-center justify-between px-6 py-4 text-left">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="w-2 h-2 rounded-full {{ $message->status === 'unread' ? 'bg-green-500' : 'bg-white' }}">
                                        </div>
                                        <div>
                                            <span
                                                class="text-sm capitalize {{ $message->status === 'unread' ? 'text-green-500' : 'text-white' }}">{{ $message->status }}</span>
                                            <p class="text-gray-200 mt-0.5">{{ $message->messageNotification->title }}
                                            </p>
                                        </div>
                                    </div>
                                    <i
                                        class="fas fa-chevron-right text-gray-500 group-hover:text-gray-300 transition-colors"></i>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <!-- Empty state -->
                <div id="emptyState" class="text-center py-12">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-inbox text-4xl"></i>
                    </div>
                    <p class="text-gray-300">No messages to display</p>
                </div>
            @endif
        </section>
    </main>

    @php
        $route = Route::current()->getName();
    @endphp


    <footer class="bg-navy border-t-2 border-primaryLight rounded-t-3xl sticky bottom-0">
        <div class="flex container mx-auto px-4 justify-between">
            <a href="{{ route('user.dashboard') }}" class="py-2 nav-link">
                <div
                    class="group flex flex-col items-center text-gray-500 hover:text-primaryDark {{ $route == 'user.dashboard' ? 'text-primaryDark font-semibold' : '' }}">
                    <svg viewBox="0 0 32 32"
                        class="w-7 h-7 fill-white group-hover:fill-primaryDark group-hover:stroke-primaryDark {{ $route == 'user.dashboard' ? 'stroke-primaryDark fill-primaryDark' : '' }}""
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M16 2.672l-5.331 5.331v-2.133h-4.265v6.398l-3.755 3.755 0.754 0.754 12.597-12.597 12.597 12.597 0.754-0.754-13.351-13.351zM7.47 6.937h2.132v2.132l-2.133 2.133v-4.265z">
                            </path>
                            <path
                                d="M6.404 16.533v12.795h7.464v-7.464h4.265v7.464h7.464v-12.795l-9.596-9.596-9.596 9.596zM24.53 28.262h-5.331v-7.464h-6.398v7.464h-5.331v-11.287l8.53-8.53 8.53 8.53v11.287z">
                            </path>
                        </g>
                    </svg>

                    <span class="group-hover:text-primaryDark">Home</span>
                </div>
            </a>

            @php
                $user = Auth::user();
                $pendingTask = App\Models\PendingTask::where('user_id', $user->id)->first();
            @endphp



            <div class="flex flex-col items-center">
                <a href="{{ route('task.list', ['id' => $pendingTask->id ?? 0]) }}" class="py-2">

                    <div
                        class="group flex flex-col items-center text-gray-500 hover:text-primaryDark {{ $route == 'task.list' ? 'text-primaryDark font-semibold' : '' }}">
                        <svg viewBox="0 0 28 28"
                            class="w-7 h-7 fill-white group-hover:fill-primaryDark group-hover:stroke-primaryDark {{ $route == 'task.list' ? 'fill-primaryDark stroke-primaryDark' : '' }} "
                            xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M4 5.25C4 3.45508 5.45507 2 7.25 2H20.75C22.5449 2 24 3.45507 24 5.25V17.3787C23.8796 17.4592 23.7653 17.5527 23.659 17.659L22.5 18.818V5.25C22.5 4.2835 21.7165 3.5 20.75 3.5H7.25C6.2835 3.5 5.5 4.2835 5.5 5.25V22.7497C5.5 23.7162 6.2835 24.4997 7.25 24.4997H15.3177L16.8177 25.9997H7.25C5.45507 25.9997 4 24.5446 4 22.7497V5.25Z">
                                </path>
                                <path
                                    d="M10.5 8.75C10.5 9.44036 9.94036 10 9.25 10C8.55964 10 8 9.44036 8 8.75C8 8.05964 8.55964 7.5 9.25 7.5C9.94036 7.5 10.5 8.05964 10.5 8.75Z">
                                </path>
                                <path
                                    d="M9.25 15.2498C9.94036 15.2498 10.5 14.6902 10.5 13.9998C10.5 13.3095 9.94036 12.7498 9.25 12.7498C8.55964 12.7498 8 13.3095 8 13.9998C8 14.6902 8.55964 15.2498 9.25 15.2498Z">
                                </path>
                                <path
                                    d="M9.25 20.5C9.94036 20.5 10.5 19.9404 10.5 19.25C10.5 18.5596 9.94036 18 9.25 18C8.55964 18 8 18.5596 8 19.25C8 19.9404 8.55964 20.5 9.25 20.5Z">
                                </path>
                                <path
                                    d="M12.75 8C12.3358 8 12 8.33579 12 8.75C12 9.16421 12.3358 9.5 12.75 9.5H19.25C19.6642 9.5 20 9.16421 20 8.75C20 8.33579 19.6642 8 19.25 8H12.75Z">
                                </path>
                                <path
                                    d="M12 13.9998C12 13.5856 12.3358 13.2498 12.75 13.2498H19.25C19.6642 13.2498 20 13.5856 20 13.9998C20 14.414 19.6642 14.7498 19.25 14.7498H12.75C12.3358 14.7498 12 14.414 12 13.9998Z">
                                </path>
                                <path
                                    d="M12.75 18.5C12.3358 18.5 12 18.8358 12 19.25C12 19.6642 12.3358 20 12.75 20H19.25C19.6642 20 20 19.6642 20 19.25C20 18.8358 19.6642 18.5 19.25 18.5H12.75Z">
                                </path>
                                <path
                                    d="M25.7803 19.7803L19.7803 25.7803C19.6397 25.921 19.4489 26 19.25 26C19.0511 26 18.8603 25.921 18.7197 25.7803L15.7216 22.7823C15.4287 22.4894 15.4287 22.0145 15.7216 21.7216C16.0145 21.4287 16.4894 21.4287 16.7823 21.7216L19.25 24.1893L24.7197 18.7197C25.0126 18.4268 25.4874 18.4268 25.7803 18.7197C26.0732 19.0126 26.0732 19.4874 25.7803 19.7803Z">
                                </path>
                            </g>
                        </svg>
                        <span class="group-hover:text-primaryDark">Tasks</span>
                    </div>

                </a>
            </div>

            <a href="{{ route('view.levels') }}" class="py-2">
                <div
                    class="group flex flex-col items-center text-gray-500 hover:text-primaryDark {{ $route == 'view.levels' ? 'text-primaryDark font-semibold' : '' }}">
                    <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 fill-white group-hover:fill-primaryDark group-hover:stroke-primaryDark {{ $route == 'view.levels' ? 'fill-primaryDark stroke-primaryDark' : '' }}">

                        <g id="SVGRepo_iconCarrier">
                            <g id="k">
                                <path
                                    d="M50.51,11.11c-.55-.78-1.46-1.25-2.42-1.25H16.37c-.95,0-1.85,.46-2.42,1.22L4.43,23.94c-.64,.87-.56,2.06,.19,2.83l25.95,26.77c.74,.76,1.97,.85,2.85,0l25.95-26.77c.74-.77,.84-1.96,.22-2.83l-9.08-12.83Zm-10.44,15.24l-8.05,24-7.61-24h15.66Zm-15.21-2l7.37-11.62,7.4,11.62h-14.77Zm9.19-12.49h13.39l-6.07,11.5-7.32-11.5Zm-10.93,11.5l-6.1-11.5h13.39l-7.29,11.5Zm6.64,26.47L6.99,26.35h15.32l7.45,23.48Zm12.42-23.48h14.82l-22.67,23.4,7.85-23.4Zm.94-2l6.11-11.58,8.2,11.58h-14.31ZM15.22,12.73l6.17,11.62H6.62L15.22,12.73Z">
                                </path>
                            </g>
                        </g>
                    </svg>

                    <span class="group-hover:text-primaryDark">VIP</span>
                </div>
            </a>

            <a href="" class="py-2 ">
                <div class="group flex flex-col items-center text-gray-500 hover:text-primaryDark">
                    <svg class="w-7 h-7 fill-white hover:fill-primaryDark hover:stroke-primaryDark transition-colors duration-300"
                        viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                        <g id="SVGRepo_iconCarrier">
                            <g id="Profit">
                                <path
                                    d="M32.8869896,19.6364498c0-0.4902992-0.3974991-0.8876991-0.8876991-0.8876991s-0.8876991,0.3973999-0.8876991,0.8876991 c0,0.9505005,0.5403004,2.4869995,3.8876991,2.7425995V24.53195c0,0.5527,0.4473,1,1,1s1-0.4473,1-1v-2.1742992 c2.4820023-0.2922001,3.8876991-1.7041016,3.8876991-3.9839001c0-1.6809006-0.7114983-3.6493006-3.8876991-3.9885006v-3.8964005 c0.7468987,0.1136007,1.0988998,0.3435001,1.2528992,0.4981003c0.1786995,0.1787996,0.1934013,0.3466997,0.1944008,0.3818998 c-0.0312996,0.4736004,0.3174019,0.8916006,0.7938995,0.9414005c0.4971008,0.0448999,0.9238014-0.3037004,0.9746017-0.7910004 c0.0098-0.0928001,0.0741997-0.9258003-0.6132927-1.6884995c-0.558609-0.6194-1.4387093-0.9893007-2.6025085-1.1229V6.53195 c0-0.5528002-0.4473-1-1-1s-1,0.4471998-1,1v2.1612997c-3.4119987,0.3158998-3.8876991,2.2707005-3.8876991,3.9969006 c0,2.0171995,1.3117981,3.1429996,3.8876991,3.3669004v4.5409985 C33.8845901,20.4961491,32.8869896,20.2100506,32.8869896,19.6364498z M39.1115913,18.3737507 c0,0.5457001-0.0017929,1.8843994-2.1123009,2.2014999v-4.4084015 C38.4936905,16.3527508,39.1115913,17.0144501,39.1115913,18.3737507z M32.8869896,12.6901503 c0-0.9806004,0.0017014-1.9900007,2.1123009-2.2209005v3.8146C32.8886909,14.0763502,32.8869896,13.1928501,32.8869896,12.6901503z ">
                                </path>
                                <path
                                    d="M60.9865913,39.0680504c-0.8809013-1.285202-2.4766006-2.6436005-4.0889015-2.2285004 c-1.7578011,0.4511986-3.333889,2.2187004-5.1590996,4.2645988c-2.1620979,2.4239006-4.6114006,5.1709023-7.6835976,6.0625 c-5.9785004,1.7344017-13.5049019,0.472702-15.847702,0.0020027c-0.25-0.3994026-0.1973-1.6914024,0.0321999-1.9395027 c0.5098-0.1854973,1.7119999-0.0467987,2.9794998,0.1006012c2.1807022,0.2519989,5.1690025,0.5976982,8.5684013-0.0576019 c0.7645988-0.1464996,1.5713005-0.8778992,1.5458984-2.4921989c-0.0351982-2.142601-1.6503983-5.4081993-5.1338005-5.9598999 c-1.6591988-0.2626991-6.0653992-0.961998-11.9550991-1.3008003c-2.3534985-0.1455002-6.2313995,2.8281021-7.5311985,3.8672028 H2.9992919c-0.561492,0-1.0176001,0.4559975-1.0176001,1.017498v12.8974991c0,0.5615005,0.4561081,1.017601,1.0176001,1.017601 h10.1669998c1.5205088,1.1826019,8.6181993,6.5722008,13.143508,7.7080002 c2.9658928,0.7440987,6.7177925,1.5243988,10.4746933,1.5243988c2.7645988,0,5.5321999-0.4228973,7.9911995-1.5928001 c5.8671989-2.7929001,12.2587967-11.947197,15.6923981-16.8652c0.4062004-0.5800972,0.7635994-1.0937996,1.0672989-1.5175972 C62.4914894,42.2389488,61.8791885,40.3707504,60.9865913,39.0680504z M4.016892,41.4215508h7.8887v10.8623009h-7.8887V41.4215508z M59.8810921,42.3922501c-0.3076019,0.4296989-0.6699028,0.9491997-1.0800018,1.5371017 c-3.089901,4.4238968-9.5186005,13.6308975-14.899498,16.1933975c-5.2089005,2.4746017-12.2519016,1.1464996-17.0966015-0.0683975 c-4.5557003-1.1435013-12.5742989-7.485302-12.6542988-7.5488014c-0.0174007-0.0139008-0.0395002-0.0191994-0.0576-0.0318985 V41.4215508h2.9804001c0.2353992,0,0.4638996-0.0820007,0.6455002-0.2313995 c1.8925991-1.5547028,5.1338081-3.6690025,6.4081993-3.6397018c5.7880993,0.3330002,10.1220989,1.0205002,11.7539005,1.2793007 c1.8467064,0.2919998,2.7061005,1.6641006,3.0537071,2.4561005c0.4218903,0.9608994,0.4023933,1.7383003,0.3124924,2.017601 c-3.030201,0.5584984-5.6669006,0.2509003-7.7949009,0.0057983c-1.7108994-0.1973-2.9442997-0.3408012-3.9071999,0.0078011 c-1.1845989,0.4306984-1.6142998,1.9921989-1.5145988,3.3495979c0.1005001,1.357502,0.7206993,2.2823029,1.6590996,2.4737015 c2.3232994,0.4735985,10.4111996,1.8719978,16.9316998-0.0205002c3.6347008-1.0537987,6.4071999-4.1631012,8.6347008-6.6612015 c1.5370979-1.7235985,2.9892998-3.3514977,4.1464996-3.6483994c0.3417969-0.0849991,1.1865005,0.3563995,1.9053001,1.4071999 C59.9601898,41.169651,60.1105919,42.0709496,59.8810921,42.3922501z">
                                </path>
                                <path
                                    d="M35.9992905,30.4485493c8.2843018,0,15-6.7157001,15-14.999999c0-8.2842007-6.7156982-15-15-15s-15,6.7158003-15,15 C20.9992905,23.7328491,27.7149906,30.4485493,35.9992905,30.4485493z M35.9992905,2.44855c7.1682014,0,13,5.8317995,13,13 c0,7.1682997-5.8317986,12.999999-13,12.999999s-13-5.8316994-13-12.999999 C22.9992905,8.2803497,28.8310909,2.44855,35.9992905,2.44855z">
                                </path>
                            </g>
                        </g>
                    </svg>

                    <span class="group-hover:text-primaryDark">Profit</span>
                </div>
            </a>

            <a href="{{ route('account') }}" class="py-2">
                <div
                    class="group flex flex-col items-center text-gray-500 hover:text-primaryDark {{ $route == 'account' ? 'text-primaryDark font-semibold' : '' }}">
                    <svg viewBox="0 0 256 256" id="Flat"
                        class="w-7 h-7 fill-white hover:fill-primaryDark hover:stroke-primaryDark {{ $route == 'account' ? 'fill-primaryDark stroke-primaryDark' : '' }}"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M231.93652,211.98633a120.48718,120.48718,0,0,0-67.12-54.14258,72,72,0,1,0-73.633,0,120.48821,120.48821,0,0,0-67.11859,54.14062,7.99981,7.99981,0,1,0,13.84863,8.0127,104.0375,104.0375,0,0,1,180.17432.00195,7.99981,7.99981,0,1,0,13.84863-8.01269ZM72,96a56,56,0,1,1,56,56A56.06353,56.06353,0,0,1,72,96Z">
                            </path>
                        </g>
                    </svg>
                    <span class="group-hover:text-primaryDark">Account</span>
                </div>
            </a>
        </div>
    </footer>


    <!-- Message Modal -->
    <div id="messageModal"
        class="modal fixed inset-0 bg-black bg-opacity-50 z-50 opacity-0 pointer-events-none flex items-center justify-center p-4">
        <div class="bg-navyLight rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-white" id="modalTitle">Message Title</h2>
                    <button onclick="hideMessage()" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-400">
                        <span id="modalDate">Date</span>
                        <span>•</span>
                        <span id="modalStatus">Status</span>
                    </div>
                    <div class="prose prose-invert max-w-none">
                        <div id="modalContent" class="text-gray-200 space-y-4">
                            <!-- Message content will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Clear Confirmation Modal -->
    {{-- <div id="clearConfirmModal"
        class="modal fixed inset-0 bg-black bg-opacity-50 z-50 opacity-0 pointer-events-none flex items-center justify-center p-4">
        <div class="bg-navyLight rounded-xl shadow-2xl w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Clear All Messages</h3>
                <p class="text-gray-300 mb-6">Are you sure you want to clear all messages? This action cannot be
                    undone.</p>
                <div class="flex justify-end space-x-3">
                    <button onclick="hideClearConfirm()"
                        class="px-4 py-2 text-gray-300 hover:text-white transition-colors">
                        Cancel
                    </button>
                    <button onclick="clearAllMessages()"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        Clear All
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    <script>
        function showMessage(button) {

            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const date = button.getAttribute('data-date');
            const status = button.getAttribute('data-status');
            const content = button.getAttribute('data-content');

            // Update modal content
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDate').textContent = date;
            document.getElementById('modalStatus').textContent = status.charAt(0).toUpperCase() + status.slice(1);
            document.getElementById('modalContent').innerHTML = content;

            const modal = document.getElementById('messageModal');
            modal.classList.add('active');

            if (status === 'unread') {
                markAsRead(id, button);
            }
        }


        function markAsRead(id, button) {
            fetch(`/show/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        button.setAttribute('data-status', 'read');

                        const statusSpan = button.querySelector('span.text-sm');
                        statusSpan.textContent = 'Read';
                        statusSpan.classList.remove('text-green-500');
                        statusSpan.classList.add('text-white');

                        const statusDot = button.querySelector('div.w-2');
                        statusDot.classList.remove('bg-green-500');
                        statusDot.classList.add('bg-white');

                        document.getElementById('modalStatus').textContent = 'Read';
                    }
                });
        }

        function hideMessage() {
            const modal = document.getElementById('messageModal');
            modal.classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('messageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideMessage();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideMessage();
            }
        });

        function markAllAsRead() {
            const messageItems = document.querySelectorAll('#messageList li');
            messageItems.forEach(item => {
                const dot = item.querySelector('.w-2.h-2');
                const statusSpan = item.querySelector('.text-red-500, .text-green-500');

                if (dot && statusSpan) {
                    dot.classList.remove('bg-red-500');
                    dot.classList.add('bg-green-500');
                    statusSpan.classList.remove('text-red-500');
                    statusSpan.classList.add('text-green-500');
                    statusSpan.textContent = 'Read';
                }
            });

            // Update all messages in the data
            Object.keys(messages).forEach(key => {
                messages[key].status = 'Read';
            });

            // Show a temporary success message
            showToast('All messages marked as read');
        }

        // function showClearConfirm() {
        //     const modal = document.getElementById('clearConfirmModal');
        //     modal.classList.add('active');
        // }

        // function hideClearConfirm() {
        //     const modal = document.getElementById('clearConfirmModal');
        //     modal.classList.remove('active');
        // }

        // function clearAllMessages() {
        //     // Clear the message list
        //     const messageList = document.getElementById('messageList');
        //     const emptyState = document.getElementById('emptyState');

        //     messageList.innerHTML = '';
        //     messageList.classList.add('hidden');
        //     emptyState.classList.remove('hidden');

        //     // Clear the messages data
        //     Object.keys(messages).forEach(key => delete messages[key]);

        //     // Hide the confirmation modal
        //     hideClearConfirm();

        //     // Show a temporary success message
        //     showToast('All messages cleared');
        // }

        function showToast(message) {
            // Create toast element if it doesn't exist
            let toast = document.getElementById('toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'toast';
                toast.className =
                    'fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-navyLight text-white px-4 py-2 rounded-lg shadow-lg z-50 opacity-0 transition-opacity duration-300';
                document.body.appendChild(toast);
            }

            // Show the toast
            toast.textContent = message;
            toast.classList.remove('opacity-0');

            // Hide after 3 seconds
            setTimeout(() => {
                toast.classList.add('opacity-0');
            }, 3000);
        }

        // Close clear confirmation modal when clicking outside
        // document.getElementById('clearConfirmModal').addEventListener('click', function(e) {
        //     if (e.target === this) {
        //         hideClearConfirm();
        //     }
        // });

        // Update escape key handler to handle both modals
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideMessage();
                hideClearConfirm();
            }
        });

        // Mobile menu functions
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function hideMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.add('hidden');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('mobileMenu');
            const menuButton = e.target.closest('button');

            if (!menuButton && !menu.contains(e.target)) {
                hideMobileMenu();
            }
        });

        // Close mobile menu when pressing escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideMessage();
                hideClearConfirm();
                hideMobileMenu();
            }
        });
    </script>
</body>

</html>
