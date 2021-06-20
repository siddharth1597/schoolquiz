$(document).ready(function () {
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

});
