var idleInterval = '';
var stopwatch_interval = '';

// Key Press events for submitting through keyboard
$(document).ready(function() {
  document.onkeypress = function (event) {
    var key_code = event.code;

    if (key_code == 'KeyA') {
      $('input[name="answer"][value="A"]').prop('checked', true);
    }
    else if (key_code == 'KeyB') {
      $('input[name="answer"][value="B"]').prop('checked', true);
    }
    else if (key_code == 'KeyC') {
      $('input[name="answer"][value="C"]').prop('checked', true);
    }
    else if (key_code == 'KeyD') {
      $('input[name="answer"][value="D"]').prop('checked', true);
    }
    else if (key_code == 'Enter' || key_code == 'NumpadEnter') {
      $('#save_details').click();
    }
  };
})

// Timer 
function stopwatch() {
  var total_time = 71; // 71 seconds
  var count = 1;

  $('.stopwatch').addClass('bg-success').removeClass('bg-warning').removeClass('bg-danger');

  // Update the count down every 1 second
  stopwatch_interval = setInterval(function () {

    var current = total_time - count;

    // Output the result in an element with id="stopwatch"
    document.getElementById("stopwatch").innerHTML = current;
    count++;

    if (current < 40) {
      $('.stopwatch').removeClass('bg-success').addClass('bg-warning');
    }
    if (current < 20) {
      $('.stopwatch').removeClass('bg-warning').addClass('bg-danger');
    }

    // If the count down is over, write some text 
    if (current < 0) {
      clearInterval(stopwatch_interval);
      document.getElementById("stopwatch").innerHTML = "Time's up";
      var status_gif = '\\images/very_poor.gif';
      var status = 'Very Poor';
      var current_question = $('#save_details').attr('data-question');
      var current_team = $('#save_details').attr('data-team');
      var next_question = Number(current_question) + 1;
      var next_team = current_team == 'A' ? 'B' : (current_team == 'B' ? 'C' : 'A');
      
      // set pagination
      $('#question-' + current_question).addClass('btn-success').removeClass('btn-secondary').removeClass('btn-dark');
      $('#question-' + next_question).addClass('btn-dark').removeClass('btn-secondary');

      showContinueModal(status_gif, status, next_team, next_question);
    }
  }, 1000);
}

// Check idle count
function idleCounter() {
  var IDLE_TIMEOUT = 5; //seconds
  var idleCounter = 0;

  document.onclick = function () {
    idleCounter = 0;
    $('.schoolquiz_animation').hide();
  };

  document.onmousemove = function () {
    idleCounter = 0;
    $('.schoolquiz_animation').hide();
  };

  document.onkeypress = function () {
    idleCounter = 0;
    $('.schoolquiz_animation').hide();
  };

  idleInterval = setInterval(function() {
    idleCounter++;
    if (idleCounter >= IDLE_TIMEOUT) {
      $('.schoolquiz_animation').show();
    }
  }, 1000);
}

// show modal after every question.
function showContinueModal(status_gif, status, next_team, next_question) {
  $('#ContinueQuiz').find('.continue_team').text('Team ' + next_team);
  $('#continue_question').attr('data-question', next_question);
  $('#ContinueQuiz').find('img').attr('src', status_gif).attr('alt', status);

  $('#ContinueQuiz').modal('show');
  $('#ContinueQuiz').on('shown.bs.modal', function() {
      $(this).find('button').focus();
  });
}

function playQuiz($this) {
  var question_no = $($this).attr('data-question');
  var set_no = $($this).attr('data-set');

  // clear idle counter
  clearInterval(idleInterval);

  $.ajax({
    type: 'POST',
    url: url + '/getQuestions',
    data: {
      'question_no': question_no,
      'set_no': set_no,
    },

    success: function (data) {
      if(data.message) {
        alert(data.message);
      }

      if (data.success == 'yes') {
        if (data.saved_question !== '') {
          $('#team_id').text('Team-' + data.team);
          document.getElementById('question').innerHTML = data.saved_question['question'];
          document.getElementById('option1').innerHTML = data.saved_question['option1'];
          document.getElementById('option2').innerHTML = data.saved_question['option2'];
          document.getElementById('option3').innerHTML = data.saved_question['option3'];
          document.getElementById('option4').innerHTML = data.saved_question['option4'];

          if (data.saved_question['media_file'] != '') {
            $('question_media').attr('src', data.saved_question['media_file']);
          }

          $('.ques_heading').text('Question-' + data.question);
          $('#save_details').attr('data-question', data.question);
          $('#save_details').attr('data-team', data.team);

          $('#StartQuiz').modal('hide');
          $('#ContinueQuiz').modal('hide');
          stopwatch();
        }
        else {
          // when no question is saved on the particular set.
          $('#ContinueQuiz').modal('hide');
          $('#SavedQuiz').find('.modal-body .error_msg').html('No further questions are available. Please select another quiz set.');
          $('#SavedQuiz').find('.modal-body').append('<a href="/home">Click here to go to Homepage</a>');
          $('#SavedQuiz').attr('data-backdrop', 'static');
          $('#SavedQuiz').attr('data-keyboard', 'false');
          $('#SavedQuiz').find('button').remove();
          $('#SavedQuiz').modal('show');
          return;
        }
      }
    }
  });
}

function submitAnswer($this) {
  var question_no = $($this).attr('data-question');
  var team = $($this).attr('data-team');
  var answer = '';
  var status_gif = '';
  var status = '';

  if ($('input[name="answer"]').is(":checked")) {
    answer = $('input[name="answer"]:checked').val();
  }
  else {
    $('#SavedQuiz').find('.modal-body .error_msg').html('Please select the answer to continue...');
    $('#SavedQuiz').modal('show');
    return;
  }

  if (answer && team && question_no) {
    $.ajax({
      type: 'POST',
      url: url + '/submitAnswer',
      data: {
        'question_no': question_no,
        'team': team,
        'answer': answer
      },

      success: function (data) {
        
        document.getElementById('question').innerHTML = '';
        document.getElementById('option1').innerHTML = '';
        document.getElementById('option2').innerHTML = '';
        document.getElementById('option3').innerHTML = '';
        document.getElementById('option4').innerHTML = '';
        $('input[name="answer"]').prop('checked', false);
        $('question_media').attr('src', '/images/quiz-logo-poll.jpg');

        // pagination button set
        $('#question-' + question_no).addClass('btn-success').removeClass('btn-secondary').removeClass('btn-dark');
        $('#question-' + (Number(question_no) + 1)).addClass('btn-dark').removeClass('btn-secondary');

        if (data.status == 'matched') {
          status_gif = '\\images/right_answer.gif';
          status = 'Right Answer';
        }
        else if (data.status == 'unmatched') {
          status_gif = '\\images/wrong_answer.gif';
          status = 'Wrong Answer';
        }

        // set data on modal
        showContinueModal(status_gif, status, data.next_team, data.next_question)

        // clear the stopwatch
        clearInterval(stopwatch_interval);
        $('#stopwatch').html('70');

        // start idle counter
        //idleCounter();
      }
    });
  }
  else {
    alert('Something went wrong');
  }
}
