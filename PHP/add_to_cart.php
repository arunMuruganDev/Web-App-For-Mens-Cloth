<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php


session_start();

$_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];

if (isset($_SESSION['previous_page'])) {
    $previousPage = $_SESSION['previous_page'];
    unset($_SESSION['previous_page']);
  
}

include "db.php";

if(isset($_SESSION['cid']))
{
    $cid = $_SESSION['cid'];
}

if(isset($_GET['pid']))
{
    $pid = $_GET['pid'];
    
}

$sql = "SELECT * FROM cart WHERE cid = $cid AND pid = $pid";

$result = $conn->query($sql);

if($result->num_rows>0)
{
    echo "<script>swal('OOPS!','Product Already Added to Cart','error')

    setTimeout(()=>{
        window.location.href='".$previousPage."';
    },2000)
    </script>";
}
else
{

$sql = "INSERT INTO cart VALUES($cid,$pid)";

if($conn->query($sql)===TRUE)
{
    echo "<script>
    
    swal('Yaah!','Product Added to Cart','success')
    setTimeout(()=>{
        window.location.href='".$previousPage."';
    },2000)

    </script>";
}
}




?>
</body>
</html>