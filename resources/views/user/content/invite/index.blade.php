<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPE Referral Invitation</title>


    @vite('resources/css/app.css')
</head>

<body class="bg-darkBlue min-h-screen flex flex-col ">
    <main class="flex-grow my-8">
        <div class="w-full max-w-2xl mx-auto bg-darkerBlue rounded-xl shadow-lg p-8 md:p-12 flex flex-col items-center">
            <div class="text-center mb-8">
                <div class="text-lg md:text-xl text-white mb-2">Your friend <span
                        class="font-semibold">{{ $user->phone }}</span>
                </div>
                <div class="text-lg md:text-xl text-white mb-6">invited you to join KPE</div>
                <div class="flex justify-center mb-6">
                    <img src={{ 'https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=' . config('app.url') . '/user-registration?ref=' . $user->referral_code }}
                        alt="QR Code" class="w-40 h-40 bg-white rounded-md shadow-md">
                </div>
                <div class="text-xl text-white font-semibold mb-2">Referral Code: <span
                        id="referral-code">{{ $user->referral_code }}</span>
                </div>
                <button onclick="copyReferralCode()"
                    class="flex items-center text-purple-400 hover:text-purpleBg mb-4 transition">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16h8M8 12h8m-7 8h6a2 2 0 002-2V6a2 2 0 00-2-2H8a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span id="copy-referral-label">Copy Referral Code</span>
                </button>
                <div class="text-white text-lg mb-2">
                    <a href={{ config('app.url') . '/user-registration?ref=' . $user->referral_code }} id="invite-link"
                        class="break-all underline hover:text-deepViolet transition">{{ config('app.url') . '/user-registration?ref=' . $user->referral_code }}</a>
                </div>
                <button onclick="copyInviteLink()"
                    class="flex items-center text-purple-400 hover:text-purpleBg mb-6 transition">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16h8M8 12h8m-7 8h6a2 2 0 002-2V6a2 2 0 00-2-2H8a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span id="copy-link-label">Copy Invitation Link</span>
                </button>
            </div>
            <button
                class="w-full mt-4 py-3 rounded-lg bg-deepViolet text-white font-semibold text-lg hover:bg-accent transition-all shadow-md">
                Save QR Code
            </button>
        </div>
    </main>

    @include('user.include.footer')

    <script>
        function copyReferralCode() {
            const code = document.getElementById('referral-code').textContent;
            navigator.clipboard.writeText(code).then(() => {
                const label = document.getElementById('copy-referral-label');
                const original = label.textContent;
                label.textContent = 'Copied!';
                setTimeout(() => {
                    label.textContent = original;
                }, 1500);
            });
        }

        function copyInviteLink() {
            const link = document.getElementById('invite-link').textContent;
            navigator.clipboard.writeText(link).then(() => {
                const label = document.getElementById('copy-link-label');
                const original = label.textContent;
                label.textContent = 'Copied!';
                setTimeout(() => {
                    label.textContent = original;
                }, 1500);
            });
        }
    </script>
</body>

</html>
