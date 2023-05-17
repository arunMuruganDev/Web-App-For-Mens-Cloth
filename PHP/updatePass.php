<?php


include_once "db.php";

$mobile = $_POST['mobile'];
$pass = $_POST['pass'];


$hashed_password = password_hash($pass, PASSWORD_DEFAULT);



        $sql = "UPDATE customer_login set pass=? where mobile='$mobile'  ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$hashed_password);
        if ($stmt->execute()) {
           echo 1;
           exit();
        } 
