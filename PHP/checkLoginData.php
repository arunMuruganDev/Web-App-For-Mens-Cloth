<?php

session_start();
include_once "db.php";

$mobile = $_POST['mobile'];
$pass = $_POST['pass'];

// Prepare and execute the query
$stmt = $conn->prepare("SELECT * FROM customer_login WHERE mobile = ?");
$stmt->bind_param("s", $mobile);
$stmt->execute();
$stmt->store_result();

// Check if the user exists
if ($stmt->num_rows == 1) {
  $stmt->bind_result($cid, $mobile, $hashed_password,$time);
  $stmt->fetch();

  
  if (password_verify($pass, $hashed_password)) {
    // Password is correct, create a session
    
  
    $_SESSION["cid"] = $cid;
    // $_SESSION["mobile"] = $mobile;

    // Redirect to the home page or any other authenticated page
    echo 1;
    exit();
  }
}

