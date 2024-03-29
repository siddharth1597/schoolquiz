// To save the Questions

function saveQuestion($this, config_type) {
  
  var question = document.getElementById('question').value;
  var option1 = document.getElementById('option1').value;
  var option2 = document.getElementById('option2').value;
  var option3 = document.getElementById('option3').value;
  var option4 = document.getElementById('option4').value;
  var media_value = document.getElementById('media_file').value;
  var question_no = $($this).attr('data-question');
  var set_no = $($this).attr('data-set');
  var answer = '';

  var media_file = media_value != '' ? document.getElementById('media_file').files[0] : '';

  var form_data = new FormData();
  form_data.append("media_file", media_file);
  form_data.append("question", question);
  form_data.append("option1", option1);
  form_data.append("option2", option2);
  form_data.append("option3", option3);
  form_data.append("option4", option4);
  form_data.append("set_no", set_no);
  form_data.append("question_no", question_no);
  form_data.append("config_type", config_type);

  if (question && option1 && option2 && option3 && option4) {
    $('.loading').css('display', 'flex');
    
    if ($('input[name="answer"]').is(":checked")) {
      answer = $('input[name="answer"]:checked').val();
      form_data.append("answer", answer);
    }
    else {
      $('#SavedQuiz').find('.modal-body').html('<div class="text-danger">Please select the answer to continue...</div>');
      $('#SavedQuiz').modal('show');
      return;
    }
    $.ajax({
      url: url + '/saveQuestion',
      method:"POST",
      data: form_data,
      dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,

      success: function (data) {
        $('.loading').css('display', 'none');
        if (data.success == 'yes') {
          if (data.next_question_no <= 30) {
            $('#SavedQuiz').find('.modal-body').html('Question-' + question_no + ' is saved.');
            $('#SavedQuiz').modal('show');

            setTimeout(function() {
              clearForm(data.next_question_no, $this, set_no);
            }, 1500);
          }
          else {
            window.location = url + '/dashboard';
          }
        }
        else {
          if(data.message) {
            $('#SavedQuiz').find('.modal-body').html('<div class="text-danger">' + data.message + '</div>');
            $('#SavedQuiz').modal('show');
            return;
          }
        }
      }
    });
  }
  else {
    alert('All fields are required');
  }
}

// Clear the form and set the next value parameters

function clearForm(next_question_no, $this, set_no) {

  $('#SavedQuiz').modal('hide');
  document.getElementById('question').value = '';
  document.getElementById('option1').value = '';
  document.getElementById('option2').value = '';
  document.getElementById('option3').value = '';
  document.getElementById('option4').value = '';
  document.getElementById('media_file').value = '';
  document.getElementById('media_files').innerHTML = '+ Add Image or Video (optional)';
  $($this).attr('data-question', next_question_no);
  $('#back-' + set_no).attr('data-question', next_question_no - 1);
  $('.ques_heading').text('Question-' + next_question_no + '/30');
  $('[name="answer"]').prop('checked', false);
  
  if (next_question_no == 30) { 
    $('#save_details-' + set_no).text('Save Quiz');
  }

  if ($('#save_details-' + set_no).length > 0) {
    $('#question-' + (next_question_no - 1)).addClass('btn-success').removeClass('btn-secondary').removeClass('btn-dark');
    $('#question-' + next_question_no).addClass('btn-dark').removeClass('btn-secondary');
  }
  else {
    $('#question-' + (next_question_no - 1)).removeClass('btn-success').addClass('btn-secondary');
    $('#question-' + next_question_no).addClass('btn-success').removeClass('btn-secondary');
  }

  if ($($this).attr('id') == ('update_details-' + set_no)) {
    storedNextForm(Number(next_question_no), set_no);
  }
  else {
    if (Number(next_question_no) - 1 >= $('#storedQuestions').val()) {
      $('#storedQuestions').val(Number(next_question_no) - 1); // stored temp value for check filled question
    }
    else {
      storedNextForm(Number(next_question_no), set_no);
    }
  }
}

// Show the stored form values

function storedNextForm(current_question, set_no) {
  $('.loading').css('display', 'flex');
  $.ajax({
    type: 'POST',
    url: url + '/storedQuestion',
    data: {
      'question_no': current_question,
      'set_no': set_no
    },

    success: function (data) {
      if(data.message) {
        alert(data.message);
      }
      if (data.success == 'yes') {
        if (data.saved_question !== '') {
          document.getElementById('question').value = data.saved_question['question'];
          document.getElementById('option1').value = data.saved_question['option1'];
          document.getElementById('option2').value = data.saved_question['option2'];
          document.getElementById('option3').value = data.saved_question['option3'];
          document.getElementById('option4').value = data.saved_question['option4'];
          $('input[name="answer"][value='+ data.saved_question["answer"] +']').prop('checked', true);

          if (data.saved_question['media_file'] != '') {
            document.getElementById('media_files').innerHTML = data.saved_question['media_file'].split('/')[3];
            if ($('#update_details-' + set_no).length > 0) {
              $('.media_image').attr('src', data.saved_question['media_file'] + '?v=' + (new Date()).getTime()).attr('alt', 'Quiz Media Image');
            }
          }
          else {
            $('.media_image').attr('src', '\\images/media_icon.gif').attr('alt', 'No Media Image');
            document.getElementById('media_file').value = '';
            document.getElementById('media_files').innerHTML = '+ Add Image or Video (optional)';
          }

          flag_update = true;
        }

        $('#back-' + set_no).attr('data-question', current_question - 1);
        $('.ques_heading').text('Question-' + (current_question) + '/30');
        if ($('#save_details-' + set_no).length > 0) {
          $('#save_details-' + set_no).attr('data-question', current_question);
        }
        if ($('#update_details-' + set_no).length > 0) {
          $('#update_details-' + set_no).attr('data-question', current_question);
        }
        $('.loading').css('display', 'none');
      }
    }
  });
}

