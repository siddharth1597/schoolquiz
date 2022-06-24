var idleInterval = null;
var stopwatch_interval = null;
var stopwatch_timeout = null;
var store_team_points = [];
var IDLE_TIMEOUT = 5; //5 seconds idle timeout

// Key Press events for submitting through keyboard
$('html').bind('keydown', function(e)
{
   if(e.keyCode == 32 )
   {
      return false;
   }
});

$(document).on('keyup', function (event) {
  var key_code = event.code;

  if (key_code == 'KeyA') {
    if(!($("#ContinueQuiz").data('bs.modal') || {})._isShown) {
      $('input[name="answer"][value="A"]').prop('checked', true);
    }
  }
  else if (key_code == 'KeyB') {
    if(!($("#ContinueQuiz").data('bs.modal') || {})._isShown) {
      $('input[name="answer"][value="B"]').prop('checked', true);
    }
  }
  else if (key_code == 'KeyC') {
    if(!($("#ContinueQuiz").data('bs.modal') || {})._isShown) {
      $('input[name="answer"][value="C"]').prop('checked', true);
    }
  }
  else if (key_code == 'KeyD') {
    if(!($("#ContinueQuiz").data('bs.modal') || {})._isShown) {
      $('input[name="answer"][value="D"]').prop('checked', true);
    }
  }
  else if (key_code == 'Enter' || key_code == 'NumpadEnter') {
    if($('.schoolquiz_animation').css('display') != 'none') {
      $('.schoolquiz_animation').hide();
    }
    else if(($("#ResultQuiz").data('bs.modal') || {})._isShown) {
      if (!$("#quiz_result").is(":focus")) {
        $('#quiz_result')[0].click();
      }
    }
    else if(($("#ContinueQuiz").data('bs.modal') || {})._isShown) {
      if (!$("#continue_question").is(":focus")) {
        $('#continue_question')[0].click();
      }
    }
    else if(($("#StartQuiz").data('bs.modal') || {})._isShown) {
      if (!$("#play_set").is(":focus")) {
        $('#play_set')[0].click();
      }
    }
    else {
      $('#save_details')[0].click();
    }
    event.stopPropagation();
    event.preventDefault();
  }
});

$(document).ready(function() {
  $('#quiz_result').on('click', function() {
    if ($(this).hasClass('half_rounds_completed')) {
      playQuiz($(this));
    }
    else if ($(this).hasClass('all_rounds_completed')) {
      window.location = url + '/home/savedQuiz/winnerTeam';
    }
  });
});


// CountDown Timer 
function stopwatch() {
  clearInterval(stopwatch_interval);

  var total_time = 60; // 60 seconds
  var count = 1;
  var pause_time = 10000; // 10sec pause time before start timer.

  $('.stopwatch').addClass('bg-success').removeClass('bg-warning').removeClass('bg-danger');

  // this function will start after pause_time
  // stopwatch_timeout = setTimeout(function() {

    // Update the count down every 1 second
    stopwatch_interval = setInterval(function () {

      var current = total_time - count;

      // Output the result in an element with id="stopwatch"
      document.getElementById("stopwatch").innerHTML = current;
      count++;

      if (current < 30) {
        $('.stopwatch').removeClass('bg-success').addClass('bg-warning');
      }
      if (current < 15) {
        $('.stopwatch').removeClass('bg-warning').addClass('bg-danger');
      }

      // If the count down is over, write some text 
      if (current < 0) {
        document.getElementById("stopwatch").innerHTML = "Time's up";
        var status_gif = '\\images/timeout.png';
        var status = 'Very Poor';
        var current_question = $('#save_details').attr('data-question');
        var current_team = $('#save_details').attr('data-team');
        var next_question = Number(current_question) + 1;
        var next_team = current_team == 'A' ? 'B' : (current_team == 'B' ? 'C' : 'A');

        // set pagination
        $('#question-' + current_question).addClass('btn-success').removeClass('btn-secondary').removeClass('btn-dark');
        $('#question-' + next_question).addClass('btn-dark').removeClass('btn-secondary');
        var audio1 = '';
        var audio2 = '\\sounds/very_poor.mp3';

        clearSavedForm();
        showContinueModal(status_gif, status, next_team, next_question, store_team_points, audio1, audio2);
      }
    }, 1000);

  // }, pause_time);
}

