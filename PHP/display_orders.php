<?php

include_once "db.php";

$category = $_POST['category'];
// Prepare and execute the query
$sql = "SELECT pid,pname,img FROM products WHERE category='$category' ";
$result = $conn->query($sql);

// Process the query result
if ($result->num_rows > 0) {
    // Output data of each row
    $i=1;
    while ($row = $result->fetch_assoc()) {

        $pid = $row['pid'];
        $sql1 = "SELECT * FROM orders WHERE pid = $pid AND status=0";
        $result1 = $conn->query($sql1);
        if($result1->num_rows>0)
        {
            
            while($row1 = $result1->fetch_assoc())
            {

                
        echo "
        <tr>
                                <td>".$i."</td>
                                <td><img src='data:image;base64,{$row["img"]}'></td>
                                <td>".$row['pname']." (".$row1['size'].")</td>
                                <td>".$row1['quantity']."</td>
                                <td>".$row1['price']."</td>
                                <td>".$row1['mobile']."</td>
                                <td>".$row1['address']."</td>
                                <td>".$row1['date']."</td>
                                <td><a href='PHP/update_status.php?oid=".$row1['oid']."'><button>Change</button></a></td>
                            </tr>
        ";
        $i++;

            }
        } 
        


    }
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>