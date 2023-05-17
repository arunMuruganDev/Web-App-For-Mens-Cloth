
  $(document).ready(function() {
    $('input[type="radio"]').change(function() {

        // alert('hi')
      var option = $('input[name="price-range"]:checked').val();
      var category = $('#category').val();

      $.ajax({
        url: 'get_products.php',
        method: 'POST',
        data: { option: option , category : category },
        success: function(response) {
          $('#products-container').html(response);
        }
      });
    });
  });