// Check idle count
function idleCounter() {
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
    if (idleCounter > IDLE_TIMEOUT) {
      $('.schoolquiz_animation').show();
    }
  }, 1000);
}

// show modal after every question.
function showContinueModal(status_gif, status, next_team, next_question, team_points, audio1, audio2) {
  // Status Audio
  if(audio1 !== '') {
    var sound1 = new Audio(audio1);
    sound1.play();
  }

  if(audio2 !== '') {
    var sound2 = new Audio(audio2);
    sound2.play();
  }

  if (next_question != 16 && next_question != 31) {
    $('#ContinueQuiz').find('.continue_team').text('Team ' + next_team);
    $('#ContinueQuiz').find('#continue_question').attr('data-question', next_question);
    $('#ContinueQuiz').find('img').attr('src', status_gif).attr('alt', status);

    $('#ContinueQuiz').modal('show');

  }
  else if (next_question == 16 || next_question == 31) {
    if (next_question == 16) {
      $('#ResultQuiz').find('#quiz_result').attr('data-question', next_question);
    }
    if (next_question == 31) {
      $('#ResultQuiz').find('#quiz_result').text('See Results');
      $('#ResultQuiz').find('#quiz_result').removeClass('half_rounds_completed').addClass('all_rounds_completed');
    }
    if (team_points != null) {
      $('#ResultQuiz').find('#team_a_points').text(team_points['A'] + ' points');
      $('#ResultQuiz').find('#team_b_points').text(team_points['B'] + ' points');
      $('#ResultQuiz').find('#team_c_points').text(team_points['C'] + ' points');
    }
    $('#ResultQuiz').find('.round_no').text('Round ' + ((next_question - 1) / 3));
    $('#ResultQuiz').modal('show');
    $('#ResultQuiz').on('shown.bs.modal', function() {
      $(this).find('button').focus();
    });
  }

  // start idle counter
  // idleCounter();
}

// Clear the form after every question.
function clearSavedForm() {

  // clear the timeout
  clearTimeout(stopwatch_timeout);
  stopwatch_timeout = null;

  // clear the stopwatch
  clearInterval(stopwatch_interval);
  stopwatch_interval = null;
  $('#stopwatch').html('60');

  document.getElementById('question').innerHTML = '';
  document.getElementById('option1').innerHTML = '';
  document.getElementById('option2').innerHTML = '';
  document.getElementById('option3').innerHTML = '';
  document.getElementById('option4').innerHTML = '';
  $('input[name="answer"]').prop('checked', false);
  $('#question_media').attr('src', '\\images/media_icon.gif').attr('alt', 'No Media Image');
}

