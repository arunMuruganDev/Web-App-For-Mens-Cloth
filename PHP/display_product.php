<?php

include_once "db.php";

$category = $_POST['category'];
// Prepare and execute the query
$sql = "SELECT * FROM products WHERE category='$category' ";
$result = $conn->query($sql);

// Process the query result
if ($result->num_rows > 0) {
    // Output data of each row
    $i=1;
    while ($row = $result->fetch_assoc()) {

        $pid = $row['pid'];
        $sql1 = "SELECT COUNT(*) AS count FROM orders WHERE pid = $pid ";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $count = $row1['count'];


        echo "
        <tr>
                                <td>".$i."</td>
                                <td><img src='data:image;base64,{$row["img"]}'></td>
                                <td>".$row['pname']."</td>
                                <td>".$row['quantity']."</td>
                                <td>".$row['price']."</td>
                                <td>".$count."</td>
                                <td><a href='PHP/delete_product.php?pid=".$row['pid']."'><button>Delete</button></a></td>
                            </tr>
        ";
        $i++;
    }
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>
