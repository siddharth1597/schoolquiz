var url = $('meta[name=url]').attr('content');

$(document).ready(function() {
  $('.organize-quiz').on('click', function() {
    window.location = url + '/login';
  });

  $('.back_link').on('click', function() {
    window.location = url + '/dashboard';
  });
});

function createSet() {
  window.location = url + '/dashboard/createQuizSet';
}

function continueUpdate(set_no) {
  window.location = url + '/dashboard/updateQuizSet';
}