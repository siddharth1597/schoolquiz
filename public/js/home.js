var url = $('meta[name=url]').attr('content');

$(document).ready(function() {
  $('.organize-quiz').on('click', function() {
    window.location = url + '/login';
  });
});
