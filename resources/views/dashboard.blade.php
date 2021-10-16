@livewire('navigation-menu')

<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-between">
            <div class="d-flex">
                <i id="fa-edit" class="fas fa-user-cog h2 text-dark mr-3"></i>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto">
                    {{ __('Admin Dashboard') }}
                </h2>
            </div>
            <div class="d-flex">
                <h3 class="font-semibold text-xl text-info leading-tight my-auto welcome_screen cursor-pointer" title="Go to homepage">
                    {{ __('School Quiz') }}
                </h3>
                <i class="fas fa-school h4 text-info ml-2 my-auto welcome_screen icon"></i>
            </div>
        </div>
    </x-slot>
    <div class="background_wall dashboard_back"></div>
    @if (Session::has('flash_message'))
        <div class="alert {{ Session::get('flash_type') }}">
            <strong>{{ Session::get('flash_message') }}</strong>
        </div>
    @endif
    <div class="py-2 px-10 text-center mb-10 dashboard-quiz">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-4 pt-5">
                    <div class="card shadow border border-success cursor-pointer bg-success" data-toggle="modal" data-target="#CreateQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-book h1 text-white mb-3"></i>
                            <h2 class="text-white">Create Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-5">
                    <div class="card shadow border cursor-pointer update_quiz" data-toggle="modal" data-target="#UpdateQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-book-open h1 text-white mb-3"></i>
                            <h2 class="text-white">Update Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-5">
                    <div class="card shadow border border-danger cursor-pointer bg-danger delete_quiz" data-toggle="modal" data-target="#DeleteQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-trash-alt h1 text-white mb-3"></i>
                            <h2 class="text-white">Delete Quiz</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-5 align-self-center">
                    <img class="w-75 mx-auto" src="{{ url('images/time_paper.jpg') }}" alt="quiz">
                </div>
                <div class="col-md-6 pt-5">
                    <div class="card shadow border border-info cursor-pointer bg-info" data-toggle="modal" data-target="#ContactUsModal">
                        <div class="card-body m-8">
                            <i class="fas fa-marker h1 text-white mb-3"></i>
                            <h2 class="text-white">Edit Contact-us</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pt-5 align-self-center">
                    <img class="w-50 mx-auto" src="{{ url('images/head_question.png') }}" alt="quiz">
                </div>
            </div>
        </div>
    </div>

    @include('templates.dashboard_modals')
</x-app-layout>
