<!-- Popup Notification -->
<div id="popup-notification" class="container mx-auto px-4 hidden">
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
            <p class="text-red-600 font-semibold mb-4">{{ $slot }}</p>
            <button onclick="closePopup()" class="mt-2 px-4 py-2 bg-primaryDark text-white rounded-md">Confirm</button>
        </div>
    </div>
</div>
