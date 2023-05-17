$(document).ready(function() {
    // AJAX form submission
    $("#timeForm").submit(function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get the time value from the input field
      var timeValue = $("#timeInput").val();

      // Send AJAX request to the PHP script
      $.ajax({
        url: "update_time.php",
        type: "POST",
        data: { time: timeValue },
        success: function(response) {
          $("#result").text(response); // Display the response
        }
      });
    });
  });