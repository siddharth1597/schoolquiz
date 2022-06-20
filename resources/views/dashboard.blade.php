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
                <h3 class="font-semibold text-xl text-dark leading-tight my-auto welcome_screen cursor-pointer" title="Go to homepage">
                    {{ __('Home') }}
                </h3>
                <i class="fas fa-school h4 purple-text ml-2 my-auto welcome_screen icon"></i>
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
                    <div class="card shadow border new-card cursor-pointer" data-toggle="modal" data-target="#CreateQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-book h1 text-success mb-3"></i>
                            <h2 class="text-dark">Create Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-5">
                    <div class="card shadow border cursor-pointer new-card" data-toggle="modal" data-target="#UpdateQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-book-open h1 update_quiz mb-3"></i>
                            <h2 class="text-dark">Update Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-5">
                    <div class="card shadow border cursor-pointer new-card delete_quiz" data-toggle="modal" data-target="#DeleteQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-trash-alt h1 text-danger mb-3"></i>
                            <h2 class="text-dark">Delete Quiz</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-5 align-self-center">
                    <img class="w-100 mx-auto" src="{{ url('images/notebook.png') }}" alt="quiz">
                </div>
                <div class="col-md-6 pt-5">
                    <div class="card shadow border cursor-pointer new-card" data-toggle="modal" data-target="#ContactUsModal">
                        <div class="card-body m-8">
                            <i class="fas fa-marker h1 text-info mb-3"></i>
                            <h2 class="text-dark">Edit Contact-us</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pt-5 align-self-center">
                    <img class="w-80 mx-auto" src="{{ url('images/diary.png') }}" alt="quiz">
                </div>
            </div>
        </div>
    </div>

    @include('templates.dashboard_modals')
</x-app-layout>