// Get the question data.
function playQuiz($this) {
  $('.loading').css('display', 'flex');
  $('input[name="answer"]').prop('checked', false); // to clear any selected option for safety
  var question_no = $($this).attr('data-question');
  var set_no = $($this).attr('data-set');

  // clear idle counter
  // clearInterval(idleInterval);
  // idleInterval = null;

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
          if (data.team_points != undefined) {
            $('.team_a_points').text('Team-A: ' + data.team_points['A']);
            $('.team_b_points').text('Team-B: ' + data.team_points['B']);
            $('.team_c_points').text('Team-C: ' + data.team_points['C']);
          }
          document.getElementById('question').innerHTML = data.saved_question['question'];
          document.getElementById('option1').innerHTML = data.saved_question['option1'];
          document.getElementById('option2').innerHTML = data.saved_question['option2'];
          document.getElementById('option3').innerHTML = data.saved_question['option3'];
          document.getElementById('option4').innerHTML = data.saved_question['option4'];

          if (data.saved_question['media_file'] != '') {
            $('#question_media').attr('src', data.saved_question['media_file'] + '?v=' + (new Date()).getTime()).attr('alt', 'Quiz Media Image');
          }

          $('.ques_heading').text('Question-' + data.question + '/30');
          $('#save_details').attr('data-question', data.question);
          $('#save_details').attr('data-team', data.team);
          $('.loading').css('display', 'none');

          if ($('#StartQuiz').is(':visible')) {
            $('#StartQuiz').modal('hide');
          }
          if ($('#ContinueQuiz').is(':visible')) {
            $('#ContinueQuiz').modal('hide');
          }
          if ($('#ResultQuiz').is(':visible')) {
            $('#ResultQuiz').modal('hide');
          }

          stopwatch();
        }
        else {
          // when no question is saved on the particular set.
          if ($('#ContinueQuiz').is(':visible')) {
            $('#ContinueQuiz').modal('hide');
          }
          if ($('#ResultQuiz').is(':visible')) {
            $('#ResultQuiz').modal('hide');
          }
          $('.loading').css('display', 'none');
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

// Submit the Answer.
function submitAnswer($this) {
  var question_no = $($this).attr('data-question');
  var team = $($this).attr('data-team');
  var answer = '';
  var status_gif = '';
  var status = '';
  var audio1 = '';
  var audio2 = '';

  if ($('input[name="answer"]').is(":checked")) {
    answer = $('input[name="answer"]:checked').val();
  }
  else {
    $('#SavedQuiz').find('.modal-body .error_msg').html('Please select the answer to continue...');
    $('#SavedQuiz').modal('show');
    return;
  }

  if (answer && team && question_no) {
    $('.loading').css('display', 'flex');
    $.ajax({
      type: 'POST',
      url: url + '/submitAnswer',
      data: {
        'question_no': question_no,
        'team': team,
        'answer': answer
      },

      success: function (data) {
        clearSavedForm();

        // pagination button set
        $('#question-' + question_no).addClass('btn-success').removeClass('btn-secondary').removeClass('btn-dark');
        $('#question-' + (Number(question_no) + 1)).addClass('btn-dark').removeClass('btn-secondary');

        if (data.status == 'matched') {
          status_gif = '\\images/tick.png';
          status = 'Right Answer';
          audio1 = '';
          audio2 = '\\sounds/right_answer.mp3';
        }
        else if (data.status == 'unmatched') {
          status_gif = '\\images/cross.png';
          status = 'Wrong Answer';
          audio1 = '';
          audio2 = '\\sounds/wrong_answer.mp3';
        }

        // store team current points after every submit.
        store_team_points = data.team_points;
        $('.loading').css('display', 'none');

        // set data on modal
        showContinueModal(status_gif, status, data.next_team, data.next_question, data.team_points, audio1, audio2);
      }
    });
  }
  else {
    alert('Something went wrong');
  }
}

// Winner Page Audio play.
function winner_sound(team_name) {
  var audio1 = '\\sounds/the_winner.mp3';
  var audio2 = '\\sounds/victory.mp3';
  var team_a = '\\sounds/team_a.mp3';
  var team_b = '\\sounds/team_b.mp3';
  var team_c = '\\sounds/team_c.mp3';
  var tied_team = '\\sounds/quiz_tied.mp3';
  var sound_tied = new Audio(tied_team);
  var sound1 = new Audio(audio1);
  var sound2 = new Audio(audio2);

  if (team_name.trim() == 'Team-A') {
    sound1.play();
  }
  else if (team_name.trim() == 'Team-B') {
    sound1.play();
  }
  else if (team_name.trim() == 'Team-C') {
    sound1.play();
  }
  else {
    sound_tied.play();
  }

  setTimeout (function() {
    sound2.play();
  }, 1600);

  setTimeout (function() {
    if (team_name.trim() == 'Team-A') {
      var sound_a = new Audio(team_a);
      sound_a.play();
    }
    else if (team_name.trim() == 'Team-B') {
      var sound_b = new Audio(team_b);
      sound_b.play();
    }
    else if (team_name.trim() == 'Team-C') {
      var sound_c = new Audio(team_c);
      sound_c.play();
    }
  }, 2600);
}
