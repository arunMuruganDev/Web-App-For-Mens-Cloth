function validateNumber(event) {
    var input = event.target;
    var value = input.value;
    var sanitizedValue = value.replace(/\D/g, ""); // Remove non-numeric characters
    input.value = sanitizedValue;
}



$(document).ready(function() {
    $('#myForm').submit(function(e) {
      e.preventDefault();
  
      var formData = new FormData(this);
      $.ajax({
        url: 'PHP/add_product.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log(response);
          alert(response)
        }
      });
    });
  });
  
  