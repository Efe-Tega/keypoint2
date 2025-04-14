@extends('user.user-main')

@section('user-content')
    <x-navigation>
        <x-slot:heading>Personal Info</x-slot:heading>
        <x-slot:headingRight></x-slot:headingRight>
    </x-navigation>

    <section>
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 lg:gap-10">
                <!-- Account Management -->
                <div class="">
                    <div class="flex flex-col justify-center items-center bg-white/10 backdrop-blur-sm px-4 py-6 rounded-lg">
                        <img src="{{ asset('backend/assets/avatar/woman.jpg') }}" alt=""
                            class="w-36 h-36 text-center rounded-2xl" />

                        <div class="mt-8">
                            <label for="" class="text-base font-medium text-slate-100">
                                Profile Picture
                            </label>
                            <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                <input type="file" name="" id="" placeholder="Enter email to get started"
                                    class="block w-full py-1.5 pl-2 pr-2 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                            </div>
                        </div>
                    </div>

                    <!-- Account Details -->
                    <div class="mt-10 bg-white/10 backdrop-blur-sm py- rounded-lg">
                        <div class="">
                            <h1 class="font-semibold text-white bg-slate-500 px-4 py-1 text-center rounded-t-lg">
                                Account Information
                            </h1>

                            <div class="border-b border-b-slate-500 px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Fullname:</span>
                                <span class="text-slate-300 ml-5">Efe Tega</span>
                            </div>

                            <div class="border-b border-b-slate-500 px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Phone
                                    number:</span>
                                <span class="text-slate-300 ml-5">09038856274</span>
                            </div>

                            <div class="px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Email:</span>
                                <span class="text-slate-300 ml-5 text-sm">teefwesh0@gmail.com</span>
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
                                <span class="text-slate-300 ml-5">Efe Tega</span>
                            </div>

                            <div class="border-b border-b-slate-500 px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Bank Name:</span>
                                <span class="text-slate-300 ml-5">Zenith Bank</span>
                            </div>

                            <div class="px-4 py-2">
                                <span class="text-slate-50 font-semibold tracking-wider text-sm">Account
                                    Number:</span>
                                <span class="text-slate-300 ml-5">3161165890</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Information -->
                <div class="col-span-2 mt-10 lg:mt-0 bg-white/10 backdrop-blur-sm px-4 py-6 rounded-lg">
                    <form action="#" method="POST">
                        <div class="space-y-5">
                            <h1 class="font-semibold text-white">Personal Information</h1>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Real Name
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="" id="" placeholder="Enter Fullname"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Email Address
                                    </label>

                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="email" name="" id=""
                                            placeholder="Enter Email Address"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>
                            </div>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Phone Number
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="" id="" placeholder="Enter Phone number"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
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
                                        <input type="text" name="" id=""
                                            placeholder="Account Holder Name"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Bank Name
                                    </label>

                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <select name="" id=""
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600">
                                            <option value="" disabled selected>
                                                -- Select Bank --
                                            </option>
                                            <option value="">Opay</option>
                                            <option value="">PalmPay</option>
                                            <option value="">Moniepoint</option>
                                            <option value="">Kuda</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Account Number
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="" id=""
                                            placeholder="Enter Account number"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <a href="../user/dashboard.html" type="submit"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 mt-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                    Update Profile
                                </a>
                            </div>
                        </div>
                    </form>

                    <div class="border-t border-t-slate-500 mt-16">
                        <h1 class="font-semibold text-white py-2">
                            Security Information
                        </h1>

                        <form action="">
                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0 mt-5">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Old Password
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="" id=""
                                            placeholder="Enter Old Password"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        New Password
                                    </label>

                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="email" name="" id=""
                                            placeholder="Enter New Password"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>
                            </div>

                            <div class="lg:flex lg:gap-6 space-y-4 lg:space-y-0 py-5">
                                <div class="w-full">
                                    <label for="" class="font-medium text-slate-200 text-sm">
                                        Confirm New Password
                                    </label>
                                    <div class="mt-1 relative text-gray-400 focus-within:text-gray-600">
                                        <input type="text" name="" id=""
                                            placeholder="Password Confirmation"
                                            class="block w-full py-2 pl-5 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <a href="../user/dashboard.html" type="submit"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 mt-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                    Change Password
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
