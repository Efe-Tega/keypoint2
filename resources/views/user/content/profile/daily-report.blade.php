@extends('user.user-main')

@section('title')
{{__('Daily Report')}}
@endsection

@section('user-content')
    <header class="bg-backgroundLight">
        <x-navigation>
            <x-slot:heading>Daily Report</x-slot:heading>
            <x-slot:headingRight></x-slot:headingRight>
        </x-navigation>
    </header>

    <section class="py-6 container mx-auto px-4">
        <div
            class="grid grid-cols-2 mt-8 shadow-[0px_-1px_10px_rgba(9,187,254,0.9),0px_2px_6px_rgba(0,0,0,0.1)] bg-white/10 backdrop-blur-sm ">
            <div class="flex flex-col border-r border-r-slate-500 border-b border-b-slate-500  py-6 text-center gap-2">
                <p class=" md:text-sm lg:text-lg text-white">
                    Task Completed(Tasks)
                </p>
                <p class="text-green-500 font-semibold text-3xl">0</p>
            </div>

            <div class="flex flex-col text-center py-6 border-b border-b-slate-500 gap-2">
                <p class=" md:text-sm lg:text-lg text-white">
                    My Earnings (NGN)
                </p>
                <p class="text-green-500 font-semibold text-3xl">0</p>
            </div>


            <div class="flex flex-col text-center py-6 border-r border-r-slate-500">
                <p class="text-xs md:text-sm lg:text-lg text-white">Tasks Completed by Subordinates(Tasks)</p>
                <p class="text-green-500 font-semibold text-3xl">0</p>
            </div>

            <div class="flex flex-col text-center py-6">
                <p class="text-xs md:text-sm lg:text-lg text-white">Subordinate Task Earnings(NGN)</p>
                <p class="text-green-500 font-semibold text-3xl">0</p>
            </div>
        </div>

    </section>
@endsection
