<?php

include "db.php";

$pass = $_POST["pass"];

$sql  = "UPDATE admin set pass='$pass'";

if($conn->query($sql)===TRUE)
{
    echo 1;
}
else{
    echo 2;
}


?>