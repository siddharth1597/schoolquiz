<!--Start-Quiz Modal -->

<div class="modal fade" tabindex="-1" id="StartQuiz" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">START QUIZ</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <p class="text-success">Get ready to play the quiz!! Start with Team-A</p>
        </div>
      </div>
      <div class="modal-footer">
        <!-- At first time only. -->
        <button autofocus id='play_set-{{ $quiz_set_no }}' data-set="{{ $quiz_set_no }}" data-question="1" data-team="A" onclick='playQuiz(this)' class="btn btn-success">Start Quiz</button>
      </div>
    </div>
  </div>
</div>

<!--Continue-Quiz Modal -->

<div class="modal fade" id="ContinueQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONTINUE QUIZ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <!-- Change according to the question no. -->
          <p class="text-dark">Get ready </p> 
          <P class="continue_team">Team-B</P>
          <p> Now your turn !!</p> 
        </div>
      </div>
      <div class="modal-footer">
        <!-- start after submit of question 1 -->
        <button id='continue_question' data-question="2" data-set="{{ $quiz_set_no }}" data-team="B" onclick='continueQuestion(this)' class="btn btn-primary">Continue</button>
      </div>
    </div>
  </div>
</div>