// Back to previous question

function backForm($this) {

  $('.loading').css('display', 'flex');
  var current_question = $($this).attr('data-question');
  var set_no = $($this).attr('data-set');

  if (current_question == 0) {
    window.location = url + '/dashboard';
  }
  else {
    $.ajax({
      type: 'POST',
      url: url + '/storedQuestion',
      data: {
        'question_no': current_question,
        'set_no': set_no
      },

      success: function (data) {
        if(data.message) {
          alert(data.message);
        }
        if (data.success == 'yes') {
          document.getElementById('question').value = data.saved_question['question'];
          document.getElementById('option1').value = data.saved_question['option1'];
          document.getElementById('option2').value = data.saved_question['option2'];
          document.getElementById('option3').value = data.saved_question['option3'];
          document.getElementById('option4').value = data.saved_question['option4'];

          $($this).attr('data-question', current_question - 1);
          $('.ques_heading').text('Question-' + (Number(current_question)) + '/30');
          $('input[name="answer"][value='+ data.saved_question["answer"] +']').prop('checked', true);

          if ($('#save_details-' + set_no).length > 0) {
            $('#question-' + current_question).addClass('btn-dark').removeClass('btn-secondary').removeClass('btn-success');
            $('#question-' + (Number(current_question) + 1)).removeClass('btn-dark').addClass('btn-secondary');

            $('#save_details-' + set_no).attr('data-question', current_question);
            if (current_question < 30) { 
              $('#save_details-' + set_no).text('Submit & Next');
            }
          }
          if ($('#update_details-' + set_no).length > 0) {
            $('#question-' + current_question).addClass('btn-success').removeClass('btn-secondary');
            $('#question-' + (Number(current_question) + 1)).removeClass('btn-success').addClass('btn-secondary');
            $('#update_details-' + set_no).attr('data-question', current_question);
          }

          if (data.saved_question['media_file'] != '') {
            document.getElementById('media_files').innerHTML = data.saved_question['media_file'].split('/')[3];
            if ($('#update_details-' + set_no).length > 0) {
              $('.media_image').attr('src', data.saved_question['media_file'] + '?v=' + (new Date()).getTime()).attr('alt', 'Quiz Media Image');
            }
          }
          else {
            $('.media_image').attr('src', '\\images/media_icon.gif').attr('alt', 'No Media Image');
            document.getElementById('media_file').value = '';
            document.getElementById('media_files').innerHTML = '+ Add Image or Video (optional)';
          }
          $('.loading').css('display', 'none');
        }
      }
    });
  }
}

// Delete Quiz Set

function deleteQuizSet() {

  var set_no = $('#deleteQuizSet').val();
  if (set_no != 0) {
    $.ajax({
      type: 'POST',
      url: url + '/deleteQuiz',
      data: {
        'set_no': set_no
      },

      success: function (data) {
        if (data.success == 'yes') {
          window.location = url + '/dashboard';
        }
        else {
          alert('Something went wrong. Try again');
        }
      }
    });
  }
  else {
    alert('Please select Quiz Set to continue');
  }
}

// Pagination update

$(document).ready(function() {
  var flag_update = false;

  $('.question_pagination').on('click', function() {
    var question_no = $(this).attr('data-question');
    var set_no = $(this).attr('data-set');

    // Clear media file
    $('.media_image').attr('src', '\\images/media_icon.gif').attr('alt', 'No Media Image');
    document.getElementById('media_file').value = '';
    document.getElementById('media_files').innerHTML = '+ Add Image or Video (optional)';

    if(flag_update == false) {
      document.getElementById('question').value = '';
      document.getElementById('option1').value = '';
      document.getElementById('option2').value = '';
      document.getElementById('option3').value = '';
      document.getElementById('option4').value = '';
      $('[name="answer"]').prop('checked', false);
    }
      
    flag_update = false;
    storedNextForm(question_no, set_no);

    $('.question_pagination').removeClass('btn-success').addClass('btn-secondary');
    $(this).addClass('btn-success').removeClass('btn-secondary');

  });
});
