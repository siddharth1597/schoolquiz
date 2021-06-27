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

<!--Result Modal -->

<div class="modal fade" id="ResultQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group">
          <div class="d-flex mt-4 justify-center">
            <p class="text-dark font-semibold">Results after <span class="badge badge-success p-2 ml-2">Round 5</span></p>
          </div>
          <div class="row results d-block">
            <div class="row justify-center shadow-sm">
              <img class="w-40" src="{{ url('images/screen_show.jpg') }}" alt="school quiz">
            </div>
            <div class="row justify-center mt-3 shadow-sm">
              <h5 class="col-md-1">1. </h5>
              <h5 class="col-md-4 font-semibold">Team A</h5>
              <h5 class="col-md-3 font-semibold text-danger" id="team_a_points">0</h5> <!-- points -->
            </div>
            <div class="row justify-center mt-3 shadow-sm">
              <h5 class="col-md-1">2. </h5>
              <h5 class="col-md-4 font-semibold">Team B</h5>
              <h5 class="col-md-3 font-semibold text-danger" id="team_b_points">0</h5> <!-- points -->
            </div>
            <div class="row justify-center mt-3 shadow-sm">
              <h5 class="col-md-1">3. </h5>
              <h5 class="col-md-4 font-semibold">Team C</h5>
              <h5 class="col-md-3 font-semibold text-danger" id="team_c_points">0</h5> <!-- points -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer mx-auto">
        <button autofocus id='quiz_result' data-question="" data-set="{{ $quiz_set_no }}" class="btn btn-dark half_rounds_completed">Go Ahead</button>
      </div>
    </div>
  </div>
</div>
