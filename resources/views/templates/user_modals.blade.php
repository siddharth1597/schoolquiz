<!--Start-Quiz Modal -->

<div class="modal fade" tabindex="-1" id="StartQuiz" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">START QUIZ</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <p class="text-success">Get ready to play the quiz!!</p>
        </div>
      </div>
      <div class="modal-footer">
        <!-- At first time only. -->
        <button autofocus id='play_set-{{ $quiz_set_no }}' data-set="{{ $quiz_set_no }}" data-question="1" onclick='playQuiz(this)' class="btn btn-success">Start Quiz</button>
      </div>
    </div>
  </div>
</div>

<!--Continue-Quiz Modal -->

<div class="modal fade" id="ContinueQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group">
          <!-- Change according to the question status -->
          <img src="{{ url('/images/right_answer.gif') }}" alt="Right Answer">
          <div class="d-flex mt-4 justify-center">
            <p class="text-dark">Get ready <span class="continue_team font-semibold">Team-B</span> Now your turn !!</p>
          </div>
        </div>
      </div>
      <div class="modal-footer mx-auto">
        <!-- start after submit of question 1 -->
        <button autofocus id='continue_question' data-question="" data-set="{{ $quiz_set_no }}" onclick='playQuiz(this)' class="btn btn-dark">Go Ahead</button>
      </div>
    </div>
  </div>
</div>
