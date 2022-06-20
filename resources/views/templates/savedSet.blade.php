<div class="schoolquiz_animation"></div>
<x-app-layout>
    <x-slot name="header">
        <div class="quiz-header saved">
            <i id="fa-back" class="d-none fas fa-arrow-left h2 text-dark position-absolute cursor-pointer" title="Go to Dashboard"></i>
            <div class="d-flex justify-between">
                <div class="d-flex">
                    <div class="d-flex">
                        <img class="logo" src="{{ url('images/lightbulb.png') }}" alt="Quiz"  title="Quiz Portal">
                    </div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto ml-2">
                        {{ __('Quiz in Progress') }}
                    </h2>
                </div>
                <div class="cross my-auto d-none">
                    <i class="fas fa-times-circle text-danger h4 home_icon"></i>
                </div>
                <div class="d-flex team-points header">
                    <span class="team_a_points badge badge-dark rounded-pill p-2 my-auto ml-2"></span>
                    <span class="team_b_points badge badge-warning rounded-pill p-2 my-auto ml-2"></span>
                    <span class="team_c_points badge badge-info rounded-pill p-2 my-auto ml-2"></span>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-4 px-10 text-center play-set">
        <div class="container mx-auto">
            <div class="row">
                <div class="d-none team-points mobile-screen mx-auto mb-3">
                    <span class="team_a_points badge badge-dark p-2 my-auto ml-2"></span>
                    <span class="team_b_points badge badge-dark p-2 my-auto ml-2"></span>
                    <span class="team_c_points badge badge-dark p-2 my-auto ml-2"></span>
                </div>
                <div class="saved_quiz card shadow border border-white w-100 card_back_color">
                    <div class="card-body mt-3 mx-3 mb-0 pb-0" style="padding-top: 0;">
                        <div class="d-flex justify-center mb-3">
                            <img class="ques_icon" src="{{ url('images/quiz_icon.png') }}" alt="quiz">
                            <h5 class="ques_heading font-semibold m-2 text-secondary">Question-1/30</h5>
                            <span id="team_id" class="badge badge-success p-2 my-auto ml-2 rounded-pill purple-color"></span>
                        </div>
                        <form>
                            @csrf
                            <div class="form-group">
                                <h5 class="form-control shadow-sm rounded quiz_options" id="question" style="border-color: #d8dadc;"></h5>
                            </div>
                            <div class="form-row detail-section">
                                <div class="form-group col-md-6 ml-3 mx-auto question-options">
                                    <div class="mt-4 d-flex">
                                        <h4 class="m-auto">A. </h4>
                                        <div class="input-group ml-3 shadow-sm">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <input type="radio" name="answer" value="A" id="answer" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                            <h5 id="option1" class="form-control text-left quiz_options"></h5>
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
                                            <h5 id="option2" class="form-control text-left quiz_options"></h5>
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
                                            <h5 id="option3" class="form-control text-left quiz_options"></h5>
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
                                            <h5 id="option4" class="form-control text-left quiz_options"></h5>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="storedQuestions" value="1">
                                <div class="form-group col-md-5 ml-5 mt-4 mx-auto question-media">
                                    <img id="question_media" class="rounded m-auto" src="{{ url('images/media_icon.gif') }}" alt="No Media Image">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 justify-between d-flex">
                        <i id='back-{{ $quiz_set_no }}' class="invisible fas fa-arrow-circle-left text-dark h4 float-left">  Back</i>
                        <div class="stopwatch rounded-circle">
                            <div id="stopwatch" class="mb-0 text-center font-weight-bold text-white h5">60</div>
                        </div>
                        <button id='save_details' data-question="1" data-set="{{ $quiz_set_no }}" data-team="A" onclick='submitAnswer(this)' tabindex="0" class="btn btn-dark px-4 float-right rounded-pill">Submit</button>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-center mt-4 mb-2">
                <div class="ml-1 mt-2 float-left" style="z-index: 10"><button id="question-1" data-question="1" class="btn btn-dark rounded shadow create_question_pagination" title="Question 1">1</button></div>
                @php
                    for ($i = 2 ; $i < 31 ; $i++) {
                        echo '<div class="ml-1 mt-2 float-left" style="z-index: 10"><button id=question-' . $i . ' data-question=' . $i . ' class="btn btn-secondary rounded shadow create_question_pagination" title="Question ' . $i . '">' . $i . '</button></div>';
                    }
                @endphp
            </div>

            <img class="w-60 position-absolute top-32 left-0 back-image1" src="{{ url('images/speed.png') }}" alt="quiz">
            <img class="w-60 position-absolute bottom-60 right-0 back-image2" src="{{ url('images/program.png') }}" alt="quiz">
        </div>
    </div>

    <!--Question Saved Modal -->

    <div class="modal fade" id="SavedQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ALERT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error_msg text-danger"></div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    @include('templates.user_modals')
    <script>
        $(document).ready(function() {
            $('footer').hide();
            $('#StartQuiz').modal('show');
            $('#StartQuiz').on('shown.bs.modal', function() {
                $(this).find('button').focus();
            });
        });
    </script>
</x-app-layout>
