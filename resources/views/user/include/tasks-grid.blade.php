<div class="grid grid-cols-4 py-8 gap-8 justify-items-center">
    @if ($user->level_id === 1)
        <x-task-button href="{{ route('task') }}" class="col-span-2 md:col-span-1">
            Internship
        </x-task-button>
    @else
        <x-task-button class="col-span-2 md:col-span-1" onclick="showPopup()">
            Internship
            <img src="{{ asset('backend/assets/svg/lock.svg') }}" alt="" class="w-3.5 h-3.5" />
        </x-task-button>
    @endif

    @if ($user->level_id === 2)
        <x-task-button href="{{ route('task') }}">
            VIP1
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            VIP1
            <img src="{{ asset('backend/assets/svg/lock.svg') }}" alt="" class="w-3.5 h-3.5" />
        </x-task-button>
    @endif

    <x-task-button href="{{ route('task') }}">VIP2</x-task-button>

    <x-task-button href="{{ route('task') }}">
        VIP3
        <img src="{{ asset('backend/assets/svg/lock.svg') }}" alt="" class="w-3.5 h-3.5" />
    </x-task-button>

    <x-task-button>VIP4</x-task-button>

    <x-task-button>VIP5</x-task-button>

    <x-task-button>VIP6</x-task-button>

    <x-task-button>VIP7</x-task-button>

    <x-task-button>VIP8</x-task-button>

    <x-task-button class="col-span-2 md:col-span-1">VIP9</x-task-button>

</div>

<!-- Popup Notification -->
<div id="popup-notification" class="container mx-auto px-4 hidden">
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
            <p class="text-red-600 font-semibold mb-4">You're not on that level</p>
            <button onclick="closePopup()" class="mt-2 px-4 py-2 bg-primaryDark text-white rounded-md">Okay</button>
        </div>
    </div>
</div>

<script>
    function showPopup() {
        document.getElementById('popup-notification').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup-notification').classList.add('hidden');
    }
</script>
