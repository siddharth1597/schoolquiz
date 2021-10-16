<x-app-layout>
    <x-slot name="header">
        <div class="quiz-header">
            <i id="fa-back" class="fas fa-arrow-left h2 text-dark position-absolute cursor-pointer" title="Go to Dashboard"></i>
            <div class="d-flex justify-between">
                <div class="d-flex">
                    <i id="fa-edit" class="fas fa-edit h2 text-dark mr-3"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto">
                        {{ __('Create Quiz') }}
                    </h2>
                </div>
                <div class="row">
                    <h3 class="text-success font-semibold">Quiz Set-{{ $quiz_set_no }}</h3>
                </div>
                <div class="d-flex go_to_dashboard">
                    <img class="logo homepage" src="{{ url('images/school_quiz1.png') }}" alt="School Quiz"  title="Go to Dashboard">
                </div>
            </div>
        </div>
    </x-slot>
    <div class="background_wall"></div>
    <div class="py-10 px-10 text-center create-set">
        <div class="row d-flex justify-center mt-2 mb-4">
            <div class="ml-1 mt-2 float-left" style="z-index: 10"><button id="question-1" data-question="1" class="btn btn-dark rounded shadow create_question_pagination" title="Question 1">1</button></div>
            @php
                for ($i = 2 ; $i < 31 ; $i++) {
                    echo '<div class="ml-1 mt-2 float-left" style="z-index: 10"><button id=question-' . $i . ' data-question=' . $i . ' class="btn btn-secondary rounded shadow create_question_pagination" title="Question ' . $i . '">' . $i . '</button></div>';
                }
            @endphp
        </div>
        <div class="container mx-auto">
            <div class="row">
                <div class="card shadow border border-white w-100 card_back_color">
                    <div class="card-body m-3" style="padding-top: 0;">
                        <div class="d-flex justify-center mb-3">
                            <img class="ques_icon" src="{{ url('images/quiz_icon.png') }}" alt="quiz">
                            <h4 class="ques_heading font-weight-bold m-2 text-secondary">Question-1</h4>
                        </div>
                        <form>
                            @csrf
                            <div class="form-group">
                                <textarea class="rounded shadow-sm form-control" name="question" id="question" cols="115" rows="3" placeholder="Type your question here..." style="border-color: #d8dadc;"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ml-3 mx-auto question-options">
                                    <div class="mt-4 d-flex">
                                        <h4 class="m-auto">A. </h4>
                                        <div class="input-group ml-3 shadow-sm">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" value="A" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input id="option1" type="text" class="form-control" placeholder="Option 1">
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex">
                                        <h4 class="m-auto">B. </h4>
                                        <div class="input-group ml-3 shadow-sm">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" value="B" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input id="option2" type="text" class="form-control" placeholder="Option 2">
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex">
                                        <h4 class="m-auto">C. </h4>
                                        <div class="input-group ml-3 shadow-sm">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" value="C" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input id="option3" type="text" class="form-control" placeholder="Option 3">
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex">
                                        <h4 class="m-auto">D. </h4>
                                        <div class="input-group ml-3 shadow-sm">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" value="D" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <input id="option4" type="text" class="form-control" placeholder="Option 4">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="storedQuestions" value="1">
                                <div class="form-group col-md-5 ml-5 mt-4 mx-auto question-media">
                                    <div class="d-flex">
                                        <div class="custom-file">
                                            <input required type="file" class="shadow-sm cursor-pointer custom-file-input" onchange="image_file(event, this.id)" id="media_file" name="customFile" />
                                            <label class="custom-file-label text-left shadow-sm" for="customFile" id="media_files">+ Add Image (optional)</label>
                                            <small id="upload_msg_proof d-none" class="form-text"></small>
                                        </div>
                                    </div>
                                    <i class="far fa-image h1 mt-2" style="font-size: 9.5rem; color:#d8dadc"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-4">
                        <i id='back-{{ $quiz_set_no }}' data-set={{ $quiz_set_no }} data-question="0" class="fas fa-arrow-circle-left text-dark h4 cursor-pointer back_link float-left" onclick="backForm(this)">  Back</i>
                        <button id='save_details-{{ $quiz_set_no }}' data-question="1" data-set="{{ $quiz_set_no }}" onclick='saveQuestion(this, "create")' class="btn btn-primary float-right">Submit & Next</button>
                    </div>
                </div>
            </div>
            <div>
                <img class="w-25 mx-auto" src="{{ url('images/quiz-logo-poll.jpg') }}" alt="quiz">
            </div>
        </div>
    </div>

    <!--Question Saved Modal -->

    <div class="modal fade" id="SavedQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SAVED QUIZ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Question Saved</div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</x-app-layout>
