function stopwatch() {
  var total_time = 71; // 71 seconds
  var count = 1;

  // Update the count down every 1 second
  var interval = setInterval(function () {

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
      clearInterval(interval);
      document.getElementById("stopwatch").innerHTML = "Time's up";
    }
  }, 1000);
}

function playQuiz($this) {
  var question_no = $($this).attr('data-question');
  var set_no = $($this).attr('data-set');
  var team = $($this).attr('data-team');
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
          $('#team_id').text('Team-' + team);
          document.getElementById('question').value = data.saved_question['question'];
          document.getElementById('option1').value = data.saved_question['option1'];
          document.getElementById('option2').value = data.saved_question['option2'];
          document.getElementById('option3').value = data.saved_question['option3'];
          document.getElementById('option4').value = data.saved_question['option4'];

          if (data.saved_question['media_file'] != '') {
            $('question_media').attr('src', data.saved_question['media_file']);
          }
          $('#StartQuiz').modal('hide');
          stopwatch();
        }
      }
    }
  });
}
