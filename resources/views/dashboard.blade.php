@livewire('navigation-menu')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2 px-10 text-center mb-10">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-4 pt-5">
                    <div class="card shadow border border-primary cursor-pointer bg-primary" data-toggle="modal" data-target="#CreateQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-book h1 text-white mb-3"></i>
                            <h2 class="text-white">Create Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-5">
                    <div class="card shadow border border-success cursor-pointer bg-success update_quiz" data-toggle="modal" data-target="#UpdateQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-book h1 text-white mb-3"></i>
                            <h2 class="text-white">Update Quiz</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-5">
                    <div class="card shadow border border-danger cursor-pointer bg-danger delete_quiz" data-toggle="modal" data-target="#DeleteQuiz">
                        <div class="card-body m-8">
                            <i class="fas fa-book h1 text-white mb-3"></i>
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
                            <i class="fas fa-book h1 text-white mb-3"></i>
                            <h2 class="text-white">Customize Contact-us</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pt-5 align-self-center">
                    <img class="w-50 mx-auto" src="{{ url('images/head_question.png') }}" alt="quiz">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<footer class="bg-dark p-3 px-5 w-100 text-right shadow">
    <i class="fas fa-phone-alt text-white mr-2"></i>
    <a href="#" class="text-white">Contact us</a>
</footer>
