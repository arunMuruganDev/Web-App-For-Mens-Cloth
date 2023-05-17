
<?php
session_start();

include "db.php";

$_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];

if (isset($_SESSION['previous_page'])) {
    $previousPage = $_SESSION['previous_page'];
    unset($_SESSION['previous_page']);
  
}

if(isset($_SESSION['cid']))
{
    $cid = $_SESSION['cid'];

if(isset($_GET['pid']))
{
    $pid = $_GET['pid'];

    $sql = "DELETE FROM cart WHERE cid = $cid AND pid = $pid";

    if($conn->query($sql)===TRUE)
    {
        echo "<script>
        alert('Product removed from cart')
        
            window.location.href='".$previousPage."'
      
        </script>";
    }

}




}
else{
    header("location:../login.html");
}

?>