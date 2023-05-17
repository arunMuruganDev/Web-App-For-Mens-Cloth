<?php
session_start();

include "db.php";

$_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];

if (isset($_SESSION['previous_page'])) {
    $previousPage = $_SESSION['previous_page'];
    unset($_SESSION['previous_page']);
  
}

if(isset($_GET['oid']))
{
    $oid = $_GET['oid'];



    $sql = "UPDATE orders set status = 1 WHERE oid=$oid";

    if($conn->query($sql)===TRUE)
    {
        echo "<script>
        alert('Status Changed')
        
            window.location.href='".$previousPage."'
      
        </script>";
    }






}
else{
    header("location:../login.html");
}

?>