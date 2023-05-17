<?php

session_start();

include "db.php";

if(isset($_SESSION['cid']))
{
$cid = $_SESSION['cid'];


$category = "";

if(isset($_GET['category']))
    $category = $_GET['category'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../CSS/products.css">
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

        <div class="left-section">

            <h1>Classix</h1>

            <div class="price-range">

                <h2>Price Range</h2>
                <form id="search_products">
                    
                    <div class="price">
                        <input type="radio" name="price-range" value="all" checked>
                        <lable>All</lable>
                    </div>
                    <div class="price">
                    <input type="radio" name="price-range" value="below1000">
                    <lable>Below 1000</lable>
                    </div>
                    <div class="price">
                    <input type="radio" name="price-range" value="below2000">
                    <lable>Below 2000</lable>
                    </div>
                    
                    <div class="price">
                    <input type="radio" name="price-range" value="above2000">
                    <lable>Above 2000</lable>
                    </div>
                    <input type="hidden" name="category" id="category" value="<?php echo $category;  ?>">

                    
                </form>

            </div>
            
        </div>

        <!-- Right Side -->
        <div class="right-section">

            <nav>

           
    
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" id="search_products">
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
                <div class="nav-links">
                    <a href="cart.php"><i class='bx bx-shopping-bag'></i></a>
                <a href="account.php"><i class='bx bx-user'></i></a>
                </div>
                
    
            </nav>
            
            <div class="products" id="products-container">

            <?php

            $sql = "SELECT * FROM products WHERE category='$category' AND quantity>0";
            $result = $conn->query($sql);

            // Process the query result
            if ($result->num_rows > 0) {
                // Output data of each row
                $i=1;
                while ($row = $result->fetch_assoc()) {
                    

                echo '<div class="product">';

                echo "<img 
                        src='data:image;base64,{$row["img"]}'
                        alt='img'><br>";

                echo "<h2>".$row['pname']."</h2>";
                echo "<h2>₹ ".$row['price']."</h2>";
                if($category!='accessories' && $category!='shoes')
                    echo "<span>Size : S M L XLL</span>";
                else if($category=='shoes')
                echo "<span>Size : 6 7 8 9 10</span>";
                else
                    echo "<span id='danger'>Hurry only few left</span>";

                echo '<div class="btn">
                    <a href="place_order.php?pid='.$row["pid"].'"><button>BUY NOW</button></a>
                    <a href="add_to_cart.php?pid='.$row["pid"].'"><button>ADD TO CART</button></a>
                </div>';
                
                
                echo "</div>";

                    
                
                }
            }else{
                echo "No results found.";
            }


            ?>

                


            </div>

        </div>
        

    </div>
    
    <script src="../js/search_products.js"></script>

    <?php
}
else{
    header("location:../login.html");
}
    ?>
</body>
</html>