<?php
include_once "db.php";
// Image upload and database insertion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageFile = $_FILES['image']['tmp_name'];
    $imageData = file_get_contents($imageFile);
    $base64Image = base64_encode($imageData);

    
    $category = $_POST["category"];
    $pname = $_POST["pname"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
  
    // Insert image into the database
    $sql="INSERT INTO products(category,pname,quantity,price,img) VALUES('$category','$pname',$quantity,$price,'$base64Image') ";
    if($conn->query($sql)){

    echo "Product Added Successfully";
    }
    else{
    echo "Product not added";
    }
   
  } else {
    echo "Error uploading image.";
  }

?>