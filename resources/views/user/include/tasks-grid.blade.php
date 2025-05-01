<div class="grid grid-cols-4 py-4 gap-8 justify-items-center">
    @if ($user->level_id === 1)
        <x-task-button href="{{ route('task') }}" class="col-span-2 md:col-span-1">
            <span class="text-sm lg:text-base">Internship</span>
        </x-task-button>
    @else
        <x-task-button class="col-span-2 md:col-span-1" onclick="showPopup()">
            <span class="text-sm lg:text-base">Internship</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 2)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP1</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP1</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 3)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP2</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP2</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 4)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP3</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP3</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 5)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP4</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP4</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 6)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP5</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP5</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 7)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP6</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP6</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 8)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP7</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP7</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 9)
        <x-task-button href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP8</span>
        </x-task-button>
    @else
        <x-task-button onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP8</span>
            <x-lock />
        </x-task-button>
    @endif

    @if ($user->level_id === 10)
        <x-task-button class="col-span-2 md:col-span-1" href="{{ route('task') }}">
            <span class="text-sm lg:text-base">VIP9</span>
        </x-task-button>
    @else
        <x-task-button class="col-span-2 md:col-span-1" onclick="showPopup()">
            <span class="text-sm lg:text-base">VIP9</span>
            <x-lock />
        </x-task-button>
    @endif
</div>

<!-- Popup Notification -->
<div id="popup-notification" class="container mx-auto px-4 hidden">
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
            <div class="mb-1 text-sm">Current level does not meet the requirements</div>
            <div class="font-semibold mb-3 text-sm">Upgrade to view task</div>
            <button onclick="closePopup()" class="mt-2 px-4 py-1 bg-primaryDark text-white rounded-sm">Confirm</button>
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
