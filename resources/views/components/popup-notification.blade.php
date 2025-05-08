<!-- Popup Notification -->
<div id="popup-notification" class="container mx-auto px-4 hidden">
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
            <div class="mb-1 text-sm">{{ $slot }}</div>
            <button onclick="closePopup()" class="mt-2 px-4 py-1 bg-primaryDark text-white rounded-sm">Confirm</button>
        </div>
    </div>
</div>
