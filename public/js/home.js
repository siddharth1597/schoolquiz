$(document).ready(function() {
  $('.organize-quiz').on('click', function() {
    window.location = url + '/login';
  });
});

function createSet($this) {
  var quiz_no = $($this).attr('data-set');
  window.location = url + '/dashboard/createQuizSet/set_no=' + quiz_no;
}

function continueUpdate(set_no) {
  window.location = url + '/dashboard/updateQuizSet';
}
