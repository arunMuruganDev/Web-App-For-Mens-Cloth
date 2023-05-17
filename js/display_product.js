
  $(document).ready(function() {
    // Handle form submission
    $('#display_products').submit(function(e) {
      e.preventDefault(); // Prevent default form submission
      
      // Get the form data
      var formData = $(this).serialize();
      
      // Send an AJAX request
      $.ajax({
        type: 'POST',
        url: 'PHP/display_Product.php',
        data: formData,
        success: function(response) {
          // Handle the response from the server
          $('#home-result').html(response);
        }
      });
    });
  });

