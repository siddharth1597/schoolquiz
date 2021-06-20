$(document).ready(function() {
  $('.organize-quiz').on('click', function() {
    window.location = url + '/login';
  });
  $('.homepage').on('click', function() {
    window.location = url + '/dashboard';
  });
  $('.welcome_screen').on('click', function() {
    window.location = url + '/home';
  });
  $('#fa-back').on('click', function() {
    window.location = url + '/dashboard';
  });
});

function createSet($this) {
  var quiz_no = $($this).attr('data-set');
  window.location = url + '/dashboard/createQuizSet/set_no=' + quiz_no;
}

function updateQuiz() {
  var set_no = $('#quizSetList').val();
  window.location = url + '/dashboard/updateQuizSet/set_no=' + set_no;
}

function startQuiz() {
  var set_no = $('#quizSetList').val();
  window.location = url + '/home/savedQuizSet/set_no=' + set_no;
}
