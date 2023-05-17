<?php


include_once "db.php";

$mobile = $_POST['mobile'];
$pass = $_POST['pass'];
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);



        $sql = "INSERT INTO customer_login(mobile,pass) values( ? , ? )";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$mobile,$hashed_password);
        if ($stmt->execute()) {
           echo 1;
           exit();
        } 

