@extends('user.user-main')
@section('user-content')
    <x-navigation>
        <x-slot:heading>Task List</x-slot:heading>
    </x-navigation>

    <section>
        <div class="flex bg-backgroundDark py-3 justify-around ">
            <button class="items-center text-base md:text-lg lg:text-xl text-white tab-btn active"
                onclick="showSection('page1', this, 'success')">
                Doing
            </button>
            <button class=" text-white tab-btn text-base md:text-lg lg:text-xl"
                onclick="showSection('page2', this, 'success')"> Success
            </button>
        </div>


        <div id="page1" class="section active bg-black">
            <div class="container mx-auto px-4">
                <h2 class="text-white">Page 1 Content</h2>
            </div>
        </div>

        <div id="page2" class="section">
            <h2 class=""">Page 2 Content</h2>
        </div>
        </div>

    </section>
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
