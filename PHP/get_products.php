<?php

include_once "db.php";

$option = $_POST['option'];
$category = $_POST['category'];
// Prepare and execute the query
$sql = "";
if($option=='all')
{
    $sql = "SELECT * FROM products WHERE category='$category' AND quantity>0";
}
else if($option=='below1000')
{
    $sql = "SELECT * FROM products WHERE price<=1000 AND category='$category' AND quantity>0";
}
else if($option=='below2000')
{
    $sql = "SELECT * FROM products WHERE price<=2000 AND category='$category' AND quantity>0";
}
else if($option=='above2000')
{
    $sql = "SELECT * FROM products WHERE price>=2000 AND category='$category' AND quantity>0";
}

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
                if($category!='accessories')
                    echo "<span>Size : S M L XLL</span>";
                else
                    echo "<span id='danger'>Hurry only few left</span>";

                echo '<div class="btn">
                    <a href="buynow.html?pid='.$row["pid"].'"><button>BUY NOW</button></a>
                    <a href="cart.html?pid='.$row["pid"].'"><button>ADD TO CART</button></a>
                </div>';
                
                
                echo "</div>";

        $i++;
    }
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>