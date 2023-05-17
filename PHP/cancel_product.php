<?php

include "db.php";

if(isset($_GET['oid']))
{
    $oid = $_GET['oid'];
  

    $sql = "UPDATE orders SET status=2 WHERE oid=$oid";

    if($conn->query($sql)===TRUE)
    {
        echo "<script>alert('Order Cancelled')
        
            window.location.href='account.php'
       
        </script>";
        
    }
}


?>