<x-app-layout>
    <x-slot name="header">
        <div class="winner-header">
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
                    <div>
                        <button type="button" class="home_icon btn btn-dark p-2 px-3 rounded-pill homepage">Home</button>
                    </div>
                    <a href="/home/contact-page" class="contact-us btn btn-primary p-2 px-3 ml-2 rounded-pill">Contact us</a>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="text-center winner-page">
        <div class="container mx-auto" style="max-width: inherit;">
            <div class="col-md-12 m-auto position-relative">
                <h2 class="winner_title font-weight-bold justify-center w-100 mt-5">{{ $title }}</h2>
                <img class="winner_cup m-auto" src="{{ url('/images/winner-team.gif') }}" alt="winner trophy">
                <h2 class="winner_team font-weight-boldjustify-center w-100">{{ $team_name }}</h2>
                <img class="winner_celeb w-100 h-100 top-0 rounded-lg position-absolute" src="{{ url('/images/confetti.gif') }}" alt="winner trophy">
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
