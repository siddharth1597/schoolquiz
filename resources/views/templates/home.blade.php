<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-between">
            <div class="d-flex">
                <i id="fa-home" class="fas fa-home h2 text-dark mr-3"></i>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto">
                    {{ __('School Quiz Dashboard') }}
                </h2>
            </div>
            <div class="go_to_dashboard">
                <img class="logo homepage" src="{{ url('images/school_quiz1.png') }}" alt="School Quiz"  title="Go to Dashboard">
            </div>
        </div>
    </x-slot>
    <div class="background_wall dashboard_back"></div>
    <div class="py-16 px-10 text-center pt-3">
        <div class="container mx-auto">
            <!-- <div class="row m-0">
                <img class="w-25 mx-auto" src="{{ url('images/screen_show.jpg') }}" alt="quiz">
            </div> -->
            
            <div>
                <img class="w-25 mx-auto" src="{{ url('images/quiz-logo-poll.jpg') }}" alt="quiz">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow border border-white cursor-pointer saved-quiz">
                        <div class="card-body m-12">
                            <i class="fas fa-book h1 text-white mb-3"></i>
                            <h2 class="text-white">Saved Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow bor der border-white cursor-pointer organize-quiz">
                        <div class="card-body m-12">
                            <i class="fas fa-book h1 text-white mb-3"></i>
                            <h2 class="text-white">Organize Quiz</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<footer class="bg-dark p-3 px-5 w-100 text-right shadow position-relative">
    <i class="fas fa-phone-alt text-white mr-2"></i>
    <a href="#" class="text-white">Contact us</a>
</footer>
