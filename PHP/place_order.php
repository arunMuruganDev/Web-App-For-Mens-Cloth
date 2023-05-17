<?php

session_start();

include "db.php";

if(isset($_SESSION['cid']))
{

    $cid=$_SESSION['cid'];

if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order</title>
    <link rel="stylesheet" href="../CSS/place_order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">

    <div class="nav">
        <h1>Classix</h1>
        <div class="nav-links">
                    <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
                <a href="account.php"><i class='bx bx-user'></i></a>
                </div>
    </div>

    <div class="main">

    
    
        <div class="left-section">
        <h1>DELIVERY ADDRESS</h1>
        <div class="input-field">
        <input type="text" id="name"  placeholder="Name" required>
        <input type="text" id="mobile"placeholder="Mobile" required>
        </div>
        <div class="input-field">
        <input type="text" id="pincode" placeholder="Pin Code" required>
        <input type="text" id="state" placeholder="State" required>
        </div>
        
        <div class="input-field">
        <textarea id="address" id="address" rows="4" cols="50" placeholder="Address" required></textarea>
        </div>
        <input type="hidden" id="cid" value="<?php echo $cid ?>">
        <input type="hidden" id="pid" value="<?php echo $pid ?>">
        <input type="submit" id="btn" value="Place Order">
        </div>
         
        

<div class="right-section">

<?php

$sql = "SELECT pname,price,category FROM products WHERE pid = $pid";

$result = $conn->query($sql);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        ?>

<div class="details">
<h2>Price Details</h2>
<div>
<label>Product</label>
<input type="text" id="pname" value="<?php echo $row['pname'] ?>" readonly>
</div>
<?php
if($row['category']!="accessories" && $row['category']!="shoes")
{

?>
<div>
<label>Size</label>
<select id="size">
<option value="S">S</option>
<option value="M">M</option>
<option value="L">L</option>
<option value="XL">XL</option>
<option value="XXL">XLL</option>
</select>
</div>
<?php
}
else if($row['category']=="shoes")
{

?>
<div>
<label>Size</label>
<select id="size">
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</div>
<?php
}
else{
    echo '
    <input type="hidden" id="size" value=" " readonly>';
}
?>
<div>
<label>Quantity</label>
<input type="number" name="quantity" value="1" id="quantity" min="1" max="4" onchange="calculatePrice()" >
</div>
<div>
<label>Price</label>
<input type="text" id="price" value="<?php echo $row['price'] ?>" id="price" readonly >
<input type="hidden" id="base_price" value="<?php echo $row['price'] ?>" >
</div>
<div>

<span id="danger">Free delivery available</span>
</div>
</div>

<?php

    }
}

?>


</div>


</div>
</div>


<?php

$sql = "";

}
else{
    header("location:../login.html");
}
?>
<script src="../js/validate.js"></script>
<script>
function calculatePrice() {
  // Get the quantity value
  var quantity = document.getElementById("quantity").value;
  var price = document.getElementById("base_price").value;

 
  // Calculate the total price
  var totalPrice = quantity * price;

  // Update the price text field
  document.getElementById("price").value = totalPrice;
}
</script>

</body>
</html>