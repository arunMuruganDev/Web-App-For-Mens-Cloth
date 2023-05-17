<?php

session_start();

include "db.php";

if(isset($_SESSION['cid']))
{

    $cid=$_SESSION['cid'];

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../CSS/cart.css">
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

        <nav>
            <h1>Classix</h1>
            <form action="search_products.php" method="GET" id="search_products">
                <!-- <label for="category">Choose category :</label> -->
                <select name="category">
                  <option>Choose category</option>
                  <option value="shirts">Shirt</option>
                  <option value="pants">Pant</option>
                  <option value="t_shirts">T Shirts</option>
                  <option value="shorts">Shorts</option>
                  <option value="shoes">Shoes</option>
                  <option value="accessories">Accessories</option>
                </select>

                <input type="submit" value="Search">
            </form>
            <a href="account.PHP"><i class='bx bx-user'></i></a>
        </nav>

        <!-- Cart Items Container -->
        <div class="cart">

        <!-- Cart items -->

        <?php

            $sql = "SELECT * FROM cart INNER JOIN products ON cart.pid = products.pid WHERE cid = $cid";
            $result = $conn->query($sql);

            // Process the query result
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    

                echo '<div class="cart-item">';

                echo "<div class='img'><img 
                        src='data:image;base64,{$row["img"]}'
                        alt='img'></div>";

                echo "<div class='details'>";
                echo "<h2>".$row['pname']."</h2>";
                echo "<h2>₹ ".$row['price']."</h2>";
                if($row['category']!='accessories')
                    echo "<span>Available Size : S M L XL XLL</span>";
                else
                    echo "<span id='danger'>Hurry sale price will be increased!</span>";

                echo "<div id='btn'>";
                echo '<a href="place_order.php?pid='.$row["pid"].'"><button>BUY NOW</button></a>';
                echo '<a href="remove_product.php?pid='.$row["pid"].'"><button>REMOVE</button></a>';
                echo "</div>";
                
                echo "</div></div>";

                    
                
                }
            }else{
                echo "No results found.";
            }


            ?>

        
       

        </div>
       

    </div>

    <?php

}
else{
    header("location:../login.html");
}
    ?>
    
</body>
</html>