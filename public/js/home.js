$(document).ready(function() {
  $('.organize-quiz').on('click', function() {
    window.location = url + '/login';
  });
  $('.homepage').on('click', function() {
    window.location = url + '/dashboard';
  });
  $('.welcome_screen, .home_icon').on('click', function() {
    window.location = url + '/home';
  });
  $('#fa-back').on('click', function() {
    window.location = url + '/dashboard';
  });
  $('#login_back').on('click', function() {
    window.location = url + '/home';
  });
  $('#registration_back').on('click', function() {
    window.location = url + '/login';
  });
  $('#download_app').on('click', function() {
    window.location = 'http://download.myschoolquiz.in';
  });
});

function createSet($this) {
  var quiz_no = $($this).attr('data-set');
  if (quiz_no != 0) {
    window.location = url + '/dashboard/createQuizSet/set_no=' + quiz_no;
  }
  else {
    alert('Please select Quiz Set to continue');
  }
}

function updateQuiz() {
  var set_no = $('#quizSetList').val();
  if (set_no != 0) {
    window.location = url + '/dashboard/updateQuizSet/set_no=' + set_no;
  }
  else {
    alert('Please select Quiz Set to continue');
  }
}

function startQuiz() {
  var set_no = $('#quizSetList').val();
  if (set_no != 0) {
    window.location = url + '/home/startQuizAnimation/set_no=' + set_no;
  }
  else {
    alert('Please select Quiz Set to continue');
  }
}
