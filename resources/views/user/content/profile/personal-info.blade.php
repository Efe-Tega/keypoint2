@extends('user.user-main')

@section('user-content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <x-navigation>
        <x-slot:heading>Personal Info</x-slot:heading>
        <x-slot:headingRight></x-slot:headingRight>
    </x-navigation>

    <section>
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:gap-10">
                <!-- Account Management -->
                <div class="">

                    @if (session('status'))
                        <div id="successMessage"
                            class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                            role="alert">
                            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('status') }}
                            </div>

                        </div>
                    @endif

                    <form action="{{ route('upload.pic') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div
                            class="flex flex-col justify-center items-center bg-white/10 backdrop-blur-sm px-4 py-6 rounded-lg">
                            <img src="{{ asset($user->profile_pic ? $user->profile_pic : 'upload/profile_pics/default.jpg') }}"
                                alt="" class="w-36 h-36 text-center rounded-2xl" />

                            <div class="mt-8">
                                <label for="" class="text-base font-medium text-slate-100">
                                    Profile Picture
                                </label>

                                <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                    <input type="file" name="profile_pic" id="" accept="image/*"
                                        placeholder="Enter email to get started"
                                        class="block w-full py-1.5 pl-2 pr-2 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                </div>
                            </div>


                            <button type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-1.5 mt-3 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                Update Profile Pics
                            </button>

                        </div>
                    </form>

                    <!-- Account Details -->
                    <div class="mt-10 bg-white/10 backdrop-blur-sm py- rounded-lg">
                        <div class="">
                            <h1 class="font-semibold text-white bg-slate-500 px-4 py-1 text-center rounded-t-lg">
                                Account Information
                            </h1>

                            <div class="border-b border-b-slate-500 px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Fullname:</span>
                                <span class="text-slate-300 ml-5">{{ $user->fullname }}</span>
                            </div>

                            <div class="border-b border-b-slate-500 px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Phone
                                    number:</span>
                                <span class="text-slate-300 ml-5">{{ $user->phone }}</span>
                            </div>

                            <div class="px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Email:</span>
                                <span class="text-slate-300 ml-5 text-sm">{{ $user->email }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 bg-white/10 backdrop-blur-sm py- rounded-lg">
                        <div class="">
                            <h1 class="font-semibold text-white bg-slate-500 px-4 py-1 text-center rounded-t-lg">
                                Bank Information
                            </h1>

                            <div class="border-b border-b-slate-500 px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Account
                                    Name:</span>
                                <span class="text-slate-300 ml-5">{{ $bankInfo->acct_name }}</span>
                            </div>

                            <div class="border-b border-b-slate-500 px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Bank Name:</span>
                                <span class="text-slate-300 ml-5">{{ $bankInfo->bank_name }}</span>
                            </div>

                            <div class="px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Account
                                    Number:</span>
                                <span class="text-slate-300 ml-5">{{ $bankInfo->acct_no }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Information -->
                <div class="col-span-2 mt-10 lg:mt-0 bg-white/10 backdrop-blur-sm px-4 py-6 rounded-lg">

                    <form action="{{ route('update.info') }}" method="POST">
                        @csrf

                        <div class="space-y-5">
                            <h1 class="font-semibold text-white">Personal Information</h1>

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Real Name
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        @if ($user->fullname)
                                            <input type="text" id="real-name" name="real_name"
                                                placeholder="Enter Fullname" value="{{ $user->fullname }}" readonly
                                                class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-gray-300 border border-gray-400 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        @else
                                            <input type="text" id="real-name" name="real_name"
                                                placeholder="Enter Fullname"
                                                class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        @endif
                                    </div>

                                    @error('real_name')
                                        <span class="text-yellow-400">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Email Address
                                    </label>

                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="email" name="email" placeholder="Enter Email Address"
                                            value="{{ $user->email }}"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-gray-300 border border-gray-400 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600"
                                            readonly />
                                    </div>

                                    @error('email')
                                        <span class="text-yellow-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Phone Number
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="phone" placeholder="Enter Phone number"
                                            value="{{ $user->phone }}"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-gray-300 border border-gray-400 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600"
                                            readonly />
                                    </div>

                                    @error('phone')
                                        <span class="text-yellow-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <h1 class="font-semibold text-white pt-6">
                                Bank Information
                            </h1>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Account Name
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="acct_name" id="acct-name"
                                            placeholder="Account Holder Name" value="{{ $bankInfo->acct_name }}"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        <span id="matchMessage" class="text-xs text-white">The account name on the bank
                                            account must match
                                            your real name
                                            above,
                                            otherwise, withdrawal will not be successful
                                        </span>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Bank Name
                                    </label>

                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <select name="bank_name"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600">
                                            <option value="{{ $bankInfo->bank_name ? $bankInfo->bank_name : '' }}"
                                                selected>
                                                {{ $bankInfo->bank_name ? $bankInfo->bank_name : '-- Select Bank --' }}
                                            </option>
                                            <option value="Opay">Opay</option>
                                            <option value="Palmpay">PalmPay</option>
                                            <option value="Moniepoint">Moniepoint</option>
                                            <option value="Kuda">Kuda</option>
                                        </select>
                                    </div>

                                    @error('bank_name')
                                        <span class="text-yellow-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Account Number
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="acct_no" placeholder="Enter Account number"
                                            value="{{ $bankInfo->acct_no }}"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>

                                    @error('acct_no')
                                        <span class="text-yellow-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 mt-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="border-t border-t-slate-500 mt-16">
                        <h1 class="font-semibold text-white py-2">
                            Security Information
                        </h1>

                        <form action="{{ route('change.password') }}" method="POST">
                            @csrf

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0 mt-5">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Old Password
                                    </label>

                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="old_password" placeholder="Enter Old Password"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        New Password
                                    </label>

                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="new_password" id="new_password"
                                            placeholder="Enter New Password"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>

                                    @error('new_password')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0 py-5">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Confirm New Password
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="new_password_confirmation" id="confirm_password"
                                            placeholder="Password Confirmation"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                    <span id="confirmMsg" class="text-xs"></span>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 mt-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nameInput = document.getElementById("real-name");
            const bankNameInput = document.getElementById("acct-name");
            const message = document.getElementById("matchMessage");

            console.log('working');

            function compareNames() {
                const name = nameInput.value.trim();
                const bankName = bankNameInput.value.trim();

                if (!name || !bankName) {
                    message.textContent = '';
                    return;
                }

                if (name.startsWith(bankName)) {
                    message.textContent = '✅ Matching so far...';
                    message.style.color = 'green';
                } else {
                    message.textContent = '⚠️ Does not match real name!';
                    message.style.color = 'yellow';
                }

            }

            nameInput.addEventListener("input", compareNames);
            bankNameInput.addEventListener("input", compareNames);



            // Auto-hide flash messages
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');

            if (successMessage) {
                setTimeout(() => successMessage.style.display = 'none', 3000);
            } else if (errorMessage) {
                setTimeout(() => errorMessage.style.display = 'none', 3000);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const newPassword = document.getElementById('new_password');
            const confirmPassword = document.getElementById('confirm_password');
            const message = document.getElementById('confirmMsg');

            function comparePassword() {
                const newPass = newPassword.value.trim();
                const confirmPass = confirmPassword.value.trim();

                if (!newPass || !confirmPass) {
                    message.textContent = '';
                    return;
                }

                if (newPass.startsWith(confirmPass)) {
                    message.textContent = '✅ Password matching ...'
                    message.style.color = 'green';
                } else {
                    message.textContent = '⚠️ Password does not match!';
                    message.style.color = "yellow";
                }
            }

            newPassword.addEventListener("input", comparePassword);
            confirmPassword.addEventListener("input", comparePassword);
        })
    </script>
@endsection
