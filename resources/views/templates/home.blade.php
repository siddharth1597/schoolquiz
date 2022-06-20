<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-between">
            <div class="d-flex">
                <img class="w-10" src="{{ url('images/lightbulb.png') }}" alt="Logo">
                <h2 class="font-semibold text-xl text-gray-900 leading-tight my-auto ml-2">
                    {{ __('Quiz Portal') }}
                </h2>
            </div>
            <div class="d-flex">
                <div>
                    <button type="button" class="btn btn-dark p-2 px-3 rounded-pill homepage">Dashboard</button>
                </div>
                <a href="/home/contact-page" class="contact-us btn btn-primary p-2 px-3 ml-2 rounded-pill">Contact us</a>
            </div>
            
        </div>
    </x-slot>
    <div class="dashboard_back">
        <img src="{{ url('images/animated.gif') }}" alt="animation">
    </div>
    <div class="py-16 px-10 text-center">
        <div class="container d-flex flex-column">
            <div class="row m-0">
                <img class="w-25" src="{{ url('images/online-quiz.png') }}" alt="quiz">
            </div>
            <div class="row">
                <div class="col-md-3 mt-2 save-card">
                    <div class="card shadow border border-white cursor-pointer saved-quiz" data-toggle="modal" data-target="#StartQuiz">
                        <div class="card-body m-3">
                            <i class="fas fa-book h1 text-warning mb-3"></i>
                            <h4 class="text-dark">Play Quiz</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-2 make-card">
                    <div class="card shadow bor der border-white cursor-pointer organize-quiz">
                        <div class="card-body m-3">
                            <i class="fas fa-marker h1 text-primary mb-3"></i>
                            <h4 class="text-dark">Create Quiz</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Start Quiz Modal -->

    <div class="modal fade" id="StartQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">START QUIZ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <p>Select the Quiz set that you want to play</p>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="quizSetList">Quiz</label>
                            </div>
                            <select class="custom-select" id="quizSetList">
                                <option value="0" selected>--Select Set--</option>
                                @foreach($quiz_sets as $quiz_set)
                                <option value="{{ $quiz_set->set_no }}">Set {{ $quiz_set->set_no }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id='start_quiz' onclick='startQuiz()' class="btn btn-primary purple-color px-3 start_quiz_button">Start</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
