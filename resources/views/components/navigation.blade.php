<header class="bg-backgroundLight sticky top-0 z-50">
    <nav class="p-4 container mx-auto">
        <!-- flex container -->
        <div class="flex justify-between items-center">
            <span onclick="window.history.back()" class="cursor-pointer">
                <img src="{{ asset('backend/assets/svg/arrow-left.svg') }}" alt="" class="w-4 h-4 md:w-7 md:h-7" />
            </span>

            <span class="font-bold md:text-lg lg:text-3xl">{{ $heading }}</span>

            <!-- menu items -->
            <a href="" class="font-semibold text-sm lg:text-lg">{{ $headingRight ?? '' }} </a>
        </div>
    </nav>
</header>
