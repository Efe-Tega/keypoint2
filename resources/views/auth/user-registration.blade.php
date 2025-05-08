<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-blue-100">
    <section class="py-5 sm:py-2 lg:py-5">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <img src="{{ asset('backend/assets/logo.png') }}" alt="Keypoint logo"
                    class="w-32 h-10 md:w-56 md:h-20  mx-auto" />

                <p class="max-w-xl mx-auto mt-4 text-base leading-relaxed text-gray-600">
                    Create a new Account
                </p>
            </div>

            <div class="relative max-w-3xl mx-auto mt-8 md:mt-8">
                <div class="overflow-hidden bg-white rounded-md shadow-md">
                    <div class="px-4 py-6 sm:px-8 sm:py-7">

                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="space-y-5">
                                <div class="lg:flex lg:gap-6 lg:space-y-0 space-y-4 ">
                                    <div class="w-full">
                                        <label for="" class="text-base font-medium text-gray-900">
                                            Email Address
                                        </label>
                                        <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Enter email to get started"
                                                class="block w-full py-2.5 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>

                                        @error('email')
                                            <span class="text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="" class="text-base font-medium text-gray-900">
                                            Phone Number
                                        </label>
                                        <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                                placeholder="Please enter your phone number"
                                                class="block w-full py-2.5 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>


                                        @error('phone')
                                            <span class="text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="lg:flex lg:gap-6 lg:space-y-0 space-y-4 ">
                                    <div class="w-full">
                                        <label for="" class="text-base font-medium text-gray-900">
                                            Password
                                        </label>

                                        <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                            <input type="password" name="password" id="password"
                                                placeholder="Enter your password"
                                                class="block w-full py-2.5 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>

                                        @error('password')
                                            <span class="text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="w-full">
                                        <label for="" class="text-base font-medium text-gray-900">
                                            Confirm Password
                                        </label>

                                        <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" placeholder="Please confirm your password"
                                                class="block w-full py-2.5 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        </div>

                                        <span id="confirmMsg" class="text-red-500 text-sm"></span>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="" class="text-base font-medium text-gray-900">
                                        Invitation Code
                                    </label>

                                    <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="referral_code"
                                            placeholder="Enter your invitation code"
                                            class="block w-full py-2.5 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center px-8 py-2 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                        Register
                                    </button>
                                </div>
                        </form>

                        <div class="text-center">
                            <p class="text-base text-gray-600">
                                Already have an account?
                                <a href="{{ url('/login') }}" title=""
                                    class="font-medium text-blue-500 transition-all duration-200 hover:text-orange-600 hover:underline">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const password = document.getElementById("password");
            const confirmPassword = document.getElementById('password_confirmation');
            const msg = document.getElementById('confirmMsg');

            function comparePassword() {
                const pass = password.value.trim();
                const confirmPass = confirmPassword.value.trim();


                if (!pass || !confirmPass) {
                    msg.textContent = '';
                    return;
                }

                if (pass.startsWith(confirmPass)) {
                    msg.textContent = '✅ Password matching ...'
                    msg.style.color = 'green';
                } else {
                    msg.textContent = '⚠️ Password does not match!';
                    msg.style.color = 'red';
                }

                if (pass === confirmPass) {
                    msg.textContent = '100% Match ✅'
                    msg.style.color = "green"
                }
            }

            password.addEventListener("input", comparePassword);
            confirmPassword.addEventListener("input", comparePassword);
        })
    </script>
</body>

</html>
