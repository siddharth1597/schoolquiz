<x-app-layout>
    <x-slot name="header">
        <i id="fa-back" class="d-none fas fa-arrow-left h2 text-dark position-absolute cursor-pointer" title="Go to Dashboard"></i>
        <div class="d-flex justify-between winner_page">
            <div class="d-flex">
                <i id="fa-edit" class="fas fa-trophy h2 text-dark mr-3 my-auto""></i>
                <h2 class=" font-semibold text-xl text-gray-800 leading-tight my-auto">
                    {{ __('Results') }}
                    </h2>
            </div>
            <div class="invisible">
                Go to Dashboard
            </div>
            <div class="d-flex">
                <span class="home_icon badge badge-dark mr-2 my-auto">
                    Home
                </span>
                <a href="/home/contact-page" class="home_icon badge badge-warning mr-2 my-auto">
                    Contact us
                </a>
            </div>
        </div>
    </x-slot>
    <div class="text-center">
        <div class="container mx-auto" style="max-width: inherit;">
            <div class="col-md-12 m-auto position-relative">
                <img class="winner_page_image mt-4 rounded-lg position-absolute" src="{{ url('/images/School_Quiz_Logo.jpg') }}" alt="logo">
                <h1 class="winner_title font-weight-bold position-absolute justify-center w-100">{{ $title }}</h1>
                <h1 class="winner_team font-weight-bold position-absolute justify-center w-100">{{ $team_name }}</h1>
                <img class="winner_cup rounded-lg mt-4 position-absolute" src="{{ url('/images/cup.gif') }}" alt="winner trophy">
                <img class="winner_celeb w-100 rounded-lg position-relative" src="{{ url('/images/confetti.gif') }}" alt="winner trophy">
                <!-- <img class="winner_celeb w-100 rounded-lg position-relative" src="{{ url('/images/winner.gif') }}" alt="winner trophy"> -->
            </div>
        </div>
    </div>

    <script>
        // play the sound of winner.
        $(document).ready(function() {
            $('footer').hide();
        });
        winner_sound("<?php echo $team_name; ?>");
    </script>
</x-app-layout>
