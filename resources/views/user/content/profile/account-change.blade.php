@extends('user.user-main')
@section('user-content')
    <header class="bg-backgroundLight">
        <x-navigation>
            <x-slot:heading id="page-heading">Records</x-slot:heading>
            <x-slot:headingRight></x-slot:headingRight>
        </x-navigation>
    </header>

    <div class="flex bg-backgroundDark py-3 justify-around ">
        <button class="items-center text-white tab-btn active" onclick="showSection('page1', this, 'Income Record')"> Income
        </button>
        <button class=" text-white tab-btn" onclick="showSection('page2', this, 'Expenditure Record')"> Expenditure </button>
    </div>

    <div class="bg-white/10 backdrop-blur-sm min-h-screen py-5">
        <div class="container mx-auto px-4">
            <div id="page1" class="section active">
                <h2 class="text-white">Page 1 Content</h2>
            </div>

            <div id="page2" class="section">
                <h2 class="text-white"">Page 2 Content</h2>
            </div>
        </div>
    </div>
@endsection

<script>
    function showSection(id, button, headingText) {
        document
            .querySelectorAll(".section")
            .forEach((el) => el.classList.remove("active"));
        document.getElementById(id).classList.add("active");

        // Remove 'active' class from both buttons
        document.querySelectorAll(".tab-btn").forEach((btn) => btn.classList.remove("active"));

        // Add 'active' class to the clicked button
        button.classList.add("active");
    }
</script>
