<?php


include_once "db.php";

$mobile = $_POST['mobile'];




$sql = "SELECT mobile FROM customer_login where mobile='$mobile'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo 1;
}